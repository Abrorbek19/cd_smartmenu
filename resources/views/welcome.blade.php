<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="SmartMenu – restoranlar uchun onlayn va mobil menyu yaratish tizimi. Foydalanuvchilarga qulay va interaktiv menyu tajribasini taqdim etadi.">
    <meta name="keywords" content="onlayn menyu, raqamli menyu, restoran menyu, smart menyu, mobil menyu, menyu boshqaruvi, restoran texnologiyalari">
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website" />
    <meta property="og:title" content="SmartMenu - Interaktiv Onlayn Menyu" />
    <meta property="og:description" content="SmartMenu - restoranlar uchun interaktiv onlayn menyu. QR kod yordamida taomlar va narxlar haqida ma'lumot olish imkonini beradi." />
    <meta property="og:image" content="https://smartmenu.uz/assets/images/menu.png" />
    <meta property="og:url" content="https://www.smartmenu.uz" />

    <meta name="twitter:title" content="SmartMenu - Interaktiv Onlayn Menyu" />
    <meta name="twitter:description" content="SmartMenu - restoranlar uchun interaktiv onlayn menyu. QR kod yordamida menyu va narxlar haqida ma'lumot oling." />
    <meta name="twitter:image" content="https://smartmenu.uz/assets/images/menu.png" />


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS and dependencies (Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <meta name="facebook-domain-verification" content="uyffj8ms9gzmq98sk26pfhqjucf9t3" />
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1572155310220096');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1572155310220096&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Meta Pixel Code -->
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}" />
    <title>SmartMenu - Restoranlar uchun Onlayn va Mobil Menyu Yaratish Tizimi</title>
</head>
<body>
<header>
    <nav>
        <div class="nav__header">
            <div class="nav__logo">
                <a href="#" class="logo">
                    <img src="{{asset('assets/images/menu.png')}}" alt="logo" />
                    {{--                    <span>SmartMenu</span>--}}
                </a>
            </div>
            <div class="nav__menu__btn" id="menu-btn">
                <i class="ri-menu-line"></i>
            </div>
        </div>
        <ul class="nav__links" id="nav-links">
            <li><a href="#home">@lang('header.why')</a></li>
            <li><a href="#service">@lang('header.service')</a></li>
            <li><a href="#menu">@lang('header.partner')</a></li>
            <li>
                <a href="#contact">
                    <button class="btn">
                        <span><i class="ri-phone-line"></i></span>
                        @lang('header.connect')
                    </button>
                </a>
            </li>
            <li class="nav-item dropdown" style="list-style-type: none">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid flag-language"></i>
                    <span>{{ session('lang', 'uz') }}</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" data-bs-auto-close="outside">
                    <li><a class="dropdown-item" href="{{route('lang',"uz")}}">Uz</a></li>
                    <li><a class="dropdown-item" href="{{route('lang',"en")}}">En</a></li>
                    <li><a class="dropdown-item" href="{{route('lang',"ru")}}">Ru</a></li>
                </ul>
            </li>
        </ul>

    </nav>
    <div class="section__container header__container" id="home">
        <div class="header__image">
            <img src="{{asset('assets/images/sahifa2.png')}}" alt="header" />
        </div>
        @foreach($title->where('position', 'main') as $item)
            <div class="header__content">
                <div class="header__tag">
                    @lang('header.motorcycle')
                    <img src="{{ asset('assets/images/delivery-bike.png') }}" alt="header tag" />
                </div>
                {!! $item->{'title_'.\App::getLocale()} !!}
                <p class="section__description">
                    {{ $item->{'description_'.\App::getLocale()} }}
                </p>
                <div class="header__btns">
                                        <button class="btn"> @lang('header.ulanish')</button>
                                        <a href="#">
                                            <span><i class="ri-play-fill"></i></span>
                                            @lang('header.watch')
                                        </a>
                </div>
            </div>
        @endforeach

    </div>
</header>

<section class="section__container service__container" id="service">
    @foreach($title->where('position', 'offer') as $item)
        <p class="section__subheader">{!! $item->{'title_'.\App::getLocale()} !!}</p>
        <h2 class="section__header"> {{ $item->{'description_'.\App::getLocale()} }}</h2>
    @endforeach
    <div class="service__grid">
        @foreach($feature as $fiycha)
            <div class="service__card">
                <img src="{{ asset('/featuremains/' . $fiycha->icon) }}" alt="service icon" />
                <h4>{{ $fiycha->{'title_'.\App::getLocale()} }}</h4>
                <p>{{ $fiycha->{'description_'.\App::getLocale()} }}</p>
            </div>
        @endforeach
    </div>
</section>

