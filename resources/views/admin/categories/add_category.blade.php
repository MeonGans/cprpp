@extends('layouts.vertical', ['title' => 'Додати категорію'])


@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Новини', 'page_title' => 'Додати категорію'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('store_category') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Назва</label>
                                    <input type="text" id="simpleinput" class="form-control" name="name">
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
