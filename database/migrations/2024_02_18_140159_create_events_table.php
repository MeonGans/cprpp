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
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // ID події
            $table->date('date'); // Дата події
            $table->text('description'); // Опис події
            $table->string('icon')->nullable(); // Іконка події (може бути NULL)
            $table->string('host_name')->nullable(); // Ім'я ведучого події (може бути NULL)
            $table->time('start_time')->nullable(); // Час початку події (може бути NULL)
            $table->time('end_time')->nullable(); // Час завершення події (може бути NULL)
            $table->string('offline_location')->nullable(); // Місце офлайн події (може бути NULL)
            $table->string('online_location')->nullable(); // Місце онлайн події (може бути NULL)
            $table->boolean('registration')->default(false); // Реєстрація на подію (за замовчуванням false)
            $table->text('content'); // Контент сторінки події
            $table->timestamps(); // Мітки часу created_at і updated_at
            $table->softDeletes(); // Додано м'яке видалення
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
