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
        Schema::create('user', function(Blueprint $table) {
            $table->string('user_id', 7)->primary();
            $table->string('nama_depan', 25);
            $table->string('nama_belakang', 25);
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->char('spesialis_id', 5)->nullable();            
            $table->char('roles_id', 5);
            $table->char('departemen_id', 5);

            // Foreign Key
            $table->foreign('spesialis_id')->references('spesialis_id')->on('spesialisasi');
            $table->foreign('roles_id')->references('roles_id')->on('roles');
            $table->foreign('departemen_id')->references('departemen_id')->on('departemen');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('user');
    }
};
