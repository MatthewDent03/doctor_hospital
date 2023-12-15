<?php

namespace App\Http\Controllers\User;
//calling models and classes
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hospital;
//initialising controller
class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('user');  //authorizing user role
        $hospitals = Hospital::all();
//calling data from table class
        return view('user.hospitals.index')->with('hospitals', $hospitals);
    } //rerouting user view

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        if (!Auth::id()) {
            return abort(403);
        } //creating error message if data not found from id

        $hospital = Hospital::find($id);

        if (!$hospital) {
            return abort(404);
        }

        $doctors = $hospital->doctors; //foreign key link to view doctor data through hospital

        return view('user.hospitals.show', compact('hospital', 'doctors'));
    }
}
