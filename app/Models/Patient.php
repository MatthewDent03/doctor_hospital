<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'name', 'emergency_contact', 'phone_number', 'emergency_number', 'address', 'age', 'gender'
    // ];
    protected $guarded = [];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class)->withTimestamps();
    }
}
