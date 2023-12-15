<?php

namespace App\Http\Controllers\User;

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
        $user->authorizeRoles('user');
        $patients = Patient::all();

        return view('index.patients.index')->with('patients', $patients);
    }
    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');
    
        if (!Auth::id()) {
            return abort(403);
        }
    
        // Remove the following line, as $id is not defined
        // $patient = Patient::find($id);
    
        if (!$patient) {
            return abort(404);
        }
    
        $doctors = $patient->doctors;
    
        return view('user.patients.show', compact('patient', 'doctors'));
    }
}
