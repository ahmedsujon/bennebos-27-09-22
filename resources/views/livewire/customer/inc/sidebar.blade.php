<div>
    <div class="profile_sidebar_area" id="profileSidebarArea">
        <div class="profile_user_area d-flex flex-wrap-wrap">
            @if (user()->avatar )
            <img src="{{ user()->avatar }}" alt="" />
            @else
            <img src="{{ asset('assets/images/avatar-place.png') }}" alt="" />
            @endif
            <div>
                <h5>{{ __('customer.hello') }}</h5>
                <h4>{{ Auth::user()->name }}</h4>
            </div>
        </div>
        <ul class="user_profile_menu_list">
            <li
                class="{{ request()->is('customer/dashboard') || request()->is('customer/dashboard/*')? 'active_user_menu': '' }}">
                <a href="{{ route('customer.home') }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3 6.5C3 3.87479 3.02811 3 6.5 3C9.97189 3 10 3.87479 10 6.5C10 9.12521 10.0111 10 6.5 10C2.98893 10 3 9.12521 3 6.5Z"
                            stroke="#424C60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14 6.5C14 3.87479 14.0281 3 17.5 3C20.9719 3 21 3.87479 21 6.5C21 9.12521 21.0111 10 17.5 10C13.9889 10 14 9.12521 14 6.5Z"
                            stroke="#424C60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3 17.5C3 14.8748 3.02811 14 6.5 14C9.97189 14 10 14.8748 10 17.5C10 20.1252 10.0111 21 6.5 21C2.98893 21 3 20.1252 3 17.5Z"
                            stroke="#424C60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14 17.5C14 14.8748 14.0281 14 17.5 14C20.9719 14 21 14.8748 21 17.5C21 20.1252 21.0111 21 17.5 21C13.9889 21 14 20.1252 14 17.5Z"
                            stroke="#424C60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span>{{ __('customer.dashboard') }}</span>
                </a>
            </li>
            <li
                class="{{ request()->is('customer/my-profile') || request()->is('customer/my-profile/*')? 'active_user_menu': '' }}">
                <a href="{{ route('customer.my-profile') }}">
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.98478 13.3462C4.11716 13.3462 0.814301 13.931 0.814301 16.2729C0.814301 18.6148 4.0962 19.2205 7.98478 19.2205C11.8524 19.2205 15.1543 18.6348 15.1543 16.2938C15.1543 13.9529 11.8733 13.3462 7.98478 13.3462Z"
                            stroke="#424C60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.98477 10.0059C10.5229 10.0059 12.58 7.94779 12.58 5.40969C12.58 2.8716 10.5229 0.814453 7.98477 0.814453C5.44667 0.814453 3.38858 2.8716 3.38858 5.40969C3.38001 7.93922 5.42382 9.99731 7.95239 10.0059H7.98477Z"
                            stroke="#424C60" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>{{ __('customer.my_profile') }}</span>
                </a>
            </li>

            <li
                class="{{ request()->is('customer/notifications') || request()->is('customer/notifications/*')? 'active_user_menu': '' }}">
                <a href="{{ route('customer.notifications') }}">
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.98478 13.3462C4.11716 13.3462 0.814301 13.931 0.814301 16.2729C0.814301 18.6148 4.0962 19.2205 7.98478 19.2205C11.8524 19.2205 15.1543 18.6348 15.1543 16.2938C15.1543 13.9529 11.8733 13.3462 7.98478 13.3462Z"
                              stroke="#424C60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.98477 10.0059C10.5229 10.0059 12.58 7.94779 12.58 5.40969C12.58 2.8716 10.5229 0.814453 7.98477 0.814453C5.44667 0.814453 3.38858 2.8716 3.38858 5.40969C3.38001 7.93922 5.42382 9.99731 7.95239 10.0059H7.98477Z"
                              stroke="#424C60" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>{{ __('customer.notification') }}</span>
                </a>
            </li>

            <li
                class="{{ request()->is('customer/my-orders') || request()->is('customer/my-orders/*')? 'active_user_menu': '' }}">
                <a href="{{ route('customer.my-orders') }}">
                    <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.8716 8.54577L18.1526 8.33247L18.8716 8.54577ZM17.8891 11.8579L18.6081 12.0712V12.0712L17.8891 11.8579ZM4.11094 11.8579L4.82997 11.6446L4.11094 11.8579ZM3.12841 8.54576L2.40938 8.75907L2.40938 8.75907L3.12841 8.54576ZM7.98521 16.8049L8.1927 16.0841V16.0841L7.98521 16.8049ZM5.15544 14.6927L4.52349 15.0966L5.15544 14.6927ZM16.8446 14.6927L17.4765 15.0966H17.4765L16.8446 14.6927ZM14.0148 16.8049L13.8073 16.0841V16.0841L14.0148 16.8049ZM19.873 5.00001V4.25001H19.2841L19.1444 4.82204L19.873 5.00001ZM2.12703 5.00001V4.25001H1.17177L1.39845 5.17798L2.12703 5.00001ZM1 4.25001C0.585786 4.25001 0.25 4.5858 0.25 5.00001C0.25 5.41422 0.585786 5.75001 1 5.75001V4.25001ZM21 5.75001C21.4142 5.75001 21.75 5.41422 21.75 5.00001C21.75 4.5858 21.4142 4.25001 21 4.25001V5.75001ZM13.75 9.00001C13.75 8.5858 13.4142 8.25001 13 8.25001C12.5858 8.25001 12.25 8.5858 12.25 9.00001H13.75ZM12.25 13C12.25 13.4142 12.5858 13.75 13 13.75C13.4142 13.75 13.75 13.4142 13.75 13H12.25ZM14.5304 0.46967C14.2375 0.176777 13.7626 0.176777 13.4697 0.46967C13.1768 0.762563 13.1768 1.23744 13.4697 1.53033L14.5304 0.46967ZM8.77297 1.53035C9.06586 1.23745 9.06586 0.762578 8.77297 0.469685C8.48008 0.176792 8.0052 0.176792 7.71231 0.469685L8.77297 1.53035ZM9.75 9.00001C9.75 8.5858 9.41421 8.25001 9 8.25001C8.58579 8.25001 8.25 8.5858 8.25 9.00001H9.75ZM8.25 13C8.25 13.4142 8.58579 13.75 9 13.75C9.41421 13.75 9.75 13.4142 9.75 13H8.25ZM18.1526 8.33247L17.17 11.6446L18.6081 12.0712L19.5906 8.75907L18.1526 8.33247ZM4.82997 11.6446L3.84743 8.33246L2.40938 8.75907L3.39191 12.0712L4.82997 11.6446ZM11 16.25C9.39454 16.25 8.74417 16.2429 8.1927 16.0841L7.77772 17.5256C8.58199 17.7571 9.48956 17.75 11 17.75V16.25ZM3.39191 12.0712C3.82148 13.5192 4.07278 14.3914 4.52349 15.0966L5.7874 14.2888C5.47836 13.8052 5.28656 13.1837 4.82997 11.6446L3.39191 12.0712ZM8.1927 16.0841C7.19926 15.7981 6.34412 15.1598 5.7874 14.2888L4.52349 15.0966C5.2767 16.2751 6.43365 17.1386 7.77772 17.5256L8.1927 16.0841ZM17.17 11.6446C16.7134 13.1837 16.5216 13.8052 16.2126 14.2888L17.4765 15.0966C17.9272 14.3913 18.1785 13.5192 18.6081 12.0712L17.17 11.6446ZM11 17.75C12.5104 17.75 13.418 17.7571 14.2223 17.5256L13.8073 16.0841C13.2558 16.2429 12.6055 16.25 11 16.25V17.75ZM16.2126 14.2888C15.6559 15.1598 14.8007 15.7981 13.8073 16.0841L14.2223 17.5256C15.5663 17.1386 16.7233 16.2751 17.4765 15.0966L16.2126 14.2888ZM19.5906 8.75907C20.0122 7.3378 20.3609 6.16331 20.6016 5.17798L19.1444 4.82204C18.9143 5.76385 18.5779 6.89852 18.1526 8.33247L19.5906 8.75907ZM3.84743 8.33246C3.42205 6.89852 3.08566 5.76385 2.8556 4.82204L1.39845 5.17798C1.63913 6.1633 1.98776 7.33781 2.40938 8.75907L3.84743 8.33246ZM12.25 9.00001V13H13.75V9.00001H12.25ZM8.25 9.00001V13H9.75V9.00001H8.25ZM13.4697 1.53033L17.4697 5.53034L18.5304 4.46968L14.5304 0.46967L13.4697 1.53033ZM18 5.75001H20V4.25001H18V5.75001ZM20 5.75001H21V4.25001H20V5.75001ZM19.873 5.75001H20V4.25001H19.873V5.75001ZM1 5.75001H4.24265V4.25001H1V5.75001ZM4.24265 5.75001H18V4.25001H4.24265V5.75001ZM7.71231 0.469685L3.71232 4.46968L4.77298 5.53034L8.77297 1.53035L7.71231 0.469685ZM2.12703 5.75001H4.24265V4.25001H2.12703V5.75001Z"
                            fill="#424C60" />
                    </svg>
                    <span>{{ __('customer.my_orders') }}</span>
                </a>
            </li>
            <li
                class="{{ request()->is('customer/rating-review') || request()->is('customer/rating-review/*')? 'active_user_menu': '' }}">
                <a href="{{ route('customer.rating-review') }}">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.1043 2.17701L12.9317 5.82776C13.1108 6.18616 13.4565 6.43467 13.8573 6.49218L17.9453 7.08062C18.9554 7.22644 19.3573 8.45055 18.6263 9.15194L15.6702 11.9924C15.3797 12.2718 15.2474 12.6733 15.3162 13.0676L16.0138 17.0778C16.1856 18.0698 15.1298 18.8267 14.227 18.3574L10.5732 16.4627C10.215 16.2768 9.78602 16.2768 9.42679 16.4627L5.773 18.3574C4.87023 18.8267 3.81439 18.0698 3.98724 17.0778L4.68385 13.0676C4.75257 12.6733 4.62033 12.2718 4.32982 11.9924L1.37368 9.15194C0.642715 8.45055 1.04464 7.22644 2.05466 7.08062L6.14265 6.49218C6.54354 6.43467 6.89028 6.18616 7.06937 5.82776L8.89574 2.17701C9.34765 1.27433 10.6523 1.27433 11.1043 2.17701Z"
                            stroke="#424C60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>{{ __('customer.my_rating_reviews') }}</span>
                </a>
            </li>
            <li
                class="{{ request()->is('customer/wishlist') || request()->is('customer/wishlist/*')? 'active_user_menu': '' }}">
                <a href="{{ route('customer.wishlist') }}">
                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.3115 2.46071C16.9773 0.0803204 14.2743 1.08425 12.6007 2.14593C11.655 2.74582 10.345 2.74582 9.39929 2.14593C7.72564 1.08427 5.02272 0.0803466 2.68853 2.46072C-2.85249 8.11136 6.64988 19 11 19C15.3502 19 24.8525 8.11136 19.3115 2.46071Z"
                            stroke="#424C60" stroke-width="1.5" stroke-linecap="round" />
                    </svg>

                    <span>{{ __('customer.my_wishlist') }}</span>
                </a>
            </li>
            <li
                class="{{ request()->is('customer/my-payment') || request()->is('customer/my-payment/*')? 'active_user_menu': '' }}">
                <a href="{{ route('customer.my-peyment') }}">
                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20.6389 12.3957H16.5906C15.1042 12.3948 13.8993 11.1909 13.8984 9.70446C13.8984 8.21801 15.1042 7.01409 16.5906 7.01318H20.6389"
                            stroke="#424C60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M17.0486 9.6427H16.7369" stroke="#424C60" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.74766 1H15.3911C18.2892 1 20.6388 3.34951 20.6388 6.24766V13.4247C20.6388 16.3229 18.2892 18.6724 15.3911 18.6724H6.74766C3.84951 18.6724 1.5 16.3229 1.5 13.4247V6.24766C1.5 3.34951 3.84951 1 6.74766 1Z"
                            stroke="#424C60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.03561 5.5382H11.4346" stroke="#424C60" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <span>{{ __('customer.payment_method') }}</span>
                </a>
            </li>
            <li
                class="{{ request()->is('customer/my-quotations') || request()->is('customer/my-quotations/*')? 'active_user_menu': '' }}">
                <a href="{{ route('my-quotations') }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.2101 2.01103C8.32518 2.27271 5.7105 3.71063 3.99897 5.9768C3.44879 6.70524 2.91089 7.69462 2.5874 8.57302C2.39048 9.10779 2.15981 10.039 2.07347 10.648C1.97563 11.3379 1.97548 12.7242 2.0732 13.3657C2.40373 15.536 3.34904 17.4558 4.83307 18.9708C5.6608 19.8158 6.45482 20.4036 7.44787 20.9063C9.93915 22.1674 12.8347 22.3464 15.4198 21.3991C16.3253 21.0673 17.4653 20.4283 18.2226 19.8282C18.6273 19.5075 19.4222 18.7207 19.7544 18.3122C21.6816 15.9417 22.4185 12.8017 21.7504 9.8073C21.5957 9.11393 21.5336 8.93957 21.39 8.79599C21.2654 8.67144 21.2453 8.6648 21.0432 8.68157C20.799 8.70183 20.6624 8.80076 20.5945 9.00656C20.5596 9.11205 20.5753 9.21974 20.6896 9.662C20.9008 10.479 20.9854 11.1483 20.9848 11.9971C20.9837 13.4163 20.7182 14.6072 20.124 15.858C19.4479 17.2813 18.4112 18.5081 17.1341 19.3962C15.6143 20.4531 13.8761 20.9971 12.0117 20.9995C11.252 21.0004 10.9013 20.9674 10.2129 20.8299C7.47837 20.284 5.11371 18.4632 3.90262 15.971C3.04064 14.1973 2.77665 12.2684 3.13366 10.3529C3.40523 8.89601 4.04918 7.49426 4.97286 6.34944C5.28686 5.96029 5.97612 5.26587 6.33743 4.97459C7.08379 4.37303 8.2112 3.76096 9.12468 3.46147C10.2213 3.10192 11.0585 2.98231 12.2584 3.01371C13.0993 3.03568 13.6363 3.11205 14.4089 3.31953C14.7861 3.4208 14.8705 3.43175 14.9843 3.39417C15.1957 3.32442 15.3159 3.15189 15.3159 2.91829C15.3159 2.74871 15.2985 2.70448 15.1884 2.59445C15.1061 2.51209 14.9781 2.44284 14.8267 2.3987C14.4493 2.28866 13.7905 2.14695 13.3547 2.08208C12.9655 2.02417 11.5737 1.97803 11.2101 2.01103ZM18.186 3.11635C18.1021 3.17844 17.3709 3.89551 16.5611 4.70979C15.3213 5.95642 15.0819 6.21501 15.046 6.34671C15.0213 6.4377 15.0034 6.87045 15.0033 7.38156L15.003 8.25997L13.2858 9.9819C11.7866 11.4852 11.5651 11.7224 11.5414 11.8501C11.5049 12.0468 11.5439 12.1805 11.6763 12.3129C11.8086 12.4451 11.9421 12.4842 12.139 12.448C12.267 12.4245 12.5017 12.2053 14.0069 10.7037L15.7284 8.98614L16.6072 8.98591C17.1186 8.98579 17.5514 8.96788 17.6425 8.94313C17.7742 8.90723 18.0328 8.66793 19.2794 7.42809C20.0937 6.61828 20.8107 5.88705 20.8728 5.80318C21.002 5.62874 21.022 5.41587 20.9267 5.2315C20.8241 5.03301 20.7585 5.01874 19.8518 4.99766L19.0111 4.97811L18.9915 4.1374C18.9704 3.23069 18.9562 3.16511 18.7577 3.06247C18.5733 2.96713 18.3604 2.98719 18.186 3.11635ZM18.0849 5.73295C18.1946 5.9253 18.3482 5.97492 18.8348 5.97508L19.2842 5.97523L18.2877 6.97235L17.2911 7.96947H16.6554H16.0197V7.33433V6.69918L17.0071 5.71105L17.9944 4.72289L18.0139 5.18289C18.0256 5.45571 18.0544 5.6795 18.0849 5.73295ZM10.9961 5.05976C8.39467 5.46396 6.28136 7.22456 5.42845 9.69813C4.82533 11.4472 4.94342 13.3611 5.75722 15.0275C7.27809 18.1417 10.8776 19.67 14.1819 18.6044C14.6813 18.4433 15.4485 18.0691 15.9024 17.7651C17.4338 16.7396 18.5062 15.1325 18.8772 13.307C18.9614 12.8928 19.0244 11.6956 18.9756 11.4358C18.9169 11.123 18.5849 10.9194 18.3184 11.0329C18.2477 11.063 18.1472 11.1339 18.0949 11.1906C18.0025 11.2909 17.9998 11.3119 17.9928 11.9875C17.9873 12.5112 17.9657 12.7787 17.9049 13.0784C17.4134 15.4968 15.6388 17.2968 13.2205 17.8297C12.8937 17.9017 12.707 17.9154 12.0312 17.9167C11.3458 17.9182 11.1743 17.906 10.848 17.833C9.62034 17.5583 8.66549 17.0405 7.80519 16.1827C6.93961 15.3196 6.38342 14.2792 6.13918 13.0664C6.03309 12.5396 6.04385 11.2942 6.15893 10.7716C6.28206 10.2126 6.45075 9.73825 6.69894 9.25306C7.54821 7.59268 9.05069 6.4623 10.9107 6.08433C11.2113 6.02329 11.4779 6.0019 12.0075 5.99639L12.7072 5.98915L12.8384 5.84592C13.0005 5.66898 13.0153 5.4685 12.8809 5.26739C12.7243 5.03289 12.5974 4.99731 11.9335 5.00149C11.6109 5.00357 11.189 5.02977 10.9961 5.05976ZM11.4676 8.0108C10.1958 8.20694 9.06759 9.00683 8.49708 10.1168C7.51865 12.0206 8.18625 14.3473 10.014 15.4033C10.6977 15.7983 11.3776 15.9658 12.1681 15.9339C12.8121 15.9079 13.2084 15.8097 13.7713 15.5364C15.0815 14.9003 15.9691 13.5539 15.9932 12.1663C16 11.7753 15.9982 11.7664 15.8851 11.6479C15.6005 11.3498 15.1531 11.4537 15.0412 11.8439C15.0202 11.9171 15.003 12.0667 15.003 12.1763C15.003 12.4525 14.8726 12.9413 14.7109 13.271C14.3316 14.0448 13.6121 14.6372 12.7854 14.8566C12.4226 14.953 11.7788 14.9709 11.4251 14.8946C10.3085 14.6536 9.42702 13.8143 9.13148 12.7106C9.01953 12.2927 9.01902 11.625 9.13035 11.2097C9.41255 10.1565 10.249 9.33107 11.3043 9.06431C11.4744 9.02134 11.7032 8.98603 11.8126 8.98591C12.2055 8.98548 12.4235 8.86352 12.4985 8.60212C12.5468 8.43366 12.4873 8.24354 12.343 8.10532C12.2384 8.00513 12.1925 7.99047 11.9615 7.98328C11.817 7.97882 11.5948 7.99117 11.4676 8.0108Z"
                            fill="black"></path>
                    </svg>
                    <span>{{ __('customer.my_quotations') }}</span>
                </a>
            </li>
            <li class="{{ request()->is('customer/support') || request()->is('customer/support/*')? 'active_user_menu': '' }}">
                <a href="{{ route('customer.support') }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18 18.8597H17.24C16.44 18.8597 15.68 19.1697 15.12 19.7297L13.41 21.4198C12.63 22.1898 11.36 22.1898 10.58 21.4198L8.87 19.7297C8.31 19.1697 7.54 18.8597 6.75 18.8597H6C4.34 18.8597 3 17.5298 3 15.8898V4.97974C3 3.33974 4.34 2.00977 6 2.00977H18C19.66 2.00977 21 3.33974 21 4.97974V15.8898C21 17.5198 19.66 18.8597 18 18.8597Z"
                            stroke="#424C60" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M7 9.15979C7 8.22979 7.76 7.46973 8.69 7.46973C9.62 7.46973 10.38 8.22979 10.38 9.15979C10.38 11.0398 7.71 11.2398 7.12 13.0298C7 13.3998 7.31 13.7698 7.7 13.7698H10.38"
                            stroke="#424C60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M16.0398 13.7599V8.04991C16.0398 7.78991 15.8698 7.55985 15.6198 7.48985C15.3698 7.41985 15.0998 7.51985 14.9598 7.73985C14.2398 8.89985 13.4598 10.2199 12.7798 11.3799C12.6698 11.5699 12.6698 11.8199 12.7798 12.0099C12.8898 12.1999 13.0998 12.3198 13.3298 12.3198H16.9998"
                            stroke="#424C60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>{{ __('customer.support') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('seller.registration') }}" class="be_sellar">Be A Sellar</a>
            </li>
        </ul>
    </div>
</div>