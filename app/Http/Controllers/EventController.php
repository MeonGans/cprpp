<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events.events_list', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.add_event');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Перевірка наявності всіх обов'язкових полів
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        // Створення новини з отриманих даних і збереження її в базі даних
        Event::query()->create($request->all());

        // Повернення на сторінку зі списком новин з повідомленням про успішне створення
        return redirect()->route('events_list')->with('success', 'Подію успішно додано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit_event', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // Перевірка наявності всіх обов'язкових полів
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        // Створення новини з отриманих даних і збереження її в базі даних
        $event->update($request->all());

        // Повернення на сторінку зі списком новин з повідомленням про успішне створення
        return redirect()->route('events_list')->with('success', 'Подію успішно відредаговано!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
