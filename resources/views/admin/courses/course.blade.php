@extends('layouts.vertical2', ['title' => 'Сертифікати', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
{{--    @include('layouts.shared.page-title', ['sub_title' => 'Новини', 'page_title' => 'Список сертифікатів'])--}}


    <div class="row col-xl-6 mt-5 m-auto">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Події з сертифікацією</h4>
                    <p class="text-muted mb-0">Виберіть тему події, щоб відобразити список учасників та їх сертифікати</p>
                </div>
                <div class="card-body">
                        <div class="accordion" id="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$course->id}}">
                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$course->id}}"
                                            aria-expanded="true" aria-controls="collapse{{$course->id}}">
                                        {{ \Carbon\Carbon::parse($course->course_date)->isoformat('D.MM.YYYY')}} || {{$course->title}}
                                    </button>
                                </h2>
                                <div id="collapse{{$course->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$course->id}}"
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
                                                                    <th>Ім'я</th>
                                                                    <th>Номер сертифіката</th>
                                                                    <th>Посилання</th>
                                                                    <th>Дія</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($course->certificates as $certificate)
                                                                    <tr>
                                                                        <td>{{ $certificate->name }}</td>
                                                                        <td>44250583/{{  $certificate->certificate_number }}-{{ \Carbon\Carbon::parse($course->course_date)->format('y') }}</td>
                                                                        <td>
                                                                            <a href="#" onclick="copyLink(event, '{{config('app.url').'certificates/'.\Carbon\Carbon::parse($course->course_date)->format('m-Y').'/'.$certificate->certificate_number.'.jpg'}}')">Натисніть, щоб скопіювати</a>
                                                                        </td>
                                                                        <td>
                                                                                <a href="/certificates/{{\Carbon\Carbon::parse($course->course_date)->format('m-Y').'/'.$certificate->certificate_number.'.jpg'}}" class="btn btn-primary btn-sm me-1 tooltips"
                                                                                   data-bs-toggle="tooltip"
                                                                                   data-bs-placement="top" data-bs-title="Переглянути" target="_blank"> <i
                                                                                        class="ri-eye-line"></i> </a>
                                                                            <a href="/certificates/{{\Carbon\Carbon::parse($course->course_date)->format('m-Y').'/'.$certificate->certificate_number.'.jpg'}}" download class="btn btn-success btn-sm me-1 tooltips"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top" data-bs-title="Скачати">
                                                                                <i class="ri-download-line"></i>
                                                                            </a>
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
                                    </div>
                                </div>
                            </div>
                        </div>


                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>

@endsection
