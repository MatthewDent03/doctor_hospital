<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hospital;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('user');
        $hospitals = Hospital::all();

        return view('user.hospitals.index')->with('hospitals', $hospitals);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        if (!Auth::id()) {
            return abort(403);
        }

        $hospital = Hospital::find($id);

        if (!$hospital) {
            return abort(404);
        }

        $doctors = $hospital->doctors;

        return view('user.hospitals.show', compact('hospital', 'doctors'));
    }
}
