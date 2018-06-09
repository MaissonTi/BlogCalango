<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_evento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('data_evento')->nullable();
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->
            references('id')->
            on('tb_cliente');
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
        Schema::dropIfExists('tb_evento');
    }
}
