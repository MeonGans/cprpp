<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
    public function addTextToImage()
    {
        // Завантаження шаблону зображення
        $manager = new ImageManager(new Driver());
        $image = $manager->read(public_path('images/template.jpg'));

        // Додавання ім'я
        $image->text("Лисенко Олексій", 610, 600, function($font) {
            $font->file(public_path('fonts/GreatVibes-Regular.ttf')); // Шлях до файлу зі шрифтом
//            $font->file('C:\Windows\Fonts\arial.ttf'); // Шлях до файлу зі шрифтом
            $font->size(75);
            $font->color('#244b75');
            $font->align('left');
            $font->valign('top');
            $font->wrap(1463);
        });

        // Додавання теми та години
        $image->text("взяла участь у курсі підвищення кваліфікації тривалістю 2 години (0.1 ЄКТС) на тему: “3-D друк у сфері базової середньої освіти.Анотація досвіду запровадження адаптивних технологій“ та отримав відповідні теоретичні та практичні навички", 297, 707, function($font) {
            $font->file(public_path('fonts/CalmiusSans-Low.ttf')); // Шлях до файлу зі шрифтом
//            $font->file('C:\Windows\Fonts\arial.ttf'); // Шлях до файлу зі шрифтом
            $font->size(37);
            $font->lineHeight(2.3);
            $font->color('#244b75');
            $font->align('left');
            $font->valign('top');
            $font->wrap(1463);
        });

        // Додавання дати
        $image->text("28 жовтня 2024", 1256, 1093, function($font) {
            $font->file(public_path('fonts/CalmiusSans-LowBold.ttf')); // Шлях до файлу зі шрифтом
//            $font->file('C:\Windows\Fonts\arial.ttf'); // Шлях до файлу зі шрифтом
            $font->size(28);
            $font->lineHeight(2.3);
            $font->color('#244b75');
            $font->align('center');
            $font->valign('top');
            $font->wrap(1463);
        });


        // Додавання номера сертифіката
        $image->text("44250583/0001-24", 1550, 1232, function($font) {
            $font->file(public_path('fonts/CalmiusSans-LowBold.ttf')); // Шлях до файлу зі шрифтом
//            $font->file('C:\Windows\Fonts\arial.ttf'); // Шлях до файлу зі шрифтом
            $font->size(24);
            $font->lineHeight(2.3);
            $font->color('#244b75');
            $font->align('left');
            $font->valign('top');
            $font->wrap(1463);
        });


        // Збереження обробленого зображення
        $image->save(public_path('images/result.jpg'));

        return response()->json(['status' => 'Зображення збережено успішно']);
    }
}
