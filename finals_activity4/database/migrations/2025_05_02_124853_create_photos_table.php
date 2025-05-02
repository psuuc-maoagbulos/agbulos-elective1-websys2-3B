<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // Stores the filename
            $table->timestamps(); // Corrected: Adds created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
}