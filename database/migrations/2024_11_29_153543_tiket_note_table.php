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
        Schema::create('tiket_note', function(Blueprint $table) {
            $table->char('note_id', 5)->primary();
            $table->string('teknisi_id', 7);
            $table->string('tiket_id', 15);
            $table->text('note');
            $table->timestamp('tanggal');

            // Foreign Key
            $table->foreign('tiket_id')->references('tiket_id')->on('tiket');
            $table->foreign('teknisi_id')->references('user_id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('tiket_note');
    }
};