<section class="section__container menu__container" id="menu">
    @foreach($title->where('position', 'client') as $item)
        <p class="section__subheader">{!! $item->{'title_'.\App::getLocale()} !!}</p>
        <h2 class="section__header">{{ $item->{'description_'.\App::getLocale()} }}</h2>
    @endforeach
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($restaurant as $restarans)
                <div class="swiper-slide">
                    <div class="menu__card">
                        <img src="{{ asset('storage/restaurants/' . $restarans->logo) }}" alt="menu" />
                        <div class="menu__card__details">
                            <h4>{{$restarans->name}}</h4>
                            {{--                        <a href="{{route('menu',$restarans->id)}}">--}}
                            {{--                            Menu--}}
                            {{--                            <span><i class="ri-arrow-right-line"></i></span>--}}
                            {{--                        </a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{--        <div class="download__btn" style="margin: 70px 0px;">--}}
    {{--            <a href="#form" class="a_form">--}}
    {{--                <button class="btn">@lang('form.hamkor')! </button>--}}
    {{--            </a>--}}
    {{--        </div>--}}
</section>

<section class="section__container client__container" id="client">
    @foreach($title->where('position', 'feedback') as $item)
        <p class="section__subheader">{!! $item->{'title_'.\App::getLocale()} !!}</p>
        <h2 class="section__header">{{ $item->{'description_'.\App::getLocale()} }}</h2>
    @endforeach
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($testimonial as $people)
                <div class="swiper-slide">
                    <p class="section__description">
                        {{ $people->{'description_'.\App::getLocale()} }}
                    </p>
                    <div class="client__details">
                        @if($people->image)
                            <img src="{{ asset('/storage/testimonial/'. $people->image) }}" alt="Meal Image" width="200px">
                        @else
                            <p>Rasm mavjud emas</p>
                        @endif
                        <div>
                            <h4>{{ $people->fullname }}</h4>
                            <h5>{{ $people->{'role_user_'.\App::getLocale()} }}</h5>
                        </div>
                    </div>
                    <div class="client__rating">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $people->star)
                                <span class="star filled">★</span> <!-- To'ldirilgan yulduz -->
                            @else
                                <span class="star">☆</span> <!-- Bo'sh yulduz -->
                            @endif
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="download__container" id="contact">
    <div class="section__container">
        <div class="download__image">
            <img src="{{asset('admin/assets/img/1000.png')}}" alt="download" />
        </div>
        <div class="download__content">
            @foreach($title->where('position', 'design') as $item)
                <p class="section__subheader">@lang('form.scanner')</p>
                <h2 class="section__header">{!! $item->{'title_'.\App::getLocale()} !!}</h2>
                <p class="section__description">
                    {!!   $item->{'description_'.\App::getLocale()} !!}
                </p>
            @endforeach
            <div class="download__btn">
                <a href="#form" class="a_form">
                    <button class="btn">@lang('form.create')! </button>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section__container client__container" id="form">
    <div class="client__content">
        @foreach($title->where('position', 'contact') as $item)
            <p class="section__subheader">{!! $item->{'title_'.\App::getLocale()} !!}</p>
            <h2 class="section__header" style="font-size: 1.5rem !important;line-height: 3.5rem !important;"> {!!   $item->{'description_'.\App::getLocale()} !!}</h2>
        @endforeach
        <!-- Yangi form bo'limi -->
        <div class="client__form">
            <form  id="contact123" method="post">
                <div class="form-group">
                    <label for="fullname">@lang('form.fullname')</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="restaurant_name">@lang('form.restaurant')</label>
                    <input type="text" id="restaurant_name" name="restaurant_name" required>
                </div>
                <div class="form-group">
                    <label for="phone">@lang('form.number')</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <button type="submit" class="btn">@lang('form.connect')</button>
            </form>
        </div>
    </div>
</section>


<footer>
    <div class="section__container footer__container">
        <div class="footer__col">
            <div class="footer__logo">
                <a href="#" class="logo">
                    <img src="{{asset('assets/images/menu.png')}}" alt="logo" />
                    <span>SmartMenu</span>
                </a>
            </div>
            <p class="section__description">
                @lang('footer.message')
            </p>
            <ul class="footer__socials">
                <li>
                    <a href="https://www.instagram.com/smartmenu.uz/" target="_blank"><i class="ri-instagram-fill"></i></a>
                </li>
                <li>
                    <a href="https://t.me/smartmenuuz" target="_blank"><i class="ri-telegram-fill"></i></a>
                </li>
                <li>
                    <a href="#"><i class="ri-twitter-fill"></i></a>
                </li>
            </ul>
        </div>
        <div class="footer__col">
            <h4>  @lang('footer.about')</h4>
            <ul class="footer__links">
                <li><a href="#">@lang('footer.about')</a></li>
                <li><a href="#">@lang('footer.service')</a></li>
                <li><a href="#">@lang('footer.support')</a></li>
                <li><a href="#">@lang('footer.menu')</a></li>
            </ul>
        </div>
        <div class="footer__col">
            <h4>@lang('footer.company')</h4>
            <ul class="footer__links">
                <li><a href="#">@lang('footer.whywe')</a></li>
                <li><a href="#">@lang('footer.partner')</a></li>
                <li><a href="#">@lang('footer.faq')</a></li>
                <li><a href="#">@lang('footer.blog')</a></li>
            </ul>
        </div>
        <div class="footer__col">
            <h4>@lang('footer.support')</h4>
            <ul class="footer__links">
                <li><a href="#">@lang('footer.check')</a></li>
                <li><a href="#">@lang('footer.center')</a></li>
                <li><a href="#">@lang('footer.feedback')</a></li>
                <li><a href="#">@lang('footer.contact')</a></li>
                <li><a href="#">@lang('footer.use')</a></li>
            </ul>
        </div>
    </div>
    <div class="footer__bar">
        @lang('footer.rights')
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{asset('assets/js/send.js')}}"></script>
<script src="{{asset('assets/js/js.js')}}"></script>
</body>
</html>
