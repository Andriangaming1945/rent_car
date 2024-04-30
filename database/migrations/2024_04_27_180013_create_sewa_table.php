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
        Schema::create('sewa', function (Blueprint $table) {
            $table->id();
            $table->string("penyewa");
            $table->string("kd_mobil");
            $table->integer("id_supir")->nullable();
            $table->date("tgl_pinjam");
            $table->date("tgl_kembali");
            $table->decimal("dp", 10, 2);
            $table->decimal("diskon", 10, 2)->nullable();
            $table->decimal("total", 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewa');
    }
};
