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
            $table->unsignedBigInteger('server_id');
            $table->foreign('server_id')->references('id')->on('servers');
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
    }
};
