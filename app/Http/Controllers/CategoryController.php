<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.categories_list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Перевірка наявності всіх обов'язкових полів
        $request->validate([
            'name' => 'required',
        ]);

        // Створення новини з отриманих даних і збереження її в базі даних
        Category::query()->create($request->all());

        // Повернення на сторінку зі списком новин з повідомленням про успішне створення
        return redirect()->route('categories_list')->with('success', 'Категорію успішно додано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update($request->all());
        return redirect()->route('categories_list')->with('success', 'Категорію успішно відредаговано!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories_list')->with('success', 'Категорію успішно видалено!');
    }
}
