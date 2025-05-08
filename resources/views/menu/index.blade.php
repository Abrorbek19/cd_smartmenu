@php use App\Enums\Status; @endphp
    <!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="{{asset('menu/assets/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('menu/assets/css/all.min.css')}}">
    <title>SmartMenu</title>
</head>

<body>
<!-- header -->
<input type="checkbox" id="cart"/>
<label for="cart" class="label-cart">
    <span class="fas fa-shopping-cart"></span>
    <span class="cart-count">0</span>
</label>

<div class="header">
    <div class="logo-container">

        <img src="{{asset('menu/assets/images/logo.png')}}" alt="Logo" class="logo-img">
        <h3 class="logo-text">{{ $restaurant->name }}</h3>
    </div>
</div>

<!-- sidebar -->
<div class="sidebar">
    <div class="sidebar-menu">
        <span class="fas fa-home"></span>
        <a href="#">@lang('menu.home')</a>
    </div>
    <div class="sidebar-menu open-btn" id="commentSettings">
        <span class="fas fa-comment"></span>
        <a href="#">@lang('menu.comment')</a>
    </div>
    <div class="sidebar-menu">
        <label for="cart" class="label-cart-1">
            <span class="fas fa-shopping-cart"></span>
            <a>@lang('menu.cart')</a>
            <span class="cart-count-1">0</span>
        </label>
    </div>
    <div class="sidebar-menu open-btn" id="openProfile">
        <span class="fas fa-user"></span>
        <a href="#">@lang('menu.profile')</a>
    </div>
    <div class="sidebar-menu open-btn" id="openSettings">
        <span class="fas fa-sliders-h"></span>
        <a href="#">@lang('menu.settings')</a>
    </div>
</div>
<!-- Opaque background overlay -->
<div class="overlay" id="overlay"></div>

<!-- Comment Popup -->

<div class="popup" id="commentPopup">
    <div class="popup-content">
        <div class="content-header">
            <h2>@lang('menu.izoh'):</h2>
            <button class="close-btn" id="commentCloseSettings">
                <i class="fas fa-close"></i>
            </button>
        </div>
        <hr class="divider">
        <!-- Check if there is a success message -->
        {{--        @if(session('success'))--}}
        {{--            <script type="text/javascript">--}}
        {{--                alert('{{ session('success') }}');--}}
        {{--            </script>--}}
        {{--        @endif--}}

        {{--        <!-- Check if there is an error message -->--}}
        {{--        @if(session('error'))--}}
        {{--            <script type="text/javascript">--}}
        {{--                alert('{{ session('error') }}');--}}
        {{--            </script>--}}
        {{--        @endif--}}


        <!-- Toggle Buttons -->
        <div class="toggle-buttons">
            <button type="button" class="toggle-btn active" id="restaurantBtn">@lang('menu.restoran')</button>
            <button type="button" class="toggle-btn" id="serviceBtn">@lang('menu.ilova')</button>
        </div>

        <form id="commentForm" action="{{ route('feedback-store') }}" method="POST">
            @csrf
            <input type="hidden" id="restaurantIdField" name="restaurant_id" value="{{$id}}">
            <!-- Restaurant Comment Section -->
            <div class="comment-section" id="restaurantComment">
                <div class="star-rating">
                    <input class="start_input" type="radio" id="star5" name="restaurant_star" value="5"/>
                    <label for="star5" class="star">★</label>
                    <input class="start_input" type="radio" id="star4" name="restaurant_star" value="4"/>
                    <label for="star4" class="star">★</label>
                    <input class="start_input" type="radio" id="star3" name="restaurant_star" value="3"/>
                    <label for="star3" class="star">★</label>
                    <input class="start_input" type="radio" id="star2" name="restaurant_star" value="2"/>
                    <label for="star2" class="star">★</label>
                    <input class="start_input" type="radio" id="star1" name="restaurant_star" value="1"/>
                    <label for="star1" class="star">★</label>
                </div>
                <textarea id="restaurantCommentText" name="restaurant_text" rows="4"
                          placeholder="@lang('menu.restoran_desc')"></textarea>
                @error('restaurant_text')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Service Comment Section -->
            <div class="comment-section" id="serviceComment" style="display: none;">
                <div class="star-rating">
                    <input class="start_input" type="radio" id="serviceStar5" name="service_star" value="5"/>
                    <label for="serviceStar5" class="star">★</label>
                    <input class="start_input" type="radio" id="serviceStar4" name="service_star" value="4"/>
                    <label for="serviceStar4" class="star">★</label>
                    <input class="start_input" type="radio" id="serviceStar3" name="service_star" value="3"/>
                    <label for="serviceStar3" class="star">★</label>
                    <input class="start_input" type="radio" id="serviceStar2" name="service_star" value="2"/>
                    <label for="serviceStar2" class="star">★</label>
                    <input class="start_input" type="radio" id="serviceStar1" name="service_star" value="1"/>
                    <label for="serviceStar1" class="star">★</label>
                </div>
                <textarea id="serviceCommentText" name="service_text" rows="4"
                          placeholder="@lang('menu.ilova_desc')"></textarea>
                @error('service_text')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="popup-buttons">
                <button type="submit" class="btn feedback-btn">@lang('menu.izoh_btn')</button>
            </div>
        </form>
    </div>
