@include('layouts.main/top')
<!--Start Page Header-->
<header class=" page-header  inner-page-header header-basic" id="page-header">
    @include('layouts.main/header')
</header>
<!--End Page Header-->

<!-- Start inner Page hero-->
<section class="d-flex align-items-center page-hero  inner-page-hero " id="page-hero">
    <div class="overlay-photo-image-bg" data-bg-img="assets/images/hero/inner-page-hero.jpg" data-bg-opacity="1"></div>
    <div class="overlay-color" data-bg-opacity=".5"></div>
    <div class="container">
        <div class="hero-text-area centerd">
            <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">Наша команда</h1>
            <nav aria-label="breadcrumb ">
                <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="index.html"><i
                                class="bi bi-house icon "></i>головна</a>
                    </li>
                    <li class="breadcrumb-item active">наша команда</li>
                </ul>
            </nav>
        </div>
    </div>
</section>
<!-- End inner Page hero-->
<!-- Start our team Section-->
<section class="our-team mega-section " id="our-team">
    <div class="container">
        <div class="sec-heading  ">
            <div class="content-area"><span class=" pre-title       wow fadeInUp " data-wow-delay=".2s">Команда</span>
                <!--            <h2 class=" title    wow fadeInUp" data-wow-delay=".4s"> our <span class='hollow-text'>Experts</span> team members</h2>-->
            </div>
            <!--          <div class=" cta-area  cta-area  wow fadeInUp" data-wow-delay=".8s"><a class="cta-btn btn-solid   cta-btn btn-solid  " href="our-team.html">see more<i class="bi bi-arrow-right icon "></i></a></div>-->
        </div>
        <div class="container-fluid">
            <div class="row">
                @foreach($members as $member)
                    <div class="col-12 col-md-6  col-lg-4 mx-md-auto ">
                        <div class="tm-member-card     wow   fadeInUp" data-wow-delay="0.2s">
                            <div class="tm-image js-tilt "><a class="tm-link  " href="">
                                    <div class="overlay overlay-color"></div>
                                    <img class="img-fluid parallax-img  " loading="lazy"
                                         src="{{ $member->photo }}"
                                         alt="Член команди"/></a>
                            </div>
                            <div class="tm-details">
                                    <h6 class="tm-name">{{ $member->name }}</h6><span class="tm-role">{{ $member->description }}</span>
                                <div class="tm-contact">
                                    <div class="contact-info-card"><i class="bi bi-envelope icon"></i><a
                                            class="text-lowercase  info"
                                            href="mailto:{{ $member->email }}">{{ $member->email }}</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End our team Section-->

@include('layouts.main/links')
@include('layouts.main/have_questions')
@include('layouts.main/footer')

