<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Patient extends Model
{
    use HasFactory;

    // protected $guarded = [
    // ];

    protected $fillable = [
        'name', 'emergency_contact', 'phone_number', 'emergency_number', 'age', 'address', 'gender', 'patient_image',
    ];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'patient_doctor');
    }
}
