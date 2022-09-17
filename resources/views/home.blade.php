<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Smart Pass | Lynce</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Smart Pass">
    <meta name="keywords" content="Smartpass">
    <meta name="author" content="Matteo Carminato">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#5bbad5" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <!-- Page loading styles-->
    <style>
        .page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }

        .page-loading.active {
            opacity: 1;
            visibility: visible;
        }

        .page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }

        .page-loading.active > .page-loading-inner {
            opacity: 1;
        }

        .page-loading-inner > span {
            display: block;
            font-size: 1rem;
            font-weight: normal;
            color: #666276;;
        }

        .page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            border: .15em solid #bbb7c5;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }

        @-webkit-keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

    </style>

    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen" href="vendor/flatpickr/dist/flatpickr.min.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
    <!-- Google Tag Manager-->
</head>
<!-- Body-->
<body>

<main class="page-wrapper">
    <!-- Sign In Modal-->
    <div class="modal fade" id="signin-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
            <div class="modal-content">
                <div class="modal-body px-0 py-2 py-sm-0">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                            data-bs-dismiss="modal"></button>
                    <div class="row mx-0 align-items-center">
                        <div class="col-md-6 border-end-md p-4 p-sm-5">
                            <h2 class="h3 mb-4 mb-sm-5">
                                Ei!<br> Bem vindo.</h2><img class="d-block mx-auto"
                                                                     src="img/signin-modal/signin.svg" width="344"
                                                                     alt="Illustartion">
                            <div class="mt-4 mt-sm-5">Não possui uma conta? <a href="#"
{{--                                                                               href="#signup-modal"--}}
                                                                                data-bs-toggle="modal"
                                                                                data-bs-dismiss="modal">Cadastrar agora</a>
                            </div>
                        </div>
                        <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                            {{--                            <a class="btn btn-outline-info rounded-pill w-100 mb-3" href="#"><i class="fi-google fs-lg me-1"></i>Sign in with Google</a>--}}
                            <a class="btn btn-outline-info rounded-pill w-100 mb-3" href="{{ url('auth/facebook') }}"><i
                                    class="fi-facebook fs-lg me-1"></i>Entrar com Facebook</a>
                            <div class="d-flex align-items-center py-3 mb-3">
                                <hr class="w-100">
                                <div class="px-3">Ou</div>
                                <hr class="w-100">
                            </div>
                            <form class="needs-validation" novalidate>
                                <div class="mb-4">
                                    <label class="form-label mb-2" for="signin-email">Email</label>
                                    <input class="form-control" type="email" id="signin-email"
                                           placeholder="exemplo@exemplo.com" required>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <label class="form-label mb-0" for="signin-password">Senha</label><a
                                            class="fs-sm" href="#">Esqueceu a senha?</a>
                                    </div>
                                    <div class="password-toggle">
                                        <input class="form-control" type="password" id="signin-password"
                                               placeholder="********" required>
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" type="checkbox"><span
                                                class="password-toggle-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg rounded-pill w-100" type="submit">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up Modal-->
    <div class="modal fade" id="signup-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
            <div class="modal-content">
                <div class="modal-body px-0 py-2 py-sm-0">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                            data-bs-dismiss="modal"></button>
                    <div class="row mx-0 align-items-center">
                        <div class="col-md-6 border-end-md p-4 p-sm-5">
                            <h2 class="h3 mb-4 mb-sm-5">Join Finder.<br>Get premium benefits:</h2>
                            <ul class="list-unstyled mb-4 mb-sm-5">
                                <li class="d-flex mb-2"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Add and promote your listings</span>
                                </li>
                                <li class="d-flex mb-2"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Easily manage your wishlist</span>
                                </li>
                                <li class="d-flex mb-0"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Leave reviews</span>
                                </li>
                            </ul>
                            <img class="d-block mx-auto" src="img/signin-modal/signup.svg" width="344"
                                 alt="Illustartion">
                            <div class="mt-sm-4 pt-md-3">Already have an account? <a href="#signin-modal"
                                                                                     data-bs-toggle="modal"
                                                                                     data-bs-dismiss="modal">Sign in</a>
                            </div>
                        </div>
                        <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5"><a
                                class="btn btn-outline-info rounded-pill w-100 mb-3" href="#"><i
                                    class="fi-google fs-lg me-1"></i>Sign in with Google</a><a
                                class="btn btn-outline-info rounded-pill w-100 mb-3" href="#"><i
                                    class="fi-facebook fs-lg me-1"></i>Sign in with Facebook</a>
                            <div class="d-flex align-items-center py-3 mb-3">
                                <hr class="w-100">
                                <div class="px-3">Or</div>
                                <hr class="w-100">
                            </div>
                            <form class="needs-validation" novalidate>
                                <div class="mb-4">
                                    <label class="form-label" for="signup-name">Full name</label>
                                    <input class="form-control" type="text" id="signup-name"
                                           placeholder="Enter your full name" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="signup-email">Email address</label>
                                    <input class="form-control" type="email" id="signup-email"
                                           placeholder="Enter your email" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="signup-password">Password <span
                                            class='fs-sm text-muted'>min. 8 char</span></label>
                                    <div class="password-toggle">
                                        <input class="form-control" type="password" id="signup-password" minlength="8"
                                               required>
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" type="checkbox"><span
                                                class="password-toggle-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="signup-password-confirm">Confirm password</label>
                                    <div class="password-toggle">
                                        <input class="form-control" type="password" id="signup-password-confirm"
                                               minlength="8" required>
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" type="checkbox"><span
                                                class="password-toggle-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="agree-to-terms" required>
                                    <label class="form-check-label" for="agree-to-terms">By joining, I agree to the <a
                                            href='#'>Terms of use</a> and <a href='#'>Privacy policy</a></label>
                                </div>
                                <button class="btn btn-primary btn-lg rounded-pill w-100" type="submit">Sign up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar-->
    <header class="navbar navbar-expand-lg navbar-light fixed-top" data-scroll-header>
        <div class="container"><a class="navbar-brand me-3 me-xl-4" href="city-guide-home-v1.html"><img class="d-block"
                                                                                                        src="img/logo/logo-dark.png"
                                                                                                        width="116"
                                                                                                        alt="Finder"></a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3" href="#signin-modal" data-bs-toggle="modal"><i
                    class="fi-user me-2"></i>Entrar/Cadastrar</a>
            {{--            <a class="btn btn-primary btn-sm rounded-pill ms-2 order-lg-3" href="city-guide-add-business.html"><i class="fi-plus me-2"></i>Add<span class='d-none d-sm-inline'> business</span></a>--}}
            <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                {{--                <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">--}}
                {{--                    <!-- Demos switcher-->--}}
                {{--                    <li class="nav-item dropdown me-lg-2"><a class="nav-link dropdown-toggle align-items-center pe-lg-4" href="#" data-bs-toggle="dropdown" role="button" aria-expanded="false"><i class="fi-layers me-2"></i>Demos<span class="d-none d-lg-block position-absolute top-50 end-0 translate-middle-y border-end" style="width: 1px; height: 30px;"></span></a>--}}
                {{--                        <ul class="dropdown-menu">--}}
                {{--                            <li><a class="dropdown-item" href="real-estate-home-v1.html"><i class="fi-building fs-base opacity-50 me-2"></i>Real Estate Demo</a></li>--}}
                {{--                            <li class="dropdown-divider"></li>--}}
                {{--                            <li><a class="dropdown-item" href="car-finder-home.html"><i class="fi-car fs-base opacity-50 me-2"></i>Car Finder Demo</a></li>--}}
                {{--                            <li class="dropdown-divider"></li>--}}
                {{--                            <li><a class="dropdown-item" href="job-board-home-v1.html"><i class="fi-briefcase fs-base opacity-50 me-2"></i>Job Board Demo</a></li>--}}
                {{--                            <li class="dropdown-divider"></li>--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-home-v1.html"><i class="fi-map-pin fs-base opacity-50 me-2"></i>City Guide Demo</a></li>--}}
                {{--                            <li class="dropdown-divider"></li>--}}
                {{--                            <li><a class="dropdown-item" href="index.html"><i class="fi-home fs-base opacity-50 me-2"></i>Main Page</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="components/typography.html"><i class="fi-list fs-base opacity-50 me-2"></i>Components</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="docs/dev-setup.html"><i class="fi-file fs-base opacity-50 me-2"></i>Documentation</a></li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}
                {{--                    <!-- Menu items-->--}}
                {{--                    <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Home</a>--}}
                {{--                        <ul class="dropdown-menu">--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-home-v1.html">Homepage v.1</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-home-v2.html">Homepage v.2</a></li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}
                {{--                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catalog</a>--}}
                {{--                        <ul class="dropdown-menu">--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-catalog.html">Grid with Filters</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-single.html">Single Place - Gallery</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-single-info.html">Single Place - Info</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-single-reviews.html">Single Place - Reviews</a></li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}
                {{--                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>--}}
                {{--                        <ul class="dropdown-menu">--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-account-info.html">Personal Info</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-account-favorites.html">Favorites</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-account-reviews.html">Reviews</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-account-notifications.html">Notifications</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="signin-light.html">Sign In</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="signup-light.html">Sign Up</a></li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}
                {{--                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Vendor</a>--}}
                {{--                        <ul class="dropdown-menu">--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-add-business.html">Add Business</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-business-promotion.html">Business Promotion</a></li>--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-vendor-businesses.html">My Businesses</a></li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}
                {{--                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>--}}
                {{--                        <ul class="dropdown-menu">--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-about.html">About</a></li>--}}
                {{--                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>--}}
                {{--                                <ul class="dropdown-menu">--}}
                {{--                                    <li><a class="dropdown-item" href="city-guide-blog.html">Blog Grid</a></li>--}}
                {{--                                    <li><a class="dropdown-item" href="city-guide-blog-single.html">Single Post</a></li>--}}
                {{--                                </ul>--}}
                {{--                            </li>--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-contacts.html">Contacts</a></li>--}}
                {{--                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Help Center</a>--}}
                {{--                                <ul class="dropdown-menu">--}}
                {{--                                    <li><a class="dropdown-item" href="city-guide-help-center.html">Help Topics</a></li>--}}
                {{--                                    <li><a class="dropdown-item" href="city-guide-help-center-single-topic.html">Single Topic</a></li>--}}
                {{--                                </ul>--}}
                {{--                            </li>--}}
                {{--                            <li><a class="dropdown-item" href="city-guide-404.html">404 Not Found</a></li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}
                {{--                    <li class="nav-item d-lg-none"><a class="nav-link" href="#signin-modal" data-bs-toggle="modal"><i class="fi-user me-2"></i>Sign in</a></li>--}}
                {{--                </ul>--}}
            </div>
        </div>
    </header>
    <!-- Page content-->
    <!-- Hero-->
    <section class="container py-5 mt-5 mb-lg-3">
        <div class="row align-items-center mt-md-2">
            <div class="col-lg-7 order-lg-2 mb-lg-0 mb-4 pb-2 pb-lg-0"><img class="d-block mx-auto"
                                                                            src="img/city-guide/home/hero-img.jpg"
                                                                            width="746" alt="Hero image"></div>
            <div class="col-lg-5 order-lg-1 pe-lg-0">
                <h1 class="display-5 mb-4 me-lg-n5 text-lg-start text-center mb-4">Começe explorando <span
                        class="dropdown d-inline-block"><a class="dropdown-toggle text-decoration-none" href="#"
                                                           role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">Foz do Iguaçu</a><span
                            class="dropdown-menu dropdown-menu-end my-1"><a class="dropdown-item fs-base fw-bold"
                                                                            href="#">Fortaleza</a><a
                                class="dropdown-item fs-base fw-bold" href="#">Bonito</a><a
                                class="dropdown-item fs-base fw-bold" href="#">João Pessoa</a><a
                                class="dropdown-item fs-base fw-bold" href="#">São Paulo</a><a
                                class="dropdown-item fs-base fw-bold" href="#">Florianópolis</a></span></span></h1>
                <p class="text-lg-start text-center mb-4 mb-lg-5 fs-lg">Encontre ótimos lugares para ficar, comer, fazer compras ou visitar
                    nossos parceiros e especialistas locais.</p>
                <!-- Search form-->
                <div class="me-lg-n5">
                    <form class="form-group d-block d-md-flex position-relative rounded-md-pill me-lg-n5">
                        <div class="input-group input-group-lg border-end-md"><span
                                class="input-group-text text-muted rounded-pill ps-3"><i class="fi-search"></i></span>
                            <input class="form-control" type="text" placeholder="Ex: Cataratas do Iguaçu">
                        </div>
                        <hr class="d-md-none my-2">
                        <div class="d-sm-flex">
{{--                            <div class="dropdown w-100 mb-sm-0 mb-3" data-bs-toggle="select">--}}
{{--                                <button class="btn btn-link btn-lg dropdown-toggle ps-2 ps-sm-3" type="button"--}}
{{--                                        data-bs-toggle="dropdown"><i class="fi-list me-2"></i><span--}}
{{--                                        class="dropdown-toggle-label">All categories</span></button>--}}
{{--                                <input type="hidden">--}}
{{--                                <ul class="dropdown-menu">--}}
{{--                                    <li><a class="dropdown-item" href="#"><i--}}
{{--                                                class="fi-bed fs-lg opacity-60 me-2"></i><span--}}
{{--                                                class="dropdown-item-label">Accomodation</span></a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#"><i--}}
{{--                                                class="fi-cafe fs-lg opacity-60 me-2"></i><span--}}
{{--                                                class="dropdown-item-label">Food &amp; Drink</span></a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#"><i--}}
{{--                                                class="fi-shopping-bag fs-lg opacity-60 me-2"></i><span--}}
{{--                                                class="dropdown-item-label">Shopping</span></a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#"><i--}}
{{--                                                class="fi-museum fs-lg opacity-60 me-2"></i><span--}}
{{--                                                class="dropdown-item-label">Art &amp; History</span></a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#"><i--}}
{{--                                                class="fi-entertainment fs-lg opacity-60 me-2"></i><span--}}
{{--                                                class="dropdown-item-label">Entertainment</span></a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#"><i--}}
{{--                                                class="fi-meds fs-lg opacity-60 me-2"></i><span--}}
{{--                                                class="dropdown-item-label">Medicine</span></a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#"><i--}}
{{--                                                class="fi-makeup fs-lg opacity-60 me-2"></i><span--}}
{{--                                                class="dropdown-item-label">Beauty</span></a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#"><i--}}
{{--                                                class="fi-car fs-lg opacity-60 me-2"></i><span--}}
{{--                                                class="dropdown-item-label">Car Rental</span></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                            <button class="btn btn-primary btn-lg rounded-pill w-100 w-md-auto ms-sm-3" type="button">
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories-->
{{--    <section class="container d-flex flex-wrap flex-column flex-sm-row pb-5 mb-md-3"><a--}}
{{--            class="icon-box card flex-row align-items-center flex-shrink-0 card-hover border-0 shadow-sm rounded-pill py-2 ps-2 pe-4 mb-2 mb-sm-3 me-sm-3 me-xxl-4"--}}
{{--            href="city-guide-catalog.html">--}}
{{--            <div class="icon-box-media bg-faded-accent text-accent rounded-circle me-2"><i class="fi-bed"></i></div>--}}
{{--            <h3 class="icon-box-title fs-sm ps-1 pe-2 mb-0">Accommodation</h3></a><a--}}
{{--            class="icon-box card flex-row align-items-center flex-shrink-0 card-hover border-0 shadow-sm rounded-pill py-2 ps-2 pe-4 mb-2 mb-sm-3 me-sm-3 me-xxl-4"--}}
{{--            href="city-guide-catalog.html">--}}
{{--            <div class="icon-box-media bg-faded-warning text-warning rounded-circle me-2"><i class="fi-cafe"></i></div>--}}
{{--            <h3 class="icon-box-title fs-sm ps-1 pe-2 mb-0">Food &amp; Drink</h3></a><a--}}
{{--            class="icon-box card flex-row align-items-center flex-shrink-0 card-hover border-0 shadow-sm rounded-pill py-2 ps-2 pe-4 mb-2 mb-sm-3 me-sm-3 me-xxl-4"--}}
{{--            href="city-guide-catalog.html">--}}
{{--            <div class="icon-box-media bg-faded-primary text-primary rounded-circle me-2"><i--}}
{{--                    class="fi-shopping-bag"></i></div>--}}
{{--            <h3 class="icon-box-title fs-sm ps-1 pe-2 mb-0">Shopping</h3></a><a--}}
{{--            class="icon-box card flex-row align-items-center flex-shrink-0 card-hover border-0 shadow-sm rounded-pill py-2 ps-2 pe-4 mb-2 mb-sm-3 me-sm-3 me-xxl-4"--}}
{{--            href="city-guide-catalog.html">--}}
{{--            <div class="icon-box-media bg-faded-success text-success rounded-circle me-2"><i class="fi-museum"></i>--}}
{{--            </div>--}}
{{--            <h3 class="icon-box-title fs-sm ps-1 pe-2 mb-0">Art &amp; History</h3></a><a--}}
{{--            class="icon-box card flex-row align-items-center flex-shrink-0 card-hover border-0 shadow-sm rounded-pill py-2 ps-2 pe-4 mb-2 mb-sm-3 me-sm-3 me-xxl-4"--}}
{{--            href="city-guide-catalog.html">--}}
{{--            <div class="icon-box-media bg-faded-primary text-primary rounded-circle me-2"><i--}}
{{--                    class="fi-entertainment"></i></div>--}}
{{--            <h3 class="icon-box-title fs-sm ps-1 pe-2 mb-0">Entertainment</h3></a>--}}
{{--        <div class="dropdown mb-2 mb-sm-3"><a--}}
{{--                class="icon-box card flex-row align-items-center flex-shrink-0 card-hover border-0 shadow-sm rounded-pill py-2 ps-2 pe-4"--}}
{{--                href="#" data-bs-toggle="dropdown">--}}
{{--                <div class="icon-box-media bg-faded-info text-info rounded-circle me-2"><i--}}
{{--                        class="fi-dots-horisontal"></i></div>--}}
{{--                <h3 class="icon-box-title fs-sm ps-1 pe-2 mb-0">More</h3></a>--}}
{{--            <div class="dropdown-menu dropdown-menu-sm-end my-1"><a class="dropdown-item fw-bold"--}}
{{--                                                                    href="city-guide-catalog.html"><i--}}
{{--                        class="fi-meds fs-base opacity-60 me-2"></i>Medicine</a><a class="dropdown-item fw-bold"--}}
{{--                                                                                   href="city-guide-catalog.html"><i--}}
{{--                        class="fi-makeup fs-base opacity-60 me-2"></i>Beauty</a><a class="dropdown-item fw-bold"--}}
{{--                                                                                   href="city-guide-catalog.html"><i--}}
{{--                        class="fi-car fs-base opacity-60 me-2"></i>Car Rental</a><a class="dropdown-item fw-bold"--}}
{{--                                                                                    href="city-guide-catalog.html"><i--}}
{{--                        class="fi-dumbell fs-base opacity-60 me-2"></i>Fitness &amp; Sport</a><a--}}
{{--                    class="dropdown-item fw-bold" href="city-guide-catalog.html"><i--}}
{{--                        class="fi-disco-ball fs-base opacity-60 me-2"></i>Night Club</a></div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Where to stay-->
    <section class="container mb-sm-5 mb-4 pb-lg-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 pb-2">
            <h2 class="h3 mb-sm-0">Passeios em Foz do Iguaçu</h2><a class="btn btn-link fw-normal ms-sm-3 p-0"
                                                                  href="city-guide-catalog.html">View all<i
                    class="fi-arrow-long-right ms-2"></i></a>
        </div>
        <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside">
            <div class="tns-carousel-inner"
                 data-carousel-options="{&quot;items&quot;: 3, &quot;gutter&quot;: 24, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1,&quot;nav&quot;:true},&quot;500&quot;:{&quot;items&quot;:2},&quot;850&quot;:{&quot;items&quot;:3},&quot;1400&quot;:{&quot;items&quot;:3,&quot;nav&quot;:false}}}">
                <!-- Item-->
                <div>
                    <div class="position-relative">
                        <div class="position-relative mb-3">
                            <button
                                class="btn btn-icon btn-light-primary btn-xs text-primary rounded-circle position-absolute top-0 end-0 m-3 zindex-5"
                                type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to Favorites"><i class="fi-heart"></i></button>
                            <img class="rounded-3" src="img/city-guide/catalog/01.jpg" alt="Image">
                        </div>
                        <h3 class="mb-2 fs-lg"><a class="nav-link stretched-link" href="city-guide-single.html">Itaipu Binancional</a></h3>
                        <ul class="list-inline mb-0 fs-xs">
                            <li class="list-inline-item pe-1"><i
                                    class="fi-star-filled mt-n1 me-1 fs-base text-warning align-middle"></i><b>5.0</b><span
                                    class="text-muted">&nbsp;(48)</span></li>
                            <li class="list-inline-item pe-1"><i
                                    class="fi-credit-card mt-n1 me-1 fs-base text-muted align-middle"></i>$$
                            </li>
                            <li class="list-inline-item pe-1"><i
                                    class="fi-map-pin mt-n1 me-1 fs-base text-muted align-middle"></i>1.4 km do centro
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Item-->
                <div>
                    <div class="position-relative">
                        <div class="position-relative mb-3">
                            <button
                                class="btn btn-icon btn-light-primary btn-xs text-primary rounded-circle position-absolute top-0 end-0 m-3 zindex-5"
                                type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to Favorites"><i class="fi-heart"></i></button>
                            <img class="rounded-3" src="img/city-guide/catalog/02.jpg" alt="Image">
                        </div>
                        <h3 class="mb-2 fs-lg"><a class="nav-link stretched-link" href="city-guide-single.html">Cataratas do Iguaçu</a></h3>
                        <ul class="list-inline mb-0 fs-xs">
                            <li class="list-inline-item pe-1"><i
                                    class="fi-star-filled mt-n1 me-1 fs-base text-warning align-middle"></i><b>4.8</b><span
                                    class="text-muted">&nbsp;(24)</span></li>
                            <li class="list-inline-item pe-1"><i
                                    class="fi-credit-card mt-n1 me-1 fs-base text-muted align-middle"></i>$$$
                            </li>
                            <li class="list-inline-item pe-1"><i
                                    class="fi-map-pin mt-n1 me-1 fs-base text-muted align-middle"></i>0.5 km do centro
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Item-->
                <div>
                    <div class="position-relative">
                        <div class="position-relative mb-3">
                            <button
                                class="btn btn-icon btn-light-primary btn-xs text-primary rounded-circle position-absolute top-0 end-0 m-3 zindex-5"
                                type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to Favorites"><i class="fi-heart"></i></button>
                            <img class="rounded-3" src="img/city-guide/catalog/03.jpg" alt="Image">
                        </div>
                        <h3 class="mb-2 fs-lg"><a class="nav-link stretched-link" href="city-guide-single.html">Iguaçu Secret Falls</a></h3>
                        <ul class="list-inline mb-0 fs-xs">
                            <li class="list-inline-item pe-1"><i
                                    class="fi-star-filled mt-n1 me-1 fs-base text-warning align-middle"></i><b>4.9</b><span
                                    class="text-muted">&nbsp;(43)</span></li>
                            <li class="list-inline-item pe-1"><i
                                    class="fi-credit-card mt-n1 me-1 fs-base text-muted align-middle"></i>$$$
                            </li>
                            <li class="list-inline-item pe-1"><i
                                    class="fi-map-pin mt-n1 me-1 fs-base text-muted align-middle"></i>1.8 km do centro
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Item-->
                <div>
                    <div class="position-relative">
                        <div class="position-relative mb-3">
                            <button
                                class="btn btn-icon btn-light-primary btn-xs text-primary rounded-circle position-absolute top-0 end-0 m-3 zindex-5"
                                type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Add to Favorites"><i class="fi-heart"></i></button>
                            <img class="rounded-3" src="img/city-guide/catalog/04.jpg" alt="Image">
                        </div>
                        <h3 class="mb-2 fs-lg"><a class="nav-link stretched-link" href="city-guide-single.html">Fly Foz</a></h3>
                        <ul class="list-inline mb-0 fs-xs">
                            <li class="list-inline-item pe-1"><i
                                    class="fi-star-filled mt-n1 me-1 fs-base text-warning align-middle"></i><b>4.5</b><span
                                    class="text-muted">&nbsp;(13)</span></li>
                            <li class="list-inline-item pe-1"><i
                                    class="fi-credit-card mt-n1 me-1 fs-base text-muted align-middle"></i>$$
                            </li>
                            <li class="list-inline-item pe-1"><i
                                    class="fi-map-pin mt-n1 me-1 fs-base text-muted align-middle"></i>0.4 km do centro
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner + Where to eat-->

    <section class="container mt-n3 mt-md-0 mb-5 pb-lg-4">
        <h2 class="h3 mb-4 pb-2">
            O que há de novo em Foz do Iguaçu</h2>
        <!-- Carousel-->
        <div class="tns-carousel-wrapper">
            <div class="tns-carousel-inner"
                 data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#carousel-controls&quot;}">
                <!-- Item-->
                <div>
                    <div class="row">
                        <div class="col-md-7 mb-md-0 mb-3"><img class="position-relative rounded-3 zindex-5"
                                                                src="img/city-guide/home/new-1.jpg" alt="Article image">
                        </div>
                        <div class="col-md-5">
                            <h3 class="h4 from-top">Yup Star: Roda Gigante</h3>
                            <ul class="list-unstyled delay-2 from-end">
                                <li class="mb-1 fs-sm"><i class="fi-map-pin text-muted me-2 fs-base"></i>Ac. Três Fronteiras, 386 - Parque Res. Tres Fronteiras, Foz do Iguaçu - PR
                                </li>
                                <li class="mb-1 fs-sm"><i class="fi-clock text-muted me-2 fs-base"></i>19:00 – 23:00</li>
                                <li class="mb-1 fs-sm"><i class="fi-wallet text-muted me-2 fs-base"></i>$$</li>
                            </ul>
                            <p class="pb-2 delay-3 from-end d-none d-lg-block">Blandit lorem dictum in velit. Et nisi
                                at faucibus mauris pretium enim. Risus sapien nisi aliquam egestas leo dignissim
                                ut quis ac. Amet, cras orci justo, tortor nisl aliquet. Enim tincidunt tellus nunc,
                                nulla arcu posuere quis. Velit turpis orci venenatis risus felis, volutpat convallis
                                varius. Enim non euismod adipiscing a enim.</p>
                            <div class="delay-4 scale-up"><a class="btn btn-primary rounded-pill"
                                                             href="city-guide-single.html">Ver mais<i
                                        class="fi-chevron-right fs-sm ms-2"></i></a></div>
                        </div>
                    </div>
                </div>
                <!-- Item-->
                <div>
                    <div class="row">
                        <div class="col-md-7 mb-md-0 mb-3"><img class="position-relative rounded-3 zindex-5"
                                                                src="img/city-guide/home/new-2.jpg" alt="Article image">
                        </div>
                        <div class="col-md-5">
                            <h3 class="h4 from-top">Catuai Shopping</h3>
                            <ul class="list-unstyled delay-2 from-end">
                                <li class="mb-1 fs-sm"><i class="fi-map-pin text-muted me-2 fs-base"></i>Avenida das Cataratas, 3570 - Vila Yolanda – Foz do Iguaçu/PR
                                </li>
                                <li class="mb-1 fs-sm"><i class="fi-clock text-muted me-2 fs-base"></i>10:00 – 23:00
                                </li>
                                <li class="mb-1 fs-sm"><i class="fi-wallet text-muted me-2 fs-base"></i>$$</li>
                            </ul>
                            <p class="pb-2 delay-3 from-end d-none d-lg-block">Sem nibh urna id arcu. Quis tortor
                                vestibulum morbi volutpat. Et duis et sed tellus. Egestas ultrices viverra in pretium
                                nec. Dui ornare fusce vel fringilla scelerisque posuere pharetra ut. Dui donec sapien,
                                dictum nunc varius.</p>
                            <div class="delay-4 scale-up"><a class="btn btn-primary rounded-pill"
                                                             href="city-guide-single.html">Ver mais<i
                                        class="fi-chevron-right fs-sm ms-2"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel custom controls-->
        <div class="tns-carousel-controls pt-2 mt-4" id="carousel-controls">
            <button class="me-3" type="button"><i class="fi-chevron-left fs-xs"></i></button>
            <button type="button"><i class="fi-chevron-right fs-xs"></i></button>
        </div>
    </section>

</main>
<!-- Footer-->
<footer class="footer pt-lg-5 pt-4 bg-dark text-light">
    <div class="container mb-4 py-4 pb-lg-5">
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6 col-sm-4">
                <div class="mb-4 pb-sm-3"><a class="d-inline-block" href="city-guide-home-v1.html"><img
                            src="img/logo/logo-dark.png" width="116" alt="Logo"></a></div>
                <ul class="nav nav-light flex-column">
                    <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal text-light text-nowrap"
                                                 href="mailto:adm@lynce.net"><i
                                class="fi-mail mt-n1 me-1 align-middle text-primary"></i>adm@lynce.net</a></li>
                    <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal text-light text-nowrap"
                                                 href="tel:4065550120"><i
                                class="fi-device-mobile mt-n1 me-1 align-middle text-primary"></i>(45) 9 91325057</a>
                    </li>
                </ul>
            </div>
            <!-- Links-->
            <div class="col-lg-2 col-md-3 col-sm-4">
                <h3 class="fs-base text-light">Link Rápido</h3>
                <ul class="list-unstyled fs-sm">
                    <li><a class="nav-link-light" href="#">Top cidades</a></li>
                    <li><a class="nav-link-light" href="#">Melhores Restaurantes</a></li>
                    <li><a class="nav-link-light" href="#">Melhores Passeios</a></li>
                    <li><a class="nav-link-light" href="#">Eventos</a></li>
                </ul>
            </div>
            <!-- Links-->
            <div class="col-lg-2 col-md-3 col-sm-4">
{{--                <h3 class="fs-base text-light">Profile</h3>--}}
{{--                <ul class="list-unstyled fs-sm">--}}
{{--                    <li><a class="nav-link-light" href="#">My account</a></li>--}}
{{--                    <li><a class="nav-link-light" href="#">Favorites</a></li>--}}
{{--                    <li><a class="nav-link-light" href="#">My listings</a></li>--}}
{{--                    <li><a class="nav-link-light" href="#">Add listing</a></li>--}}
{{--                </ul>--}}
            </div>
            <!-- Subscription form-->
            <div class="col-lg-4 offset-lg-1">
                <h3 class="h4 text-light">
                    Assine a nossa newsletter</h3>
                <p class="fs-sm mb-4 opacity-60">
                    Não perca nenhuma noticia relevante!</p>
                <form class="form-group form-group-light rounded-pill" style="max-width: 500px;">
                    <div class="input-group input-group-sm"><span class="input-group-text text-muted"><i
                                class="fi-mail"></i></span>
                        <input class="form-control" type="email" placeholder="Seu email">
                    </div>
                    <button class="btn btn-primary btn-sm rounded-pill" type="button">Se inscrever</button>
                </form>
            </div>
        </div>
    </div>
    <div class="py-4 border-top border-light">
        <div class="container d-flex flex-column flex-lg-row align-items-center justify-content-between py-2">
            <!-- Copyright-->
            <p class="order-lg-1 order-2 fs-sm mb-2 mb-lg-0"><span class="text-light opacity-60">&copy; All rights reserved. Made by </span><a
                    class="nav-link-light fw-bold" href="https://lynce.net/" target="_blank" rel="noopener">Matteo Carminato
                    </a></p>
            <div class="d-flex flex-lg-row flex-column align-items-center order-lg-2 order-1 ms-lg-4 mb-lg-0 mb-4">
                <!-- Links-->
                <div class="d-flex flex-wrap fs-sm mb-lg-0 mb-4 pe-lg-4"><a class="nav-link-light px-2 mx-1" href="#">Sobre</a><a
                        class="nav-link-light px-2 mx-1" href="#">Blog</a><a class="nav-link-light px-2 mx-1" href="#">Suporte</a><a
                        class="nav-link-light px-2 mx-1" href="#">Contato</a></div>
                <div class="d-flex align-items-center">
                    <!-- Language switcher-->
                    <div class="dropdown"><a
                            class="nav-link nav-link-light dropdown-toggle fs-sm align-items-center p-0 fw-normal"
                            href="#" id="langSwitcher" data-bs-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fi-globe mt-n1 me-2 align-middle"></i>PT-Br</a>
                        <ul class="dropdown-menu dropdown-menu-dark my-1" aria-labelledby="langSwitcher">

                        </ul>
                    </div>
                    <!-- Socials-->
                    <div class="ms-4 ps-lg-2 text-nowrap"><a
                            class="btn btn-icon btn-translucent-light btn-xs rounded-circle ms-2" href="#"><i
                                class="fi-facebook"></i></a><a
                            class="btn btn-icon btn-translucent-light btn-xs rounded-circle ms-2" href="#"><i
                                class="fi-twitter"></i></a><a
                            class="btn btn-icon btn-translucent-light btn-xs rounded-circle ms-2" href="#"><i
                                class="fi-telegram"></i></a><a
                            class="btn btn-icon btn-translucent-light btn-xs rounded-circle ms-2" href="#"><i
                                class="fi-messenger"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span
        class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i
        class="btn-scroll-top-icon fi-chevron-up"> </i></a>
<!-- Vendor scrits: js libraries and plugins-->
<script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="vendor/simplebar/dist/simplebar.min.js"></script>
<script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="vendor/flatpickr/dist/flatpickr.min.js"></script>
<!-- Main theme script-->
<script src="js/theme.min.js"></script>
</body>

</html>
