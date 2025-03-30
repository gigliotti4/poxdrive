<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orden')->nulable();
            $table->text('descripcion')->nullable();
            $table->text('imagen')->nullable(); 
            $table->text('titulo')->nullable();
            $table->text('texto')->nullable();
            $table->text('titulodos')->nullable();
            $table->text('textodos')->nullable();
            $table->text('titulotres')->nullable();
            $table->text('textotres')->nullable();
            $table->text('icono')->nullable();
            $table->text('iconodos')->nullable();
            $table->text('iconotres')->nullable();
           
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
        Schema::dropIfExists('empresas');
    }
}
