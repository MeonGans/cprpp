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

        return view('home-main', compact('news','events'));
    }

    function test()
    {
        return view('test');
    }
    function plans()
    {
        return view('plans');
    }

    function team()
    {
        $members = Member::all();
        return view('team', compact('members'));
    }

    public function news(Request $request)
    {
        $query = News::query()->with(['category', 'author']);

        // Фільтрація за категорією
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // Пагінація з урахуванням параметрів запиту
        $news = $query->orderByDesc('date')
            ->orderByDesc('id')
            ->paginate(6)
            ->appends(['category' => $request->category]);

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
