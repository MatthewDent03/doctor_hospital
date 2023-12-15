<?php

namespace App\Models;
//calling models and classes from other tables
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Hospital extends Model
{
    use HasFactory;
//creating fillable function for attributes
    protected $fillable = [
        'name', 'address', 'phone_number'
    ];

    public function doctors()  //creating public function for one to many relationship between doctors and hospitals
    {
        return $this->hasMany(Doctor::class);
    }
}
