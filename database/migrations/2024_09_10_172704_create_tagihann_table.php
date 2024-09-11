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
        Schema::create('tagihann', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penghuni_id');
            $table->float('total_tagihan');
            $table->enum('status', ['lunas','cicil']);
            $table->string('tgl_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihann');
    }
};
