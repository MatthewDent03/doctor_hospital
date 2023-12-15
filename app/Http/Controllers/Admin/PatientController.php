<?php

namespace App\Http\Controllers\Admin;
//calling models, classes and files to work coherently
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Models\Doctor;
//initialising controller class
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $patients = Patient::all();
//authorising roles for user or admin
        return view('admin.patients.index')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
    
        $doctors = Doctor::all();
        $patients = Patient::all(); // Assuming you want to fetch patients here
    
        return view('admin.patients.create', compact('doctors', 'patients'));
    }//changing route for views for user
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        //validating the attributes
        $request->validate([
            'name' => ['required', 'alpha'],
            'emergency_contact' => 'required',
            'phone_number' => 'required',
            'emergency_number' => 'required',
            'age' => ['required', 'numeric'],
            'patient_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'address' => 'required',
            'gender' => 'required',
            // 'doctor_id' => ['required', 'exists:doctors,id']
        ]);
//initiating image files and declaring paths and setting base image as null
        $patient_image_name = null;
        if ($request->hasFile('patient_image')) {
            $image = $request->file('patient_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/patients', $imageName);
            $patient_image_name = 'storage/patients/' . $imageName;
        }
        

        
        // Use consistent field names (doctor_id)
        $patient = Patient::create([
            'name' => $request->name,
            'emergency_contact' => $request->emergency_contact,
            'phone_number' => $request->phone_number,
            'emergency_number' => $request->emergency_number,
            'age' => $request->age,
            'patient_image' => $patient_image_name,
            'address' => $request->address,
            'gender' => $request->gender,
            // 'doctor_id' => $request->doctor_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // Use consistent field names (doctor_id)
        // $patient->doctors()->attach($request->doctor_id);
    
        return to_route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
    
        if (!$user) {
            return abort(403);
        }
    //creating error messages if data is not found
        $patient = Patient::with('doctors')->find($patient->id);
    
        if (!$patient) {
            return abort(404);
        }
    
        $doctors = $patient->doctors;
        $patient_image_name = $patient->patient_image; // Set the variable her     

        return view('admin.patients.show', compact('patient', 'doctors', 'patient_image_name'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $patient = Patient::find($id);

        if (!$patient) {
            return abort(404);
        }

        $patients = Patient::all();
//calling class and data with it
        return view('admin.patients.edit', compact('patient', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $request->validate([
            'name' => ['required', 'alpha'],
            'emergency_contact' => 'required',
            'phone_number' => 'required',
            'emergency_number' => 'required',
            'age' => ['required', 'numeric'],
            'patient_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required',
            'gender' => 'required',
            // 'doctor_id' => ['required', 'exists:doctors,id']


        ]);
        $patient_image_name = null;

        if ($request->hasFile('patient_image')) {
            $image = $request->file('patient_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/patients', $imageName);
            $patient_image_name = 'storage/patients/' . $imageName;
        }

        $patient = Patient::find($id);

        if (!$patient) {
            return abort(404);
        }
        $patient->update([
            'name' => $request->name,
            'emergency_contact' => $request->emergency_contact,
            'phone_number' => $request->phone_number,
            'emergency_number' => $request->emergency_number,
            'age' => $request->age,
            'patient_image' => $patient_image_name,
            'address' => $request->address,
            'gender' => $request->gender,
            // 'doctor_id' => $request->doctor_id,
        ]);
        // $doctor = Doctor::find($request->doctor_id);

        // $patient->doctors()->sync([$doctor->id]);

        return redirect()->route('admin.patients.show', $patient->id)->with('success', 'Patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $patient = Patient::find($id);

        if (!$patient) {
            return abort(404);
        }

        $patient->delete(); 
        return redirect()->route('admin.patients.index')->with('success', 'Patient record was deleted successfully.');
    }
}
