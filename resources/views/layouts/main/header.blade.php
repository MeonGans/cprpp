<div class="header-search-box">
    <div class="close-search"></div>
    <form class="nav-search search-form" role="search" method="get" action="#">
        <div class="search-wrapper">
            <label class="search-lbl">Шукати:</label>
            <input class="search-input" type="search" placeholder="Пошук..." name="searchInput" autofocus="autofocus"/>
            <button class="search-btn" type="submit"><i class="bi bi-search icon"></i></button>
        </div>
    </form>
</div>
<div class="container">
    <nav class="menu-navbar">
        <div class="header-logo"><a class="logo-link" href="{{ route('home') }}"><img class="logo-img light-logo" loading="lazy" src="{{ config('app.url') }}/assets/images/logo/logo-light.png" alt="logo"/><img class="logo-img  dark-logo" loading="lazy" src="{{ config('app.url') }}/assets/images/logo/logo-dark.png" alt="logo"/></a></div>
        <div class="links menu-wrapper ">
            <ul class="list-js links-list">
                <li class="menu-item has-sub-menu"><a class="menu-link   active" href="#0">Про нас <i class="fas fa-plus  plus-icon"> </i></a>
                    <ul class="sub-menu ">
                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="{{ route('team') }}">Наша команда</a></li>
                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="/docs/statut.pdf" target='_blank'>Статут</a></li>
                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="#">Плани роботи</a></li>
{{--                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="#">Програми</a></li>--}}
                    </ul>
                </li>
                <!--              <li class="menu-item"><a class="menu-link  " href="about-us.html">Мережа закладів</a></li>-->
                <li class="menu-item"><a class="menu-link " href="{{ route('news') }} ">Новини</a></li>
{{--                 TODO як дороблю події, розмістити афішу--}}
{{--                <li class="menu-item has-sub-menu"><a class="menu-link  " href="#0">Події<i class="fas fa-plus  plus-icon"> </i></a>--}}
{{--                    <ul class="sub-menu ">--}}
{{--                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="{{ route('news') }}">Новини</a></li>--}}
{{--                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="{{ route('events') }}">Афіша</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="menu-item has-sub-menu"><a class="menu-link  " href="#0">Мережа<i class="fas fa-plus  plus-icon"> </i></a>--}}
{{--                    <ul class="sub-menu ">--}}
{{--                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="#">ЗДО</a></li>--}}
{{--                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="#">ЗЗСО</a></li>--}}
{{--                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="#">ЗПО</a></li>--}}
{{--                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="#">Інклюзивно-ресурсний центр</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li class="menu-item has-sub-menu"><a class="menu-link  " href="#0">Напрямки роботи<i class="fas fa-plus  plus-icon"> </i></a>
                    <ul class="sub-menu ">
                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="{{ route('news', ['category' => 7]) }}">Підвищення кваліфікації</a></li>
{{--                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="#">Старша профільна школа</a></li>--}}
{{--                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="#">Психологічна служба</a></li>--}}
                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="{{ route('news', ['category' => 5]) }}">Профорієнтаційна робота</a></li>
                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="{{ route('news', ['category' => 4]) }}">МАН</a></li>
                        <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  " href="{{ route('news', ['category' => 3]) }}">Олімпіади та конкурси</a></li>
                    </ul>
                </li>
                <li class="menu-item"><a class="menu-link " href="{{ route('contact') }} ">Контакти</a></li>
                <li class="menu-item">
                    <a class="btn-outline_serf" href="{{ route('course_list_full') }}" target="_blank">Сертифікати ПК</a>
                </li>

                {{--                <li class="menu-item"><a class="btn-outline cta-link" href="{{ route('course_list_full') }}">Сертифікати підвищення кваліфікації</a></li>--}}

            </ul>
        </div>
{{--        <div class="cta-links-area">--}}
{{--            <a class=" btn-outline cta-link  " href="#0">Сертифікати підвищення кваліфікації</a>--}}
{{--        </div>--}}
{{--        TODO Додати пошук по сайту --}}
        <div class="controls-box">
            <!--Menu Toggler button-->
            <div class="control  menu-toggler"><span></span><span></span><span></span></div>
{{--            <!--search Icon button-->--}}
{{--            <div class="control header-search-btn"><i class="bi bi-search icon"></i></div>--}}
        </div>
    </nav>
</div>
