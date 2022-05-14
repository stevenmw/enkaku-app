<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingPathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_paths', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id');
            $table->string('path_name');
            $table->integer('path_size');
            $table->enum('type',['VELOCITY','CURRENT']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_paths');
    }
}
