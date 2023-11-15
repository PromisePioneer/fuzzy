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
        Schema::create('inferensi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_dataset');
            $table->double('pendapatan_rendah');
            $table->double('pendapatan_sedang');
            $table->double('pendapatan_tinggi');
            $table->double('tanggungan_rendah');
            $table->double('tanggungan_sedang');
            $table->double('tanggungan_tinggi');
            $table->double('prestasi_rendah');
            $table->double('prestasi_sedang');
            $table->double('prestasi_tinggi');
            $table->double('raport_rendah');
            $table->double('raport_sedang');
            $table->double('raport_tinggi');
            $table->double('essay_rendah');
            $table->double('essay_sedang');
            $table->double('essay_tinggi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inferensi');
    }
};
