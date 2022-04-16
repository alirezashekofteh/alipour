<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembertimeChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membertime_channels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->integer('cost')->unsigned()->nullable()->default(0);
            $table->integer('days')->unsigned()->nullable()->default(0);
            $table->boolean('active')->nullable()->default(false);
            $table->unsignedBigInteger('channel_id');
            $table->foreign('channel_id')->references('id')->on('channels');
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
        Schema::dropIfExists('membertime_channels');
    }
}
