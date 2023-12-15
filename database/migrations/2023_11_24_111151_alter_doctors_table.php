<?php
namespace App\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Database\Migrations\CreateDoctorsTable;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->unsignedBigInteger('hospital_id');
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onUpdate('cascade')->onDelete('restrict');
 //creating the one to many relationship between the doctors table and the hospital table acquiring a foreign key 
        });

    }

    public function down(): void{
        Schema::table('doctors', function (Blueprint $table) {   //dropping the foreign key if it already exists
            $table->dropForeign(['hospital_id']);
            $table->dropColumn('hospital_id');
        });
    }
};
