<?php
//This file displays the data of the database. It is generally used as a class in other files
//This will work with object orientated syntax to interact with the database
namespace App\Models;
 //calling classes and models from other tables
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Hospital;

class Doctor extends Model
{
    use HasFactory;
//The protected function sets all the attributes together for the create and update functions in the controller
    // protected $guarded = [];

    protected $fillable = [   //setting data as fillable so it can be altered easily and accessible
        'first_name',
        'last_name',
        'facility',
        'email',
        'phone_number',
        'hospital_id',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);   //creating function to call foreign key one to many between doctor and hospital
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'patient_doctor');   //creating function to call foreign key many to many between doctor and patient
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}