<!DOCTYPE html>
<html lang="en" data-sidenav-size="{{ $sidenav ?? 'default' }}" data-layout-mode="{{ $layoutMode ?? 'fluid' }}" data-layout-position="{{ $position ?? 'fixed' }}" data-menu-color="{{ $menuColor ?? 'dark' }}" data-topbar-color="{{ $topbarColor ?? 'light' }}">

<head>
    @include('layouts.shared/title-meta', ['title' => $title])
    @yield('css')
    @include('layouts.shared/head-css', ['mode' => $mode ?? '', 'demo' => $demo ?? ''])
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        @include('layouts.shared/topbar')
        @include('layouts.shared/left-sidebar')

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="toast show align-items-center bottom-0 end-0 position-absolute text-white bg-primary" role="alert" aria-live="assertive"
                             aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    {{ session('success') }}
                                </div>
                                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    @yield('content')
                </div>
                <!-- container -->

            </div>
            <!-- content -->

{{--            @include('layouts.shared/footer')--}}
        </div>

    </div>
    <!-- END wrapper -->

    @yield('modal')

    @include('layouts.shared/right-sidebar')

    @include('layouts.shared/footer-scripts')

    @vite(['resources/js/layout.js', 'resources/js/main.js'])
    @yield('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let participantIndex = 1;

            // Додавання нового учасника
            document.getElementById('add-participant').addEventListener('click', function() {
                const participantContainer = document.getElementById('participants');

                // Клонування всього блоку учасника
                const participantTemplate = `
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="header-title">Учасник ${participantIndex + 1}</h4>
                            </div>
                            <div class="card-body participant">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Ім'я Прізвище</label>
                                            <input type="text" id="simpleinput" class="form-control" name="participants[${participantIndex}][name]">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="simpleinput" class="form-label">Стать</label>
                                        <div class="mt-2">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadio4" name="participants[${participantIndex}][gender]" value="female" class="form-check-input" checked>
                                                <label class="form-check-label" for="customRadio4">Жінка</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadio3" name="participants[${participantIndex}][gender]" value="male" class="form-check-input">
                                                <label class="form-check-label" for="customRadio3">Чоловік</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger remove-participant">Видалити учасника</button>
                            </div>
                        </div>
                    </div>
                `;

                // Додаємо новий блок учасника
                participantContainer.insertAdjacentHTML('beforeend', participantTemplate);

                // Збільшуємо індекс для наступного учасника
                participantIndex++;
            });

            // Видалення учасника
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-participant')) {
                    const participant = e.target.closest('.col-12');
                    participant.remove();
                }
            });
        });









        function copyLink(event, url) {
            event.preventDefault(); // Відміняє перехід за посиланням

            // Створює тимчасовий текстовий елемент для копіювання URL
            const tempInput = document.createElement('input');
            tempInput.value = url;
            document.body.appendChild(tempInput);
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // Для мобільних пристроїв

            // Копіює текст у буфер обміну
            document.execCommand('copy');

            // Видаляє тимчасовий елемент
            document.body.removeChild(tempInput);
        }
    </script>

</body>

</html>
