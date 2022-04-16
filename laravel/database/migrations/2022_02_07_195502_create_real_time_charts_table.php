<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealTimeChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_time_charts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('arzedigital_id');
            $table->foreign('arzedigital_id')->references('id')->on('arzedigitals');
            $table->boolean('autosize')->nullable()->default(true);
            $table->string('theme', 255)->nullable();
            $table->string('locale', 255)->nullable();
            $table->integer('style')->unsigned()->nullable()->default(1);
            $table->string('toolbar_bg', 255)->nullable();
            $table->boolean('enable_publishing')->nullable()->default(false);
            $table->boolean('withdateranges')->nullable()->default(true);
            $table->boolean('hide_side_tollbar')->nullable()->default(true);
            $table->boolean('allow_symbol_change')->nullable()->default(true);
            $table->string('studies', 255)->nullable();
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
        Schema::dropIfExists('real_time_charts');
    }
}
