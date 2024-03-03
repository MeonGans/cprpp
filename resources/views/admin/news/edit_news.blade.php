@extends('layouts.vertical', ['title' => 'Редагувати категорію'])


@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Новини', 'page_title' => 'Редагувати категорію'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('update_news', $news->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Тема</label>
                                    <input type="text" id="simpleinput" class="form-control" name="title" value="{{ $news->title }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-date" class="form-label">Дата</label>
                                    <input class="form-control" id="example-date" type="date" name="date" value="{{ date_format($news->date, 'Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Категорія</label>
                                    <select class="form-select" id="example-select" name="category">
                                        <option value="null">Вибрати категорію</option>
                                        @foreach($categories as $item)
                                            <option value="{{ $item->id }}" @if($item->id == $news->category_id) selected @endif> {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Автор</label>
                                    <select class="form-select" id="example-select" name="author_id">
                                        <option value="0">Без автора</option>
                                        @foreach($members as $member)
                                            <option value="{{ $member->id }}" @if($member->id == $news->author_id) selected @endif>{{ $member->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">Головне зображення</label>
                                    <input type="file" id="example-fileinput" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Короткий опис</label>
                                    <textarea class="form-control" id="example-textarea" rows="2" name="description">{{ $news->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Контент</label>
                                    <textarea class="form-control" id="edit" rows="5" name="content">{{ $news->content }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Редагувати</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->
@endsection
