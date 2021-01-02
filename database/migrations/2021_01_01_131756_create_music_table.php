<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music', function (Blueprint $table) {
            $table->integerIncrements('music_ID');
            $table->integer('folder_ID')->unsigned();
            #$table->foreign('folder_ID')->references('music_ID')->on('folders');
            $table->foreign('folder_ID')->references('folder_ID')->on('folders')->onDelete('Cascade');
            $table->string('title');
            $table->string('artists');
            $table->string('genre');
            $table->string('file');
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
        Schema::dropIfExists('music');
    }
}
