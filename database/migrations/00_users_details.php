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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 50)->nullable();
            $table->foreignId('jenis_kelamin_id')->nullable()->constrained('jenis_kelamins')->nullOnDelete();
            $table->string('no_telp', 30)->nullable();
            $table->text('alamat')->nullable();
            $table->string('nip', 50)->nullable();
            $table->string('pangkat', 50)->nullable();
            $table->string('jabatan', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
