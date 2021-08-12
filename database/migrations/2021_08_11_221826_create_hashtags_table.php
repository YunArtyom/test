<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHashtagsTable extends Migration
{
    public function up()
    {
        Schema::create('hashtags', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->index('hashtags_name_index');
            $table->string('slug', 20)->index('slug_index');
        });
    }


    public function down()
    {
        Schema::dropIfExists('hashtags');
    }
}
