<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistories2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up2()
    {
        Schema::create('histories2', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id');
            $table->string('edited_at');
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
        Schema::dropIfExists('histories2');
    }
}
