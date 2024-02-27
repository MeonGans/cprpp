@extends('layouts.vertical', ['title' => 'Події', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Новини', 'page_title' => 'Список подій'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-grid gap-2">
                        <a class="btn btn-lg btn-success" href="{{route('add_event')}}">Додати подію</a>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                            <tr>
                                <th>Тема</th>
                                <th>Опис</th>
                                <th>Дата</th>
                                <th>Дія</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td class="table-user icons-list-demo ">
                                        <i class="{{ $event->icon }} text-success"></i>
                                        {{ $event->name }}
                                    </td>
                                    <td>{{ $event->description }}</td>
                                    <td>{{  $event->date }}</td>
                                    <td>
                                        <form action="{{ route('destroy_event', $event->id) }}" method="POST">
                                            <a href="#" class="btn btn-primary btn-sm me-1 tooltips"
                                               data-bs-toggle="tooltip"
                                               data-bs-placement="top" data-bs-title="Переглянути"> <i
                                                    class="ri-eye-line"></i> </a>
                                            <a href="{{ route('edit_event', $event->id) }}"
                                               class="btn btn-success btn-sm me-1 tooltips"
                                               data-bs-toggle="tooltip"
                                               data-bs-placement="top" data-bs-title="Редагувати"> <i
                                                    class="ri-pencil-fill"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm tooltips"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Видалити"><i
                                                    class="ri-close-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                    @if($events->isEmpty())
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
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

@endsection
