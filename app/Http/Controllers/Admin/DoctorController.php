<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor; // Add this line to import the Doctor model
use App\Models\Hospital;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        // $doctors = Doctor::paginate(10);
        $doctors = Doctor::with('hospital')->get();

        return view('admin.doctors.index')->with('doctors', $doctors);
    }

    public function create ()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $hospitals = Hospital::all();
        $patients = Patient::all();

        return view('admin.doctors.create')->with('hospitals', $hospitals)->with('patients', $patients);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $request->validate([
            'first_name' => ['required', 'alpha'],
            'last_name' => ['required', 'alpha'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'numeric'],
            'facility' => 'required',
            'hospital_id' => 'required',
            'patients' => ['required', 'array'],
            'patients.*' => ['exists:patients,id'],
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

        // Attach patients if any are selected
        $doctor->patients()->attach($request->patients);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor created Successfully');
    }

    


    public function show(Doctor $doctor)
    {
        $doctor = Doctor::with('hospital', 'patients')->find($doctor->id);
    
        return view('admin.doctors.show', compact('doctor'));
    }
    
    

    public function edit(Doctor $doctor)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
    
        $patients = Patient::all(); // Add this line to fetch patients
    
        $hospitals = Hospital::all();
    
        return view('admin.doctors.edit', compact('doctor', 'patients', 'hospitals'));
    }
    
    
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
