<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mengajar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id')->constrained('tb_guru');
            $table->foreignId('mapel_id')->constrained('tb_mapel');
            $table->foreignId('kelas_id')->constrained('tb_kelas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_mengajar');
    }
};
