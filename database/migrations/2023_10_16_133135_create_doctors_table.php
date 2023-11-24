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
        Schema::create('doctors', function (Blueprint $table) {
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
        Schema::dropIfExists('doctors');
    }

    public function addHospitalIdColumn(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->unsignedBigInteger('hospital_id')->after('id');
        });
    }
};