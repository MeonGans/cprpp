<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/news/{news}', [HomeController::class, 'showNews'])->name('simple_news');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/events', [HomeController::class, 'contact'])->name('events');

Route::group(['prefix' => '/admin'], function () {

    Route::post('/uploadImage', [NewsController::class, 'image'])->name('uploadImage')->middleware('resizeImage');

    Route::group(['prefix' => '/news'], function () {
        // Маршрут для відображення всіх новин
        Route::get('/news_list', [NewsController::class, 'newsList'])->name('news_list');

        // Маршрут для відображення форми створення новини
        Route::get('/create', [NewsController::class, 'create'])->name('add_news');

        // Маршрут для збереження новоствореної новини
        Route::post('/news', [NewsController::class, 'store'])->name('store_news');

        // Маршрут для відображення форми редагування новини
        Route::get('/{news}/edit', [NewsController::class, 'edit'])->name('edit_news');

        // Маршрут для оновлення відредагованої новини
        Route::put('/{news}', [NewsController::class, 'update'])->name('update_news');

        // Маршрут для видалення новини
        Route::delete('/{news}', [NewsController::class, 'destroy'])->name('destroy_news');
    });

    Route::group(['prefix' => '/categories'], function () {
        // Маршрут для відображення всіх категорій
        Route::get('/categories_list', [CategoryController::class, 'index'])->name('categories_list');

        // Маршрут для відображення форми створення категорії
        Route::get('/create', [CategoryController::class, 'create'])->name('add_category');

        // Маршрут для збереження новоствореної категорії
        Route::post('/category', [CategoryController::class, 'store'])->name('store_category');

        // Маршрут для відображення форми редагування категорії
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit_category');

        // Маршрут для оновлення відредагованої категорії
        Route::put('/{category}', [CategoryController::class, 'update'])->name('update_category');

        // Маршрут для видалення категорії
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy_category');
    });

    Route::group(['prefix' => '/members'], function () {
        // Маршрут для відображення всіх працівників
        Route::get('/members_list', [MemberController::class, 'index'])->name('members_list');

        // Маршрут для відображення форми створення працівника
        Route::get('/create', [MemberController::class, 'create'])->name('add_member');

        // Маршрут для збереження новоствореного працівника
        Route::post('/member', [MemberController::class, 'store'])->name('store_member')->middleware('resizeImage');

        // Маршрут для відображення форми редагування працівника
        Route::get('/{member}/edit', [MemberController::class, 'edit'])->name('edit_member');

        // Маршрут для оновлення відредагованого працівника
        Route::put('/{member}', [MemberController::class, 'update'])->name('update_member');

        // Маршрут для видалення працівника
        Route::delete('/{member}', [MemberController::class, 'destroy'])->name('destroy_member');
    });

    Route::group(['prefix' => '/events'], function () {
        // Маршрут для відображення всіх подій
        Route::get('/event_list', [EventController::class, 'index'])->name('events_list');

        // Маршрут для відображення форми створення події
        Route::get('/create', [EventController::class, 'create'])->name('add_event');

        // Маршрут для збереження новоствореної події
        Route::post('/event', [EventController::class, 'store'])->name('store_event');

        // Маршрут для відображення форми редагування події
        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit_event');

        // Маршрут для оновлення відредагованої події
        Route::put('/{event}', [EventController::class, 'update'])->name('update_event');

        // Маршрут для видалення події
        Route::delete('/{event}', [EventController::class, 'destroy'])->name('destroy_event');
    });
});
