<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        $doctors = Doctor::paginate(5);
        $doc
        return view('doctors.index', compact('doctors'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        return to_route('doctors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.show')->with('doctor', $doctor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit')->with('doctor', $doctor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
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

        return to_route('doctors.show', $doctor)->with('success', 'Doctor updated successfully');
    }


    public function destroy(Doctor $doctor)
    {


        /* This function is for if a search method is available and will return that the doctor is not there
        $doctor = Doctor::find($doctor); //find the doctor when entering from show on index
    
        if (!$doctor) {
            return redirect()->route('doctors.index')->with('error', 'Doctor record was not found.');
        } //If deleted return to index page and produce error message
    */
        $doctor->delete(); //run doctor delete in show
    
        return redirect()->route('doctors.index')->with('success', 'Doctor record was deleted successfully.');
    } //return to index page and produce alert for successful delete
    

//Attempt of filtering by ascension and descension
    // public function filterAscending()
    // {
    //     $doctors = Doctor::orderBy('name', 'asc')->get();
        
    //     return view('doctors.index', compact('doctors'));
    // }

    // public function filterDescending()
    // {
    //     $doctors = Doctor::orderBy('name', 'desc')->get();
        
    //     return view('doctors.index', compact('doctors'));
    // }

}
