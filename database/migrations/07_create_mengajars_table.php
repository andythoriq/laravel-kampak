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
            $table->foreignId('guru_id')->nullable()->constrained('tb_guru')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('mapel_id')->nullable()->constrained('tb_mapel')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('kelas_id')->nullable()->constrained('tb_kelas')->onUpdate('cascade')->onDelete('set null');
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
