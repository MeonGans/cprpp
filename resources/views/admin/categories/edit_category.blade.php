@extends('layouts.vertical', ['title' => 'Редагувати категорію'])


@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Новини', 'page_title' => 'Редагувати категорію'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('update_category', $category->id) }}">
                        @csrf @method('PUT')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Назва</label>
                                    <input type="text" id="simpleinput" class="form-control" name="name" value="{{ $category->name }}">
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
