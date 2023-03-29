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
            $table->string("key",23)->primary();
            $table->string("id_rt",3);
            $table->string("kode_prov",2);
            $table->string("kode_kab",2);
            $table->string("kode_kec",3);
            $table->string("kode_desa",3);
            $table->string("kode_sls",4);
            $table->string("kode_subsls",2);
            $table->string("r110",3);
            $table->string("namakrt_",100);
            $table->mediumText("alamat_");
            $table->string("namaartkedua_",100);
            $table->string("r109",3);
            $table->string("r111",2);
            $table->string("r112",2);
            $table->string("r113",6);
            $table->string("r115",1);
            $table->string("r301a",1);
            $table->string("r301b",1)->nullable();
            $table->string("r302",4)->nullable();
            $table->string("r303",1);
            $table->string("r304",1);
            $table->string("r305",1);
            $table->string("r306a",2);
            $table->string("r306b",1)->nullable();
            $table->string("r307a",1);
            $table->string("r307b1",1)->nullable();
            $table->string("r308",2)->nullable();
            $table->string("r309a",1);
            $table->string("r310",1)->nullable();
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
