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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); // ✅ fix di sini
            $table->text('alasan');
            $table->date('tgl_diajukan');
            $table->date('mulai');
            $table->date('berakhir');
            $table->foreignId('status_cuti_id')->constrained('status_cutis')->restrictOnDelete();
            $table->string('perihal_cuti', 100);
            $table->text('alasan_verifikasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
