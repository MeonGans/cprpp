<?php

namespace App\Http\Middleware;

use Closure;
use DOMDocument;

class ProcessFroalaHTML
{
    public function handle($request, Closure $next)
    {
        header('Content-Type: text/html; charset=utf-8');
        // Отримати HTML-код від Froala
        $html = $request->input('content');

        // Створити новий екземпляр DOMDocument
        $doc = new DOMDocument();
        $doc->loadHTML(mb_convert_encoding( $html, 'HTML-ENTITIES', 'UTF-8' ));

        // Парсинг елементів <h2> та <p> та додавання класів
        $this->parseElementWithClass($doc, 'h2', 'post-heading');
        $this->parseElementWithClass($doc, 'p', 'post-text');

        // Парсинг елементів <ul> та <li> та додавання класів
        $this->parseElementWithClass($doc, 'ul', 'post-list');
        $this->parseElementWithClass($doc, 'li', 'post-list-item');
        $this->parseListItem($doc, 'li', 'bi bi-check2-circle icon');

        // Парсинг елемента <img> та додавання класів
        $this->parseElementWithClass($doc, 'img', 'post-img');

        // Парсинг елемента <blockquote> та додавання класів
        $this->parseBlockquote($doc, 'blockquote', 'post-quote');

        // Отримати оновлений HTML-код
//        $processedHTML = $doc->saveHTML();
        $processedHTML = $doc->saveHTML($doc->documentElement);
        // Зберегти оновлений HTML-код в запиті
        $request->merge(['content' => $processedHTML]);

        return $next($request);
    }

    // Функція для додавання класів до елементів з вказаним тегом
    private function parseElementWithClass($doc, $tagName, $className)
    {
        $elements = $doc->getElementsByTagName($tagName);
        foreach ($elements as $element) {
            $existingClasses = explode(' ', $element->getAttribute('class'));
            // Перевіряємо, чи новий клас вже існує в елементі
            if (!in_array($className, $existingClasses)) {
                $existingClasses[] = $className;
                $element->setAttribute('class', implode(' ', $existingClasses));
            }
        }
    }

    // Функція для парсингу елемента <blockquote> та додавання класів
    private function parseBlockquote($doc, $tagName, $className)
    {
        $elements = $doc->getElementsByTagName($tagName);
        foreach ($elements as $element) {
            // Створюємо новий елемент <i>
            $newElement = $doc->createElement('i');
            // Додаємо класи до нового елементу <i>
            $newElement->setAttribute('class', 'fas fa-quote-right icon');
            // Вставляємо новий елемент <i> перед текстом у <blockquote>
            $element->insertBefore($newElement, $element->firstChild);
            // Додаємо клас до <blockquote>
            $existingClasses = $element->getAttribute('class');
            $newClasses = $existingClasses ? $existingClasses . ' ' . $className : $className;
            $element->setAttribute('class', $newClasses);
        }
    }

    private function parseListItem($doc, $tagName, $iconClass)
    {
        $elements = $doc->getElementsByTagName($tagName);
        foreach ($elements as $element) {
            // Створюємо новий елемент <i>
            $newElement = $doc->createElement('i');
            // Додаємо класи до нового елементу <i>
            $newElement->setAttribute('class', $iconClass);
            // Вставляємо новий елемент <i> перед текстом у <li>
            $element->insertBefore($newElement, $element->firstChild);
        }
    }
}
