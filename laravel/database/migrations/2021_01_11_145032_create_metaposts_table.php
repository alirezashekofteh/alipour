<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetapostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metaposts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullabel();
            $table->bigInteger('post_id')->nullable()->unsigned();
            $table->text('content')->nullable();
            $table->integer('tartib')->unsigned()->nullable()->default(0);
            $table->string('meta', 100)->nullable();
            $table->string('noe')->nullable();
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
        Schema::dropIfExists('metaposts');
    }
}
