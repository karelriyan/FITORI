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
        Schema::create('ikans', function (Blueprint $table) {
            $table->ulid();
            $table->foreignUlid('nama_ikan_id')->constrained('nama_ikans')->onDelete('cascade');
            $table->string('jumlah_ikan');
            $table->float('usia_ikan');
            $table->foreignUlid('kolam_id')->constrained('kolams')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('nama_ikans', function (Blueprint $table) {
            $table->ulid();
            $table->string('nama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikans');
        Schema::dropIfExists('nama_ikans');
    }
};
