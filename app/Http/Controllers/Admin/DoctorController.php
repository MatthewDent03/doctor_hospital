<?php

namespace App\Http\Controllers\Admin;
 //importing all classes required to perform code tasks
use App\Http\Controllers\Controller;
use App\Models\Doctor; // Add this line to import the Doctor model
use App\Models\Hospital;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//extending the controller to allow other controls to interact together and giving this controller a name of DoctorController 
class DoctorController extends Controller
{
    public function index()
    {
        $user = Auth::user();     //applying authentication to the roles whether they are admin or user denying or allowing access
        $user->authorizeRoles('admin');
        // $doctors = Doctor::paginate(10);
        $doctors = Doctor::with('hospital')->get();

        return view('admin.doctors.index')->with('doctors', $doctors);
    } //rerouting to another html page once access is granted
    //initialises CRUD functionality in controller declaring the requirements for these processes
    public function create ()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $hospitals = Hospital::all();
        $patients = Patient::all();
//calling class and all their data
        return view('admin.doctors.create')->with('hospitals', $hospitals)->with('patients', $patients);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
//declaring validation for each attribute in the table and requiring it for form data to be processing before proceeded
        $request->validate([
            'first_name' => ['required', 'alpha'],
            'last_name' => ['required', 'alpha'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'numeric'],
            'facility' => 'required',
            'hospital_id' => 'required',
            'patients' => ['required', 'array'],
            'patients.*' => ['exists:patients,id'],   //foreign keys being validated for their existence between the tables
        ]);

        // Log the request data
        logger($request->all());

        // Create a new Doctor instance
        $doctor = Doctor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'facility' => $request->facility,
            'hospital_id' => $request->hospital_id,
        ]);
//requesting the data for the attributes 
        // Attach patients if any are selected
        $doctor->patients()->attach($request->patients);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor created Successfully');
    }

    


    public function show(Doctor $doctor)
    {
        $doctor = Doctor::with('hospital', 'patients')->find($doctor->id);
    //interlinking the classes and attributes following them through the primary key of doctor with foreign keys
        return view('admin.doctors.show', compact('doctor'));
    }
    
    

    public function edit(Doctor $doctor)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
    
        $patients = Patient::all(); // Add this line to fetch patients
    
        $hospitals = Hospital::all();
    
        return view('admin.doctors.edit', compact('doctor', 'patients', 'hospitals'));
    } //requiring all tables to work coherently to process this functionality
    
    
    public function update(Request $request, Doctor $doctor)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
    
        $request->validate([
            'first_name' => ['required', 'alpha'],
            'last_name' => ['required', 'alpha'],
            'email' => ['required', 'email'],
            'facility' => 'required',
            'phone_number' => ['required', 'numeric'],
            'hospital_id' => 'required',
            'patients.*' => ['required', 'exists:patients,id'],
        ]);
    
        // Update doctor's information
        $doctor->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'facility' => $request->facility,
            'phone_number' => $request->phone_number,
            'hospital_id' => $request->hospital_id,
        ]);
    
        // Sync the patients
        $doctor->patients()->sync($request->patients);
        logger('Updated Patient IDs:', $request->patients);

        return redirect()->route('admin.doctors.show', $doctor)->with('success', 'Doctor updated successfully');
    } 
    





    public function destroy(Doctor $doctor)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
    
        // Detach patients
        $doctor->patients()->detach();
    
        // Delete the doctor
        $doctor->delete();
    
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor record was deleted successfully.');
    }
    
}
