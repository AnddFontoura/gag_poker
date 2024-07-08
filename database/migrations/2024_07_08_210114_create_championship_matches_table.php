<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('championship_matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('championship_stage_id');
            $table->unsignedBigInteger('challenger_1')
                ->nullable(false);
            $table->unsignedBigInteger('challenger_2')
                ->nullable(false);
            $table->integer('challenger_1_goals')
                ->default(0);
            $table->integer('challenger_1_yellow_cards')
                ->default(0);
            $table->integer('challenger_1_red_cards')
                ->default(0);
            $table->integer('challenger_2_goals')
                ->default(0);
            $table->integer('challenger_2_yellow_cards')
                ->default(0);
            $table->integer('challenger_2_red_cards')
                ->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('challenger_1')
                ->references('id')
                ->on('championship');

            $table->foreign('challenger_2')
                ->references('id')
                ->on('championship');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('championship_matches');
    }
};
