<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahlilsahmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahlilsahmes', function (Blueprint $table) {
            $table->id();
            $table->text('video')->nullable();
            $table->text('content')->nullable();
            $table->string('name', 250)->nullable();
            $table->string('slug', 250)->nullable()->unique();
            $table->boolean('active')->nullable()->default(false);
            $table->boolean('comment')->nullable()->default(false);
            $table->unsignedBigInteger('saham_id');
            $table->foreign('saham_id')->references('id')->on('sahams');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('tahlilsahmes');
    }
}
