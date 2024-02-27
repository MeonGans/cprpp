@extends('layouts.vertical', ['title' => 'Список новин', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Новини', 'page_title' => 'Список новин'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-grid gap-2">
                        <a class="btn btn-lg btn-success" href="{{route('add_news')}}">Додати новину</a>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="row">
        @foreach($news as $item)
            <div class="col-lg-6">
                <div class="card">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4">
                            <img src="{{ $item->preview_image }}" class="img-fluid rounded-start"
                                 alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text"><small class="text-muted">{{ date_format($item->date, 'd.m.Y') }}
                                        <i class="bi bi-bookmark icon"></i>
                                @if ($item->category)
                                   {{ $item->category->name }}
                                @else
                                    --
                                @endif
                                        <i class=" bi bi-person icon"></i>
                                        @if ($item->author)
                                            {{ $item->author->name }}
                                        @else
                                            --
                                        @endif
                                    </small></p>
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">{{ $item->description }}</p>

                                <div class="">
                                    <form action="{{ route('destroy_news', $item->id) }}" method="POST">
                                    <a href="{{ route('simple_news', $item->id) }}" target="_blank" class="btn btn-primary btn-sm me-1 tooltips" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Переглянути"> <i class="ri-eye-line"></i>
                                    </a>
                                    <a href="{{ route('edit_news', $item->id) }}" class="btn btn-success btn-sm me-1 tooltips" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Редагувати"> <i
                                            class="ri-pencil-fill"></i>
                                    </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm tooltips" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Видалити"> <i class="ri-close-fill"></i> </button>
                                    </form>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end col -->
                    </div> <!-- end row-->
                </div> <!-- end card-->

            </div>
        @endforeach
    </div>
    @if($news->isEmpty())
    <div class="row justify-content-center items">
        <div class="col-12">
            <div class="d-flex flex-column h-100">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="text-center">
                            <h1 class="text-exception mb-4">
                                <i class="bi bi-basket3 icon"></i> Пусто </h1>
                            <p class="text-muted mt-3">Жодного елемента не додано</p>
                        </div> <!-- end /.text-center-->
                    </div> <!-- end col-->
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    @endif
    <!-- end row -->
@endsection
