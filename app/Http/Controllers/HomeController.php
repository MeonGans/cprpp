<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Member;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $news = News::query()->with(['category', 'author'])->orderByDesc('date')->limit(3)->get();
        $events = Event::query()->limit(6)->get();
        //TODO додати сортування подій від сьогоднішньої дати і далі


        return view('home', compact('news','events'));
    }

    function team()
    {
        $members = Member::all();
        return view('team', compact('members'));
    }

    function news()
    {
        //TODO додати пагінацію
        $news = News::query()->with(['category','author'])->get();
        $categories = Category::all();
        return view('news', compact('news', 'categories'));
    }

    function showNews(News $news)
    {
        return view('simple_news', compact('news'));
    }

    function contact()
    {
        return view('contact');
    }


}
