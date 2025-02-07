@include('layouts.main/top')

<header class=" page-header  inner-page-header header-basic" id="page-header">
    @include('layouts.main/header')
</header>
<!--End Page Header-->
<!-- Start inner Page hero-->
<section class="d-flex align-items-center page-hero  inner-page-hero " id="page-hero">
    <div class="overlay-photo-image-bg parallax" data-bg-img="assets/images/hero/inner-page-hero.jpg" data-bg-opacity="1"></div>
    <div class="overlay-color" data-bg-opacity=".75"></div>
    <div class="container">
        <div class="hero-text-area centerd">
            <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">Контакти</h1>
            <nav aria-label="breadcrumb ">
                <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="index.html"><i class="bi bi-house icon "></i>Головна</a></li>
                    <li class="breadcrumb-item active">Контакти</li>
                </ul>
            </nav>
        </div>
    </div>
</section>
<!-- End inner Page hero-->
<!-- Start contact-us -->
<section class="contact-us  mega-section  pb-0" id="contact-us">
    <div class="container">
        <section class="locations-section  mega-section ">
            <div class="sec-heading centered  ">
                <div class="content-area">
                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">Наші актуальні дані</h2>
                </div>
            </div>
            <div class=" contact-info-panel ">
                <div class="info-section ">
                    <div class="row">
                        <div class="col-12 col-lg-6 mx-auto">
                            <div class="info-panel  wow fadeInUp" data-wow-delay=".4s ">
                                <h4 class="location-title">Фактична адреса</h4>
                                <div class="line-on-side "> </div>
                                <p class="location-address">Київська область, Бучанський район</p>
                                <p class="location-address">Крюківщина, ліцей "Лідер", новий корпус, каб. 305</p>
                                <div class="location-card  "><i class="flaticon-email icon"></i>
                                    <div class="card-content">
                                        <h6 class="content-title">email:</h6><a class="email link" href="mailto:prppcentr@gmail.com">prppcentr@gmail.com</a>
                                    </div>
                                </div>
{{--                                <div class="location-card  "><i class="flaticon-phone-call icon"></i>--}}
{{--                                    <div class="card-content">--}}
{{--                                        <h6 class="content-title">номер:</h6><a class="tel link" href="tel:0123456789">+380-99-541-1410</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mx-auto">
                            <div class="info-panel  wow fadeInUp" data-wow-delay=".4s ">
                                <h4 class="location-title">Юридична адреса</h4>
                                <div class="line-on-side "> </div>
                                <p class="location-address">Київська область, Бучанський район</p>
                                <p class="location-address">м.Вишневе, вул. Святошинська, буд. 29</p>
                                <p class="location-address">індекс: 08132</p>
                                <div class="location-card  "><i class="flaticon-email icon"></i>
                                    <div class="card-content">
                                        <h6 class="content-title">email:</h6><a class="email link" href="mailto:prppcentr@gmail.com">prppcentr@gmail.com</a>
                                    </div>
                                </div>
{{--                                <div class="location-card  "><i class="flaticon-phone-call icon"></i>--}}
{{--                                    <div class="card-content">--}}
{{--                                        <h6 class="content-title">номер:</h6><a class="tel link" href="tel:0123456789">+380-99-541-1410</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="map-section  mb-5">
            <div class="sec-heading  centered   ">
                <div class="content-area">
                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">Ми на Google картах</h2>
                </div>
            </div>
            <div class="map-box  wow fadeInUp" data-wow-delay=".6s">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe class="map-iframe" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1773.488188399097!2d30.368816302755263!3d50.37452914261802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4c98a9f3a473d%3A0xf9a94384f20b4423!2z0JrRgNGO0LrRltCy0YnQuNC90YHRjNC60LAg0JfQntCoIEktSUlJINGB0YIsINCy0YPQu9C40YbRjyDQnNGW0YfRg9GA0ZbQvdCwLCDQmtGA0Y7QutGW0LLRidC40L3QsCwg0JrQuNGX0LLRgdGM0LrQsCDQvtCx0LsuLCAwODEzNg!5e0!3m2!1suk!2sua!4v1705247902855!5m2!1suk!2sua"></iframe>
                    </div>
                </div>
            </div>
        </section>
{{--        TODO подумати над доцільністю блоку "Задати питання" --}}
{{--        <section class="contact-us-form-section  mega-section  ">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 ">--}}
{{--                    <div class="contact-form-panel">--}}
{{--                        <div class="sec-heading centered    ">--}}
{{--                            <div class="content-area">--}}
{{--                                <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">Маєте питання? Задайте їх нам:</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="contact-form-inputs wow fadeInUp" data-wow-delay=".6s">--}}
{{--                            <div class="custom-form-area input-boxed">--}}
{{--                                <!--Form To have user messages-->--}}
{{--                                <form class="main-form" id="contact-us-form" action="php/send-mail.php" method="post"><span class="done-msg"></span>--}}
{{--                                    <div class="row ">--}}
{{--                                        <div class="col-12 col-lg-6">--}}
{{--                                            <div class="   input-wrapper">--}}
{{--                                                <input class="text-input" id="user-name" name="UserName" type="text"/>--}}
{{--                                                <label class="input-label" for="user-name"> Ім'я <span class="req">*</span></label><span class="b-border"></span><span class="error-msg"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-12 col-lg-6">--}}
{{--                                            <div class="   input-wrapper">--}}
{{--                                                <input class="text-input" id="user-email" name="UserEmail" type="email"/>--}}
{{--                                                <label class="input-label" for="user-email"> E-mail <span class="req">*</span></label><span class="b-border"></span><span class="error-msg"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-12 ">--}}
{{--                                            <div class="   input-wrapper">--}}
{{--                                                <input class="text-input" id="msg-subject" name="subject" type="text"/>--}}
{{--                                                <label class="input-label" for="msg-subject"> Тема <span class="req">*</span></label><span class="b-border"></span><span class="error-msg"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-12 ">--}}
{{--                                            <div class="   input-wrapper">--}}
{{--                                                <textarea class=" text-input" id="msg-text" name="message"></textarea>--}}
{{--                                                <label class="input-label" for="msg-text"> Ваше повідомлення <span class="req">*</span></label><span class="b-border"></span><i></i><span class="error-msg"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-12 submit-wrapper">--}}
{{--                                            <button class=" btn-solid" id="submit-btn" type="submit" name="UserSubmit">Відправити</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
    </div>
</section>
<!-- End contact-us -->

@include('layouts.main/footer')
