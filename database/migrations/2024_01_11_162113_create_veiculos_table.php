<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id('idVeiculo');
            $table->string('marca');
            $table->string('modelo');
            $table->integer('ano');
            $table->timestamps();
        });

        Schema::table('veiculos', function (Blueprint $table) {
            $table->integer('idPessoa');
            
            $table->foreign('idPessoa')->references('idPessoa')->on('pessoas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('veiculo');
    }
};
