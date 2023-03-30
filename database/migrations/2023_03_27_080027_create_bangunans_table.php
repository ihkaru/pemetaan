<?php

use App\Models\StatusBangunan;
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
        Schema::create('bangunans', function (Blueprint $table) {
            $table->string('id',6)->primary();
            $table->string('kode_bangunan',4);
            $table->unsignedSmallInteger("luas")->nullable();
            $table->string("id_desa",10);
            $table->string('kode_sls',4);
            $table->string("latitude");
            $table->string("longitude");
            $table->string("accuracy");
            $table->string("photo_url");
            $table->string("nama")->nullable();
            $table->foreignIdFor(StatusBangunan::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bangunans');
    }
};