</div>


<div class="popup" id="profilePopup">
    <div class="popup-content">
        <div class="content-header">
            <img src="{{ asset('restaurants/'. $restaurant->logo) }}" alt="Restaurant Logo"
                 class="restaurant-logo">
            <h2>{{ $restaurant->name }}</h2>
            <button class="close-btn" id="closeProfile">
                <i class="fas fa-close"></i>
            </button>
        </div>
        <hr class="divider">
        <div class="content-details">
            <p><i class="fas fa-phone"></i> {{ $restaurant->phone_number }}</p>
            <p><i class="fas fa-map-location"></i> {{ $restaurant->{'address_'.app()->getLocale()} }}</p>
            <p><i class="fas fa-percentage"></i> {{ $restaurant->tax }} %</p>
            <p><i class="fas fa-calendar-week"></i> {{ $restaurant->{'start_work_day_'.app()->getLocale()} }}
                - {{ $restaurant->{'end_work_day_'.app()->getLocale()} }}</p>
            <div class="row">
                <div class="col-6">
                    <p style="margin-left: 25px"><i
                            class="fas fa-clock-four"></i> {{ \Carbon\Carbon::parse($restaurant->work_time_start)->format('H:i') }}
                        - {{ \Carbon\Carbon::parse($restaurant->work_time_end)->format('H:i') }}</p>
                </div>
                @if($restaurant->delivery_time)
                    <div class="col-6">
                        <h5>@lang('menu.dostavka'):</h5>
                        <p>{{$restaurant->delivery_time}}</p>
                    </div>
                @endif
            </div>
            @if($restaurant->location)
                <div style="background: #f8f9fa; padding: 20px; border-radius: 16px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
                    <a href="{{ $restaurant->location }}"
                       class="btn btn-outline-primary d-inline-flex align-items-center gap-2"
                       target="_blank"
                       style="border-radius: 12px; padding: 10px 20px; font-weight: 500; transition: 0.3s;">
                        <i class="fa-solid fa-route"></i> @lang('menu.location')
                    </a>
                </div>
            @endif


            <div>
                @if($restaurant->instagram)
                    <a class="btn btn-instagram" target="_blank" href="{{$restaurant->instagram}}"><i
                            class="fa-brands fa-instagram"></i> Instagram</a>
                @endif
                @if($restaurant->telegram)
                    <a class="btn btn-telegram" target="_blank" href="{{$restaurant->telegram}}"><i
                            class="fa-brands fa-telegram"></i> Telegram</a>
                @endif
                @if($restaurant->youtube)
                    <a href="{{$restaurant->youtube}}" class="btn youtube-button" target="_blank"><i
                            class="fa-brands fa-youtube"></i> YouTube</a>
                @endif
                @if($restaurant->tiktok)
                    <a href="{{$restaurant->tiktok}}" class="btn tiktok-button" target="_blank"><i
                            class="fa-brands fa-tiktok"></i> TikTok</a>
                @endif


            </div>
        </div>
    </div>


</div>


<!-- Settings Popup -->
<div class="popup" id="settingsPopup">
    <div class="popup-content">
        <div class="content-header">
            <h2>@lang('menu.language')</h2>
            <button class="close-btn" id="closeSettings">
                <i class="fas fa-close"></i>
            </button>
        </div>
        <hr class="divider">
        <div class="setting-item" data-id="{{ $id }}">
            <label class="language-option">
                <img src="{{ asset('menu/assets/images/rus.png') }}" class="cart-item-img" alt="">
                <span class="lang">Русский</span>
                <input type="radio" name="language" value="ru" onclick="changeLanguage(this.value)"
                    {{ session('lang', 'uz') == 'ru' ? 'checked' : '' }}>
            </label>
            <label class="language-option">
                <img src="{{ asset('menu/assets/images/uzb.png') }}" class="cart-item-img" alt="">
                <span class="lang">O'zbekcha</span>
                <input type="radio" name="language" value="uz" onclick="changeLanguage(this.value)"
                    {{ session('lang', 'uz') == 'uz' ? 'checked' : '' }}>
            </label>
            <label class="language-option">
                <img src="{{ asset('menu/assets/images/usa.png') }}" class="cart-item-img" alt="">
                <span class="lang">English</span>
                <input type="radio" name="language" value="en" onclick="changeLanguage(this.value)"
                    {{ session('lang', 'uz') == 'en' ? 'checked' : '' }}>
            </label>
        </div>

    </div>
</div>


