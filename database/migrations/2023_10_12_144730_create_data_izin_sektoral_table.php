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
        Schema::create('data_izin_sektoral', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->string('id_permohonan_izin')->nullable()->index();
            $table->string('nib')->nullable()->index();
            $table->string('id_proyek')->nullable()->index();
            $table->string('kbli')->nullable()->index();
            $table->date('tanggal_izin')->nullable();
            $table->string('jenis_izin')->nullable();
            $table->string('nama_dokumen')->nullable();
            $table->string('uraian_kewenangan')->nullable();
            $table->string('kewenangan')->nullable();
            $table->string('status_respon')->nullable();
            $table->string('sektor')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_izin_sektoral');
    }
};
