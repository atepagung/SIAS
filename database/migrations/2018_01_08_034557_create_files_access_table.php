<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files_access', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('file_id')->unsigned();
            $table->integer('notif')->unsigned()->default('0');
            $table->timestamps();

            $table->primary(['user_id', 'file_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files_access');
    }
}
