<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            'Балашкевич Вячеслав',
            'Белзецький Ярослав',
            'Божков Кирило',
            'Войнаровський Артем',
            'Врублевська Ірина',
            'Гайдаєнко Діана',
            'Горбенко Вероніка',
            'Горобей Іван',
            'Горох Діана',
            'Каленик Ярослав',
            'Климов Георгій',
            'Крадожон Іван',
            'Лисак Надія',
            'Лойко Марія',
            'Мазурик Анастасія',
            'Маляр Аріна',
            'Малещенко Вероніка',
            'Михайлов Гордій',
            'Мірошніченко Катерина',
            'Мовчан Ярослав',
            'Неділько Дар\'я',
            'Остролюцька Мілана',
            'Парасочка Нікіта',
            'Потеряйко Софія',
            'Потєєв Дмитро',
            'Ремарчук Дар\'я',
            'Рябчук Ярослава',
            'Семененко Максим',
            'Сокол Аріна',
            'Фурман Євгенія',
            'Хруставчук Ніка',
            'Чепіль Дар\'я',
            'Черненко Тимофій',
            'Шарафан Єгор',
            'Явтушенко Богдан',
            'Ягольницька Божена',
        ];

        foreach ($students as $student) {
            Student::factory()->create([
                'name' => $student,
            ]);
        }
    }
}
