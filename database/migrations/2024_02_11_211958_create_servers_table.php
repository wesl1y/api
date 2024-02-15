<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->string('cpf', 250)->unique();
            $table->string('cid', 250)->unique();
            $table->integer('workload');
            $table->string('email', 250)->unique()->nullable();
            $table->string('phone', 250)->unique()->nullable();
            $table->string('cep', 250)->nullable();
            $table->string('place', 250)->nullable();
            $table->integer('number')->nullable();
            $table->string('neighborhood', 250)->nullable();
            $table->string('county', 250)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('complement', 250)->nullable();
            $table->timestamps();
        });



    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('servers');
    }
};
