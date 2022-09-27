<div>
    @if ($topBanners != '')
    <section class="top_banner_wrapper">
        <!-- Swiper -->
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($topBanners as $topBanner)
                <div class="swiper-slide">
                    <div class="topbar_slider_item_area" style="
                  background-image: url({{ $topBanner->banner }});
                ">
                        <div class="my-container">
                            <div class="top_banner_area d-flex align-items-center justify-content-between g-sm">
                                <div>
                                    <a href="#" class="top_offer_btn">Great Offer</a>
                                </div>
                                <h3>
                                    {{ $topBanner->title }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- Header Section  -->
    <header class="header_wrapper" id="headerWrapper">
        <div class="mobile_topbar_wrapper" id="navbarWrapper">
            <div class="my-container">
                <div class="mobile_top_menu_area">
                    <div class="mobile_top_logo_area d-flex align-items-center g-sm">
                        <div class="logo">
                            <a href="/">
                                <img src="{{ $setting->header_logo }}" alt="logo" />
                            </a>
                        </div>
                    </div>
                    <ul class="topbar_list d-flex align-items-center flex-wrap-wrap">
                        <li class="cart_number" data-number="{{ $cartQty }}" id="cartButtonMobile">
                            <button type="button">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="header_list_icon">
                                    <path
                                        d="M0.750092 1.25L2.83009 1.61L3.79309 13.083C3.87009 14.02 4.65309 14.739 5.59309 14.736H16.5021C17.3991 14.738 18.1601 14.078 18.2871 13.19L19.2361 6.632C19.3421 5.899 18.8331 5.219 18.1011 5.113C18.0371 5.104 3.16409 5.099 3.16409 5.099"
                                        stroke="#13192B" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12.1251 8.79492H14.8981" stroke="#13192B" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.15438 18.2026C5.45538 18.2026 5.69838 18.4466 5.69838 18.7466C5.69838 19.0476 5.45538 19.2916 5.15438 19.2916C4.85338 19.2916 4.61038 19.0476 4.61038 18.7466C4.61038 18.4466 4.85338 18.2026 5.15438 18.2026Z"
                                        fill="#13192B" stroke="#13192B" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.4347 18.2026C16.7357 18.2026 16.9797 18.4466 16.9797 18.7466C16.9797 19.0476 16.7357 19.2916 16.4347 19.2916C16.1337 19.2916 15.8907 19.0476 15.8907 18.7466C15.8907 18.4466 16.1337 18.2026 16.4347 18.2026Z"
                                        fill="#13192B" stroke="#13192B" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                            <div class="cart_product_area" id="cartMobile">
                                @if ($cartQty > 0)
                                <div class="cart_product_item_wrapper">
                                    @foreach ($cartItems as $cartitem)
                                    <div class="cart_product_item d-flex align-items-center justify-content-between">
                                        <div class="cart_product_grid">
                                            <div class="cart_img">
                                                <a
                                                    href="{{ route('front.productDetails', ['slug' => $cartitem->slug]) }}">
                                                    <img src="{{ $cartitem->thumbnail }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="cart_content">
                                                <h3>
                                                    <a
                                                        href="{{ route('front.productDetails', ['slug' => $cartitem->slug]) }}">{{
                                                        $cartitem->name ?? '' }}</a>
                                                </h3>
                                                <h5><a href="">{{ $cartitem->seller_name ?? '' }}</a>
                                                </h5>
                                                @if ($cartitem->discount > 0)
                                                <h4>
                                                    {{ calculateDiscount($cartitem->unit_price, $cartitem->discount) }}
                                                    <del style="font-size: 12px;">{{ $cartitem->unit_price }}</del>
                                                </h4>
                                                @else
                                                <h4>{{ $cartitem->unit_price }}
                                                </h4>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="button" class="delete_btn"
                                            wire:click.prevent="deleteFromCart({{ $cartitem->cart_id }})">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.80046 3.53011C4.44899 3.17864 3.87914 3.17864 3.52767 3.53011C3.17619 3.88158 3.17619 4.45143 3.52767 4.8029L4.80046 3.53011ZM15.1943 16.4696C15.5458 16.821 16.1157 16.821 16.4671 16.4696C16.8186 16.1181 16.8186 15.5482 16.4671 15.1968L15.1943 16.4696ZM16.4671 4.8029C16.8186 4.45143 16.8186 3.88158 16.4671 3.53011C16.1157 3.17864 15.5458 3.17864 15.1943 3.53011L16.4671 4.8029ZM3.52767 15.1968C3.17619 15.5482 3.17619 16.1181 3.52767 16.4696C3.87914 16.821 4.44899 16.821 4.80046 16.4696L3.52767 15.1968ZM3.52767 4.8029L9.361 10.6362L10.6338 9.36344L4.80046 3.53011L3.52767 4.8029ZM9.361 10.6362L15.1943 16.4696L16.4671 15.1968L10.6338 9.36344L9.361 10.6362ZM10.6338 10.6362L16.4671 4.8029L15.1943 3.53011L9.361 9.36344L10.6338 10.6362ZM9.36099 9.36344L3.52767 15.1968L4.80046 16.4696L10.6338 10.6362L9.36099 9.36344Z"
                                                    fill="#EB5757" />
                                            </svg>
                                        </button>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="cart_page_link">
                                    <a href="{{ route('front.cart') }}">{{ __('auth.go_to_cart') }}</a>
                                </div>
                                @else
                                <div class="cart_product_item_wrapper">
                                    <div style="text-align: center; padding: 35px 10px;">
                                        <small>{{ __('auth.item_not_found') }}</small>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </li>
                        @auth
                        <li class="profile_icon" id="profileIconMobile">
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="header_list_icon">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.98475 13.3462C4.11713 13.3462 0.81427 13.931 0.81427 16.2729C0.81427 18.6148 4.09617 19.2205 7.98475 19.2205C11.8524 19.2205 15.1543 18.6348 15.1543 16.2938C15.1543 13.9529 11.8733 13.3462 7.98475 13.3462Z"
                                    stroke="#13192B" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.98477 10.0059C10.5229 10.0059 12.58 7.94779 12.58 5.40969C12.58 2.8716 10.5229 0.814453 7.98477 0.814453C5.44667 0.814453 3.38858 2.8716 3.38858 5.40969C3.38001 7.93922 5.42382 9.99731 7.95239 10.0059H7.98477Z"
                                    stroke="#13192B" stroke-width="1.42857" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <ul class="profile_dropdwon" id="profileDropdownAreaMobile">
                                <li>
                                    <a href="{{ route('customer.my-profile') }}">
                                        <span>{{ __('auth.hello') }} {{ Auth::user()->name }}!</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.my-orders') }}">
                                        <span>{{ __('auth.my_order') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.home') }}">
                                        <span>{{ __('auth.my_message') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.home') }}">
                                        <span>{{ __('auth.my_wallet') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.home') }}">
                                        <span>{{ __('auth.my_discount_coupon') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.my-profile') }}">
                                        <span>{{ __('auth.my_user_info') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.home') }}">
                                        <span>{{ __('auth.bennebos_issistant') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <button type="button">
                                        <a href="{{ route('customer.logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span style="color: red;"> {{ __('auth.log_out') }} </span>
                                            <form id="logout-form" style="display: none;" method="POST"
                                                action="{{ route('customer.logout') }}">
                                                @csrf
                                            </form>
                                        </a>
                                    </button>
                                </li>
                            </ul>
                        </li>
                        @else
                        <a href="{{ route('customerLogin') }}">
                            <li class="profile_icon" id="profileIconMobile">
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="header_list_icon">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.98475 13.3462C4.11713 13.3462 0.81427 13.931 0.81427 16.2729C0.81427 18.6148 4.09617 19.2205 7.98475 19.2205C11.8524 19.2205 15.1543 18.6348 15.1543 16.2938C15.1543 13.9529 11.8733 13.3462 7.98475 13.3462Z"
                                        stroke="#13192B" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.98477 10.0059C10.5229 10.0059 12.58 7.94779 12.58 5.40969C12.58 2.8716 10.5229 0.814453 7.98477 0.814453C5.44667 0.814453 3.38858 2.8716 3.38858 5.40969C3.38001 7.93922 5.42382 9.99731 7.95239 10.0059H7.98477Z"
                                        stroke="#13192B" stroke-width="1.42857" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </li>
                        </a>
                        @endauth

                        <li class="cart_number flag_icon_area" id="countryButtonMobile">
                            <button type="button">
                                <img src="{{ asset('assets/front/images/icon/language_flag_1.png') }}"
                                    class="flag_main_img" alt="flg" />
                            </button>
                            <div class="cart_product_area country_select_area" id="countryMobile">
                                <form action="" class="form_area select_form">
                                    <div class="input_row">
                                        <label for="">{{ __('auth.delivery_country') }}</label>
                                        <select class="imgSelectBox">
                                            <option value="1" selected
                                                data-imagesrc="{{ asset('assets/front/images/icon/header_flag1.png') }}">
                                                Turkey
                                            </option>
                                        </select>
                                    </div>
                                    <div class="input_row select_row">
                                        <label for="">{{ __('auth.select_language') }}</label>
                                        <select class="niceSelect" id="languageSelect">
                                            <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>
                                                Arabic
                                            </option>
                                            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
                                                English
                                            </option>
                                            <option value="tur" {{ app()->getLocale() == 'tur' ? 'selected' : ''
                                                }}>Turkish
                                            </option>
                                            <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Frence
                                            </option>
                                        </select>
                                    </div>
                                    <div class="input_row select_row">
                                        <label for="">{{ __('auth.select_curency') }}</label>
                                        <select class="niceSelect">
                                            <option value="tl" selected>TL</option>
                                        </select>
                                    </div>
                                </form>
                                <div class="cart_page_link">
                                    <a href="#">Save</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mobile_search_form">
                    <form wire:ignore.self action="" class="search_form" id="suggestSearchForm"
                        wire:submit.prevent='addQuery'>
                        <input type="text" id="searchBox" placeholder="{{ __('auth.search_for_pro') }}"
                            wire:model="query" autocomplete="off" />
                        <button type="submit" id="searchInputIcon">
                            <img src="{{ asset('assets/front/images/header/Search.svg') }}" alt="search image" />
                        </button>

                        <div class="show_sugget_search_area">
                            @if (session()->get('recentSearches') != '')
                            <div>
                                <div
                                    class="search_title d-flex align-items-center justify-content-between flex-wrap-wrap g-sm">
                                    <h5>{{ __('auth.recent_rearch') }}</h5>
                                    <button type="button" class="reset_btn" wire:click.prevent="clearSearches">
                                        {{ __('auth.clear_all') }}
                                    </button>
                                </div>
                                <ul>
                                    @foreach (array_values(session()->get('recentSearches')) as $item)
                                    <li><a
                                            href="{{ route('front.allProducts', ['slug' => 'search', 'q=' . $item . '']) }}">{{
                                            $item }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div>
                                <div
                                    class="search_title d-flex align-items-center justify-content-between flex-wrap-wrap">
                                    <h5>{{ __('auth.search_history') }}</h5>
                                </div>
                                <ul class="search_histroy_list d-flex align-items-center flex-wrap-wrap g-sm">
                                    @foreach ($popularSearches as $popularSearch)
                                    <li><a
                                            href="{{ route('front.allProducts', ['slug' => 'search', 'q=' . $popularSearch->query . '']) }}">{{
                                            $popularSearch->query }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="search_overlay"></div>
                    </form>
                </div>

            </div>
        </div>
        <div class="topbar_wrapper" id="topbarWrapper">
            <div class="my-container">
                <div class="topbar_area d-flex align-items-center justify-content-between flex-wrap-wrap">
                    <div class="logo_area">
                        <div class="topbar_right_area d-flex align-items-center flex-wrap">
                            <ul class="topbar_list d-flex align-items-center flex-wrap-wrap">
                                <li class="logo">
                                    <a href="/">
                                        <img src="{{ $setting->header_logo }}" alt="logo" />
                                    </a>
                                </li>

                                <li class="desktop_search_box">
                                    <form wire:ignore.self action="" class="search_form" id="suggestSearchForm"
                                        wire:submit.prevent='addQuery'>
                                        <input type="text" id="searchBox" placeholder="{{ __('auth.search_for_pro') }}"
                                            wire:model="query" autocomplete="off" />
                                        <button type="submit" id="searchInputIcon">
                                            <img src="{{ asset('assets/front/images/header/Search.svg') }}"
                                                alt="search image" />
                                        </button>
                                        <div class="show_sugget_search_area">
                                            @if (session()->get('recentSearches') != '')
                                            <div>
                                                <div
                                                    class="search_title d-flex align-items-center justify-content-between flex-wrap-wrap g-sm">
                                                    <h5>{{ __('auth.recent_rearch') }}</h5>
                                                    <button type="button" class="reset_btn"
                                                        wire:click.prevent="clearSearches">
                                                        {{ __('auth.clear_all') }}
                                                    </button>
                                                </div>
                                                <ul>
                                                    @foreach (array_values(session()->get('recentSearches')) as $item)
                                                    <li><a
                                                            href="{{ route('front.allProducts', ['slug' => 'search', 'q=' . $item . '']) }}">{{
                                                            $item }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            <div>
                                                <div
                                                    class="search_title d-flex align-items-center justify-content-between flex-wrap-wrap">
                                                    <h5>{{ __('auth.search_history') }}</h5>
                                                </div>
                                                <ul
                                                    class="search_histroy_list d-flex align-items-center flex-wrap-wrap g-sm">
                                                    @foreach ($popularSearches as $popularSearch)
                                                    <li><a
                                                            href="{{ route('front.allProducts', ['slug' => 'search', 'q=' . $popularSearch->query . '']) }}">{{
                                                            $popularSearch->query }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="search_overlay"></div>
                                    </form>
                                </li>
                                <li class="cart_number" data-number="{{ $cartQty }}" id="cartButtonDesk">
                                    <button type="button">
                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 6H3.30616C3.55218 6 3.67519 6 3.77418 6.04524C3.86142 6.08511 3.93535 6.14922 3.98715 6.22995C4.04593 6.32154 4.06333 6.44332 4.09812 6.68686L4.57143 10M4.57143 10L5.62332 17.7314C5.75681 18.7125 5.82355 19.2031 6.0581 19.5723C6.26478 19.8977 6.56108 20.1564 6.91135 20.3174C7.30886 20.5 7.80394 20.5 8.79411 20.5H17.352C18.2945 20.5 18.7658 20.5 19.151 20.3304C19.4905 20.1809 19.7818 19.9398 19.9923 19.6342C20.2309 19.2876 20.3191 18.8247 20.4955 17.8988L21.8191 10.9497C21.8812 10.6238 21.9122 10.4609 21.8672 10.3335C21.8278 10.2218 21.7499 10.1277 21.6475 10.068C21.5308 10 21.365 10 21.0332 10H4.57143ZM10 25C10 25.5523 9.55228 26 9 26C8.44772 26 8 25.5523 8 25C8 24.4477 8.44772 24 9 24C9.55228 24 10 24.4477 10 25ZM18 25C18 25.5523 17.5523 26 17 26C16.4477 26 16 25.5523 16 25C16 24.4477 16.4477 24 17 24C17.5523 24 18 24.4477 18 25Z"
                                                stroke="#13192B" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M17.51 11.27C18.3567 10.59 19.02 10.0333 19.5 9.6C19.98 9.16 20.3833 8.70333 20.71 8.23C21.0433 7.75 21.21 7.28 21.21 6.82C21.21 6.38667 21.1033 6.04667 20.89 5.8C20.6833 5.54667 20.3467 5.42 19.88 5.42C19.4267 5.42 19.0733 5.56333 18.82 5.85C18.5733 6.13 18.44 6.50667 18.42 6.98H17.54C17.5667 6.23333 17.7933 5.65667 18.22 5.25C18.6467 4.84333 19.1967 4.64 19.87 4.64C20.5567 4.64 21.1 4.83 21.5 5.21C21.9067 5.59 22.11 6.11333 22.11 6.78C22.11 7.33333 21.9433 7.87333 21.61 8.4C21.2833 8.92 20.91 9.38 20.49 9.78C20.07 10.1733 19.5333 10.6333 18.88 11.16H22.32V11.92H17.51V11.27Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                    <div class="cart_product_area" id="cartDesktop" style="cursor: default;">
                                        @if ($cartQty > 0)
                                        <div class="cart_product_item_wrapper">
                                            @foreach ($cartItems as $cartitem)
                                            <div
                                                class="cart_product_item d-flex align-items-center justify-content-between">
                                                <div class="cart_product_grid">
                                                    <div class="cart_img">
                                                        <a
                                                            href="{{ route('front.productDetails', ['slug' => $cartitem->slug]) }}">
                                                            <img src="{{ $cartitem->thumbnail }}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="cart_content">
                                                        <h3>
                                                            <a
                                                                href="{{ route('front.productDetails', ['slug' => $cartitem->slug]) }}">{{
                                                                $cartitem->name ?? '' }}</a>
                                                        </h3>
                                                        <h5><a href="">{{ $cartitem->seller_name ?? '' }}</a>
                                                        </h5>
                                                        @if ($cartitem->discount > 0)
                                                        <h4>
                                                            {{ calculateDiscount($cartitem->unit_price,
                                                            $cartitem->discount) }}
                                                            <del style="font-size: 12px;">{{ $cartitem->unit_price
                                                                }}</del>
                                                        </h4>
                                                        @else
                                                        <h4>{{ $cartitem->unit_price }}
                                                        </h4>
                                                        @endif
                                                    </div>
                                                </div>
                                                <button type="button" class="delete_btn"
                                                    wire:click.prevent="deleteFromCart({{ $cartitem->cart_id }})">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.80046 3.53011C4.44899 3.17864 3.87914 3.17864 3.52767 3.53011C3.17619 3.88158 3.17619 4.45143 3.52767 4.8029L4.80046 3.53011ZM15.1943 16.4696C15.5458 16.821 16.1157 16.821 16.4671 16.4696C16.8186 16.1181 16.8186 15.5482 16.4671 15.1968L15.1943 16.4696ZM16.4671 4.8029C16.8186 4.45143 16.8186 3.88158 16.4671 3.53011C16.1157 3.17864 15.5458 3.17864 15.1943 3.53011L16.4671 4.8029ZM3.52767 15.1968C3.17619 15.5482 3.17619 16.1181 3.52767 16.4696C3.87914 16.821 4.44899 16.821 4.80046 16.4696L3.52767 15.1968ZM3.52767 4.8029L9.361 10.6362L10.6338 9.36344L4.80046 3.53011L3.52767 4.8029ZM9.361 10.6362L15.1943 16.4696L16.4671 15.1968L10.6338 9.36344L9.361 10.6362ZM10.6338 10.6362L16.4671 4.8029L15.1943 3.53011L9.361 9.36344L10.6338 10.6362ZM9.36099 9.36344L3.52767 15.1968L4.80046 16.4696L10.6338 10.6362L9.36099 9.36344Z"
                                                            fill="#EB5757" />
                                                    </svg>
                                                </button>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="cart_page_link">
                                            <a href="{{ route('front.cart') }}">{{ __('auth.go_to_cart') }}</a>
                                        </div>
                                        @else
                                        <div class="cart_product_item_wrapper">
                                            <div style="text-align: center; padding: 35px 10px;">
                                                <small>{{ __('auth.item_not_found') }}</small>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </li>
                                @auth
                                <li class="profile_icon" id="profileIconDesktop">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="header_list_icon">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.98475 13.3462C4.11713 13.3462 0.81427 13.931 0.81427 16.2729C0.81427 18.6148 4.09617 19.2205 7.98475 19.2205C11.8524 19.2205 15.1543 18.6348 15.1543 16.2938C15.1543 13.9529 11.8733 13.3462 7.98475 13.3462Z"
                                            stroke="#13192B" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.98477 10.0059C10.5229 10.0059 12.58 7.94779 12.58 5.40969C12.58 2.8716 10.5229 0.814453 7.98477 0.814453C5.44667 0.814453 3.38858 2.8716 3.38858 5.40969C3.38001 7.93922 5.42382 9.99731 7.95239 10.0059H7.98477Z"
                                            stroke="#13192B" stroke-width="1.42857" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <ul class="profile_dropdwon" id="profileDropdownAreaDesktop">
                                        <li>
                                            <a href="{{ route('customer.my-profile') }}">
                                                <span>{{ __('auth.hello') }} {{ Auth::user()->name }}!</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('customer.my-orders') }}">
                                                <span>{{ __('auth.my_order') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('customer.home') }}">
                                                <span>{{ __('auth.my_message') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('customer.home') }}">
                                                <span>{{ __('auth.my_wallet') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('customer.home') }}">
                                                <span>{{ __('auth.my_discount_coupon') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('customer.my-profile') }}">
                                                <span>{{ __('auth.my_user_info') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('customer.home') }}">
                                                <span>{{ __('auth.bennebos_issistant') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button">
                                                <a href="{{ route('customer.logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <span style="color: red;"> {{ __('auth.log_out') }} </span>
                                                    <form id="logout-form" style="display: none;" method="POST"
                                                        action="{{ route('customer.logout') }}">
                                                        @csrf
                                                    </form>
                                                </a>
                                            </button>
                                        </li>
                                    </ul>
                                </li>
                                @else
                                <li class="topbar_single_list">
                                    <a href="{{ route('customerLogin') }}" class="sign_in_btn">{{ __('auth.sign_in')
                                        }}</a>
                                </li>
                                <li class="topbar_single_list">
                                    <a href="{{ route('registration') }}" class="sign_up_btn">{{ __('auth.sign_up')
                                        }}</a>
                                </li>
                                @endauth
                                <li class="cart_number flag_icon_area pro_button_area" id="proButtonMobile">
                                    <button type="button" class="pro_btn">
                                        <span>{{ __('auth.pro') }}</span>
                                    </button>
                                    <div class="cart_product_area country_select_area pro_dropdown_area"
                                        id="proDropdwonMobileArea">
                                        <ul class="pro_dropdown_list">
                                            <li>
                                                <a href="{{ route('company-info.mapview') }}">
                                                    <img src="{{ asset('assets/front/images/icon/pro_icon1.svg') }}"
                                                        alt="pro icon" />
                                                    <span>{{ __('auth.head_maps') }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('quotations') }}">
                                                    <img src="{{ asset('assets/front/images/icon/pro_icon2.svg') }}"
                                                        alt="pro icon" />
                                                    <span>{{ __('auth.head_quotations') }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('company-informations') }}">
                                                    <img src="{{ asset('assets/front/images/icon/pro_icon3.svg') }}"
                                                        alt="pro icon" />
                                                    <span>{{ __('auth.head_info') }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="{{ route('reports', ['slug' => 'turkey', 'type' => 'import']) }}">
                                                    <img src="{{ asset('assets/front/images/icon/pro_icon4.svg') }}"
                                                        alt="pro icon" />
                                                    <span>{{ __('auth.head_reports') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>


                                <li class="cart_number flag_icon_area" id="countryButtonDesk">
                                    <button type="button">
                                        <img src="{{ asset('assets/front/images/icon/language_flag_1.png') }}"
                                            class="flag_main_img" alt="flg" />
                                    </button>
                                    <div class="cart_product_area country_select_area" id="countryDesk">
                                        <form action="" class="form_area select_form">
                                            <div class="input_row">
                                                <label for="">{{ __('auth.delivery_country') }}</label>
                                                <select class="imgSelectBox">
                                                    <option value="1" selected
                                                        data-imagesrc="{{ asset('assets/front/images/icon/header_flag1.png') }}">
                                                        Turkey
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="input_row select_row">
                                                <label for="">{{ __('auth.select_language') }}</label>
                                                <select class="niceSelect" id="languageSelectDesk">
                                                    <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : ''
                                                        }}>Arabic
                                                    </option>
                                                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : ''
                                                        }}>English
                                                    </option>
                                                    <option value="tur" {{ app()->getLocale() == 'tur' ? 'selected' : ''
                                                        }}>Turkish
                                                    </option>
                                                    <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : ''
                                                        }}>Frence
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="input_row select_row">
                                                <label for="">{{ __('auth.select_curency') }}</label>
                                                <select class="niceSelect">
                                                    <option value="tl" selected>TL</option>
                                                </select>
                                            </div>
                                        </form>
                                        <div class="cart_page_link">
                                            <a href="#">Save</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="searchbox_overlay" id="searchOverlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Menu + Brand Items  -->
    <section class="mobile_tab_wrapper" wire:ignore>
        <div class="my-container">
            <div class="mobile_slider_button_area">
                <!-- Swiper -->
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($allCategories as $category)
                        <div class="swiper-slide">
                            <a href="{{ route('home.indexWithCategory', ['slug' => $category->slug]) }}"
                                class="tablinks2 @if (session('slugMsg') == $category->slug) tabActiveButton @endif"
                                style="text-transform: uppercase;">{{ $category->name }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @if (request()->is('/') || request()->is('category/*'))
            <div class="mobile_slider_tab_area">
                <div class="tab_item2" id="tabSlider1" style="display: block;">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach ($brands as $brand)
                            <div class="swiper-slide">
                                <a href="{{ route('front.brand.products', ['slug' => $brand->slug]) }}">
                                    <img src="{{ $brand->logo }}" alt="{{ $brand->name }}"
                                        onerror="this.onerror=null;this.src='{{ asset('assets/images/company_info_logo.png') }}';" />
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next header_tab_next_icon"></div>
                    <div class="swiper-button-prev header_tab_prev_icon"></div>
                </div>
            </div>
            @endif
        </div>
    </section>
    <span wire:ignore>
        @if (request()->is('/') || request()->is('category/*'))
        <!-- Hero Section  -->
        <section class="hero_wrapper">
            <div class="my-container">
                <div class="hero_grid_area">
                    <div class="hero_menu_area" id="headerCategoryMenu">
                        <h3 class="hero_menu_title">{{ __('auth.my_markets') }}</h3>
                        <ul class="hero_main_menu_list">
                            @foreach ($allSubCategories as $allSubCategory)
                            <li class="hero_dropdownlist">
                                <div class="mega_img_title d-flex align-items-center">
                                    <div class="mega_title_img_area">
                                        <img src="{{ $allSubCategory->icon }}"
                                            onerror="this.onerror=null;this.src='{{ asset('assets/images/company_info_logo.png') }}';" />
                                    </div>

                                    <span>{{ $allSubCategory->name }}</span>
                                </div>

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 7L15 12" stroke="#6B7280" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M15 12L10 17" stroke="#6B7280" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                                <div class="category_mega_menu_area">
                                    <div class="category_mega_menu_item">
                                        <ul class="mega_menu_list_grid nav_menu_list_area">
                                            @foreach ($allSubCategory->getsubSubCategory as $subsubcategory)
                                            <li><a
                                                    href="{{ route('front.category.products', ['slug' => $subsubcategory->slug]) }}">{{
                                                    $subsubcategory->name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <a href="{{ route('front.allCategories') }}">
                                <li class="hero_dropdownlist">
                                    <div class="mega_img_title d-flex align-items-center">
                                        <div class="mega_title_img_area">
                                            <img src="{{ asset('assets/front/images/icon/hero_category_img_7.png') }}"
                                                alt="" />
                                        </div>
                                        <span>All Categories </span>
                                    </div>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 7L15 12" stroke="#6B7280" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M15 12L10 17" stroke="#6B7280" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </li>
                            </a>
                        </ul>
                    </div>
                    <div class="hero_slider_area">
                        <!-- Swiper -->
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($homeSliders as $homeSlider)
                                <div class="swiper-slide">
                                    <div class="hero_img_link">
                                        <a href="{{ $homeSlider->shop_link }}">
                                            <img src="{{ $homeSlider->banner }}" class="hero_img" alt="">
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next hero_next_icon"></div>
                        <div class="swiper-button-prev hero_prev_icon"></div>
                    </div>
                    <div class="hero_right_side_area">
                        <a href="#" class="text-center">
                            <img src="{{ asset('assets/front/images/home/hero_right_side_img.png') }}"
                                alt="hero right image" class="hero_right_img" />
                        </a>
                        <div class="hero_divide_line_grid_area">
                            <div class="hero_divide_line_grid">
                                @foreach ($right_sliders as $item)
                                <div class="divide_product_item">
                                    <a href="{{ route('front.productDetails', ['slug' => $item->slug]) }}">
                                        <img src="{{ $item->thumbnail }}" />
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    </span>
</div>
@push('scripts')
<script>
    let suggestSearchForm = document.querySelectorAll("#suggestSearchForm");
        for (let x of suggestSearchForm) {
            x.addEventListener('focusin', (event) => {
                x.classList.add("suggestActive");
            });
            x.addEventListener('focusout', (event) => {
                x.classList.remove("suggestActive");
            });
        }
</script>
@endpush