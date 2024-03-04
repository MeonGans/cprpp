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
            <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">Новини</h1>
            <nav aria-label="breadcrumb ">
                <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="index.html"><i
                                class="bi bi-house icon "></i>головна</a></li>
                    <li class="breadcrumb-item active">новини</li>
                </ul>
            </nav>
        </div>
    </div>
</section>
<!-- End inner Page hero-->
<!-- Start our team Section-->
<section class="blog blog-home mega-section">
    <div class="container ">
        <div class="row ">
            <div class="col-12 col-xl-8 ">
                <div class="posts-grid horizontal">
                    <div class="row">
                        @foreach($news as $item)
                            <div class="col-12 ">

                                <div class="post-box"><a class="post-link" target="_blank"
                                                         href="{{ route('simple_news', $item->id) }}"
                                                         title="{{ $item->title }}">
                                        <div class="col-5 post-img-wrapper  "><img class=" parallax-img   post-img"
                                                                                   loading="lazy"
                                                                                   src="{{ $item->preview_image }}"
                                                                                   alt=""/><span class="post-date"><span
                                                    class="day">{{ date_format($item->date, 'd.m.Y')  }}</span></span>
                                        </div>
                                    </a>
                                    <div class="col-7 post-summary">
                                        @if ($item->category or $item->author)
                                            <div class="post-info">
                                                @if ($item->category)
                                                    <a class="info post-cat" href="#">
                                                        <i class="bi bi-bookmark icon"></i>
                                                        {{ $item->category->name }}

                                                    </a>
                                                @endif
                                                @if ($item->author)
                                                    <a class="info post-author" href="#">
                                                        <i class=" bi bi-person icon"></i>
                                                        {{ $item->author->name }}
                                                    </a>
                                                @endif
                                            </div>
                                        @endif

                                        <div class="post-text"><a class="post-link"
                                                                  href="{{ route('simple_news', $item->id) }}">
                                                <h2 class="post-title">{{ $item->title }}</h2></a>
                                            <p class="post-excerpt">{{ $item->description }}</p><a class="read-more"
                                                                                                   href="{{ route('simple_news', $item->id) }}"
                                                                                                   title="{{ $item->title }}">читати
                                                більше<i class="bi bi-arrow-right icon "></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{--                        TODO Додати пагінацію --}}
                        {{--                        <div class="col-12">--}}
                        {{--                            <!--Start pagination-->--}}
                        {{--                            <nav class="ma-pagination">--}}
                        {{--                                <ul class="pagination justify-content-center">--}}
                        {{--                                    <li class="ma-page-item deactive-page-item"><a class="ma-page-link " href="#" title="Previous Page"><i class="bi bi-chevron-left icon "></i></a></li>--}}
                        {{--                                    <li class="ma-page-item active"><a class="ma-page-link " href="#">1 </a></li>--}}
                        {{--                                    <li class="ma-page-item  "><a class="ma-page-link " href="#">2 </a></li>--}}
                        {{--                                    <li class="ma-page-item  "><a class="ma-page-link " href="#">3 </a></li>--}}
                        {{--                                    <li class="ma-page-item  "><a class="ma-page-link " href="#">4 </a></li>--}}
                        {{--                                    <li class="ma-page-item  "><a class="ma-page-link " href="#">5 </a></li>--}}
                        {{--                                    <li class="ma-page-item  "><a class="ma-page-link " href="#">6 </a></li>--}}
                        {{--                                    <li class="ma-page-item"><a class="ma-page-link" href="#" title="Next Page"><i class="bi bi-chevron-right icon "></i></a></li>--}}
                        {{--                                </ul>--}}
                        {{--                            </nav>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4 ">
                <div class="blog-sidebar">
                    {{--                    TODO додати пошук по новинам --}}
                    {{--                    <!--search box-->--}}
                    {{--                    <div class="search sidebar-box">--}}
                    {{--                        <form class="search-form" action="#">--}}
                    {{--                            <input class="search-input" type="search" name="seach_form" placeholder="Пошук новини...">--}}
                    {{--                            <button class="search-btn" type="submit"><i class="bi bi-search icon"></i></button>--}}
                    {{--                        </form>--}}
                    {{--                    </div>--}}
                    <!--categories box-->
                    <div class="cats sidebar-box">
                        <h6 class="sidebar-box-title">
                            Категорії:</h6>
                        <ul class="sidebar-list cats-list  ">
                            @foreach($categories as $category)
                                <li class="cat-item"><a class="cat-link"
                                                        href="?category={{ $category->id }}">{{ $category->name }}
                                        {{--                                   TODO Додати кількість новин в категорії
                                         <span class="cat-count">17</span>--}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End our team Section-->
@include('layouts.main/footer')

