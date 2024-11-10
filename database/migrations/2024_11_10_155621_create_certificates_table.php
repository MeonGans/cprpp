<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id(); // автоматичний інкрементний ID
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // зв'язок з курсом
            $table->string('name'); // ім'я учасника
            $table->enum('gender', ['male', 'female']); // стать
            $table->string('certificate_number')->unique(); // номер сертифікату
            $table->enum('status', ['issued', 'not_issued']); // статус видачі сертифікату
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
