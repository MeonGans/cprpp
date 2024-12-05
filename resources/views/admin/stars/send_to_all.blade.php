@extends('layouts.vertical', ['title' => 'Додати/забрати зірки'])
@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css', 'node_modules/daterangepicker/daterangepicker.css', 'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css', 'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', 'node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css', 'node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection
@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Повідомлення всім', 'page_title' => 'Повідомлення всім'])
    <form method="POST" action="{{ route('send_to_all_send') }}" enctype="multipart/form-data">
        @csrf
        <!-- Динамічне додавання учасників -->
        <div id="students">
            <div class="card participant">
                <div class="card-header">
                    <h4 class="header-title">Повідомлення всім</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="example-textarea" class="form-label">Контент</label>
                                <textarea class="form-control" rows="5" name="massage"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Тут будуть динамічно додаватися учні -->
        </div>
        <button type="submit" class="btn btn-primary">Відправити</button>
    </form>
@endsection
