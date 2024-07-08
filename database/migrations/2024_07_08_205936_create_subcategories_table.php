<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->string('name')->nullable(false);
            $table->text('description')->nullable(true);
            $table->string('image')->nullable(true);
            $table->boolean('active')->default(0);
            $table->integer('max_participants')
                ->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
