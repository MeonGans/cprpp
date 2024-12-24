@extends('layouts.vertical', ['title' => 'Зірки', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Зірки', 'page_title' => 'Список учнів з зірками'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
<div class="row">
    <div class="col-xl-4 d-grid gap-2">
        <a class="btn btn-lg btn-success" href="{{route('add_stars')}}">Видати зірки за тематичні</a>
    </div>

    <div class="col-xl-4  d-grid gap-2">
        <a class="btn btn-lg btn-success" href="{{route('add_stars_more')}}">Видати/Забрати зірки</a>
      </div>
    <div class="col-xl-4  d-grid gap-2">
        <a class="btn btn-lg btn-success" href="{{route('send_to_all')}}">Оголошення</a>
    </div>
</div>

                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Учні з зірками (Всього зірок: {{ $totalStars }}, середня кількість {{ $averageStars }})</h4>
                </div>
                <div class="card-body">
                    @foreach($students as $student)
                        <div class="accordion" id="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$student->id}}">
                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$student->id}}"
                                            aria-expanded="true" aria-controls="collapse{{$student->id}}">
                                        {{$student->name}} || {{$student->totalStars }} <i class="ri-star-fill text-success"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse{{$student->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$student->id}}"
                                 data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive-sm">
                                                        <table class="table table-striped table-centered mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th>Кількість</th>
                                                                <th>Причина</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($student->stars as $star)
                                                                <tr>
                                                                    <td>{{ $star->amount }} <i class="ri-star-fill text-success"></i></td>
                                                                    <td>{{ $star->reason }}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div> <!-- end table-responsive-->
                                                </div> <!-- end card body-->
                                            </div> <!-- end card -->
                                        </div><!-- end col-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>

@endsection
