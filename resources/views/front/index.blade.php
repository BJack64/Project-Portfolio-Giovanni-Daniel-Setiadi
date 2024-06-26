<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Portfolio Giovanni Daniel Setiadi</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('front')}}/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">{{$about->title}}</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{asset('photo')."/".get_meta_value('_photo')}}" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        {!! set_about_name($about->title) !!}
                    </h1>
                    <div class="subheading mb-5">
                        {{get_meta_value('_city')}} . {{get_meta_value('_prov')}} . {{get_meta_value('_phone')}} . 
                        <a href="{{get_meta_value('_email')}}">{{get_meta_value('_email')}}</a>
                    </div>
                    <div class="lead mb-5">{!!$about->content!!}</div>
                    <div class="social-icons">
                        <a class="social-icon" href="{{get_meta_value('_lin')}}"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="{{get_meta_value('_gh')}}"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="{{get_meta_value('_ig')}}"><i class="fab fa-instagram"></i></a>
                        <a class="social-icon" href="{{get_meta_value('_dc')}}"><i class="fab fa-discord"></i></a>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>
                    @foreach ($exp as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{$item->title}}</h3>
                            <div class="subheading mb-3">{{$item->info1}}</div>
                            <p>{!!$item->content!!}</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">{{$item->start_date_indo}} - {{$item->finish_date_indo}}</span></div>
                    </div>
                    @endforeach
            </section>
            <hr class="m-0" />
            <!-- Education-->
            <section class="resume-section" id="education">
                <div class="resume-section-content">
                    <h2 class="mb-5">Education</h2>
                    @foreach ($edu as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{$item->title}}</h3>
                            <div class="subheading mb-3">{{$item->info1}}</div>
                            <div>{{$item->info2}}</div>
                            <p>{{$item->info3}}</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">{{$item->start_date_indo}} - {{$item->finish_date_indo}}</span></div>
                    </div>  
                    @endforeach
            </section>
            <hr class="m-0" />
            <!-- Skills-->
            <section class="resume-section" id="skills">
                <div class="resume-section-content">
                    <h2 class="mb-5">Skills</h2>
                    <div class="subheading mb-3">Programming Languages & Tools</div>
                    <ul class="list-inline dev-icons">
                    @foreach (explode(', ', get_meta_value('_lang')) as $item)
                        <li class="list-inline-item"><i class="devicon-{{strtolower($item)}}-plain"></i></li>  
                    @endforeach
                    </ul>
                    <div class="subheading mb-3">Workflow</div>
                    {!! set_list_workflow(get_meta_value('_workflow')) !!}
                </div>
            </section>
            <hr class="m-0" />
            <!-- Interests-->
            <section class="resume-section" id="interests">
                <div class="resume-section-content">
                    <h2 class="mb-5">{{$interest->title}}</h2>
                    {!!$interest->content!!}
                </div>
            </section>
            <hr class="m-0" />
            <!-- Awards-->
            <section class="resume-section" id="awards">
                <div class="resume-section-content">
                    <h2 class="mb-5">{{$award->title}}</h2>
                    {!! set_list_award($award->content) !!}
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('front')}}/js/scripts.js"></script>
    </body>
</html>
