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
        Schema::create('members', function (Blueprint $table) {
            $table->id(); // ID учасника
            $table->string('name'); // Ім'я учасника
            $table->string('email'); // Email учасника
            $table->string('photo')->nullable(); // Фото учасника (може бути NULL)
            $table->boolean('display')->default(true); // Умова відображення (за замовчуванням true)
            $table->timestamps(); // Мітки часу created_at і updated_at
            $table->softDeletes(); // Додано м'яке видалення
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
