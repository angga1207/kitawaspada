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
        Schema::create('data_kbli', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->string('id_proyek')->nullable()->index();
            $table->string('nib')->nullable()->index();
            $table->string('kbli')->nullable()->index();
            $table->string('judul_kbli')->nullable();
            $table->string('nama')->nullable()->comment('Nama Proyek');
            $table->date('tanggal_terbit')->nullable();
            $table->string('resiko')->nullable();
            $table->string('skala_usaha')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->enum('is_valid_coordinate', [true, false])->nullable();
            $table->longText('validation_coordinate_notes')->nullable();
            $table->string('validation_lng')->nullable();
            $table->string('validation_lat')->nullable();
            $table->dateTime('validation_date')->nullable();
            $table->string('sektor_pembina')->nullable();
            $table->string('nama_user')->nullable();
            $table->string('ktp_user')->nullable();
            $table->string('email_user')->nullable();
            $table->string('telp')->nullable();
            $table->string('luas_lahan')->nullable();
            $table->string('satuan_lahan')->nullable();
            $table->double('mesin_peralatan')->nullable();
            $table->double('mesin_peralatan_impor')->nullable();
            $table->double('pembelian_pematangan_tanah')->nullable();
            $table->double('bangunan_gedung')->nullable();
            $table->double('modal_kerja')->nullable();
            $table->double('investasi_lainnya')->nullable();
            $table->double('jumlah_investasi')->nullable();
            $table->double('tenaga_kerja')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kbli');
    }
};
