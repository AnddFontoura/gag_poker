<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcategory_id')
                ->nullable(false);
            $table->string('name')
                ->nullable(false);
            $table->text('description')
                ->nullable(false);
            $table->float('price')
                ->nullable(false);
            $table->boolean('active')
                ->default(false);
            $table->integer('max_participants')
                ->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('subcategory_id')
                ->references('id')
                ->on('subcategories');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sub_subscriptions');
    }
};
