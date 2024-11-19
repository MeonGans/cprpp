<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stars', function (Blueprint $table) {
            $table->id(); // Унікальний ідентифікатор
            $table->foreignId('student_id')->constrained()->onDelete('cascade'); // Зв'язок із таблицею students
            $table->integer('amount'); // Кількість зарахованих/відрахованих зірок
            $table->string('reason')->nullable(); // Причина зарахування/відрахування
            $table->timestamps(); // Поля створення та оновлення запису
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stars');
    }
}
