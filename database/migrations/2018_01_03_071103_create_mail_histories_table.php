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
            $table->integer('notif')->unsigned()->default(0);
            $table->integer('hapus')->unsigned()->default(0);
            $table->integer('read')->unsigned()->default(0);
            $table->integer('mark')->unsigned()->default(0);
            $table->timestamps();

            //$table->foreign('mail_id')->references('id')->on('mails');
            //$table->foreign('pengirim')->references('id')->on('users');
            //$table->foreign('penerima')->references('id')->on('users');
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
