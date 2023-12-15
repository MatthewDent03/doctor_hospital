<?php

namespace App\Models;
 //calling models and classes
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Patient extends Model
{
    use HasFactory;

    // protected $guarded = [
    // ];
//creating fillable array for attributes
    protected $fillable = [
        'name', 'emergency_contact', 'phone_number', 'emergency_number', 'age', 'address', 'gender', 'patient_image',
    ];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'patient_doctor');  //creating many to many relationship between doctor and patient
    }
}
