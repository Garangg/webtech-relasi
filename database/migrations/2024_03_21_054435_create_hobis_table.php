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
        Schema::create('hobi', function (Blueprint $table) {
            $table->id();
            $table->string('hobi');
            $table->timestamps();
        });

        Schema::create('mahasiswa_hobi',function(Blueprint $table){
            $table->id();
            $table->bigInteger('id_mahasiswa')->unsigned();
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswa');
            $table->bigInteger('id_hobi')->unsigned();
            $table->foreign('id_hobi')->references('id')->on('hobi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hobis');
    }
};
