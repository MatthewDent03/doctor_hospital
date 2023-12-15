<?php
namespace App\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {   //creating a schema for migration to create the doctors table and the attributes it holds and their type
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('facility');
            $table->string('email');
            $table->string('phone_number');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       // $table->dropForeign('hospital_id');
        Schema::dropIfExists('doctors');   //creating a drop function to remove the table if errors occur or if it previously exists
    }

    public function addHospitalIdColumn(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->unsignedBigInteger('hospital_id')->after('id');  //adding the foreign key id for the hospital table into the doctor for the one to many relationship
        });
    }
};