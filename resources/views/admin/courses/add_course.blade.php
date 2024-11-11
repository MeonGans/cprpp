@extends('layouts.vertical', ['title' => 'Додати сертифікацію'])

@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Подія', 'page_title' => 'Додати сертифікацію'])
    <form method="POST" action="{{ route('store_course') }}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Тема події</label>
                                    <input type="text" id="simpleinput" class="form-control" name="title">
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
                                    <label for="example-select" class="form-label">Тип події (взяли участь у ...)</label>
                                    <input type="text" id="simpleinput" class="form-control" name="course_type">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Кількість годин</label>
                                    <select class="form-select" id="example-select" name="duration_hours">
                                        <option value="2">2 (0.1 ЄТКС)</option>
                                        <option value="6">6 (0.2 ЄТКС)</option>
                                        <option value="10">10 (0.3 ЄТКС)</option>
                                        <option value="15">15 (0.5 ЄКТС)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-date" class="form-label">+ Практичні навички</label>
                                    <h6 class="fs-15 mt-1"></h6>
                                    <input type="checkbox" class="form-check-input" id="customSwitch1" name="practical_skill" value="1">
                                    <label class="form-check-label" for="customSwitch1">Додати практику</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Динамічне додавання учасників -->
        <div class="row" id="participants">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Учасник 1</h4>
                    </div>
                    <div class="card-body participant">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Ім'я Прізвище</label>
                                    <input type="text" id="simpleinput" class="form-control" name="participants[0][name]">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="simpleinput" class="form-label">Стать</label>
                                <div class="mt-2">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadio4" name="participants[0][gender]" value="female"
                                               class="form-check-input" checked>
                                        <label class="form-check-label" for="customRadio4">Жінка</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadio3" name="participants[0][gender]" value="male"
                                               class="form-check-input">
                                        <label class="form-check-label" for="customRadio3">Чоловік</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger remove-participant">Видалити учасника</button>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-success" id="add-participant">Додати учасника</button>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>
@endsection
