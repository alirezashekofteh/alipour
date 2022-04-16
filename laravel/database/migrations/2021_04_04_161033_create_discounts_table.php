<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('percent');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });

        Schema::create('discount_term', function (Blueprint $table) {
            $table->unsignedBigInteger('term_id');
            $table->foreign('term_id')->references('id')->on('terms');

            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id')->references('id')->on('discounts');

            $table->primary(['term_id' , 'discount_id']);
        });

        Schema::create('discount_subscription', function (Blueprint $table) {
            $table->unsignedBigInteger('subscription_id');
            $table->foreign('subscription_id')->references('id')->on('subscriptions');

            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id')->references('id')->on('discounts');

            $table->primary(['subscription_id' , 'discount_id']);
        });
        Schema::create('discount_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id')->references('id')->on('discounts');

            $table->primary(['user_id' , 'discount_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_user');
        Schema::dropIfExists('discount_subscription');
        Schema::dropIfExists('discount_term');
        Schema::dropIfExists('discounts');
    }
}
