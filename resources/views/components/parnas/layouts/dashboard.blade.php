<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>
    <link rel="icon" href="{{ config('options.favicon') }}">
    <meta name="robots" content="noindex">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <livewire:styles></livewire:styles>
    {{ $styles ?? null }}
</head>
<body>
<livewire:home.sections.headers />
<section class="bg-white s-panel-component" style="padding: 8rem 0 3rem 0">
    <div style="min-height: auto;height: auto">
        <div class="prs-responsive">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-11 m-auto-x">
                        <div class="address-bar pt-3 pb-3">
                            <div class="right-address-bar">
                                <svg class="location-svg" xmlns="http://www.w3.org/2000/svg" width="17.642"
                                     height="20.742" viewBox="0 0 17.642 20.742">
                                    <g id="Location" transform="translate(-0.229 -0.25)">
                                        <path id="Path_1011" data-name="Path 1011"
                                              d="M1.114,10.586a11.93,11.93,0,0,0,3.1,6.039,19.469,19.469,0,0,0,4.1,3.38,1.356,1.356,0,0,0,1.471,0,19.47,19.47,0,0,0,4.1-3.38,11.93,11.93,0,0,0,3.1-6.039,9.156,9.156,0,0,0-1.242-6.267A7.488,7.488,0,0,0,9.05,1,7.488,7.488,0,0,0,2.356,4.319,9.156,9.156,0,0,0,1.114,10.586Z"
                                              transform="translate(0)" fill="none" stroke="#212135"
                                              stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="1.5"/>
                                        <circle id="Ellipse_49" data-name="Ellipse 49" cx="3" cy="3" r="3"
                                                transform="translate(12.013 12.142) rotate(180)" fill="none"
                                                stroke="#212135"
                                                stroke-width="1.5"/>
                                    </g>
                                </svg>
                                <a>آکادمی مریم صفایی</a>
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="14.249"
                                     height="9.697" viewBox="0 0 14.249 9.697">
                                    <path id="Up_Arrow_2" data-name="Up Arrow 2" d="M1,5,5,1M5,1V13.8M5,1,9,5"
                                          transform="translate(-0.151 9.849) rotate(-90)" fill="none"
                                          stroke="#212135" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.2"/>
                                </svg>
                                <a>پنل کاربر</a>
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="14.249"
                                     height="9.697" viewBox="0 0 14.249 9.697">
                                    <path id="Up_Arrow_2" data-name="Up Arrow 2" d="M1,5,5,1M5,1V13.8M5,1,9,5"
                                          transform="translate(-0.151 9.849) rotate(-90)" fill="none"
                                          stroke="#CAA85E" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.2"/>
                                </svg>
                                <a class="last-link" href="">{{ $title }}</a>
                            </div>
                        </div>
                        <div class="panel-dashboard">
                            <livewire:home.dashboard.sections.sidebar-menu/>
                            <div class="main-dashboard">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<x-parnas.layouts.home-section.footer/>
<livewire:scripts></livewire:scripts>
<script src="{{ mix('/js/app.js') }}" defer></script>
{{ $scripts ?? null }}
<x-parnas.sweet-alert/>
</body>
</html>
