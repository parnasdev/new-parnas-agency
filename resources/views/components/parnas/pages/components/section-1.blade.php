@props(['data' => [] , 'lang' => ''])
<div class="parent-index">
    <!-----------------------------------------polygon------------------------------------>
    <div class="parent-images">
        <div id="back-down">
            <a class="click-btn-down-scroll" @click="$('html').animate({scrollTop: 700}, 1000)">
                <svg id="scroll-down" xmlns="http://www.w3.org/2000/svg" width="61" height="61" viewBox="0 0 61 61">
                    <g id="Component_1_1" data-name="Component 1 – 1">
                        <circle id="Ellipse_84" data-name="Ellipse 84" cx="30.5" cy="30.5" r="30.5" fill="#c49c74"
                                opacity="0.2"/>
                    </g>
                    <circle id="Ellipse_83" data-name="Ellipse 83" cx="25" cy="25" r="25" transform="translate(5 5)"
                            fill="#c49c74" opacity="0.303"/>
                    <circle id="Ellipse_73" data-name="Ellipse 73" cx="19.5" cy="19.5" r="19.5"
                            transform="translate(10 10)"
                            fill="#c49c74"/>
                    <path id="Up_Arrow_1" data-name="Up Arrow 1" d="M14.6,1,7.8,7.8,1,1"
                          transform="translate(22.492 25.555)"
                          fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
            </a>
            <strong class="text-back-down">{{ $data['downText'] }}</strong>
        </div>
        <div class="img-right animated fadeInRight">
            <img draggable="false" class="img" src="{{ $data['rightImage'] }}" alt="">
        </div>
        <div class="img-left animated fadeInLeft">
            <img draggable="false" class="img" src="{{ $data['leftImage'] }}" alt="">
        </div>
    </div>
    <div class="parent-images-mobile">
{{--        <img class="img-main-index-s1" src="/public/img/hero-left.jpg" width="100%" alt="">--}}
        <div id="back-downs">
            <a href="">
                <svg id="scroll-down" xmlns="http://www.w3.org/2000/svg" width="61" height="61" viewBox="0 0 61 61">
                    <g id="Component_1_1" data-name="Component 1 – 1">
                        <circle id="Ellipse_84" data-name="Ellipse 84" cx="30.5" cy="30.5" r="30.5" fill="#c49c74"
                                opacity="0.2"/>
                    </g>
                    <circle id="Ellipse_83" data-name="Ellipse 83" cx="25" cy="25" r="25" transform="translate(5 5)"
                            fill="#c49c74" opacity="0.303"/>
                    <circle id="Ellipse_73" data-name="Ellipse 73" cx="19.5" cy="19.5" r="19.5"
                            transform="translate(10 10)"
                            fill="#c49c74"/>
                    <path id="Up_Arrow_1" data-name="Up Arrow 1" d="M14.6,1,7.8,7.8,1,1"
                          transform="translate(22.492 25.555)"
                          fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
            </a>
            <strong class="text-back-down">{{ $data['downText'] }}</strong>
       </div>
         <div class="img-right-mobi animated fadeInRight">
            <img draggable="false" class="img" src="{{ $data['rightImage'] }}" alt="">
        </div>
        <div class="img-left-mobi animated fadeInLeft">
            <img draggable="false" class="img" src="{{ $data['leftImage'] }}" alt="">
        </div>
    </div>
    <!-------------------------------------------end-------------------------------------->

    <!-------------------------------------------about-us--------------------------------->
    @if(session('lang') == 'fa')
        <x-parnas.pages.components.section-2 :data="config('options.sectionTwo')" />
    @else
        <x-parnas.pages.components.section-2 :data="config('options.sectionTwoEn')" />
    @endif
    <!--------------------------------------------end-------------------------------------->
</div>
