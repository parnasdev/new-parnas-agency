<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'fa' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEO::generate() !!}
    <link rel="icon" href="{{ config('options.favicon') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.6/animate.min.css"/>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.12/plyr.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('/lightbox2/src/css/lightbox.css') }}">
    {{ $styles ?? null }}
    <style>
        #preloader {
            position: fixed;
            left: 0;
            top: 0;
            z-index: 999;
            width: 100%;
            height: 100vh;
            overflow: visible;
            background: #333 url('https://svgshare.com/i/TGi.svg') no-repeat center center;
        }

    </style>
    <livewire:styles/>
</head>
<body x-data="{
 progressIndicator() {
     var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
     var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
     var scrolled = (winScroll / height) * 100;
     document.getElementById('progressBar').style.width = scrolled + '%';
}
}" @scroll.window="progressIndicator()"
      @scroll-top.window="window.scrollTo(0,0)">
<div x-data="{loader : true}">
            <div class="loading" x-init="setTimeout( () => { loader = false } , 1000)" x-show="loader">
                <div class="parent-loading">
                    <svg class="svg-loading" width="200" height="200" viewBox="0 0 100 100">
                        <polyline class="line-cornered stroke-still" points="0,0 100,0 100,100" stroke-width="10" fill="none"></polyline>
                        <polyline class="line-cornered stroke-still" points="0,0 0,100 100,100" stroke-width="10" fill="none"></polyline>
                        <polyline class="line-cornered stroke-animation" points="0,0 100,0 100,100" stroke-width="10" fill="none"></polyline>
                        <polyline class="line-cornered stroke-animation" points="0,0 0,100 100,100" stroke-width="10" fill="none"></polyline>
                    </svg>
                    <svg class="logo-parnas-loading" style="width: 100px !important;height: 88px !important;" viewBox="0 0 106.636 90.916">
                        <g id="Logo_Parnas" data-name="Logo Parnas" transform="translate(2.194 2.463)">
                            <g id="Layer_1" data-name="Layer 1" transform="translate(0 0)">
                                <path id="Path_1344" data-name="Path 1344" d="M88.751,78.021,56.645,21.66,15.31,93.516"
                                      transform="translate(-5.213 -6.77)" fill="none" stroke="#ca7e65"
                                      stroke-linecap="round" stroke-miterlimit="10" stroke-width="2.5"/>
                                <path id="Path_1345" data-name="Path 1345"
                                      d="M55.432,72.121H73.938L62.121,50.98,42.19,86.04"
                                      transform="translate(-10.689 -12.743)" fill="none" stroke="#fff"
                                      stroke-linecap="round" stroke-miterlimit="10" stroke-width="2.5"/>
                                <path id="Path_1351" data-name="Path 1351"
                                      d="M55.5,74.709l59.087-.5L72.341,2.96l-5.232,8.934,29.51,50.444H89.1"
                                      transform="translate(-12.325 -2.96)" fill="none" stroke="#ca7e65"
                                      stroke-linecap="round" stroke-miterlimit="10" stroke-width="2.5"/>
                                <path id="Path_1352" data-name="Path 1352"
                                      d="M14.5,74.211H2.63L44.865,2.96,50.1,11.894,20.586,62.339"
                                      transform="translate(-2.63 -2.96)" fill="none" stroke="#ca7e65" stroke-linecap="round"
                                      stroke-miterlimit="10" stroke-width="2.5"/>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
    <div x-show="!loader" style="display: none">
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <livewire:home.sections.headers/>
    {{ $slot }}
    <x-parnas.layouts.home-section.sidebar-mobi/>
    <x-parnas.layouts.home-section.footer/>
</div>
</div>
<livewire:scripts/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ mix('/js/app.js') }}" defer></script>
{{--<script src="{{ asset('/js/jquery.min.js') }}"></script>--}}
<script src="{{ asset('/lightbox2/src/js/lightbox.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.plyr.io/3.6.12/plyr.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
{{ $scripts ?? null }}
<x-parnas.sweet-alert/>
</body>
</html>
