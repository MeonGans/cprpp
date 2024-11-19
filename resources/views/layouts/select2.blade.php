<script>
    let studentIndex = 0;

    function getStudentTemplate(index) {
        return `
        <div class="card participant">
            <div class="card-header">
                <h4 class="header-title">Учень ${index + 1}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <label for="simpleinput" class="form-label">Ім'я Прізвище</label>
                        <select class="form-control select2" name="students[${index}][name]">
                            <option value="null">Вибрати</option>
                            @foreach($students as $student)
        <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
        </select>
    </div>
    <div class="col-lg-4 mb-3">
        <label for="simpleinput" class="form-label">Предмет</label>
        <select class="form-control select2" name="students[${index}][course]">
                            <option>Вибрати</option>
                            <option value="Вступ до історії України">Вступ до історії України</option>
                            <option value="Етика">Етика</option>
                            <option value="Зарубіжна література">Зарубіжна література</option>
                            <option value="Здоров'я, безпека та добробут">Здоров'я, безпека та добробут</option>
                            <option value="Іноземна мова (англійська мова)">Іноземна мова (англійська мова)</option>
                            <option value="Інформатика">Інформатика</option>
                            <option value="Математика">Математика</option>
                            <option value="Мистецтво (музичне)">Мистецтво (музичне)</option>
                            <option value="Образотворче мистецтво">Образотворче мистецтво</option>
                            <option value="Пізнаємо природу">Пізнаємо природу</option>
                            <option value="Технології">Технології</option>
                            <option value="Українська література">Українська література</option>
                            <option value="Українська мова">Українська мова</option>
                            <option value="Фізична культура">Фізична культура</option>
                        </select>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="simpleinput" class="form-label">Кількість балів</label>
                        <select class="form-control" name="students[${index}][points]">
                            <option>Вибрати</option>
                            <option value="10">10 балів (+5 ☆)</option>
                            <option value="11">11 балів (+7 ☆)</option>
                            <option value="12">12 балів (+10 ☆)</option>
                        </select>
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