<div class="dashboard">
    <div class="dashboard-banner">
        <img src="{{ asset('/restaurants/'. $restaurant->logo) }}" alt="Restaurant Logo">
    </div>

    @if(session()->has('success'))
        @if(app()->getLocale() ==='uz')
            <div class="alert alert-success" role="alert">
                Fikr-mulohazangiz uchun tashakkur! Yana xizmat ko'rsatishdan mamnun bo'lamiz!
                <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
            </div>
        @elseif(app()->getLocale() ==='ru')
            <div class="alert alert-success" role="alert">
                Спасибо за ваш отзыв! Мы будем рады служить Вам снова!
                <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
            </div>
        @elseif(app()->getLocale() ==='en')
            <div class="alert alert-success" role="alert">
                Thanks for your feedback! We will be happy to serve you again!
                <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
            </div>
        @endif
    @endif

    <div class="dashboard-menu">

        <!-- Menu Categories -->
        @foreach($categories as $category)

            <a href="#" data-filter="{{ $category->{'name_'.app()->getLocale()} }}"
               class="category-link">{{ $category->{'name_'.app()->getLocale()}  }}</a>
        @endforeach
    </div>
    <div class="dashboard-content">
        @foreach($categories as $category)
            <h1 class="title-category"
                id="{{ $category->{'name_'.app()->getLocale()} }}">{{ $category->{'name_'.app()->getLocale()} }} </h1>
            <div class="category-title">
                <!-- Meals under this category -->
                @foreach($category->meals->where('status', Status::ACTIVE->value) as $meal)
                    <div class="dashboard-card">
                        <!-- Display meal image -->
                        <img class="card-image" src="{{ asset('meals/' . $meal->photo) }}"
                             alt="{{ $meal->{'name_'.app()->getLocale()} }}">

                        <!-- Meal details -->
                        <div class="card-detail">
                            <h4>{{ $meal->{'name_'.app()->getLocale()} }} <span>{{ $meal->price }} UZS</span></h4>
                            <p class="description">{{ $meal->{'description_'.app()->getLocale()} }}</p>
                            {{--                            <p class="card-time"><span class="fas fa-clock"></span> {{ $meal->time }} mins</p>--}}
                            {{--                            <p class="card-time"><span class="fas fa-clock"></span> {{ $meal->weight }} </p>--}}
                            <div class="card-details">
                                <span class="card-time"> <i class="fas fa-clock"></i> {{ $meal->time }} mins</span>
                                <span class="card-time"> <i
                                        class="fa-solid fa-weight-scale"></i> {{ $meal->weight }} </span>
                            </div>

                            <!-- Add to Cart button -->
                            <div class="btn-div" data-id="{{ $meal->id }}">
                                <button class="add-to-cart"
                                        data-name="{{ $meal->{'name_'.app()->getLocale()} }}"
                                        data-img="{{ asset('storage/meals/' . $meal->photo) }}"
                                        data-price="{{ $meal->price }}">
                                    <i class="fas fa-plus"></i> @lang('menu.savat')
                                </button>
                            </div>

                            <!-- Cart info (if needed) -->
                            <div class="btn_cart_info" data-id="{{ $meal->id }}">
                                <!-- Additional info for the cart, if required -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

</div>
<!-- other dashboard -->

<label for="cart" class="label-cart-close" id="label-cart-close">
    <span class="fas fa-close"></span>
</label>
<div class="dashboard-order">
    <h3>@lang('menu.order')</h3>
    <div class="order-address">
        <p>@lang('menu.manzil')</p>
        <h4>{{ $restaurant->{'address_'.app()->getLocale()} }}</h4>
    </div>

    @if($restaurant->delivery_time)
        <div class="col-12" style="margin-top: 20px">
            <h4>@lang('menu.dostavka'):</h4>
            <p>{{$restaurant->delivery_time}}</p>
        </div>
    @endif

    {{--    <form action="{{route('send-telegram')}}" method="POST" id="order-form">--}}
    {{--    <div class="order-wrapper">--}}
    {{--    </div>--}}
    {{--    <input type="hidden" id="tax_cafe" value="{{$restaurant->tax}}">--}}
    {{--    <div class="footer_order">--}}
    {{--        <div class="order-total">--}}
    {{--            <p>@lang('menu.buyurtma'): <span id="subtotal">0</span></p>--}}
    {{--            <p>@lang('menu.tax') ({{$restaurant->tax}}%): <span id="tax">0</span></p>--}}
    {{--            <p id="tax-line" style="display: none;">@lang('menu.tax') (<span id="tax-cafe">{{$restaurant->tax}}</span>%): <span id="tax">0</span></p>--}}
    {{--            <hr class="divider">--}}
    {{--            <p>@lang('menu.total'): <span id="total">0</span></p>--}}
    {{--        </div>--}}
    {{--        <div class="order-total">--}}
    {{--            <div class="option">--}}
    {{--                <label>@lang('menu.buyurtma_turi')</label>--}}
    {{--            </div>--}}
    {{--            <div class="option">--}}
    {{--                <label>--}}
    {{--                    <input type="checkbox" name="dostavka">--}}
    {{--                    @lang('menu.yetkazib')--}}
    {{--                </label>--}}
    {{--            </div>--}}
    {{--            <div class="option">--}}
    {{--                <label>--}}
    {{--                    <input type="checkbox" name="olib_ketish">--}}
    {{--                    @lang('menu.olib_ketish')--}}
    {{--                </label>--}}
    {{--            </div>--}}
    {{--            <div class="option">--}}
    {{--                <label>--}}
    {{--                    <input type="checkbox" name="zalda">--}}
    {{--                    @lang('menu.zalda')--}}
    {{--                </label>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="order-total">--}}
    {{--            <div class="option">--}}
    {{--                <label>@lang('menu.pay')</label>--}}
    {{--            </div>--}}
    {{--            <div class="option">--}}
    {{--                <label>--}}
    {{--                    <input type="checkbox" name="click">--}}
    {{--                    @lang('menu.click')--}}
    {{--                </label>--}}
    {{--            </div>--}}
    {{--            <div class="option">--}}
    {{--                <label>--}}
    {{--                    <input type="checkbox" name="payme">--}}
    {{--                    @lang('menu.payme')--}}
    {{--                </label>--}}
    {{--            </div>--}}
    {{--            <div class="option">--}}
    {{--                <label>--}}
    {{--                    <input type="checkbox" name="naqd">--}}
    {{--                    @lang('menu.naqd')--}}
    {{--                </label>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="order-total">--}}
    {{--            <input type="hidden" name="restaran_id" id="restaran_ids" value="{{$restaurant->id}}">--}}
    {{--            <label>--}}
    {{--                <input type="text" name="fullname" id="fullname" placeholder="@lang('form.ism')" required>--}}
    {{--            </label>--}}
    {{--            <label>--}}
    {{--                <input type="tel" name="number" id="number" placeholder="@lang('form.telefon')...." required>--}}
    {{--            </label>--}}
    {{--            <label id="address-label" style="display: none;">--}}
    {{--                <input type="text" name="address" id="address" placeholder="@lang('form.manzil')" />--}}
    {{--            </label>--}}
    {{--        </div>--}}
    {{--        <button class="checkout">@lang('menu.confirm')</button>--}}
    {{--    </div>--}}
    {{--    </form>--}}
