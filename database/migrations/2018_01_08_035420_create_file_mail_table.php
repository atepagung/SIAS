<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileMailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_mail', function (Blueprint $table) {
            $table->integer('file_id')->unsigned();
            $table->integer('mail_id')->unsigned();
            $table->timestamps();

            $table->primary(['file_id', 'mail_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_mail');
    }
}
