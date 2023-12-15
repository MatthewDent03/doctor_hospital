<?php

namespace App\Http\Controllers\User;
//calling models and classes used for this file's crud functionality
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//creating controller 
class DoctorController extends Controller
{
    public function index()
    { //authorizing user role 
        $user = Auth::user();
        $user->authorizeRoles('user');
        // $doctors = Doctor::all();
        // $doctors = Doctor::paginate(10);
        $doctors = Doctor::with('hospital')->get();  //retrieving data through foreign key
        return view('user.doctors.index')->with('doctors', $doctors);
    } //rerouting the view for user

    public function show($id)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');
        $doctor = Doctor::find($id);
        return view('user.doctors.show')->with('doctor', $doctor);
    } //finding data of attribute id
}
