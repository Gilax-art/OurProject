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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->string('img');
            $table->string('link');
            $table->string('url');
            $table->string('deadlines_ru')->nullable();
            $table->string('deadlines_en')->nullable();
            $table->string('technologies_ru')->nullable();
            $table->string('technologies_en')->nullable();
            $table->text('review_ru')->nullable();
            $table->text('review_en')->nullable();
            $table->text('screenshots')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
