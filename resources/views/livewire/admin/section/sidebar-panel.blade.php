<div>
    <div class="right flex-20 scroller pt-10 pb-20 scroller-transparent isDesktop" x-data="{
         init() {
            let activeLink = document.querySelector('.active-route');
            if (activeLink) {
                let parentPos = $refs.scroller.getBoundingClientRect(),
                    childPos = activeLink.getBoundingClientRect(),
                    top = 0;

                top = childPos.top - parentPos.top;
                $refs.scroller.scrollTop = top
            }


        }
    }">
        <div class="controller-aside">
            <!--? top -->
            <div class="d-top">
                <!--! profile -->
                <div class="p-profile d-flex align-items-center justify-content-between rtl py-5 pr-12 pb-0">
                    <!--? detail profile  -->
                    <div class="flex-70 d-flex align-items-center">
                        <!--? logo -->
                        <div class="image profile pl-10">
                            <img src="{{ user()->files()->first()?->url ?? '/img/png/nopicture.jpg' }}"
                                alt="profile" />
                            <div wire:offline.class.remove="bg-success" class="state bg-success"></div>
                        </div>
                        <!--? text -->
                        <div class="text px-2">
                            <h6 class="text-dark">{{ user()->name }} {{ user()->family }}</h6>
                            <div class="text-notifaction">

                                {{-- <span class="f-10 text-white">{{$message}}</span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="flex-30 d-flex justify-content-center flex-direction-row-reverse">
                        <!--? exit panel  -->
                        <div class="exit flex-40 d-flex justify-content-center ml-7">
                            <a href="{{ route('admin.logout') }}"
                                class="tooltip d-flex align-items-center justify-content-center cursor-pointer bg-danger py-5 px-5 radius-7">
                                <svg width="14" height="14" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.4961 3H11.4961V13H13.4961V3ZM18.3261 5.17L16.9061 6.59C17.716 7.23968 18.3694 8.0633 18.8177 8.9998C19.266 9.93631 19.4979 10.9617 19.4961 12C19.4961 15.87 16.3661 19 12.4961 19C11.0513 19.0009 9.64172 18.5543 8.46095 17.7218C7.28018 16.8892 6.38619 15.7114 5.90178 14.3503C5.41738 12.9891 5.36634 11.5114 5.75567 10.12C6.14499 8.72871 6.95559 7.49206 8.0761 6.58L6.6661 5.17C5.67231 6.00901 4.87375 7.05492 4.3262 8.23463C3.77866 9.41435 3.49536 10.6994 3.4961 12C3.4961 14.3869 4.44431 16.6761 6.13213 18.364C7.81996 20.0518 10.1091 21 12.4961 21C14.883 21 17.1722 20.0518 18.8601 18.364C20.5479 16.6761 21.4961 14.3869 21.4961 12C21.4961 9.26 20.2661 6.82 18.3261 5.17Z"
                                        fill="#F8F8F8" />
                                </svg>
                                <span class="s-tooltip topright_tooltip">
                                    خروج از پنل
                                </span>
                            </a>
                        </div>
                        <div class="show flex-40 d-flex justify-content-center">
                            <a href="/" target="_blank"
                                class="tooltip d-flex align-items-center justify-content-center cursor-pointer bg-primary py-5 px-5 radius-7">
                                <svg width="14" height="14" viewBox="0 0 31 31" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.4333 15.6532C19.4333 17.9267 17.5956 19.7655 15.3339 19.7655C13.0721 19.7655 11.2344 17.9267 11.2344 15.6532C11.2344 13.3798 13.0721 11.541 15.3339 11.541C17.5956 11.541 19.4333 13.3798 19.4333 15.6532Z"
                                        stroke="#F8F8F8" stroke-width="2" />
                                    <path
                                        d="M26.0082 14.5827C26.3908 15.0629 26.5821 15.3031 26.5821 15.6527C26.5821 16.0024 26.3908 16.2425 26.0082 16.7227C24.3283 18.8313 20.182 23.321 15.3332 23.321C10.4844 23.321 6.33814 18.8313 4.6582 16.7227C4.27562 16.2425 4.08432 16.0024 4.08432 15.6527C4.08432 15.3031 4.27562 15.0629 4.6582 14.5827C6.33814 12.4741 10.4844 7.98438 15.3332 7.98438C20.182 7.98438 24.3283 12.4741 26.0082 14.5827Z"
                                        stroke="#F8F8F8" stroke-width="2" />
                                </svg>
                                <span class="s-tooltip topright_tooltip">
                                    مشاهده سایت
                                </span>
                            </a>
                        </div>
                    </div>


                </div>
                <!--! local list  -->
                <div class="local-list pl-0 scroller" x-ref="scroller">
                    <!--? controller backend loop data  -->
                    <div class="data-l w-100">
                        <!--? title  -->
                        <div class="up rtl pt-15 pr-25">
                            <div class="text pb-7">
                                <div class="d-flex justify-content-start m-left-auto pos-relative pr-10">
                                    <div class="d-flex f-12 text-base-light">
                                        منوی اصلی
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--? items -->
                        <ul class="ul-list pt-3">
                            @foreach (collect(config('sidebar'))->sortBy('order') as $sidebar)
                                <!--? item -->
                                @if (count($sidebar['links']) == 0)
                                    @if (!is_null($sidebar['can']) && $sidebar['can'] != '')
                                        @can($sidebar['can'])
                                            <li
                                                class="li-list d-flex align-content-center py-9 {{ \Illuminate\Support\Facades\Route::currentRouteName() == $sidebar['route'] ? 'active-route' : '' }}">
                                                @if (isset($sidebar['notification']))
                                                    <div class="data-badge d-flex align-items-center flex-direction-column flex-wrap"
                                                        x-data="{
                                                            notify: @entangle($sidebar['notification']),
                                                            show: false,
                                                            init() {
                                                                this.show = this.notify > 0
                                                            }
                                                        }">
                                                        <template x-if="show">
                                                            <div
                                                                class="c-data-badge d-flex justify-content-center align-items-center bg-success radius-5 ml-5 mb-3">
                                                                <span class="text-white f-9 pl-5">اعلان</span>
                                                                <span class="py-2 pl-10 text-white f-9"
                                                                    x-text="notify"></span>
                                                            </div>
                                                        </template>
                                                    </div>
                                                @endif
                                                <a href="{{ \Illuminate\Support\Facades\Route::has($sidebar['route']) ? route($sidebar['route']) : $sidebar['route'] }}"
                                                    class="d-flex align-items-center {{ \Illuminate\Support\Facades\Route::currentRouteName() == $sidebar['route'] ? '' : 'text-white' }}">
                                                    {!! $sidebar['icon'] !!}
                                                    {{ $sidebar['title'] }}
                                                </a>
                                            </li>
                                        @endcan
                                    @else
                                        <li
                                            class="li-list d-flex align-content-center py-9 {{ \Illuminate\Support\Facades\Route::currentRouteName() == $sidebar['route'] ? 'active-route' : '' }}">
                                            @if (isset($sidebar['notification']))
                                                <div class="data-badge d-flex align-items-center flex-direction-column flex-wrap"
                                                    x-data="{
                                                        notify: @entangle($sidebar['notification']),
                                                        show: false,
                                                        init() {
                                                            this.show = this.notify > 0
                                                        }
                                                    }">
                                                    <template x-if="show">
                                                        <div
                                                            class="c-data-badge d-flex justify-content-center align-items-center bg-success radius-5 ml-5 mb-3">
                                                            <span class="text-white f-9 pl-5">اعلان</span>
                                                            <span class="py-2 pl-10 text-white f-9"
                                                                x-text="notify"></span>
                                                        </div>
                                                    </template>
                                                </div>
                                            @endif
                                            <a href="{{ \Illuminate\Support\Facades\Route::has($sidebar['route']) ? route($sidebar['route']) : $sidebar['route'] }}"
                                                class="d-flex align-items-center {{ \Illuminate\Support\Facades\Route::currentRouteName() == $sidebar['route'] ? '' : 'text-white' }}">
                                                {!! $sidebar['icon'] !!}
                                                {{ $sidebar['title'] }}
                                            </a>
                                        </li>
                                    @endif
                                @else
                                    @if (!is_null($sidebar['can']) && $sidebar['can'] != '')
                                        @can($sidebar['can'])
                                            <li class="li-list d-flex align-content-center py-9" x-data="{ show: false }">
                                                <a href="#" class="d-flex align-items-center text-white"
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
                                                                        class="d-flex align-items-center text-white">
                                                                        {{ $link['title'] }}
                                                                    </a>
                                                                </li>
                                                            @endcan
                                                        @else
                                                            <li class="li-list d-flex align-content-center py-9 pr-15">
                                                                <a href="{{ \Illuminate\Support\Facades\Route::has($link['route']) ? route($link['route']) : $link['route'] }}"
                                                                    class="d-flex align-items-center text-white">
                                                                    {{ $link['title'] }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endcan
                                    @else
                                        <li class="li-list d-flex align-content-center py-9" x-data="{ show: false }">
                                            <a href="#" class="d-flex align-items-center text-white"
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
                                                                    class="d-flex align-items-center text-white">
                                                                    {{ $link['title'] }}
                                                                </a>
                                                            </li>
                                                        @endcan
                                                    @else
                                                        <li class="li-list d-flex align-content-center py-9 pr-15">
                                                            <a href="{{ \Illuminate\Support\Facades\Route::has($link['route']) ? route($link['route']) : $link['route'] }}"
                                                                class="d-flex align-items-center text-white">
                                                                {{ $link['title'] }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--! right sidebar small  -->
    <div class="sidebar-mini flex-5 isDesktop" x-data="{
        init() {
            let activeLink = document.querySelector('.active-route');
            if (activeLink) {
                let parentPos = $refs.scroller.getBoundingClientRect(),
                    childPos = activeLink.getBoundingClientRect(),
                    top = 0;

                top = childPos.top - parentPos.top;
                $refs.scroller.scrollTop = top
            }


        }
    }">
        <div class="c-e">
            <!--? top -->
            <div class="d-top">
                <!--! profile -->
                <div class="p-profile d-flex align-items-center justify-content-center flex-wrap rtl bg-transparent pt-10  pb-0">
                    <!--? detail profile  -->
                    <div class="flex-100 d-flex justify-content-center align-items-center mb-7">
                        <!--? logo -->
                        <div class="image profile">
                            <img src="{{ user()->files()->first()?->url ?? '/img/png/nopicture.jpg' }}" alt="profile" />
                            <div wire:offline.class.remove="bg-success" class="state bg-success"></div>
                        </div>
                    </div>
                    <div class="flex-100 d-flex justify-content-center flex-direction-row-reverse">
                        <!--? exit panel  -->
                        <div class="exit flex-50 d-flex justify-content-center">
                            <a href="{{ route('admin.logout') }}"
                                class="d-flex align-items-center justify-content-center cursor-pointer bg-danger py-5 px-5 radius-7">
                                <svg width="14" height="14" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.4961 3H11.4961V13H13.4961V3ZM18.3261 5.17L16.9061 6.59C17.716 7.23968 18.3694 8.0633 18.8177 8.9998C19.266 9.93631 19.4979 10.9617 19.4961 12C19.4961 15.87 16.3661 19 12.4961 19C11.0513 19.0009 9.64172 18.5543 8.46095 17.7218C7.28018 16.8892 6.38619 15.7114 5.90178 14.3503C5.41738 12.9891 5.36634 11.5114 5.75567 10.12C6.14499 8.72871 6.95559 7.49206 8.0761 6.58L6.6661 5.17C5.67231 6.00901 4.87375 7.05492 4.3262 8.23463C3.77866 9.41435 3.49536 10.6994 3.4961 12C3.4961 14.3869 4.44431 16.6761 6.13213 18.364C7.81996 20.0518 10.1091 21 12.4961 21C14.883 21 17.1722 20.0518 18.8601 18.364C20.5479 16.6761 21.4961 14.3869 21.4961 12C21.4961 9.26 20.2661 6.82 18.3261 5.17Z"
                                        fill="#F8F8F8" />
                                </svg>
                            </a>
                        </div>
                        <div class="show flex-50 d-flex justify-content-center">
                            <a href="/" target="_blank"
                                class="d-flex align-items-center justify-content-center cursor-pointer bg-primary py-5 px-5 radius-7">
                                <svg width="14" height="14" viewBox="0 0 31 31" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.4333 15.6532C19.4333 17.9267 17.5956 19.7655 15.3339 19.7655C13.0721 19.7655 11.2344 17.9267 11.2344 15.6532C11.2344 13.3798 13.0721 11.541 15.3339 11.541C17.5956 11.541 19.4333 13.3798 19.4333 15.6532Z"
                                        stroke="#F8F8F8" stroke-width="2" />
                                    <path
                                        d="M26.0082 14.5827C26.3908 15.0629 26.5821 15.3031 26.5821 15.6527C26.5821 16.0024 26.3908 16.2425 26.0082 16.7227C24.3283 18.8313 20.182 23.321 15.3332 23.321C10.4844 23.321 6.33814 18.8313 4.6582 16.7227C4.27562 16.2425 4.08432 16.0024 4.08432 15.6527C4.08432 15.3031 4.27562 15.0629 4.6582 14.5827C6.33814 12.4741 10.4844 7.98438 15.3332 7.98438C20.182 7.98438 24.3283 12.4741 26.0082 14.5827Z"
                                        stroke="#F8F8F8" stroke-width="2" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!--! local list  -->
                <div class="local-list pl-0 scroller" x-ref="scroller">
                    <!--? controller backend loop data  -->
                    <div class="data-l w-100">
                        <!--? items -->
                        <ul class="ul-list pt-17">
                            @foreach (collect(config('sidebar'))->sortBy('order') as $sidebar)
                                <!--? item -->
                                @if (count($sidebar['links']) == 0)
                                    @if (!is_null($sidebar['can']) && $sidebar['can'] != '')
                                        @can($sidebar['can'])
                                            <li
                                                class="li-list d-flex align-content-center justify-content-center tooltip py-9 mx-10 {{ \Illuminate\Support\Facades\Route::currentRouteName() == $sidebar['route'] ? 'active-sidebar' : '' }}">
                                                @if (isset($sidebar['notification']))
                                                    <div class="data-badge d-flex align-items-center justify-content-center flex-direction-column flex-wrap"
                                                        x-data="{
                                                            notify: @entangle($sidebar['notification']),
                                                            show: false,
                                                            init() {
                                                                this.show = this.notify > 0
                                                            }
                                                        }">
                                                        <template x-if="show">
                                                            <div
                                                                class="c-data-badge d-flex justify-content-center align-items-center bg-success radius-5 ml-5 mb-3">
                                                                <span class="text-white f-9 pl-5">اعلان</span>
                                                                <span class="py-2 pl-10 text-white f-9"
                                                                    x-text="notify"></span>
                                                            </div>
                                                        </template>
                                                    </div>
                                                @endif
                                                <a href="{{ \Illuminate\Support\Facades\Route::has($sidebar['route']) ? route($sidebar['route']) : $sidebar['route'] }}"
                                                    class="d-flex align-items-center justify-content-center {{ \Illuminate\Support\Facades\Route::currentRouteName() == $sidebar['route'] ? '' : 'text-white' }}">
                                                    {!! $sidebar['icon'] !!}
                                                    {{-- {{ $sidebar['title'] }} --}}
                                                </a>
                                                <div class="s-tooltip bottom_tooltip">
                                                    <span class="f-9">
                                                         {{ $sidebar['title'] }}
                                                    </span>
                                                </div>
                                            </li>
                                        @endcan
                                    @else
                                        <li
                                            class="li-list d-flex align-content-center justify-content-center tooltip py-9 mx-10 {{ \Illuminate\Support\Facades\Route::currentRouteName() == $sidebar['route'] ? 'active-sidebar' : '' }}">
                                            @if (isset($sidebar['notification']))
                                                <div class="data-badge d-flex align-items-center justify-content-center flex-direction-column flex-wrap"
                                                    x-data="{
                                                        notify: @entangle($sidebar['notification']),
                                                        show: false,
                                                        init() {
                                                            this.show = this.notify > 0
                                                        }
                                                    }">
                                                    <template x-if="show">
                                                        <div class="rx-title title-input pb-10">
                                                            <div class="p-rx">
                                                                <div class="rx-border-rectangle-after label-input"></div>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                            @endif
                                            <a href="{{ \Illuminate\Support\Facades\Route::has($sidebar['route']) ? route($sidebar['route']) : $sidebar['route'] }}"
                                                class="d-flex align-items-center justify-content-center {{ \Illuminate\Support\Facades\Route::currentRouteName() == $sidebar['route'] ? '' : 'text-white' }}">
                                                {!! $sidebar['icon'] !!}
                                            </a>
                                            <div class="s-tooltip bottom_tooltip">
                                                <span class="f-9">
                                                     {{ $sidebar['title'] }}
                                                </span>
                                            </div>
                                        </li>
                                    @endif
                                @else
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
