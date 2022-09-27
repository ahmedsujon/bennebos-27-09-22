<div>
    @if ($topBanner != '')
    <section class="top_banner_wrapper"
        style="background-image: url({{ $topBanner->banner }})">
        <div class="my-container">
            <div class="top_banner_grid">
                <h3>{{ $topBanner->title }}</h3>
            </div>
        </div>
        <div class="banner_text">{{ $topBanner->festival_name }}</div>
        <img src="{{ asset('assets/front/images/icon/top_bar_icon.svg') }}" alt="topbar icon" class="topbar_icon" />
    </section>
    @endif

    <header wire:ignore.self class="header_wrapper product_header_wrapper" id="headerWrapper">
        {{-- Mobile --}}
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
                        {{-- Cart Menu --}}
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
                                                        $cartitem->name ?? "" }}</a>
                                                </h3>
                                                <h5><a href="">{{ $cartitem->seller_name
                                                        ?? ""
                                                        }}</a>
                                                </h5>
                                                @if ($cartitem->discount > 0)
                                                <h4>
                                                    {{ calculateDiscount($cartitem->unit_price,$cartitem->discount) }}
                                                    <del style="font-size: 12px;">{{
                                                        $cartitem->unit_price }}</del>
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
                                    <a href="#">{{ __('auth.go_to_cart') }}</a>
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
                        {{-- User Dropdown --}}
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
                                    <span>{{ __('auth.hello') }} {{ Auth::user()->name }}!</span>
                                </li>
                                <li>
                                    <a href="{{ route('customer.my-orders') }}">
                                        <span>{{ __('auth.my_order') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ __('customer.support') }}">
                                        <span>{{ __('auth.my_message') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ __('customer.payment_method') }}">
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

                            </li>
                        </a>
                        @endauth
                        <li class="cart_number flag_icon_area" id="countryButtonMobile">
                            <button type="button">
                                <img src="{{ asset('assets/front/images/icon/header_flag1.png') }}"
                                    class="flag_main_img" alt="flg" />
                            </button>
                            <div class="cart_product_area country_select_area" id="countryMobile">
                                <form action="" class="form_area select_form">
                                    <div class="input_row">
                                        <label for="">{{ __('auth.delivery_country') }}</label>
                                        <select class="imgSelectBox1">
                                            <option value="1"
                                                data-imagesrc="{{ asset('assets/front/images/icon/header_flag1.png') }}">
                                                {{ __('auth.turkish') }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="input_row select_row">
                                        <label for="">{{ __('auth.select_language') }}</label>
                                        <select class="niceSelect">
                                            <option data-display="{{ __('auth.select_language') }}">
                                                {{ __('auth.select_language') }}
                                            </option>
                                            <option value="1">{{ __('auth.english') }}</option>
                                            <option value="2">{{ __('auth.arabic') }}</option>
                                            <option value="4">{{ __('auth.turkish') }}</option>
                                        </select>
                                    </div>
                                    <div class="input_row select_row">
                                        <label for="">{{ __('auth.select_curency') }}</label>
                                        <select class="niceSelect">
                                            <option value="2">{{ __('auth.tl') }}</option>
                                        </select>
                                    </div>
                                </form>
                                <div class="cart_page_link">
                                    <a href="#">{{ __('auth.save') }}</a>
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
                    </form>
                </div>
            </div>
        </div>

        {{-- Desktop --}}
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
                                    </form>
                                </li>
                                <li class="topbar_single_list">
                                    <a href="{{ route('quotations') }}">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.2101 2.01103C8.32518 2.27271 5.7105 3.71063 3.99897 5.9768C3.44879 6.70524 2.91089 7.69462 2.5874 8.57302C2.39048 9.10779 2.15981 10.039 2.07347 10.648C1.97563 11.3379 1.97548 12.7242 2.0732 13.3657C2.40373 15.536 3.34904 17.4558 4.83307 18.9708C5.6608 19.8158 6.45482 20.4036 7.44787 20.9063C9.93915 22.1674 12.8347 22.3464 15.4198 21.3991C16.3253 21.0673 17.4653 20.4283 18.2226 19.8282C18.6273 19.5075 19.4222 18.7207 19.7544 18.3122C21.6816 15.9417 22.4185 12.8017 21.7504 9.8073C21.5957 9.11393 21.5336 8.93957 21.39 8.79599C21.2654 8.67144 21.2453 8.6648 21.0432 8.68157C20.799 8.70183 20.6624 8.80076 20.5945 9.00656C20.5596 9.11205 20.5753 9.21974 20.6896 9.662C20.9008 10.479 20.9854 11.1483 20.9848 11.9971C20.9837 13.4163 20.7182 14.6072 20.124 15.858C19.4479 17.2813 18.4112 18.5081 17.1341 19.3962C15.6143 20.4531 13.8761 20.9971 12.0117 20.9995C11.252 21.0004 10.9013 20.9674 10.2129 20.8299C7.47837 20.284 5.11371 18.4632 3.90262 15.971C3.04064 14.1973 2.77665 12.2684 3.13366 10.3529C3.40523 8.89601 4.04918 7.49426 4.97286 6.34944C5.28686 5.96029 5.97612 5.26587 6.33743 4.97459C7.08379 4.37303 8.2112 3.76096 9.12468 3.46147C10.2213 3.10192 11.0585 2.98231 12.2584 3.01371C13.0993 3.03568 13.6363 3.11205 14.4089 3.31953C14.7861 3.4208 14.8705 3.43175 14.9843 3.39417C15.1957 3.32442 15.3159 3.15189 15.3159 2.91829C15.3159 2.74871 15.2985 2.70448 15.1884 2.59445C15.1061 2.51209 14.9781 2.44284 14.8267 2.3987C14.4493 2.28866 13.7905 2.14695 13.3547 2.08208C12.9655 2.02417 11.5737 1.97803 11.2101 2.01103ZM18.186 3.11635C18.1021 3.17844 17.3709 3.89551 16.5611 4.70979C15.3213 5.95642 15.0819 6.21501 15.046 6.34671C15.0213 6.4377 15.0034 6.87045 15.0033 7.38156L15.003 8.25997L13.2858 9.9819C11.7866 11.4852 11.5651 11.7224 11.5414 11.8501C11.5049 12.0468 11.5439 12.1805 11.6763 12.3129C11.8086 12.4451 11.9421 12.4842 12.139 12.448C12.267 12.4245 12.5017 12.2053 14.0069 10.7037L15.7284 8.98614L16.6072 8.98591C17.1186 8.98579 17.5514 8.96788 17.6425 8.94313C17.7742 8.90723 18.0328 8.66793 19.2794 7.42809C20.0937 6.61828 20.8107 5.88705 20.8728 5.80318C21.002 5.62874 21.022 5.41587 20.9267 5.2315C20.8241 5.03301 20.7585 5.01874 19.8518 4.99766L19.0111 4.97811L18.9915 4.1374C18.9704 3.23069 18.9562 3.16511 18.7577 3.06247C18.5733 2.96713 18.3604 2.98719 18.186 3.11635ZM18.0849 5.73295C18.1946 5.9253 18.3482 5.97492 18.8348 5.97508L19.2842 5.97523L18.2877 6.97235L17.2911 7.96947H16.6554H16.0197V7.33433V6.69918L17.0071 5.71105L17.9944 4.72289L18.0139 5.18289C18.0256 5.45571 18.0544 5.6795 18.0849 5.73295ZM10.9961 5.05976C8.39467 5.46396 6.28136 7.22456 5.42845 9.69813C4.82533 11.4472 4.94342 13.3611 5.75722 15.0275C7.27809 18.1417 10.8776 19.67 14.1819 18.6044C14.6813 18.4433 15.4485 18.0691 15.9024 17.7651C17.4338 16.7396 18.5062 15.1325 18.8772 13.307C18.9614 12.8928 19.0244 11.6956 18.9756 11.4358C18.9169 11.123 18.5849 10.9194 18.3184 11.0329C18.2477 11.063 18.1472 11.1339 18.0949 11.1906C18.0025 11.2909 17.9998 11.3119 17.9928 11.9875C17.9873 12.5112 17.9657 12.7787 17.9049 13.0784C17.4134 15.4968 15.6388 17.2968 13.2205 17.8297C12.8937 17.9017 12.707 17.9154 12.0312 17.9167C11.3458 17.9182 11.1743 17.906 10.848 17.833C9.62034 17.5583 8.66549 17.0405 7.80519 16.1827C6.93961 15.3196 6.38342 14.2792 6.13918 13.0664C6.03309 12.5396 6.04385 11.2942 6.15893 10.7716C6.28206 10.2126 6.45075 9.73825 6.69894 9.25306C7.54821 7.59268 9.05069 6.4623 10.9107 6.08433C11.2113 6.02329 11.4779 6.0019 12.0075 5.99639L12.7072 5.98915L12.8384 5.84592C13.0005 5.66898 13.0153 5.4685 12.8809 5.26739C12.7243 5.03289 12.5974 4.99731 11.9335 5.00149C11.6109 5.00357 11.189 5.02977 10.9961 5.05976ZM11.4676 8.0108C10.1958 8.20694 9.06759 9.00683 8.49708 10.1168C7.51865 12.0206 8.18625 14.3473 10.014 15.4033C10.6977 15.7983 11.3776 15.9658 12.1681 15.9339C12.8121 15.9079 13.2084 15.8097 13.7713 15.5364C15.0815 14.9003 15.9691 13.5539 15.9932 12.1663C16 11.7753 15.9982 11.7664 15.8851 11.6479C15.6005 11.3498 15.1531 11.4537 15.0412 11.8439C15.0202 11.9171 15.003 12.0667 15.003 12.1763C15.003 12.4525 14.8726 12.9413 14.7109 13.271C14.3316 14.0448 13.6121 14.6372 12.7854 14.8566C12.4226 14.953 11.7788 14.9709 11.4251 14.8946C10.3085 14.6536 9.42702 13.8143 9.13148 12.7106C9.01953 12.2927 9.01902 11.625 9.13035 11.2097C9.41255 10.1565 10.249 9.33107 11.3043 9.06431C11.4744 9.02134 11.7032 8.98603 11.8126 8.98591C12.2055 8.98548 12.4235 8.86352 12.4985 8.60212C12.5468 8.43366 12.4873 8.24354 12.343 8.10532C12.2384 8.00513 12.1925 7.99047 11.9615 7.98328C11.817 7.97882 11.5948 7.99117 11.4676 8.0108Z"
                                                fill="black" />
                                        </svg>
                                        <span>{{ __('auth.head_quotations') }}</span>
                                    </a>
                                </li>
                                <li class="topbar_single_list">
                                    <a href="{{ route('reports', ['slug' => 'turkey', 'type'=>'import']) }}">
                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.7162 14.2234H5.49622" stroke="#13192B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12.7162 10.0369H5.49622" stroke="#13192B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.25131 5.86011H5.49631" stroke="#13192B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.9086 0.749756C12.9086 0.749756 5.23161 0.753756 5.21961 0.753756C2.45961 0.770756 0.75061 2.58676 0.75061 5.35676V14.5528C0.75061 17.3368 2.47261 19.1598 5.25661 19.1598C5.25661 19.1598 12.9326 19.1568 12.9456 19.1568C15.7056 19.1398 17.4156 17.3228 17.4156 14.5528V5.35676C17.4156 2.57276 15.6926 0.749756 12.9086 0.749756Z"
                                                stroke="#13192B" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <span>{{ __('auth.head_reports') }}</span>
                                    </a>
                                </li>
                                <li class="topbar_single_list">
                                    <a href="{{ route('company-info.mapview') }}">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.1734 2.04399C8.46176 2.48759 6.73332 4.66546 6.72609 7.64766C6.72456 8.27023 6.76428 8.60559 6.90751 9.17901C7.11707 10.0181 7.44 10.8224 8.00237 11.9061C8.18406 12.2563 8.33272 12.551 8.33272 12.5609C8.33272 12.5709 7.81324 12.5791 7.17829 12.5791C5.94286 12.5791 5.8585 12.5904 5.68862 12.7793C5.56716 12.9143 2 21.2628 2 21.412C2 21.6075 2.13776 21.8326 2.31171 21.9213C2.46506 21.9995 2.52186 22 12.0073 22C21.4927 22 21.5495 21.9995 21.7028 21.9213C21.8768 21.8326 22.0145 21.6075 22.0145 21.412C22.0145 21.2628 18.4474 12.9143 18.3259 12.7793C18.156 12.5904 18.0717 12.5791 16.8362 12.5791C16.2013 12.5791 15.6818 12.5712 15.6818 12.5617C15.6818 12.5521 15.8392 12.2398 16.0315 11.8678C16.9272 10.1351 17.2872 8.93708 17.2866 7.69199C17.2858 6.338 16.9663 5.21605 16.2962 4.21423C16.0439 3.83705 15.3551 3.14815 14.9782 2.89601C14.4167 2.5205 13.7707 2.2487 13.0823 2.09848C12.6063 1.99461 11.6433 1.96709 11.1734 2.04399ZM12.5936 3.21495C13.2509 3.31463 13.739 3.49918 14.26 3.84498C15.4572 4.6397 16.1108 6.00061 16.1116 7.70051C16.1123 9.16842 15.371 10.9617 13.7648 13.3782C13.3334 14.0271 12.4044 15.2991 12.1072 15.6477L12.0073 15.765L11.9066 15.6477C11.6225 15.3169 10.6862 14.0342 10.25 13.3782C9.09269 11.6378 8.3613 10.1545 8.0345 8.88501C7.93118 8.48366 7.92375 8.4029 7.92301 7.67319C7.92239 6.99672 7.9345 6.83606 8.01319 6.48092C8.12417 5.97993 8.32111 5.46921 8.56211 5.0575C8.77339 4.69654 9.26254 4.16166 9.60075 3.92172C10.4573 3.31409 11.5483 3.05644 12.5936 3.21495ZM11.7222 5.54676C11.2153 5.61994 10.6832 6.00432 10.4535 6.46337C10.2882 6.79376 10.2339 7.06196 10.2589 7.42614C10.3134 8.22062 10.9205 8.87922 11.7323 9.02429C12.7162 9.20012 13.6865 8.43374 13.7556 7.42614C13.835 6.26752 12.8751 5.38031 11.7222 5.54676ZM12.324 6.8042C12.586 6.97921 12.6697 7.33482 12.5057 7.57585C12.3625 7.78616 12.2277 7.86415 12.0073 7.86415C11.7868 7.86415 11.652 7.78616 11.5089 7.57585C11.2658 7.21876 11.5574 6.71546 12.0073 6.71546C12.1334 6.71546 12.2329 6.74334 12.324 6.8042ZM9.31172 14.1062C9.44275 14.3011 9.66299 14.6208 9.80105 14.8166C9.93916 15.0125 10.0479 15.1761 10.0427 15.1803C10.0374 15.1845 8.87218 15.7817 7.45318 16.5075C6.03418 17.2332 4.84234 17.843 4.80461 17.8627C4.74469 17.8939 4.74746 17.8723 4.82654 17.6917C4.87631 17.578 5.2764 16.645 5.71571 15.6184L6.51441 13.7518H7.79393H9.07342L9.31172 14.1062ZM18.3724 15.7883C18.8522 16.9083 19.239 17.8292 19.2321 17.8347C19.2252 17.8402 17.9266 18.5158 16.3464 19.336L13.4732 20.8273H12.8671H12.261L10.4548 19.0193L8.64854 17.2114L9.68668 16.6836C10.2577 16.3934 10.7394 16.1559 10.7571 16.1559C10.7749 16.1559 10.9723 16.3758 11.1958 16.6445C11.6637 17.2073 11.6664 17.2098 11.8588 17.2623C12.0967 17.3272 12.2921 17.2539 12.5011 17.0213C12.9791 16.4897 13.9285 15.2418 14.5647 14.3089L14.9446 13.7518H16.2224H17.5002L18.3724 15.7883ZM8.80498 20.8179C7.83897 20.8235 6.24738 20.8235 5.26808 20.8179L3.48753 20.8077L3.74846 20.2005L4.00943 19.5933L5.77039 18.6894L7.53136 17.7854L9.04633 19.2966L10.5613 20.8077L8.80498 20.8179ZM20.1311 19.8891L20.5233 20.8077L19.4121 20.8181C18.8009 20.8238 17.7978 20.8238 17.183 20.8181L16.065 20.8077L17.8768 19.8642C18.8733 19.3453 19.7 18.932 19.7138 18.9456C19.7277 18.9593 19.9155 19.3838 20.1311 19.8891Z"
                                                fill="#74C247" />
                                        </svg>
                                        <span>{{ __('auth.head_maps') }}</span>
                                    </a>
                                </li>
                                <li class="topbar_single_list">
                                    <a href="{{ route('company-informations') }}">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.35288 8.95043C4.00437 6.17301 6.17301 4.00437 8.95043 3.35288C10.9563 2.88237 13.0437 2.88237 15.0496 3.35288C17.827 4.00437 19.9956 6.17301 20.6471 8.95043C21.1176 10.9563 21.1176 13.0437 20.6471 15.0496C19.9956 17.827 17.827 19.9956 15.0496 20.6471C13.0437 21.1176 10.9563 21.1176 8.95044 20.6471C6.17301 19.9956 4.00437 17.827 3.35288 15.0496C2.88237 13.0437 2.88237 10.9563 3.35288 8.95043Z"
                                                stroke="#13192B" stroke-width="1.5" />
                                            <path d="M12 15.5V11.5" stroke="#13192B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <circle cx="12" cy="9" r="0.5" stroke="#13192B" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                        <span>{{ __('auth.head_info') }}</span>
                                    </a>
                                </li>


                                <li class="cart_number" data-number="{{ $cartQty }}" id="cartButtonDesk">
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
                                                fill="#13192B" stroke="#13192B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16.4347 18.2026C16.7357 18.2026 16.9797 18.4466 16.9797 18.7466C16.9797 19.0476 16.7357 19.2916 16.4347 19.2916C16.1337 19.2916 15.8907 19.0476 15.8907 18.7466C15.8907 18.4466 16.1337 18.2026 16.4347 18.2026Z"
                                                fill="#13192B" stroke="#13192B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
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
                                                            <img src="{{ $cartitem->thumbnail }}"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="cart_content">
                                                        <h3>
                                                            <a
                                                                href="{{ route('front.productDetails', ['slug' => $cartitem->slug]) }}">{{
                                                                $cartitem->name ?? "" }}</a>
                                                        </h3>
                                                        <h5><a href="">{{
                                                                $cartitem->seller_name ??
                                                                ""
                                                                }}</a>
                                                        </h5>
                                                        @if ($cartitem->discount > 0)
                                                        <h4>
                                                            {{ calculateDiscount($cartitem->unit_price,$cartitem->discount) }}
                                                            <del style="font-size: 12px;">{{
                                                                $cartitem->unit_price }}</del>
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
                                <a href="{{ route('customerLogin') }}">
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
                                    </li>
                                </a>
                                @endauth

                                <li class="cart_number flag_icon_area" id="countryButtonDesk">
                                    <button type="button">
                                        <img src="{{ asset('assets/front/images/icon/header_flag1.png') }}"
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
                                                <select class="niceSelect" id="languageSelect">
                                                    <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected':'' }}>Arabic</option>
                                                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected':'' }}>English</option>
                                                    <option value="tur" {{ app()->getLocale() == 'tur' ? 'selected':'' }}>Turkish</option>
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
                                            <a href="#">{{ __('auth.save') }}</a>
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
    <section class="mobile_tab_wrapper product_mobile_tab_wrapper" wire:ignore>
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
                            {{-- <div class="swiper-slide">
                                <a href="#">
                                    <img src="" alt="" />
                                </a>
                            </div> --}}
                            @foreach ($brands as $brand)
                            <div class="swiper-slide">
                                <a href="{{ route('front.brand.products', ['slug'=>$brand->slug]) }}">
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
                                    <img src="{{ $allSubCategory->icon }}"
                                        onerror="this.onerror=null;this.src='{{ asset('assets/images/company_info_logo.png') }}';"
                                        alt="" class="mega_title_img" />
                                    <span>{{ $allSubCategory->name }}</span>
                                </div>

                                <svg width="8" height="12" viewBox="0 0 8 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.66406 1.33317L6.33073 5.99984L1.66406 10.6665" stroke="#9BA2AB"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <div class="category_mega_menu_area">
                                    <div class="category_mega_menu_item">
                                        <ul class="mega_menu_list_grid nav_menu_list_area">
                                            @foreach ($allSubCategory->getsubSubCategory as $subsubcategory)
                                                <li>
                                                    <a href="{{ route('front.category.products', ['slug' => $subsubcategory->slug]) }}">{{
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
                                        <img src="{{ asset('assets/images/company_info_logo.png') }}" alt=""
                                            class="mega_title_img" />
                                        <span>{{ __('auth.all_categories') }} </span>
                                    </div>
                                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.66406 1.33317L6.33073 5.99984L1.66406 10.6665" stroke="#9BA2AB"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                                            <img src="{{ $homeSlider->banner }}"
                                                class="hero_img" alt="">
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
                        <div class="buyer_bg_area" style="
                            background-image: url({{ asset('assets/front/images/home/hero_right_bg.png') }});
                          ">
                            <h4>{{ __('auth.buyers_club') }}</h4>
                            <h2>{{ __('auth.offer_text_usd') }}</h2>
                            <div class="text-end">
                                <a href="#" class="default_btn3">{{ __('auth.view_more') }}</a>
                            </div>
                        </div>
                        <div>
                            <div class="mid_sellar">{{ __('auth.mid_year_sale') }}</div>
                            <ul class="right_product_list">
                                @if ($hotsellers != '')
                                <li>
                                    <a href="{{ route('shop.seller', ['slug' => $hotsellers->slug]) }}"
                                        class="right_product">
                                        <span>{{ __('auth.index_hot_seller') }}</span>
                                        <img src="{{ $hotsellers->logo }}" alt="" class="right_product_img" />
                                    </a>
                                </li>
                                @endif

                                @if ($new_trends != '')
                                <li>
                                    <a href="{{ route('front.productDetails', ['slug' => $new_trends->slug]) }}"
                                        class="right_product">
                                        <span>{{ __('auth.index_new_trends_release') }}</span>
                                        <img src="{{ $new_trends->thumbnail }}" alt="" class="right_product_img" />
                                    </a>
                                </li>
                                @endif

                                @if ($discount_products != '')
                                <li>
                                    <a href="{{ route('front.productDetails', ['slug' => $discount_products->slug]) }}"
                                        class="right_product">
                                        <span>{{ __('auth.off_or_more') }}</span>
                                        <img src="{{ $discount_products->thumbnail }}" alt=""
                                            class="right_product_img" />
                                    </a>
                                </li>
                                @endif

                            </ul>
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
