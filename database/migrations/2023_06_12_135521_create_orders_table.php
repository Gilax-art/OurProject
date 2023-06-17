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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->enum('status', ['Новый', 'Отклонён', 'В обработке', 'В работе', 'Завершён'])->default('Новый');
            $table->integer('status_user_id')->nullable();
            $table->string('start_data')->nullable();
            $table->string('deadline')->nullable();
            $table->string('users')->nullable();
            $table->string('finish_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
