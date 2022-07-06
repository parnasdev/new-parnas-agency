@props(['data'])
<section class="about-us">
    <div class="prs-responsive">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 m-auto-x parent-about-us">
                    <div class="details-about-us"
                         data-aos="fade-left"
                         data-aos-duration="2500">
                        <div class="title">
                            <i class="icon-circle"></i>
                            <div class="text">
                                <h1 class="title-fa">{{ $data['about']['title'] }}</h1>
                                <h1 class="title-en">{{ $data['about']['titleEn'] }}</h1>
                            </div>
                        </div>
                        <p class="descriptions">
                            {{ $data['about']['text'] }}
                        </p>
                        <div class="buttons">
                            <a class="btn-about-us" href="{{ $data['btn1']['link'] }}">
                                <i class="icon-circle"></i>
                                {{ $data['btn1']['title'] }}
                            </a>
                            <a href="{{ $data['btn2']['link'] }}" class="btn-contact-us">
                                <i class="icon-circle"></i>
                                {{ $data['btn2']['title'] }}
                            </a>
                        </div>
                    </div>
                    <div class="details-about-us-mobile"
                         data-aos="fade-up"
                         data-aos-duration="2500">
                        <div class="title">
                            <i class="icon-circle"></i>
                            <div class="text">
                                <h1 class="title-fa">{{ $data['about']['title'] }}</h1>
                                <h1 class="title-en">{{ $data['about']['titleEn'] }}</h1>
                            </div>
                        </div>
                        <p class="descriptions">
                            {{ $data['about']['text'] }}
                        </p>
                        <div class="buttons">
                            <a class="btn-about-us" href="{{ $data['btn1']['link'] }}">
                                <i class="icon-circle"></i>
                                {{ $data['btn1']['title'] }}
                            </a>
                            <a href="{{ $data['btn2']['link'] }}" class="btn-contact-us">
                                <i class="icon-circle"></i>
                                {{ $data['btn2']['title'] }}
                            </a>
                        </div>
                    </div>
                    <div id="main-img" class="main-img">
                        <img src="{{ $data['centerImage'] }}" width="300" alt="">
                    </div>
                    <div class="services-academy"
                         data-aos="fade-right"
                         data-aos-duration="2500">
                        <div class="title">
                            <i class="icon-circle"></i>
                            <div class="text">
                                <h1 class="title-fa">خدمات ما</h1>
                                <h1 class="title-en">our services</h1>
                            </div>
                        </div>
                        <div class="parent-box-services">
                            @foreach($data['buttons'] as $button)
                                <a class="{{ $button['class'] }}" href="{{ $button['link'] }}">
                                    {!! $button['icon'] !!}
                                    <span>{{ $button['title'] }}</span>
                                </a>
                            @endforeach
                        </div>

                    </div>
                    <div class="services-academy-mobile"
                         data-aos="fade-up"
                         data-aos-duration="2500">
                        <div class="title">
                            <i class="icon-circle"></i>
                            <div class="text">
                                <h1 class="title-fa">{{ $data['service']['title'] }}</h1>
                                <h1 class="title-en">{{ $data['service']['titleEn'] }}</h1>
                            </div>
                        </div>
                        <div class="parent-box-services">
                            @foreach($data['buttons'] as $button)
                                <a class="{{ $button['class'] }}" href="{{ $button['link'] }}">
                                    {!! $button['icon'] !!}
                                    <span>{{ $button['title'] }}</span>
                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