</div>


<script>
    function changeLanguage(lang) {
        // Div elementidan `id` qiymatini olish
        const id = document.querySelector('.setting-item').getAttribute('data-id');

        // Tilingizni yangilash uchun /lang route-ga o'ting va keyin menu sahifasiga qaytaring
        fetch(`{{ route('lang', '') }}/${lang}`)
            .then(response => {
                if (response.ok) {
                    // Til o'zgartirilgandan so'ng, 'menu' route-ga qaytarish
                    window.location.href = `{{ url('/restaran') }}/${id}`;
                }
            })
            .catch(error => console.error('Error changing language:', error));
    }

    // JavaScript to toggle comment sections and set status
    document.getElementById('restaurantBtn').addEventListener('click', function () {
        document.getElementById('restaurantComment').style.display = 'block';
        document.getElementById('serviceComment').style.display = 'none';
        // document.getElementById('statusField').value = 0; // Set status to 0 for restaurant
    });

    document.getElementById('serviceBtn').addEventListener('click', function () {
        document.getElementById('serviceComment').style.display = 'block';
        document.getElementById('restaurantComment').style.display = 'none';
        // document.getElementById('statusField').value = 1; // Set status to 1 for application
    });
</script>

<script>

    // Get the elements
    const openProfile = document.getElementById('openProfile');
    const openSettings = document.getElementById('openSettings');
    const commentSettings = document.getElementById('commentSettings');
    const commentPopup = document.getElementById('commentPopup');
    const closeComment = document.getElementById('commentCloseSettings');
    const closeProfile = document.getElementById('closeProfile');
    const closeSettings = document.getElementById('closeSettings');
    const overlay = document.getElementById('overlay');
    const profilePopup = document.getElementById('profilePopup');
    const settingsPopup = document.getElementById('settingsPopup');
    const cartPopup = document.getElementById('cart')

    // Barcha popuplarni olish
    // Barcha popuplarni olish
    const popups = [profilePopup, settingsPopup, commentPopup, cartPopup]; // Popups array

    // Close all popups
    function closeAllPopups() {
        popups.forEach(popup => popup.classList.remove('visible'));
        overlay.style.display = 'none';
        const cartCheckbox = document.getElementById('cart');
        if (cartCheckbox.checked) {
            cartCheckbox.checked = false; // Uncheck the cart checkbox
        }
    }

    // Open Profile Popup
    openProfile.addEventListener('click', () => {
        closeAllPopups(); // Close all popups
        profilePopup.classList.add('visible');
        overlay.style.display = 'block';
    });

    // Open Comment Popup
    commentSettings.addEventListener('click', () => {
        closeAllPopups(); // Close all popups
        commentPopup.classList.add('visible');
        overlay.style.display = 'block';
    });

    // Open Settings Popup
    openSettings.addEventListener('click', () => {
        closeAllPopups(); // Close all popups
        settingsPopup.classList.add('visible');
        overlay.style.display = 'block';
    });

    cartPopup.addEventListener('change', () => {
        if (cartPopup.checked) {
            closeAllPopups(); // Close all popups
            cartPopup.checked = true
            // cartPopup.classList.add('visible');
            // overlay.style.display = 'block';
        } else {
            cartPopup.checked = false
            // cartPopup.classList.remove('visible');
            // overlay.style.display = 'none';
        }
    });

    const closeCartButton = document.getElementById('label-cart-close');

    closeCartButton.addEventListener('change', () => {
        if (cartPopup.checked) {
            closeAllPopups();
            cartPopup.checked = false
        }
    });

    // Close buttons for the popups
    closeComment.addEventListener('click', () => {
        commentPopup.classList.remove('visible');
        overlay.style.display = 'none';
    });

    closeProfile.addEventListener('click', () => {
        profilePopup.classList.remove('visible');
        overlay.style.display = 'none';
    });

    closeSettings.addEventListener('click', () => {
        settingsPopup.classList.remove('visible');
        overlay.style.display = 'none';
    });

    // Close all popups when clicking the overlay
    overlay.addEventListener('click', closeAllPopups);

    const restaurantBtn = document.getElementById("restaurantBtn");
    const serviceBtn = document.getElementById("serviceBtn");
    const restaurantComment = document.getElementById("restaurantComment");
    const serviceComment = document.getElementById("serviceComment");

    restaurantBtn.addEventListener("click", () => {
        restaurantBtn.classList.add("active");
        serviceBtn.classList.remove("active");
        restaurantComment.style.display = "block";
        serviceComment.style.display = "none";
    });

    serviceBtn.addEventListener("click", () => {
        serviceBtn.classList.add("active");
        restaurantBtn.classList.remove("active");
        restaurantComment.style.display = "none";
        serviceComment.style.display = "block";
    });

    let cart = [];
    let cartCount = 0;

    // Get the cart count badge element
    const cartCountBadge = document.querySelector('.cart-count');
    const cartCountBadge_1 = document.querySelector('.cart-count-1');

    // Function to add items to the cart
    function addToCart(itemId, itemName, itemPrice, itemImg) {
        let item = cart.find(i => i.id === itemId);
        if (item) {
            item.quantity++;
        } else {
            cart.push({id: itemId, name: itemName, price: itemPrice, img: itemImg, quantity: 1});
        }
        updateCartCount();
        updateCartDisplay(itemId);
    }

    // Function to update the cart count
    function updateCartCount() {
        cartCount = cart.reduce((total, item) => total + item.quantity, 0);
        cartCountBadge.textContent = cartCount;
        cartCountBadge_1.textContent = cartCount;

        // Show or hide the badge based on cart count
        if (cartCount > 0) {
            cartCountBadge.style.display = 'flex';
            cartCountBadge_1.style.display = 'flex';
        } else {
            cartCountBadge.style.display = 'none';
            cartCountBadge_1.style.display = 'none';
        }
    }

    // Function to decrease quantity or remove an item
    function decreaseQuantity(name, itemId) {
        const item = cart.find(cartItem => cartItem.name === name);
        if (item && item.quantity > 1) {
            item.quantity--;
        } else if (item && item.quantity === 1) {
            const index = cart.indexOf(item);
            cart.splice(index, 1);
        }
        updateCartCount();
        updateCartDisplay(itemId);
    }

    // Function to increase quantity
    function increaseQuantity(name, itemId) {
        const item = cart.find(cartItem => cartItem.name === name);
        if (item) {
            item.quantity++;
        }
        updateCartCount();
        updateCartDisplay(itemId);
    }

    // Add event listeners to the "Add to Cart" buttons
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function () {
            const itemId = this.closest('.btn-div').dataset.id;
            const itemName = this.dataset.name;
            const itemPrice = parseFloat(this.dataset.price.replace(/\s/g, ''));
            const itemImg = this.dataset.img;

            addToCart(itemId, itemName, itemPrice, itemImg);
        });
    });

    // Update the cart display logic as needed
    function updateCartDisplay(itemId) {
        const BtnDiv = document.querySelector(`.btn-div[data-id="${itemId}"]`);
        const BtnInfo = document.querySelector(`.btn_cart_info[data-id="${itemId}"]`);

        if (!BtnDiv || !BtnInfo) return;

        BtnInfo.innerHTML = '';
        const itemInCart = cart.find(item => item.id === itemId);

        if (!itemInCart) {
            BtnDiv.style.display = 'block';
            BtnInfo.innerHTML = '';
        } else {
            BtnDiv.style.display = 'none';

            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item-btn');
            cartItem.innerHTML = `
            <div class="cart-item-controls">
            <button class="minus" onclick="decreaseQuantity('${itemInCart.name.replace(/'/g, "\\'")}', '${itemInCart.id}')"><i class="fas fa-minus"></i></button>
                <span>${itemInCart.quantity}</span>
            <button class="plus" onclick="increaseQuantity('${itemInCart.name.replace(/'/g, "\\'")}', '${itemInCart.id}')"><i class="fas fa-plus"></i></button>
            </div>
            `;

            BtnInfo.appendChild(cartItem);
        }
        updateCartSummary()
    }


    function updateCartSummary() {
        const cartWrapper = document.querySelector('.order-wrapper');
        cartWrapper.innerHTML = ''; // Clear the previous cart display
        let subtotal = 0;
        const taxRate = parseFloat(document.getElementById('tax_cafe').value) / 100;

        // Checkboxlarni tekshirish
        const zaldaCheckbox = document.querySelector('input[name="zalda"]').checked;

        // Loop through cart items and calculate subtotal
        cart.forEach(item => {
            subtotal += item.price * item.quantity; // Calculate subtotal
            const formattedPrice = Math.floor(item.price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');

            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
        <div class="cart-item-details">
            <img src="${item.img}" class="cart-item-img">
            <p>${item.name} - </p>
            <p id="price"> ${formattedPrice} </p>
        </div>
        <div class="cart-item-controls">
            <button class="minus" onclick="decreaseQuantity('${item.name.replace(/'/g, "\\'")}', '${item.id}')"><i class="fas fa-minus"></i></button>
            <span>${item.quantity}</span>
            <button class="plus" onclick="increaseQuantity('${item.name.replace(/'/g, "\\'")}', '${item.id}')"><i class="fas fa-plus"></i></button>
        </div>
        `;
            cartWrapper.appendChild(cartItem);
        });

        // Calculate tax only if "Zalda" checkbox is checked
        let tax = 0;
        if (zaldaCheckbox) {
            tax = subtotal * taxRate;
            document.getElementById('tax-line').style.display = 'block'; // Show tax line
        } else {
            document.getElementById('tax-line').style.display = 'none'; // Hide tax line
        }

        // Calculate total
        const total = subtotal + tax;

        // Format values for display
        const formattedSubtotal = Math.floor(subtotal).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
        const formattedTax = Math.floor(tax).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
        const formattedTotal = Math.floor(total).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');

        // Update HTML
        document.getElementById('subtotal').textContent = formattedSubtotal;
        document.getElementById('tax').textContent = formattedTax;
        document.getElementById('total').textContent = formattedTotal;
    }

    const messages = {
        buyurtma: {
            'uz': 'Iltimos, buyurtma turini tanlang!',
            'ru': 'Пожалуйста, выберите тип заказа!',
            'en': 'Please select an order type!'
        },
        payment: {
            'uz': 'Iltimos, to\'lov turini tanlang!',
            'ru': 'Пожалуйста, выберите способ оплаты!',
            'en': 'Please select a payment type!',
        },
        success: {
            'uz': 'Buyurtmangiz qabul qilindi!',
            'ru': 'Ваш заказ был принят!',
            'en': 'Your order has been accepted!'
        },
        error: {
            'uz': 'Buyurtma qabul qilishda xatolik bor:',
            'ru': 'Произошла ошибка при принятии заказа:',
            'en': 'An error occurred while accepting the order:'
        },
        systemError: {
            'uz': 'Tizimda xatolik yuz berdi. Iltimos, qayta urinib ko‘ring.',
            'ru': 'В системе произошла ошибка. Пожалуйста, попробуйте еще раз.',
            'en': 'A system error occurred. Please try again.'
        }
    };

    const currentLang = "{{ app()->getLocale() }}"; // Foydalanuvchi tili

    // // Select the delivery option checkbox and address input field
    // const deliveryCheckbox = document.querySelector('input[name="dostavka"]');
    // const addressLabel = document.getElementById('address-label');
    //
    //
    // // Listen for changes in the "Yetkazib berish" checkbox
    // deliveryCheckbox.addEventListener('change', function () {
    //     if (this.checked) {
    //         // Show the address input field when "Yetkazib berish" is selected
    //         addressLabel.style.display = 'block';
    //         document.getElementById('address').setAttribute('required', 'required');
    //     } else {
    //         // Hide the address input field and remove its requirement
    //         addressLabel.style.display = 'none';
    //         document.getElementById('address').removeAttribute('required');
    //     }
    // });

    // 1) Barcha checkboxlarni tanlab olish
    const deliveryOptionss = document.querySelectorAll('input[name="dostavka"], input[name="olib_ketish"], input[name="zalda"]');

    // 2) Manzil maydonlarini olish
    const addressLabel = document.getElementById('address-label');
    const addressInput = document.getElementById('address');

    // 3) Checkboxlar o'zgarganda ishlaydigan funksiya
    function handleDeliveryOptions(event) {
        // Bosilgan checkbox
        const clickedCheckbox = event.target;

        // Faqat bitta tanlansin (xohlasangiz):
        deliveryOptionss.forEach(other => {
            if (other !== clickedCheckbox) {
                other.checked = false;
            }
        });

        // "Yetkazib berish" belgilanganda manzil maydonini ko‘rsatish
        if (document.querySelector('input[name="dostavka"]').checked) {
            addressLabel.style.display = 'block';
            addressInput.setAttribute('required', 'required');
        } else {
            // Aks holda manzil maydonini yashirish
            addressLabel.style.display = 'none';
            addressInput.removeAttribute('required');
            addressInput.value = ''; // Kerak bo‘lsa, formani tozalab ham yuborish mumkin
        }
    }

    // 4) Har bir checkboxga event o'rnatish
    deliveryOptionss.forEach(checkbox => {
        checkbox.addEventListener('change', handleDeliveryOptions);
    });

    document.getElementById('order-form').addEventListener('submit', function (event) {
        event.preventDefault();  // Prevent form submission

        // Get user input (name, phone)
        const fullname = document.querySelector('#fullname').value;
        const phone = document.querySelector('#number').value;

        // Buyurtma turini aniqlash
        let orderType = '';
        if (document.querySelector('input[name="dostavka"]').checked) {
            orderType = "Yetkazib berish";
        } else if (document.querySelector('input[name="olib_ketish"]').checked) {
            orderType = "Olib ketish";
        } else if (document.querySelector('input[name="zalda"]').checked) {
            orderType = "Zalda xizmat";
        } else {
            alert(messages.buyurtma[currentLang]); // Tanlash haqida xabar
            return;
        }

        // Tolov turini

        let paymentType = '';
        if (document.querySelector('input[name="click"]').checked) {
            paymentType = "Click";
        } else if (document.querySelector('input[name="payme"]').checked) {
            paymentType = "Payme";
        } else if (document.querySelector('input[name="naqd"]').checked) {
            paymentType = "Naqd pul";
        } else {
            alert(messages.payment[currentLang]); // Tanlash haqida xabar
            return;
        }

        // Savatcha ma'lumotlarini tayyorlash
        let cartItems = '';
        let totalAmount = 0;
        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            totalAmount += itemTotal;

            cartItems += `${escapeMarkdown(item.name)} - ${item.quantity} x ${item.price} = ${itemTotal}\n`;
        });

        // Soliqni hisoblash
        const Tax_Restaran = document.getElementById('tax_cafe');
        const zaldaCheckbox = document.querySelector('input[name="zalda"]');
        let taxRateDisplay = 0; // Default: 0% tax
        let taxRate = 0;
        let tax = 0;
        let address = null;
        if (zaldaCheckbox.checked) {
            taxRate = Tax_Restaran.value; // Zalda bo'lsa, foizni oladi
            taxRateDisplay = Math.floor(taxRate).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ')
            tax = totalAmount * (taxRate / 100);
        }

        const Constdostavka = document.querySelector('input[name="dostavka"]');
        if (Constdostavka.checked) {
            address = document.getElementById('address').value;
        }

        const total = totalAmount + tax;

        // Formatlangan summalarni yaratish
        const formattedSubtotal = Math.floor(totalAmount).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
        const formattedTax = Math.floor(tax).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
        const formattedTotal = Math.floor(total).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');

        const telegramMessage = `
Yangi buyurtma

Mijoz ismi:${fullname}
Telefon raqam:${phone}
${Constdostavka.checked ? `Manzil: ${address}\n` : ''}

Buyurtma turi: ${orderType}

To'lov turi: ${paymentType}

Buyurtma tafsilotlari:
${cartItems}

Yig'indi:${formattedSubtotal} UZS
Xizmat haqqi:(${taxRateDisplay}%): ${formattedTax} UZS
Jami narx:${formattedTotal} UZS
`;
        {{--    // Telegramga yuborish--}}
        {{--    fetch("{{ route('send-telegram') }}", {--}}
        {{--        method: "POST",--}}
        {{--        headers: {--}}
        {{--            'Content-Type': 'application/json',--}}
        {{--            'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
        {{--        },--}}
        {{--        body: JSON.stringify({--}}
        {{--            message: telegramMessage,--}}
        {{--            restaran_id: document.getElementById('restaran_ids').value,--}}
        {{--        })--}}
        {{--    })--}}
        {{--        .then(response => response.json())--}}
        {{--        .then(data => {--}}
        {{--            console.log(data)--}}
        {{--            if (data.success) {--}}
        {{--                alert(messages.success[currentLang]); // Muvaffaqiyatli xabar--}}
        {{--                window.location.reload(); // Sahifani qayta yuklash--}}
        {{--            } else {--}}
        {{--                alert(`${messages.error[currentLang]} ${data.error || ''}`); // Xato xabari--}}
        {{--            }--}}
        {{--        })--}}
        {{--        .catch(error => {--}}
        {{--            console.error('Error sending order:', error); // Konsolda xato--}}
        {{--            alert(messages.systemError[currentLang]); // Tizim xatolik xabari--}}
        {{--        });--}}
        {{--});--}}
        {{--    function escapeMarkdown(text) {--}}
        {{--        const replace = {--}}
        {{--            '*': '\\*',--}}
        {{--            '_': '\\_',--}}
        {{--            '[': '\\[',--}}
        {{--            ']': '\\]',--}}
        {{--            '(': '\\(',--}}
        {{--            ')': '\\)',--}}
        {{--            '~': '\\~',--}}
        {{--            '`': '\\`',--}}
        {{--            '>': '\\>',--}}
        {{--            '#': '\\#',--}}
        {{--            '+': '\\+',--}}
        {{--            '-': '\\-',--}}
        {{--            '=': '\\=',--}}
        {{--            '|': '\\|',--}}
        {{--            '{': '\\{',--}}
        {{--            '}': '\\}',--}}
        {{--            '.': '\\.',--}}
        {{--            '!': '\\!'--}}
        {{--        };--}}
        {{--        return text.replace(/[*_~`>#\+\-=|{}.!]/g, match => replace[match]);--}}
        {{--    }--}}
        // Kategoriyalarni scroll qilish va aktiv qilish funksiyasi
        function scrollToActiveCategory() {
            const activeCategory = document.querySelector('.category-link.active'); // Aktiv kategoriya
            const parentContainer = document.querySelector('.dashboard-menu'); // Kategoriya konteyneri

            if (activeCategory && parentContainer) {
                const linkOffset = activeCategory.offsetLeft; // Aktiv kategoriya pozitsiyasi

                parentContainer.scrollTo({
                    left: linkOffset - parentContainer.offsetWidth / 2 + activeCategory.offsetWidth / 2,
                    behavior: 'smooth' // Silliq scroll
                });
            }
        }

        // Sahifa scroll qilishni kuzatish
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('.title-category'); // Bo'limlar
            const categoryLinks = document.querySelectorAll('.category-link'); // Kategoriya tugmalari
            let currentSection = null;

            sections.forEach(section => {
                const sectionTop = section.offsetTop - 150; // Bo'lim yuqori qismi
                const sectionBottom = section.offsetTop + section.offsetHeight - 150; // Bo'lim pastki qismi

                if (window.scrollY >= sectionTop && window.scrollY < sectionBottom) {
                    currentSection = section.getAttribute('id'); // Joriy bo'lim ID'si
                }
            });

            if (currentSection) {
                categoryLinks.forEach(link => {
                    link.classList.remove('active'); // Barcha kategoriyalardan `active` klassini o'chirish
                    if (link.getAttribute('data-filter') === currentSection) {
                        link.classList.add('active'); // Joriy bo'limga mos kategoriyaga `active` qo'shish
                    }
                });

                scrollToActiveCategory(); // Aktiv kategoriyani markazga olib kelish
            }
        });

        // Kategoriya bosilganda ishlaydigan kod
        document.querySelectorAll('.category-link').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // Linkning default xatti-harakatini oldini olish

                const filter = this.getAttribute('data-filter'); // Maqsadli bo'limni olish
                const targetSection = document.getElementById(filter); // Maqsad bo'lim
                const offset = 130; // Scrollni to'g'irlash uchun masofa

                if (targetSection) {
                    window.scrollTo({
                        top: targetSection.offsetTop - offset,
                        behavior: 'smooth' // Silliq scroll
                    });
                }

                document.querySelectorAll('.category-link').forEach(item => item.classList.remove('active')); // Barcha aktivlarni o'chirish
                this.classList.add('active'); // Joriy linkni aktiv qilish

                scrollToActiveCategory(); // Aktiv kategoriyani markazga olib kelish
            });
        });

        let lastScrollPos = 0;
        const scrollThreshold = 50; // Adjust threshold to detect changes more promptly

        window.addEventListener('scroll', function () {
            let currentScrollPos = window.scrollY || document.documentElement.scrollTop;

            // Only run the code if there's a significant scroll difference (improves performance)
            if (Math.abs(currentScrollPos - lastScrollPos) > scrollThreshold) {
                const sections = document.querySelectorAll('.title-category');

                sections.forEach(section => {
                    if (currentScrollPos >= section.offsetTop - 180) { // Adjust to 120 for an earlier trigger
                        const id = section.getAttribute('id');
                        document.querySelectorAll('.category-link').forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('data-filter') === id) {
                                link.classList.add('active');
                            }
                        });
                    }
                });

                lastScrollPos = currentScrollPos; // Update the last scroll position
            }
        });

        // Checkboxlarni boshqarish va yangilash
        // 1) BUYURTMA TURI CHECKBOXLARI
        const orderTypeCheckboxes = document.querySelectorAll('input[name="dostavka"], input[name="olib_ketish"], input[name="zalda"]');

        // 2) TO'LOV TURI CHECKBOXLARI
        const paymentTypeCheckboxes = document.querySelectorAll('input[name="click"], input[name="payme"], input[name="naqd"]');

        // Umumiy funksiya: bitta guruhda faqat bitta tanlash
        function handleSingleSelection(checkboxGroup) {
            checkboxGroup.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    if (this.checked) {
                        // Shu guruhdagi boshqa checkboxlarni o'chiramiz
                        checkboxGroup.forEach(other => {
                            if (other !== this) {
                                other.checked = false;
                            }
                        });
                    }
                    updateCartSummary(); // Sizda mavjud bo'lgan savatni yangilash funksiyasi
                });
            });
        }

        // Ikkala guruhga ham qo'llaymiz
        handleSingleSelection(orderTypeCheckboxes);
        handleSingleSelection(paymentTypeCheckboxes);
    })


</script>
</body>

</html>
