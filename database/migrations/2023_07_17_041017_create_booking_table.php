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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('lapangan_id')->constrained('lapangan');
            $table->string('no_telp');
            $table->date('tanggal');
            $table->integer('durasi');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('bukti')->nullable();
            $table->integer('total');
            $table->string('status')->nullable()->default('belum dibayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
