<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mail_id')->unsigned();
            $table->string('note');
            $table->integer('pengirim')->unsigned();
            $table->integer('penerima')->unsigned();
            $table->integer('notif')->unsigned();
            $table->integer('hapus')->unsigned();
            $table->integer('read')->unsigned();
            $table->integer('mark')->unsigned();
            $table->timestamps();

            $table->foreign('mail_id')->references('id')->on('mails');
            $table->foreign('pengirim')->references('id')->on('users');
            $table->foreign('penerima')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_histories');
    }
}
