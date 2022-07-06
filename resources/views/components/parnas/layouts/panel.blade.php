<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}{{ config('options.separator') }}{{ config('options.siteTitle') }}</title>
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fancybox/jquery.fancybox.min.css')}}" media="screen" />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.12/plyr.css" />
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.1/dist/css/tom-select.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ config('options.favicon') }}">
    {{ $styles ?? null }}
    <livewire:styles/>
    <style>
        #livewire-error {
            box-sizing: border-box;
        }
    </style>
</head>
<body>
@guest
    {{ $slot }}
@else
    <livewire:admin.section.sidebar-mobile-panel/>

    <main>
        <article class="article-controller">
            <section class="s-container">
                <div class="container-fluid">
                    <!-- parent data -->
                    <div class="p-container d-flex p-0">
                        <!--! right -->
                        <livewire:admin.section.sidebar-panel/>
                        <!--! left -->
                        <div class="left flex-79 m-right-auto">
                            <!--? row -->
                            <x-parnas.layouts.panel-section.header/>
                            <!--? row -->
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </section>
        </article>
        <div class="support-data">
            <div class="">
                <div class="image">

                </div>
            </div>
        </div>
    </main>
@endguest
<livewire:scripts/>
<script src="{{ mix('js/admin.js') }}" defer></script>
<script src="{{asset('assets/jquery/dist/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/fancybox/jquery.fancybox.min.js')}}"></script>
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script src="{{asset('assets/plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>
<!--? player.js -->
<script src="https://cdn.plyr.io/3.6.12/plyr.js"></script>
<!--? cdn chart.js  -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!--? (chart.js)  -->
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.1/dist/js/tom-select.complete.min.js"></script>

<x-parnas.sweet-alert/>
{{ $scripts ?? null }}

</body>
</html>
