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

            // Tabel Spesialis
            $table->string('spesialis', 5)->nullable();
            $table->foreign('spesialis')->references('spesialis_id')->on('spesialisasi');
            
            // Tabel Roles
            $table->string('role', 5);
            $table->foreign('role')->references('roles_id')->on('roles');
            
            // Tabel Departemem
            $table->string('departemen', 5);
            $table->foreign('departemen')->references('departemen_id')->on('departemen');
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
