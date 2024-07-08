<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')
                ->nullable(false);
            $table->unsignedBigInteger('subscription_id')
                ->nullable(false);
            $table->boolean('active')
                ->default(0);
            $table->json('additional_data');
            $table->string('shirt_size');
            $table->integer('glove_size');
            $table->boolean('barbecue');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('subscription_id')
                ->references('id')
                ->on('subscriptions');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_subscriptions');
    }
};
