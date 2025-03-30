<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('orden')->nullable(); 
            $table->text('rol')->nullable();
            $table->text('nombre')->nullable(); 
            $table->text('pdf')->nullable(); 
            $table->text('videos')->nullable(); 
            $table->text('youtube')->nullable(); 
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
        Schema::dropIfExists('usos');
    }
}
