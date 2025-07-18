<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaturans', function (Blueprint $table) {
            $table->string('email')->after('deskripsi')->nullable();
            $table->string('no_hp')->after('email')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pengaturans', function (Blueprint $table) {
            $table->dropColumn(['email', 'no_hp']);
        });
    }
};
