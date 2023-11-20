<?php
//This file displays the data of the database. It is generally used as a class in other files
//This will work with object orientated syntax to interact with the database
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
//The protected function sets all the attributes together for the create and update functions in the controller
    protected $guarded = ['first_name', 'last_name', 'facility', 'email', 'phone_number'];

    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'facility',
    //     'email',
    //     'phone_number',
    // ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
