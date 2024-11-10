<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // автоматичний інкрементний ID
            $table->string('title'); // тема курсу
            $table->date('course_date'); // дата курсу
            $table->string('course_type'); // тип курсу (майстер-клас, тренінг тощо)
            $table->string('practical_skill')->nullable(); // практична навичка (опційно)
            $table->integer('duration_hours'); // кількість годин
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
