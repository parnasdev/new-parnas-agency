<div>


    <x-parnas.loading wire:loading.flex/>

    {{-------------------------------address-bar--------------------------------------}}

    <section class="s-list-courses">
        <section class="s-address-bar pb-4">
            <div class="prs-responsive">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-11 m-auto-x">
                            <div class="address-bar">
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
                                    <a>دوره های آموزشی</a>
                                    {{--                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="14.249"--}}
                                    {{--                                     height="9.697" viewBox="0 0 14.249 9.697">--}}
                                    {{--                                    <path id="Up_Arrow_2" data-name="Up Arrow 2" d="M1,5,5,1M5,1V13.8M5,1,9,5"--}}
                                    {{--                                          transform="translate(-0.151 9.849) rotate(-90)" fill="none"--}}
                                    {{--                                          stroke="#CAA85E" stroke-linecap="round" stroke-linejoin="round"--}}
                                    {{--                                          stroke-width="1.2"/>--}}
                                    {{--                                </svg>--}}
                                    {{--                                <a class="last-link" href=""> آموزش آنلاین {{ $course->title }}</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="prs-responsive">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-11 m-auto-x">
                        <div class="parent-title-blog">
                            <div class="title">
                                <i class="icon-circle"></i>
                                <div class="text">
                                    <h1 class="title-fa">دوره ها</h1>
                                    <h1 class="title-en">courses</h1>
                                </div>
                            </div>
                        </div>
                        @if(count($courses)===0)
                            <div class="box-empty-courses">
                                <svg viewBox="0 0 24 24" width="45" height="45">
                                    <g id="_01_align_center" data-name="01 align center">
                                        <path d="M24,8.007l-4,2.982V9a3,3,0,0,0-3-3H14.915l-5-5H0V3H9.086l3,3H3A3,3,0,0,0,0,9V24H20V19.011l4,2.982ZM18,22H2V9A1,1,0,0,1,3,8H17a1,1,0,0,1,1,1Zm4-3.993-2-1.491V13.484l2-1.491Z"></path>
                                    </g>
                                </svg>
                                <p> لیست دوره ها خالی است  </p>
                            </div>
                        @endif
                        <div class="parent-list-courses">
                            @foreach($courses as $course)
                                <div class="item-slide-similar-courses">
                                    <a href="{{ route('courses.show', ['course'=>$course->slug]) }}">
                                        <figure class="parent-img-similar-courses">
                                            <div class="type-courses">{{ $this->checkCourseType($course->options['course_type']) }}</div>
                                            <div class="status-courses-item">{{ $this->getCourseStatus($course->options['course_status']) }}</div>
                                            <div class="fix-img-similar">
                                                <img src="/img/M.safaei3.svg" alt="">
                                            </div>
                                            <img class="img" src="{{ $course->files->where('type', 1)->first()?->url }}"
                                                 alt="">
                                        </figure>
                                    </a>
                                    <div class="information-similar">
                                        <div class="text-information">
                                            <i class="icon-circle"></i>
                                            <div class="parent-more">
                                                <a href="{{ route('courses.show', ['course'=>$course->slug]) }}">
                                                    <h3>{{ $course->title }}</h3>
                                                </a>
                                                <small> مدرس دوره
                                                    {{ $this->getTeacher($course->options['teacher'])->fullName() }}</small>
                                            </div>
                                        </div>
                                        <a href="{{ route('courses.show', ['course'=>$course->slug]) }}">
                                            <svg width="30" height="30" viewBox="0 0 37 37">
                                                <g id="Up" transform="translate(1 36) rotate(-90)">
                                                    <path id="Path_1177" data-name="Path 1177"
                                                          d="M0,17.5a44.279,44.279,0,0,0,.734,9.27,9.852,9.852,0,0,0,2.45,5.046,9.854,9.854,0,0,0,5.046,2.45A44.278,44.278,0,0,0,17.5,35a44.277,44.277,0,0,0,9.27-.734,9.853,9.853,0,0,0,5.046-2.45,9.853,9.853,0,0,0,2.45-5.046A44.287,44.287,0,0,0,35,17.5a44.288,44.288,0,0,0-.734-9.27,9.853,9.853,0,0,0-2.45-5.046A9.852,9.852,0,0,0,26.77.734,44.28,44.28,0,0,0,17.5,0,44.281,44.281,0,0,0,8.23.734a9.852,9.852,0,0,0-5.046,2.45A9.852,9.852,0,0,0,.734,8.23,44.28,44.28,0,0,0,0,17.5Z"
                                                          transform="translate(0 0)" fill="none"
                                                          stroke="#151515" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <path id="Path_1178" data-name="Path 1178"
                                                          d="M0,6.059,6.059,0l6.059,6.059"
                                                          transform="translate(11.441 14.471)"
                                                          fill="none"
                                                          stroke="#151515" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                </g>
                                            </svg>
                                        </a>

                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="d-flex justify-content-center" style="width: 100%">
                            {{ $courses->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
