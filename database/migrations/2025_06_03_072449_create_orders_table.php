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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('invoice')->unique()->nullable();
            $table->decimal('total_harga', 12, 2);
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->unsignedBigInteger('alamat_id')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('kurir');
            $table->string('etd')->nullable();
            $table->string('resi')->nullable();
            $table->string('ket')->nullable();
            $table->enum('status', ['belum_dibayar', 'dibayar', 'diproses', 'dikirim', 'dibatalkan', 'ditolak', 'diterima', 'selesai'])->default('belum_dibayar');
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('set null');
            $table->foreign('alamat_id')->references('id')->on('alamats')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
