<?php
//This table created through migrations links between the model and imports it as a class
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Doctor;

return new class extends Migration
{
    /**
     * The migrations are ran which creates the false data variables for the index
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->unsignedBigInteger('hospital_id');
            $table->foreign('hospital_id')->references('id')->on('hospital')->onUpdate('cascade')->onDelete('restrict');
            // $table->id();
            // $table->string('first_name');
            // $table->string('last_name');
            // $table->string('facility');
            // $table->string('email');
            // $table->string('phone_number');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.   
     * 
     * @return void
     */

    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropForeign(['hospital_id']);
                $table->dropColumn('hospital_id');
        });
        // Schema::dropIfExists('doctors');
    }
};
