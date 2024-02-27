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
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // ID новини
            $table->string('title'); // Заголовок новини
            $table->date('date'); // Дата новини (без часу)
            $table->unsignedBigInteger('author_id')->nullable(); // ID автора новини
            $table->foreign('author_id')->references('id')->on('members')->onDelete('set null'); // Зовнішній ключ до таблиці team_members
            $table->integer('views')->default(0); // Кількість переглядів (за замовчуванням 0)
            $table->string('description', 300); // Опис новини (обмежений 300 символами)
            $table->string('preview_image')->nullable(); // Зображення прев'ю (може бути NULL)
            $table->text('content'); // Основний зміст новини
            $table->softDeletes(); // Додано м'яке видалення
            $table->timestamps(); // Додано мітки часу created_at і updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
