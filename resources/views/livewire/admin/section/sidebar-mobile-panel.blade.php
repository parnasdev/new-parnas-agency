<div>
    <header class="header-m isMobile" style="display: none;" x-data>
        <div class="row-header">
            <div class="menu-up open-side"
                @click="$('.backface-drop').show();
        $('.menu-l-mobile').show();
        $('body').css({
            'overflow-y': 'hidden'
        });
        $('.menu-l-mobile').animate({
            'right': 0
        }, 800);">
                <div class="image">
                    <svg width="20" height="20" viewBox="0 0 20 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 13.0048C20 13.5548 19.554 13.9998 19.005 13.9998H10.995C10.7311 13.9998 10.478 13.8949 10.2914 13.7083C10.1048 13.5217 10 13.2687 10 13.0048C10 12.7409 10.1048 12.4878 10.2914 12.3012C10.478 12.1146 10.7311 12.0098 10.995 12.0098H19.005C19.555 12.0098 20 12.4548 20 13.0048V13.0048Z"
                            fill="black" />
                        <path
                            d="M20 7.00086C20 7.55086 19.554 7.99586 19.005 7.99586H0.995C0.731109 7.99586 0.478028 7.89103 0.291429 7.70443C0.10483 7.51783 0 7.26475 0 7.00086C0 6.73697 0.10483 6.48389 0.291429 6.29729C0.478028 6.11069 0.731109 6.00586 0.995 6.00586H19.005C19.555 6.00586 20 6.45186 20 7.00086V7.00086Z"
                            fill="black" />
                        <path
                            d="M19.005 1.99C19.2689 1.99 19.522 1.88517 19.7086 1.69857C19.8952 1.51197 20 1.25889 20 0.995C20 0.731109 19.8952 0.478027 19.7086 0.291429C19.522 0.10483 19.2689 7.86455e-09 19.005 0H6.995C6.86433 -3.89413e-09 6.73495 0.0257364 6.61423 0.0757399C6.49351 0.125743 6.38382 0.199034 6.29143 0.291429C6.19903 0.383823 6.12574 0.493511 6.07574 0.61423C6.02574 0.734949 6 0.864335 6 0.995C6 1.12567 6.02574 1.25505 6.07574 1.37577C6.12574 1.49649 6.19903 1.60618 6.29143 1.69857C6.38382 1.79097 6.49351 1.86426 6.61423 1.91426C6.73495 1.96426 6.86433 1.99 6.995 1.99H19.005Z"
                            fill="black" />
                    </svg>
                </div>
            </div>
            <!--? child  -->
            <div class="info-detail d-flex align-items-center justify-content-end flex-50">
                <div class="image px-5 ml-10 d-flex justify-content-center align-items-center radius-5 cursor-pointer"
                    style="height: 35px">
                    <div class="line"></div>
                    <div class="sequare"></div>
                    <div class="image">
                        <a href="https://parnas.agency/contact-us" class="d-flex align-items-center">
                            <svg width="25" height="25" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M24 12.7207C24.89 12.7207 25.76 12.9846 26.5001 13.4791C27.2401 13.9736 27.8169 14.6764 28.1575 15.4986C28.4981 16.3209 28.5872 17.2257 28.4135 18.0986C28.2399 18.9715 27.8113 19.7733 27.182 20.4027C26.5526 21.032 25.7508 21.4606 24.8779 21.6342C24.005 21.8079 23.1002 21.7188 22.2779 21.3782C21.4557 21.0376 20.7529 20.4608 20.2584 19.7208C19.7639 18.9807 19.5 18.1107 19.5 17.2207C19.5 16.0272 19.9741 14.8826 20.818 14.0387C21.6619 13.1948 22.8065 12.7207 24 12.7207V12.7207ZM24 23.9107C29 23.9107 33 25.3107 33 26.9807V31.2807H15V27.0007C15 25.3107 19 23.9107 24 23.9107Z"
                                    stroke="#212e47" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M22.2014 4.86L6.69141 11.25V27C6.69141 35.44 24.0014 43.5 24.0014 43.5C24.0014 43.5 41.3114 35.44 41.3114 27V11.25L25.8014 4.86C25.2311 4.62235 24.6193 4.5 24.0014 4.5C23.3835 4.5 22.7718 4.62235 22.2014 4.86V4.86Z"
                                    stroke="#212e47" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="image px-5 ml-10 d-flex justify-content-center align-items-center radius-5 cursor-pointer"
                    style="height: 35px">
                    <div class="line"></div>
                    <div class="sequare"></div>
                    <div class="image">
                        <a href="https://wa.me/+989354433706" class="d-flex align-items-center">
                            <svg width="20" height="20" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M24 2.5C20.2653 2.50401 16.5959 3.47992 13.3526 5.33177C10.1093 7.18362 7.40374 9.84765 5.502 13.0619C3.60026 16.2762 2.56777 19.9301 2.50606 23.6644C2.44434 27.3986 3.35552 31.0846 5.15 34.36L2.5 45.5L13.64 42.85C16.5132 44.4262 19.7088 45.3247 22.9824 45.4768C26.2561 45.629 29.5212 45.0307 32.5282 43.7278C35.5353 42.4249 38.2047 40.4518 40.3325 37.9594C42.4603 35.4669 43.9901 32.521 44.8051 29.3468C45.6201 26.1725 45.6987 22.854 45.0348 19.6448C44.371 16.4355 42.9823 13.4205 40.9748 10.8301C38.9674 8.23976 36.3944 6.14256 33.4523 4.69881C30.5103 3.25506 27.2772 2.50296 24 2.5V2.5ZM13.25 12.27H19.11C19.3752 12.27 19.6296 12.3754 19.8171 12.5629C20.0046 12.7504 20.11 13.0048 20.11 13.27C20.0772 14.6036 20.3013 15.9311 20.77 17.18C20.9719 17.5981 21.0162 18.0749 20.895 18.5231C20.7738 18.9712 20.4951 19.3607 20.11 19.62L18.06 21.62C18.969 23.395 20.1575 25.0124 21.58 26.41C22.9663 27.8557 24.5771 29.068 26.35 30L28.35 27.95C29.35 26.95 29.81 26.95 30.79 27.29C32.0389 27.7587 33.3664 27.9828 34.7 27.95C34.9613 27.9622 35.2086 28.0714 35.3936 28.2564C35.5786 28.4414 35.6878 28.6887 35.7 28.95V34.81C35.6878 35.0713 35.5786 35.3186 35.3936 35.5036C35.2086 35.6886 34.9613 35.7978 34.7 35.81C28.8176 35.5537 23.2417 33.1151 19.06 28.97C14.9084 24.7928 12.4686 19.2142 12.22 13.33C12.2224 13.0547 12.3307 12.791 12.5226 12.5936C12.7144 12.3962 12.9749 12.2803 13.25 12.27V12.27Z"
                                    stroke="#212e47" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="image px-5 d-flex justify-content-center align-items-center radius-5 cursor-pointer"
                    style="height: 35px">
                    <div class="line"></div>
                    <div class="sequare"></div>
                    <div class="image">
                        <a href="https://parnas.agency/" target="_blank" class="d-flex align-items-center">
                            <img src="/img/png/Parnas-Company.png" width="25px" height="25px" alt="parnas-logo" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- backface drop -->
        <div class="backface-drop" style="display: none;"></div>
        <!-- menu list for mobile -->
        <div class="menu-l-mobile" style="display: none;">
            <div class="p-menu-l pt-7">
                <!--? back to inline page -->
                <div class="c-row pos-absolute back-page d-flex align-items-center pr-10 pt-5"
                    style="left:-60px;top:40px;"
                    @click=" $('.menu-l-mobile').animate({
            'right': '-800px'
        }, 800);
        $('.backface-drop').hide();
        $('body').css({
            'overflow-y': 'scroll'
        });">
                    <div class="bg-white d-flex align-items-center pt-12 pb-10 pl-10 pr-8 radius-100">
                        <svg width="20" height="15" viewBox="0 0 13 11" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0 5.5C0 5.29165 0.085593 5.09184 0.237949 4.94452C0.390306 4.79719 0.596945 4.71443 0.812409 4.71443H10.225L6.7365 1.34275C6.58395 1.19524 6.49825 0.995175 6.49825 0.786565C6.49825 0.577955 6.58395 0.377889 6.7365 0.23038C6.88905 0.0828702 7.09595 0 7.31168 0C7.52742 0 7.73432 0.0828702 7.88687 0.23038L12.7613 4.94381C12.837 5.01679 12.897 5.10348 12.938 5.19892C12.9789 5.29436 13 5.39667 13 5.5C13 5.60333 12.9789 5.70564 12.938 5.80108C12.897 5.89652 12.837 5.98321 12.7613 6.05619L7.88687 10.7696C7.73432 10.9171 7.52742 11 7.31168 11C7.09595 11 6.88905 10.9171 6.7365 10.7696C6.58395 10.6221 6.49825 10.422 6.49825 10.2134C6.49825 10.0048 6.58395 9.80476 6.7365 9.65725L10.225 6.28557H0.812409C0.596945 6.28557 0.390306 6.20281 0.237949 6.05548C0.085593 5.90816 0 5.70835 0 5.5Z"
                                fill="#222" />
                        </svg>
                    </div>
                </div>
                <!--? personData -->
                <div class="c-row">
                    <!--? text  -->
                    <div class="text my-6">
                        <div class="text">
                            <div class="text time d-flex justify-content-center mt-6">
                                <span class="f-10 f-bold text-white">{{ $message }}; امروز
                                    {{ jdate()->format('%A %d %B') }}</span>
                                <span class="f-10 f-bold text-white">ساعت {{ jdate()->format('H:i') }}</span>
                            </div>
                        </div>
                    </div>
                    <!--! profile -->
                    <div class="p-profile d-flex align-items-center justify-content-between rtl py-5 px-10">
                        <!--? detail profile  -->
                        <div class="d-flex align-items-center">
                            <!--? logo -->
                            <div class="image profile pl-10">
                                <img src="{{ user()->files()->first()?->url ?? '/img/png/nopicture.jpg' }}"
                                    alt="profile" />
                                <div wire:offline.class.remove="bg-success" class="state bg-success"></div>
                            </div>
                            <!--? text -->
                            <div class="text px-2">
                                <h6 class="text-dark">{{ user()->name }} {{ user()->family }}</h6>
                                <div class="text-dark text-notifaction">
                                    {{-- <span class="f-10 text-63">{{$message}}</span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="show d-flex justify-content-center ml-2">
                                <a href="/" target="_blank"
                                    class="d-flex align-items-center justify-content-center cursor-pointer bg-primary py-5 px-5 radius-7">
                                    <svg width="20" height="20" style="padding-left: 0 !important"
                                        viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.4333 15.6532C19.4333 17.9267 17.5956 19.7655 15.3339 19.7655C13.0721 19.7655 11.2344 17.9267 11.2344 15.6532C11.2344 13.3798 13.0721 11.541 15.3339 11.541C17.5956 11.541 19.4333 13.3798 19.4333 15.6532Z"
                                            stroke="#F8F8F8" stroke-width="2" />
                                        <path
                                            d="M26.0082 14.5827C26.3908 15.0629 26.5821 15.3031 26.5821 15.6527C26.5821 16.0024 26.3908 16.2425 26.0082 16.7227C24.3283 18.8313 20.182 23.321 15.3332 23.321C10.4844 23.321 6.33814 18.8313 4.6582 16.7227C4.27562 16.2425 4.08432 16.0024 4.08432 15.6527C4.08432 15.3031 4.27562 15.0629 4.6582 14.5827C6.33814 12.4741 10.4844 7.98438 15.3332 7.98438C20.182 7.98438 24.3283 12.4741 26.0082 14.5827Z"
                                            stroke="#F8F8F8" stroke-width="2" />
                                    </svg>
                                </a>
                            </div>
                            <div class="exit d-flex justify-content-center mr-2">
                                <a href="{{ route('admin.logout') }}"
                                    class="d-flex align-items-center justify-content-center cursor-pointer bg-danger py-5 px-5 radius-7">
                                    <svg width="20" height="20" style="padding-left: 0 !important"
                                        viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.4961 3H11.4961V13H13.4961V3ZM18.3261 5.17L16.9061 6.59C17.716 7.23968 18.3694 8.0633 18.8177 8.9998C19.266 9.93631 19.4979 10.9617 19.4961 12C19.4961 15.87 16.3661 19 12.4961 19C11.0513 19.0009 9.64172 18.5543 8.46095 17.7218C7.28018 16.8892 6.38619 15.7114 5.90178 14.3503C5.41738 12.9891 5.36634 11.5114 5.75567 10.12C6.14499 8.72871 6.95559 7.49206 8.0761 6.58L6.6661 5.17C5.67231 6.00901 4.87375 7.05492 4.3262 8.23463C3.77866 9.41435 3.49536 10.6994 3.4961 12C3.4961 14.3869 4.44431 16.6761 6.13213 18.364C7.81996 20.0518 10.1091 21 12.4961 21C14.883 21 17.1722 20.0518 18.8601 18.364C20.5479 16.6761 21.4961 14.3869 21.4961 12C21.4961 9.26 20.2661 6.82 18.3261 5.17Z"
                                            fill="#F8F8F8" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!--? line horizontal  -->
                <div class="mx-8">
                    <div class="line-horizontal bg-gray radius-10"></div>
                </div>
                <!--? data list  -->
                <ul class="pt-2 local-list-mobile pr-10 scroller">
                    @foreach (collect(config('sidebar'))->sortBy('order') as $sidebar)
                        <!--? item -->
                        @if (count($sidebar['links']) == 0)
                            @if (!is_null($sidebar['can']) && $sidebar['can'] != '')
                                @can($sidebar['can'])
                                    <li
                                        class="c-row d-flex align-items-center {{ \Illuminate\Support\Facades\Route::currentRouteName() == $sidebar['route'] ? 'm-active-route' : '' }} py-12">
                                        <a href="{{ \Illuminate\Support\Facades\Route::has($sidebar['route']) ? route($sidebar['route']) : $sidebar['route'] }}"
                                            class="text-white f-12 pr-6">
                                            {!! $sidebar['icon'] !!}
                                            {{ $sidebar['title'] }}
                                        </a>
                                    </li>
                                @endcan
                            @else
                                <li
                                    class="c-row d-flex align-items-center {{ \Illuminate\Support\Facades\Route::currentRouteName() == $sidebar['route'] ? 'm-active-route' : '' }} py-12">
                                    <a href="{{ \Illuminate\Support\Facades\Route::has($sidebar['route']) ? route($sidebar['route']) : $sidebar['route'] }}"
                                        class="text-white f-12 pr-6">
                                        {!! $sidebar['icon'] !!}
                                        {{ $sidebar['title'] }}
                                    </a>
                                </li>
                            @endif
                        @else
                            @if (!is_null($sidebar['can']) && $sidebar['can'] != '')
                                @can($sidebar['can'])
                                    <li class="c-row d-flex align-items-center py-12" x-data="{ show: false }">
                                        <a href="#" class="d-flex align-items-center text-base-light"
                                            @click.prevent="show = !show">
                                            {!! $sidebar['icon'] !!}
                                            {{ $sidebar['title'] }}
                                            <!-- expand -->
                                            <div class="expand">
                                                <div class="image">
                                                    <svg class="rotate-up pl-0" width="20" height="20"
                                                        viewBox="0 0 47 47" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.8359 23.2251L17.1279 22.5189L16.4235 23.2251L17.1279 23.9314L17.8359 23.2251ZM28.6018 11.0164L17.1279 22.5189L18.5439 23.9314L30.0178 12.4289L28.6018 11.0164ZM17.1279 23.9314L28.6018 35.4339L30.0178 34.0214L18.5439 22.5189L17.1279 23.9314Z"
                                                            fill="#636466" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- nested list -->
                                        <ul class="nested-list pt-10" x-show="show" x-transition:enter.scale.80
                                            x-transition:leave.scale.90 x-transition:enter.duration.500ms
                                            x-transition:leave.duration.400ms>
                                            <!-- li *> item -->
                                            @foreach ($sidebar['links'] as $link)
                                                @if (!is_null($link['can']) && $link['can'] != '')
                                                    @can($link['can'])
                                                        <li class="li-list d-flex align-content-center py-9 pr-15">
                                                            <a href="{{ \Illuminate\Support\Facades\Route::has($link['route']) ? route($link['route']) : $link['route'] }}"
                                                                class="d-flex align-items-center text-base-light">
                                                                {{ $link['title'] }}
                                                            </a>
                                                        </li>
                                                    @endcan
                                                @else
                                                    <li class="li-list d-flex align-content-center py-9 pr-15">
                                                        <a href="{{ \Illuminate\Support\Facades\Route::has($link['route']) ? route($link['route']) : $link['route'] }}"
                                                            class="d-flex align-items-center text-base-light">
                                                            {{ $link['title'] }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endcan
                            @else
                                <li class="c-row pb-17" x-data="{ show: false }">
                                    <a href="#" class="d-flex align-items-center text-base-light"
                                        @click.prevent="show = !show">
                                        {!! $sidebar['icon'] !!}
                                        {{ $sidebar['title'] }}
                                        <!-- expand -->
                                        <div class="expand">
                                            <div class="image">
                                                <svg class="rotate-up pl-0" width="20" height="20"
                                                    viewBox="0 0 47 47" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.8359 23.2251L17.1279 22.5189L16.4235 23.2251L17.1279 23.9314L17.8359 23.2251ZM28.6018 11.0164L17.1279 22.5189L18.5439 23.9314L30.0178 12.4289L28.6018 11.0164ZM17.1279 23.9314L28.6018 35.4339L30.0178 34.0214L18.5439 22.5189L17.1279 23.9314Z"
                                                        fill="#636466" />
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- nested list -->
                                    <ul class="nested-list pt-10" x-show="show" x-transition:enter.scale.80
                                        x-transition:leave.scale.90 x-transition:enter.duration.500ms
                                        x-transition:leave.duration.400ms>
                                        <!-- li *> item -->
                                        @foreach ($sidebar['links'] as $link)
                                            <li class="li-list d-flex align-content-center py-9 pr-15">
                                                <a href="{{ \Illuminate\Support\Facades\Route::has($link['route']) ? route($link['route']) : $link['route'] }}"
                                                    class="d-flex align-items-center text-base-light">
                                                    {{ $link['title'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </header>

</div>
