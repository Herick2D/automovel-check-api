<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id('idPessoa');
            $table->string('nome');
            $table->integer('idade');
            $table->boolean('sexo');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
};
