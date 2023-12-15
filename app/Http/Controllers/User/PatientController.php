<?php

namespace App\Http\Controllers\User;
//calling models and classes
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
//intialising controller 
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();  //authorising user role for authentication
        $user->authorizeRoles('user');
        $patients = Patient::all();

        return view('user.patients.index')->with('patients', $patients);
    } //rerouting user view
    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');
    
        if (!Auth::id()) {   //error message for missing id created
            return abort(403);
        }
    
        // Remove the following line, as $id is not defined
        // $patient = Patient::find($id);
    
        if (!$patient) {
            return abort(404);
        }
    
        $doctors = $patient->doctors;   //foreign key linked for data to cross over tables
    
        return view('user.patients.show', compact('patient', 'doctors'));
    }
}
