<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['user_detail_id']);

            // Drop kolom setelah foreign key dilepas
            $table->dropColumn('user_detail_id');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_detail_id')->nullable();
            $table->foreign('user_detail_id')->references('id')->on('user_details')->onDelete('set null');
        });
    }
};
