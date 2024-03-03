<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Member;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        return view('admin.news.news_list');
    }

    public function newsList()
    {
//        TODO додати автора
        $news = News::query()->orderByDesc('date')->get();
        $news->load(['category', 'author']);
        return view('admin.news.news_list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $today = date('Y-m-d');
        $categories = Category::all();
        $members = Member::all();

        return view('admin.news.add_news', compact('categories', 'members', 'today'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Перевірка наявності всіх обов'язкових полів
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        // Отримуємо файл з запиту
        $image = $request->file('image');
        if($image){
            $request['preview_image'] = $this->uploadImage($image);
        }

        // Перевірка поля author_id
        $authorId = $request->input('author_id');
        if ($authorId == 0) {
            $request['author_id'] = null;
        }

        // Створення новини з отриманих даних і збереження її в базі даних
        News::query()->create($request->all());

        // Повернення на сторінку зі списком новин з повідомленням про успішне створення
        return redirect()->route('news_list')->with('success', 'Новину успішно додано!');
    }

    public function image(Request $request)
    {
        $link = null;
        $image = $request->file('file');
        if($image){
            $link = $this->uploadImage($image);
        }
        $response = ['link' => $link];
        return response()->json($response);
    }
    public function uploadImage($image)
    {
        $imageName = time().'.'.$image->extension();
        $today = date('Y-m-d');
        $directoryPath = 'public/images/news/'.$today;
        $image->storeAs($directoryPath, $imageName);
        chmod(storage_path('app/'.$directoryPath), 0777);

        $link = asset('storage/images/news/'.$today.'/'.$imageName);
        return $link;
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $members = Member::all();
        return view('admin.news.edit_news', compact('news', 'members','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        // Перевірка наявності всіх обов'язкових полів
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);
// Отримуємо файл з запиту
        $image = $request->file('image');
        if($image){
            $request['preview_image'] = $this->uploadImage($image);
        }

        // Перевірка поля author_id
        $authorId = $request->input('author_id');
        if ($authorId == 0) {
            $request['author_id'] = null;
        }

        // Створення новини з отриманих даних і збереження її в базі даних
        $news->update($request->all());

        // Повернення на сторінку зі списком новин з повідомленням про успішне створення
        return redirect()->route('news_list')->with('success', 'Новину успішно відредаговано!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news_list')->with('success', 'Новину успішно видалено!');
    }
}
