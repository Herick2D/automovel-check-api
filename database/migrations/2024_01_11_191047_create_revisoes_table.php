<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisoesTable extends Migration
{
    public function up()
    {
        Schema::create('revisoes', function (Blueprint $table) {
            $table->id('idRevisao');
            $table->decimal('custo', 10, 2);
            $table->text('descricao');
            $table->dateTime('data_agendamento');
            $table->unsignedBigInteger('idVeiculo');
            $table->unsignedBigInteger('idPessoa');
            $table->timestamps();

            $table->foreign('idVeiculo')->references('idVeiculo')->on('veiculos')->onDelete('cascade');
            $table->foreign('idPessoa')->references('idPessoa')->on('pessoas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('revisoes');
    }
}
