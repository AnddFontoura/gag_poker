<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscription_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id')
                ->nullable(false);
            $table->string('name')
                ->nullable(true);
            $table->text('description');
            $table->boolean('main')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('plan_id')
                ->references('id')
                ->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_images');
    }
};
