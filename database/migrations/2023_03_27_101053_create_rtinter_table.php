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
        Schema::create('rtinter', function (Blueprint $table) {
            $table->id();
            $table->string("id_rt");
            $table->string("kode_prov");
            $table->string("kode_kab");
            $table->string("kode_desa");
            $table->string("kode_sls");
            $table->string("kode_subsls");
            $table->string("r110");
            $table->string("namakrt_");
            $table->string("alamat_");
            $table->string("namaartkedua_");
            $table->string("r109");
            $table->string("r111");
            $table->string("r112");
            $table->string("r113");
            $table->string("r115");
            $table->string("r301a");
            $table->string("r301b");
            // TODO Next
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rtinter');
    }
};
