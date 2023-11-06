<?php
//This controller focuses on processing requests from the http requests through the specified route
namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * This function displays the basic layout for the index of the webpage with the other routes available
     * The paginate function for the Doctor class displays a limited number of components on the index page
     * Returns to the updated index page after runnning these prompts
     */
    public function index()
    {
        $doctors = Doctor::all();
        $doctors = Doctor::paginate(5);
        return view('doctors.index', compact('doctors'));

    }

    /**
     * The create function changes the view when clicked on the button to the create view
     * The create view leads onto creating new components for the database to store
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * The store function stores the data for the component that was created in the create view
     * Through the store function is a validation method, this runs various requests for data types and requirements
     * Returns the view to the index once stored 
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
     * Show Id is a function which is used within the show view and resource
     * When a doctor is clicked on in the index it focuses on that component's data and displays options related to it
     * Does not change page until another view is reached through the resource and controller connection
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.show')->with('doctor', $doctor);
    }

    /**
     * The edit function allows the user to edit the data of the component
     * When the button is clicked it brings the user to the edit view
     * After editing options appear to escape/continue the process of editing to change view
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit')->with('doctor', $doctor);
    }

    /**
     * The update function runs after the confirm button in the edit view is clicked
     * The data that was inputted is then processed in a validation method checking the data types and if it is verified
     * The route is changed back to the show view with the success message popup displaying
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

    //The destroy function is accessed through a button in the edit/show view which deletes the component and it's data from the database
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
