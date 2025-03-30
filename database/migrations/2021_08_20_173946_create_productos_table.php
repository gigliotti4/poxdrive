<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orden')->nullable();
            $table->string('nombre')->nullable();
            $table->longtext('descripcion')->nullable();
            $table->longtext('caracteristica')->nullable();
            $table->text('pdf')->nullable();
            $table->text('imagen')->nullable();
            $table->longtext('galeria')->nullable();
            $table->boolean('destacado')->nullable();
            $table->boolean('panificadora')->nullable();
            $table->boolean('alimenticia')->nullable();
            $table->boolean('bebidas')->nullable();
            $table->boolean('farmaceuticas')->nullable();
            $table->boolean('metal')->nullable();
            $table->boolean('petrolera')->nullable();
            $table->integer('categoria_id')->nullable();
            $table->integer('subcategoria_id')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
