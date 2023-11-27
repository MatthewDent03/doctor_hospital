<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'phone_number'
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
