@extends('layouts.vertical', ['title' => 'Категорії', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Новини', 'page_title' => 'Список категорій'])
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-body">

                    <div class="d-grid gap-2">
                        <a class="btn btn-lg btn-success" href="{{route('add_category')}}">Додати категорію</a>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="row justify-content-center">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                            <tr>
                                <th>Назва</th>
                                <th>Дія</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <form action="{{ route('destroy_category', $item->id) }}" method="POST">
                                    <a href="{{ route('edit_category', $item->id) }}" class="btn btn-success btn-sm me-1 tooltips" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Редагувати"> <i class="ri-pencil-fill"></i>
                                    </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm tooltips" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Видалити"> <i class="ri-close-fill"></i> </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row -->
@endsection
