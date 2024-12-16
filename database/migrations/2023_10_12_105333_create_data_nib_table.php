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
        Schema::create('data_nib', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->string('nib')->nullable()->index();
            $table->string('nama')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('email')->nullable();
            $table->string('telp')->nullable();
            $table->string('status_penanaman_modal')->nullable();
            $table->date('tanggal_terbit_oss')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_nib');
    }
};
