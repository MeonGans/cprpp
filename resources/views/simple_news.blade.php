@include('layouts.main/top')
<!--Start Page Header-->
<header class=" page-header header-basic" id="page-header">
    @include('layouts.main/header')
</header>
<!--End Page Header-->

<div class="blog blog-post ">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <!--post heading area2021-->
                <h2 class="post-title">{{ $news->title }}</h2>
                <div class="post-img-wrapper post-featured-area"><img class="featured-img" loading="lazy"
                                                                      src="{{ $news->preview_image }}" alt="Main Image">
                </div>
            </div>
            <div class="col-12 col-lg-9 mx-auto">
                <div class="post-main-area">
                    <div class="post-info">
                        @if($news->author)
                            <a class="info post-author" href="#"><i
                                    class="fas fa-user icon"></i>{{ $news->author->name }}</a>
                        @endif
                        <a class="info post-date" href="#"><i
                                class="fas fa-history icon"></i>{{ date_format($news->date, 'd.m.Y')  }}</a>

{{--                            TODO Добавити функцію додання кількості перегляду та коректне відображення--}}
{{--                        <a class="info post-time" href="#"><i class="fas fa-eye icon"></i>1975</a>--}}
                    </div>
                    <div class="post-content">
                        <p class=" first-litter post-text">
                            {{ $news->description }}
                        </p>
                        <div class="fr-view">
                            {!! $news->content !!}
                        </div>
                    </div>

                    {{--                                TODO добавити рекомендації--}}
                    {{--                    <div class="other-posts panel">--}}
                    {{--                        <h6 class="panel-title">Новини з цієї категорії</h6>--}}
                    {{--                        <div class="row">--}}
                    {{--                            <div class="col-12 col-sm-6 mb-3">--}}
                    {{--                                <div class="prev-post"><a class="other-post-link" href="#0">--}}
                    {{--                                        <div class="other-post-img" title="Previous Post"><img class="img-fluid" loading="lazy" src="assets/images/blog/post-images/1-1.jpg" alt="other posts Image">--}}
                    {{--                                        </div>--}}
                    {{--                                        <h6 class="other-post-title">Інклюзивна освіта: Розширений курс для педагогів із роботи з особливими потребами</h6></a></div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="col-12 col-sm-6">--}}
                    {{--                                <div class="next-post"><a class="other-post-link" href="#0">--}}
                    {{--                                        <div class="other-post-img" title="Next Post"><img class="img-fluid" loading="lazy" src="assets/images/blog/post-images/4.jpg" alt="other posts Image">--}}
                    {{--                                        </div>--}}
                    {{--                                        <h6 class="other-post-title">Інноваційні методи викладання: Курс для педагогів розвиває таланти вчителів</h6></a></div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End our team Section-->
@include('layouts.main/footer')

