@extends('layouts.vertical', ['title' => 'Додати подію'])


@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Подія', 'page_title' => 'Додати подію'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('store_event') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Назва</label>
                                    <input type="text" id="simpleinput" class="form-control" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-date" class="form-label">Дата</label>
                                    <input class="form-control" id="example-date" type="date" name="date">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Ведучий</label>
                                    <input type="text" id="simpleinput" class="form-control" name="host_name">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Початок</label>
                                    <input class="form-control" id="example-time" type="time"
                                           name="start_time">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Кінець</label>
                                    <input class="form-control" id="example-time" type="time"
                                           name="end_time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-date" class="form-label">Локація (оффлайн)</label>
                                    <input type="text" id="simpleinput" class="form-control" name="offline_location">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-date" class="form-label">Локація (онлайн-посилання)</label>
                                    <input type="text" id="simpleinput" class="form-control" name="online_location">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-date" class="form-label">Іконка</label>
                                    <input type="text" id="simpleinput" class="form-control" name="icon">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-date" class="form-label">Реєстрація</label>
                                    <h6 class="fs-15 mt-1"></h6>
                                    <input type="checkbox" class="form-check-input" id="customSwitch1" name="registration">
                                    <label class="form-check-label" for="customSwitch1">Увімкнути реєстрацію</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Короткий опис</label>
                                    <textarea class="form-control" id="example-textarea" rows="2"
                                              name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Контент</label>
                                    <textarea class="form-control" id="edit" rows="5" name="content"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Додати</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->
@endsection
