<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Унікальний ідентифікатор
            $table->string('name'); // Ім'я учня
            $table->unsignedBigInteger('telegram_id')->nullable(); // Telegram ID (може бути пустим)
            $table->string('activation_code', 5)->unique(); // Код активації (5 цифр, унікальний)
            $table->timestamps(); // Поля для збереження часу створення та оновлення запису
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
