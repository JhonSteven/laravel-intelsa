<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('surnames');
            $table->string('identification_number');
            $table->unsignedInteger('identification_type_id');
            $table->unsignedInteger('genre_id');
            $table->date('date_of_birth');
            $table->unsignedInteger('career_id');
            $table->timestamps();
            
            $table->foreign('identification_type_id')->references('id')->on('identification_types');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('career_id')->references('id')->on('careers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
