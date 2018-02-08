<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat')->nullable();
            $table->string('title');
            $table->string('location');
            $table->integer('file_category_id')->unsigned();
            $table->integer('uploader')->unsigned();
            $table->integer('ket_surat_keluar_id')->unsigned()->nullable();
            $table->text('description');
            $table->timestamps();

            $table->foreign('file_category_id')->references('id')->on('file_categories');
            $table->foreign('uploader')->references('id')->on('users');
            $table->foreign('ket_surat_keluar_id')->references('id')->on('ket_surat_keluar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
