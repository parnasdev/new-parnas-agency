@props(['data' => []])

<section class="screen-2">
    <div class="s2-content">
        <div class="Academy-Resume">
            <div class="prs-responsive">
                <div class="container-fluid">
                    <div class="row">
                        <div class="box-Academy-Resume m-auto-x col-md-10">
                            <div class="Academy-Resume-information"
                                 data-aos="fade-down"
                                 data-aos-easing="linear"
                                 data-aos-duration="500"
                            >
                                <div class="title">
                                    <i class="icon-circle"></i>
                                    <div class="text">
                                        <h1 class="title-fa">{{ $data['title'] }}</h1>
                                        <h1 class="title-en">{{ $data['titleEn'] }}</h1>
                                    </div>
                                </div>
                                <div class="description-academy-resume">
                                    <p>
                                        {!! $data['text'] !!}
                                    </p>
                                </div>
                                <div class="buttons-Academy-Resume">
                                    <a class="btn-view-resume-full" href="{{ $data['btn1']['link'] }}">
                                        <i class="icon-circle"></i>
                                        {{ $data['btn1']['title'] }}
                                    </a>
                                    <a class="btn-view-courses" href="{{ $data['btn2']['link'] }}">
                                        <i class="icon-circle"></i>
                                        {{ $data['btn2']['title'] }}
                                    </a>
                                </div>
                            </div>
                            <div class="logo-two-safaei"
                                 data-aos="fade-up"
                                 data-aos-easing="linear"
                                 data-aos-duration="500"
                            >
                                <img src="/img/safaei-logo-two.svg" alt="">
                            </div>
                            <div class="mouse-icon-animate">
                                <div class="center-it">
                                    <div class="mouse"></div>
                                    <div class="caption">{{ __('اسکرول کنید، صفحه ادامه دارد...') }}</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="des"></div>
        <div class="vertical-swiper">
            <div class="vertical-swiper__left">
                <div class="vertical-swiper__item">
                    <img src="/img/one.jpeg">
                </div>
                <div class="vertical-swiper__item">
                    <img src="/img/two.jpeg">
                </div>
                <div class="vertical-swiper__item">
                    <img src="/img/three.jpeg">
                </div>
                <div class="vertical-swiper__item">
                    <img src="/img/four.jpeg">
                </div>
                <div class="vertical-swiper__item vertical-swiper__item-exera">
                    <img src="/img/five.jpeg">
                </div>
            </div>
            <div class="vertical-swiper__right">
                <div class="vertical-swiper__item">
                    <img src="/img/six.jpeg">
                </div>
                <div class="vertical-swiper__item">
                    <img src="/img/one.jpeg">
                </div>
                <div class="vertical-swiper__item">
                    <img src="/img/five.jpeg">
                </div>
                <div class="vertical-swiper__item">
                    <img src="/img/two.jpeg">
                </div>
                <div class="vertical-swiper__item vertical-swiper__item-exera">
                    <img src="/img/four.jpeg">
                </div>
                <div class="vertical-swiper__item vertical-swiper__item-exera">
                    <img src="/img/four.jpeg">
                </div>
            </div>
            <div class="vertical-swiper__left">
                <div class="vertical-swiper__item">
                    <img src="/img/one.jpeg">
                </div>
                <div class="vertical-swiper__item">
                    <img src="/img/two.jpeg">
                </div>
                <div class="vertical-swiper__item">
                    <img src="/img/three.jpeg">
                </div>
                <div class="vertical-swiper__item">
                    <img src="/img/four.jpeg">
                </div>
                <div class="vertical-swiper__item vertical-swiper__item-exera">
                    <img src="/img/five.jpeg">
                </div>
            </div>
            <div class="vertical-swiper__right">
                <div class="vertical-swiper__item">
                    <img src="/img/six.jpeg">
                </div>
                <div class="vertical-swiper__item">
                    <img src="/img/one.jpeg">
                </div>
                <div class="vertical-swiper__item">
                    <img src="/img/five.jpeg">
                </div>
                <div class="vertical-swiper__item">
                    <img src="/img/two.jpeg">
                </div>
                <div class="vertical-swiper__item vertical-swiper__item-exera">
                    <img src="/img/four.jpeg">
                </div>
                <div class="vertical-swiper__item vertical-swiper__item-exera">
                    <img src="/img/four.jpeg">
                </div>
            </div>
        </div>
    </div>
</section>
