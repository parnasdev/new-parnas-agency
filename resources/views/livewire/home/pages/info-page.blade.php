<div>
    @if(isset($post->options['teacher_page']) && $post->options['teacher_page'])
        <section class="bg-white">
            <div class="prs-responsive">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-11 m-auto-x">
                            @livewire('teacher-show' , ['post' => $post])
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif(isset($post->options['about_page']) && $post->options['about_page'])
        {!! $post->options['about_body'] !!}
        <section class="s-about-us-bottom">
            <div class="col-md-11 m-auto-x page-about-us-bottom">
                <div data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500"
                     class="img-gold-fix">
                    <img src="/images/about/about-6.jpg" alt="">
                </div>
                <div class="img-right-about" data-aos="fade-left"
                     data-aos-duration="1500">
                    <img src="/images/about/about-1.jpg" alt="">
                </div>
                <div class="img-center-about">
                    <div class="top-parent-img"
                         data-aos="fade-down"
                         data-aos-duration="1500"
                    >
                        <img src="/images/about/about-2.jpg" alt="">
                    </div>
                    <div class="bottom-parent-img">
                        <img data-aos="flip-right" data-aos-duration="1000" class="b-r" src="/images/about/about-5.jpg" alt="">
                        <img data-aos="flip-left" data-aos-duration="1000" class="b-l" src="/images/about/about-7.jpg" alt="">

                    </div>
                </div>
                <div class="img-left-about" data-aos="fade-right"
                     data-aos-duration="1500"
                >
                    <img src="/images/about/about-5.jpg" alt="">
                </div>
            </div>
        </section>

    @elseif(isset($post->options['contact_page']) && $post->options['contact_page'])
        <section class="bg-white">
            <div class="prs-responsive">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-11 m-auto-x">
                            <livewire:home.contact-page :post="$post"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="bg-white">
            <div class="prs-responsive">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-11 m-auto-x editor">
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


</div>

@push('page_title')
    {{ $post->title }}
@endpush

@if(!$post->options['teacher_page'] ?? true)
    @push('page_subtitle')
        {{ $post->options['subtitle'] ?? '' }}
    @endpush
@endif

{{--@if($post->options['about_page'] || $post->options['contact_page'])--}}
{{--    @push('page_quote')--}}
{{--        {{ $post->options['quote'] ?? '' }}--}}
{{--    @endpush--}}
{{--@endif--}}
@push('addressbar')
    <x-parnas.pages.components.address-bar :links="array(['href' => url()->current() , 'title' => $post->title])"/>
@endpush

@push('scripts')
    <script>
        AOS.init();
    </script>
    {{--    <script>--}}
    {{--        $(window).scroll(function () {--}}
    {{--            if ($(this).scrollTop() > 0 && $(this).scrollTop() < 1110) {--}}
    {{--                $('.img-center-about').css('transform', 'scale(3.1)')--}}
    {{--                $('.s-about-us-bottom').css('position', 'relative')--}}
    {{--            } else if ($(this).scrollTop() > 1111 && $(this).scrollTop() < 1300) {--}}
    {{--                $('.img-center-about').css('transform', 'scale(3.1)')--}}
    {{--                $('.s-about-us-bottom').css('position', 'fixed')--}}
    {{--                $('.s-about-us-bottom').css('height', '100vh')--}}
    {{--                $('.s-about-us-bottom').css('background', '#151515')--}}
    {{--                $('.s-about-us-bottom').css('top', '0')--}}
    {{--                $('.img-left-about').css('display', 'none')--}}
    {{--                $('.img-right-about').css('display', 'none')--}}
    {{--            } else if ($(this).scrollTop() > 1211 && $(this).scrollTop() < 1400) {--}}
    {{--                $('.img-center-about').css('transform', 'scale(2)')--}}
    {{--                $('.s-about-us-bottom').css('position', 'fixed')--}}
    {{--                $('.img-left-about').css('display', 'none')--}}
    {{--                $('.img-right-about').css('display', 'none')--}}
    {{--            } else if ($(this).scrollTop() > 1301 && $(this).scrollTop() < 1500) {--}}
    {{--                $('.img-center-about').css('transform', 'scale(1)')--}}
    {{--                $('.s-about-us-bottom').css('position', 'fixed')--}}
    {{--                $('.img-left-about').css('display', 'flex')--}}
    {{--                $('.img-right-about').css('display', 'flex')--}}
    {{--                $('.s-about-us-bottom').removeClass('fix-Animate')--}}
    {{--            } else if ($(this).scrollTop() > 1501) {--}}
    {{--                $('.s-about-us-bottom').css('position', 'relative')--}}
    {{--                $('.s-about-us-bottom').addClass('fix-Animate')--}}
    {{--            }--}}
    {{--        })--}}

    {{--    </script>--}}

@endpush
