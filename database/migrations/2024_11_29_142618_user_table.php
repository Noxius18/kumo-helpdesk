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
            $table->string('nama', 75);
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->string('foto')->nullable();
            $table->char('spesialis_id', 5)->nullable();            
            $table->char('role_id', 5);
            $table->char('departemen_id', 5);

            // Foreign Key
            $table->foreign('spesialis_id')->references('spesialis_id')->on('spesialisasi');
            $table->foreign('role_id')->references('role_id')->on('roles');
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
