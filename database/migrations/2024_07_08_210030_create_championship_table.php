<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('championship', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_subscription_id')
                ->nullable(false);
            $table->unsignedBigInteger('championship_group_id');
            $table->jsonb('data');
            $table->integer('total_points')->default(0);
            $table->integer('matches')->default(0);
            $table->integer('victories')->default(0);
            $table->integer('loses')->default(0);
            $table->integer('draws')->default(0);
            $table->integer('goals_in_favor')->default(0);
            $table->integer('own_goals')->default(0);
            $table->integer('goals_math')->default(0);
            $table->integer('red_cards')->default(0);
            $table->integer('yellow_cards')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_subscription_id')
                ->references('id')
                ->on('user_subscriptions');

            $table->foreign('championship_group_id')
                ->references('id')
                ->on('championship_groups');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('championship');
    }
};
