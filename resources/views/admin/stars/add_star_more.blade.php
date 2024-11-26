@extends('layouts.vertical', ['title' => 'Додати/забрати зірки'])
@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css', 'node_modules/daterangepicker/daterangepicker.css', 'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css', 'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', 'node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css', 'node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection
@section('content')
    @include('layouts.shared.page-title', ['sub_title' => 'Зірки', 'page_title' => 'Додати/забрати зірки'])
    <form method="POST" action="{{ route('store_star_more') }}" enctype="multipart/form-data">
        @csrf
        <!-- Динамічне додавання учасників -->
        <div id="students">
            <div class="card participant">
                <div class="card-header">
                    <h4 class="header-title">Учень 1</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2 mb-3">
                            <label for="simpleinput" class="form-label">Ім'я Прізвище</label>
                            <select class="form-control select2" name="students[0][student]">
                                <option value="null">Вибрати</option>
                                @foreach($students as $student)
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label for="simpleinput" class="form-label">За що</label>
                            <input type="text" id="simpleinput" class="form-control" name="students[0][reason]">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label for="simpleinput" class="form-label">Кількість зірок</label>
                            <input type="text" id="simpleinput" class="form-control" name="students[0][amount]">
                        </div>

                </div><button type="button" class="btn btn-danger remove-participant">Видалити учасника</button>
            </div>
            </div>

            <!-- Тут будуть динамічно додаватися учні -->
        </div>
        <button id="add-students" type="button" class="btn btn-primary">Додати учня</button>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>
@endsection
@section('scripts')
    <script>
        let studentIndex = 1;

        function getStudentTemplate(index) {
            return `
        <div class="card participant">
            <div class="card-header">
                <h4 class="header-title">Учень ${index + 1}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 mb-3">
                        <label for="simpleinput" class="form-label">Ім'я Прізвище</label>
                        <select class="form-control select2" name="students[${index}][student]">
                            <option value="null">Вибрати</option>
                            @foreach($students as $student)
            <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
            </select>
        </div>
        <div class="col-lg-2 mb-3">
                            <label for="simpleinput" class="form-label">За що</label>
                            <input type="text" id="simpleinput" class="form-control" name="students[${index}][reason]">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label for="simpleinput" class="form-label">Кількість зірок</label>
                            <input type="text" id="simpleinput" class="form-control" name="students[${index}][amount]">
                        </div>
                        </div>
                <button type="button" class="btn btn-danger remove-participant">Видалити учасника</button>
            </div>
        </div>`;
        }
        document.getElementById('add-students').addEventListener('click', function () {
            const participantContainer = document.getElementById('students');

            // Додаємо новий блок учасника
            const newParticipant = document.createElement('div');
            newParticipant.innerHTML = getStudentTemplate(studentIndex++);
            participantContainer.appendChild(newParticipant);

            // Реініціалізація Select2 для нових елементів
            $('.select2').select2();

            // Додаємо подію для кнопки "Видалити учасника"
            newParticipant.querySelector('.remove-participant').addEventListener('click', function () {
                newParticipant.remove();
            });
        });
    </script>
@endsection
