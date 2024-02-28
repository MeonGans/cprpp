<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('admin.members.members_list', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.add_member');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // Отримуємо файл з запиту
        $image = $request->file('image');

        if($image){
            $request['photo'] = $this->uploadImage($image);
        }

        // Створення новини з отриманих даних і збереження її в базі даних
        Member::query()->create($request->all());

        // Повернення на сторінку зі списком новин з повідомленням про успішне створення
        return redirect()->route('members_list')->with('success', 'Працівника успішно додано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit_member', compact($member));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // Отримуємо файл з запиту
        $image = $request->file('image');

        if($image){
            $request['photo'] = $this->uploadImage($image);
        }

        // Створення новини з отриманих даних і збереження її в базі даних
        Member::updated($request->all());

        // Повернення на сторінку зі списком новин з повідомленням про успішне створення
        return redirect()->route('news_list')->with('success', 'Працівника успішно відредаговано!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members_list')->with('success', 'Працівника успішно видалено!');
    }

    private function uploadImage(array|\Illuminate\Http\UploadedFile $image)
    {
        $imageName = time().'.'.$image->extension();
        $today = date('Y-m-d');
        $image->storeAs('public/images/members/'.$today, $imageName);
        return env('APP_URL').'/storage/images/members/'.$today.'/'.$imageName;
    }
}
