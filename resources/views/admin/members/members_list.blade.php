@extends('layouts.vertical', ['title' => 'Працівники', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Команда', 'page_title' => 'Список працівників'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-grid gap-2">
                        <a class="btn btn-lg btn-success" href="{{route('add_member')}}">Додати працівника</a>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="row">
        @foreach($members as $member)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="d-flex">
                                <a class="me-3" href="#">
                                    <img class="avatar-md rounded-circle bx-s"
                                         src="{{ $member->photo }}" alt="">
                                </a>
                                <div class="info">
                                    <h5 class="fs-18 my-1">{{ $member->name }}</h5>
                                    <p class="text-muted fs-15">{{ $member->description }}</p>
                                </div>
                            </div>
                            <div class="">
                                <form action="{{ route('destroy_member', $member->id) }}" method="POST">
                                <a href="#" class="btn btn-success btn-sm me-1 tooltips mt-1" data-bs-toggle="tooltip"
                                   data-bs-placement="top" data-bs-title="Edit"> <i class="ri-pencil-fill"></i> </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm tooltips mt-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Видалити"> <i class="ri-close-fill"></i> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- card-body -->
                </div>
                <!-- card -->
            </div>
        @endforeach
    </div> <!-- End row -->
    <!-- end row -->
@endsection
