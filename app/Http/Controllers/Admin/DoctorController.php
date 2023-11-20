<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor; // Add this line to import the Doctor model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class DoctorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $doctors = Doctor::paginate(10);
        return view('admin.doctors.index')->with('doctors', $doctors);
    }

    public function create ()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        return view('admin.doctors.create');
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
            'facility' => 'required'
        ]);

        Doctor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'facility' => $request->facility
        ]);
        return to_route('admin.doctors.index');
    }

    public function show($id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $doctor = Doctor::find($id);
        return view('admin.doctors.show')->with('doctor', $doctor);
    }

    public function edit(Doctor $doctor)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        return view('admin.doctors.edit')->with('doctor', $doctor);
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
            'phone_number' => ['required', 'numeric']
        ]);

        $doctor->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'facility' => $request->facility,
            'phone_number' => $request->phone_number
        ]);

        return to_route('admin.doctors.show', $doctor)->with('success', 'Doctor updated successfully');
    }

    public function destroy(Doctor $doctor)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $doctor->delete(); 
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor record was deleted successfully.');
    } 
}
