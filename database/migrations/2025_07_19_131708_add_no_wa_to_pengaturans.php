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
        Schema::table('pengaturans', function (Blueprint $table) {
            $table->string('email')->after('alamat')->nullable();
            $table->string('no_telp')->after('email')->nullable();
            $table->string('facebook')->after('no_telp')->nullable();
            $table->string('instagram')->after('facebook')->nullable();
            $table->string('x')->after('instagram')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaturans', function (Blueprint $table) {
            //
        });
    }
};
