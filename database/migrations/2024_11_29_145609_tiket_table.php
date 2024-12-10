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
        Schema::create('tiket', function(Blueprint $table) {
            $table->string('tiket_id', 15)->primary();
            $table->string('user_id', 7);
            $table->char('kategori_id', 5);
            $table->text('deskripsi');
            $table->timestamp('tanggal_lapor');
            $table->enum('prioritas', ['Low', 'Medium', 'High']);
            $table->enum('status', ['Open', 'Progress', 'Resolved', 'Closed'])->default('Open');
            $table->string('teknisi_id', 7)->nullable();
            $table->timestamp('tanggal_selesai')->nullable();

            // Foreign Key
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->foreign('kategori_id')->references('kategori_id')->on('kategori');
            $table->foreign('teknisi_id')->references('user_id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket');
    }
};
