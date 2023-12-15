<?php

namespace App\Http\Controllers\Admin;

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
        $user->authorizeRoles('admin');
        $hospitals = Hospital::all();

        return view('admin.hospitals.index')->with('hospitals', $hospitals);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $hospitals = Hospital::all();

        return view('admin.hospitals.create')->with('hospitals', $hospitals);
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
            'phone_number' => ['required', 'numeric'],
            'address' => 'required',
        ]);
    
        Hospital::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    
        // Use redirect() instead of to_route()
        return redirect()->route('admin.hospitals.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('Admin');

        if (!Auth::id()) {
            return abort(403);
        }

        $hospital = Hospital::find($id);

        if (!$hospital) {
            return abort(404);
        }

        $doctors = $hospital->doctors;

        return view('admin.hospitals.show', compact('hospital', 'doctors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $hospital = Hospital::find($id);

        if (!$hospital) {
            return abort(404);
        }

        $hospitals = Hospital::all();

        return view('admin.hospitals.edit', compact('hospital', 'hospitals'));
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
            'address' => 'required',
            'phone_number' => ['required', 'numeric']
        ]);

        $hospital = Hospital::find($id);

        if (!$hospital) {
            return abort(404);
        }

        $hospital->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number
        ]);

        return redirect()->route('admin.hospitals.show', $hospital->id)->with('success', 'Hospital updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $hospital = Hospital::find($id);

        if (!$hospital) {
            return abort(404);
        }

        $hospital->delete(); 
        return redirect()->route('admin.hospitals.index')->with('success', 'Hospital record was deleted successfully.');
    }
}
