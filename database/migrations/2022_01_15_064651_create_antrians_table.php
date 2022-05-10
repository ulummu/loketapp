<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntriansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pengunjung_nik');
            $table->foreign('pengunjung_nik')->references('nik')->on('pengunjungs')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('diambil')->nullable();
            $table->char('nomorAntri', 3);
            $table->char('loket', 1);
            $table->boolean('status');
            $table->boolean('panggil');
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
        Schema::dropIfExists('antrians');
    }
}
