<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250)->nullable();
            $table->string('slug', 250)->nullable();
            $table->integer('part')->unsigned()->nullable()->default(0);
            $table->unsignedBigInteger('term_id');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->longText('content')->nullable();
            $table->text('video')->nullable();
            $table->text('pic')->nullable();
            $table->text('file')->nullable();
            $table->text('time_video')->nullable();
            $table->boolean('free')->nullable()->default(true);
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('videos');
    }
}
