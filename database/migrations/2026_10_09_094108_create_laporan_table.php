<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('laporan', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pelapor', 100);
        $table->string('no_hp', 20);
        $table->string('lokasi', 150);
        $table->string('kecamatan', 100);
        $table->string('tinggi_air'); // atau integer/decimal sesuai kebutuhan      
        $table->text('keterangan')->nullable();
        $table->string('foto')->nullable();             // path file foto
        $table->string('status', 20)->default('Menunggu');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};