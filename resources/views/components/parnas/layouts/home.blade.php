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
<div class="progress-container">
    <div class="progress-bar" id="progressBar"></div>
</div>

<livewire:home.sections.headers />
{{ $slot }}
<x-parnas.layouts.home-section.sidebar-mobi/>
<x-parnas.layouts.home-section.footer/>
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
