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
        Schema::create('tb_nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mengajar_id')->nullable()->constrained('tb_mengajar')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('siswa_id')->nullable()->constrained('tb_siswa')->onUpdate('cascade')->onDelete('set null');
            $table->double('uh');
            $table->double('uts');
            $table->double('uas');
            $table->double('na');
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
        Schema::dropIfExists('tb_nilai');
    }
};