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
        $news = News::query()
            ->with(['category', 'author'])
            ->orderByDesc('date')
            ->orderByDesc('id')
            ->limit(3)
            ->get();
        $events = Event::query()->limit(6)->get();

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
        //TODO додати фільтрацію з категоріями
        $news = News::query()
            ->with(['category', 'author'])
            ->orderByDesc('date')
            ->orderByDesc('id')
            ->limit(6)
            ->get();
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
