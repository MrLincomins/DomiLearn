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
        Schema::create('teacherratings', function (Blueprint $table) {
            $table->id();
            $table->integer('teacherId');
            $table->integer('rating'); // Оценка от 1 до 5 звёзд
            $table->text('comment')->nullable(); // Комментарий
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacherratings');
    }
};
