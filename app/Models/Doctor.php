<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'facility',
    //     'email',
    //     'phone_number',
    // ];
}
