<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHashtagPostTable extends Migration
{
    public function up()
    {
        Schema::create('hashtag_post', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained();
            $table->foreignId('hashtag_id')->constrained();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('hashtags');
    }
}
