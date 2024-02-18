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
        //Adding a relationship with certificates
        Schema::table('certificates', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('certificates', function (Blueprint $table){
            $table->Integer('server_id');
            $table->foreign('server_id')->references('id')->on('servidores');
        });

        Schema::table('servidores_complementar', function (Blueprint $table){
            $table->foreign('servidor_id')->references('id')->on('servidores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        //remove a relationship with certificates
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeign(['user_id']); 
            $table->dropColumn('user_id');
        });

        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeign(['server_id']); 
            $table->dropColumn('server_id');
        });

        Schema::table('servidores_complementar', function (Blueprint $table){
            $table->dropForeign(['servidor_id']);
        });
    }
};
