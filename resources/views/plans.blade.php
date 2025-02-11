@include('layouts.main/top')
<!--Start Page Header-->
<header class=" page-header  inner-page-header header-basic" id="page-header">
    @include('layouts.main/header')
</header>
<!--End Page Header-->

<!-- Start inner Page hero-->
<section class="d-flex align-items-center page-hero  inner-page-hero " id="page-hero">
    <div class="overlay-photo-image-bg parallax" data-bg-img="assets/images/hero/inner-page-hero.jpg"
         data-bg-opacity="1"></div>
    <div class="overlay-color" data-bg-opacity=".75"></div>
    <div class="container">
        <div class="hero-text-area centerd">
            <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">Плани роботи</h1>
            <nav aria-label="breadcrumb ">
                <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('home') }}"><i
                                    class="bi bi-house icon "></i>головна</a></li>
                    <li class="breadcrumb-item active">плани роботи</li>
                </ul>
            </nav>
        </div>
    </div>
</section>
<!-- End inner Page hero-->
<!-- Start our team Section-->
<section class="service-single pt-4">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="col-12 col-xl-8 m-auto">
                    <div class="service-sidebar ">
                        <div class="sidebar-pane">
                            <div class="download-area">
                                <h2 class="sidebar-title">Плани роботи</h2>
                                <p class="sidebar-text">Виберіть відповідний план роботи. Він відкриється в форматі PDF та буде доступний для збереження.</p>
                                <ul class="list">
                                    <li class="list-item">
                                        <i class="flaticon-downloading font-icon"></i>
                                        <a href="{{ asset('docs/planes/02-25.pdf') }}" target="_blank">
                                            Лютий 2025 <i class="bi bi-arrow-right icon"></i>
                                        </a>
                                    </li>
                                    <li class="list-item">
                                        <i class="flaticon-downloading font-icon"></i>
                                        <a href="{{ asset('docs/planes/01-25.pdf') }}" target="_blank">
                                            Січень 2025 <i class="bi bi-arrow-right icon"></i>
                                        </a>
                                    </li>
                                    <li class="list-item">
                                        <i class="flaticon-downloading font-icon"></i>
                                        <a href="{{ asset('docs/planes/12-24.pdf') }}" target="_blank">
                                            Грудень 2024 <i class="bi bi-arrow-right icon"></i>
                                        </a>
                                    </li>
                                    <li class="list-item">
                                        <i class="flaticon-downloading font-icon"></i>
                                        <a href="{{ asset('docs/planes/11-24.pdf') }}" target="_blank">
                                            Листопад 2024 <i class="bi bi-arrow-right icon"></i>
                                        </a>
                                    </li>
                                    <li class="list-item">
                                        <i class="flaticon-downloading font-icon"></i>
                                        <a href="{{ asset('docs/planes/10-24.pdf') }}" target="_blank">
                                            Жовтень 2024 <i class="bi bi-arrow-right icon"></i>
                                        </a>
                                    </li>
                                    <li class="list-item">
                                        <i class="flaticon-downloading font-icon"></i>
                                        <a href="{{ asset('docs/planes/09-24.pdf') }}" target="_blank">
                                            Вересень 2024 <i class="bi bi-arrow-right icon"></i>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End our team Section-->
@include('layouts.main/footer')

