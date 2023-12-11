<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;

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

        return view('admin.patients.index')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $patients = Patient::all();

        return view('admin.patients.create')->with('patients', $patients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $request->validate([
            'name' => ['required', 'alpha'],
            'emergency_contact' => ['required', 'alpha'],
            'phone_number' => 'required',
            'emergency_number' => 'required',
            'age' => ['required', 'numeric'],
            'address' => 'required',
            'gender' => 'required',
            'patient_id' => 'required',
        ]);

        Patient::create([
            'name' => $request->name,
            'emergency_contact' => $request->emergency_contact,
            'phone_number' => $request->phone_number,
            'emergency_number' => $request->emergency_number,
            'age' => $request->age,
            'address' => $request->address,
            'gender' => $request->gender,
            'patient_id' => $request->patient_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return to_route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if (!Auth::id()) {
            return abort(403);
        }

        $patient = Patient::find($id);

        if (!$patient) {
            return abort(404);
        }

        $doctors = $patient->doctors;

        return view('admin.patients.show', compact('patient', 'doctors'));
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
            'emergency_contact' => ['required', 'alpha'],
            'phone_number' => 'required',
            'emergency_number' => 'required',
            'age' => ['required', 'numeric'],
            'address' => 'required',
            'gender' => 'required',
        ]);

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
            'address' => $request->address,
            'gender' => $request->gender,
        ]);

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
