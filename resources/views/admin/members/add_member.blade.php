@extends('layouts.vertical', ['title' => 'Додати Співробітника'])


@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Команда', 'page_title' => 'Додати співробітника'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('store_member') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Ім'я</label>
                                    <input type="text" id="simpleinput" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Посада</label>
                                    <input type="text" id="simpleinput" class="form-control" name="description">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">email</label>
                                    <input type="text" id="simpleinput" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">Фото</label>
                                    <input type="file" id="example-fileinput" class="form-control" name="image">
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
