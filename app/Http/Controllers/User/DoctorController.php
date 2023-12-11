<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('user');
        // $doctors = Doctor::all();
        // $doctors = Doctor::paginate(10);
        $doctors = Doctor::with('hospital')->get();
        return view('user.doctors.index')->with('doctors', $doctors);
    }

    public function show($id)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');
        $doctor = Doctor::find($id);
        return view('user.doctors.show')->with('doctor', $doctor);
    }
}
