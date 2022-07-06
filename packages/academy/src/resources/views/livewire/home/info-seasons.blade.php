<div>
    <section class="season-info">
        <div class="prs-responsive">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-11 m-auto-x parent-season-info">
                        {{---------------------------------------------address bar--------------------------------------}}
                        <div class="address-bar pb-4">
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
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="14.249"
                                     height="9.697" viewBox="0 0 14.249 9.697">
                                    <path id="Up_Arrow_2" data-name="Up Arrow 2" d="M1,5,5,1M5,1V13.8M5,1,9,5"
                                          transform="translate(-0.151 9.849) rotate(-90)" fill="none"
                                          stroke="#212135" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.2"/>
                                </svg>
                                <a> آموزش آنلاین {{ $course->title }}</a>
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="14.249"
                                     height="9.697" viewBox="0 0 14.249 9.697">
                                    <path id="Up_Arrow_2" data-name="Up Arrow 2" d="M1,5,5,1M5,1V13.8M5,1,9,5"
                                          transform="translate(-0.151 9.849) rotate(-90)" fill="none"
                                          stroke="#CAA85E" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.2"/>
                                </svg>
                                <a class="last-link" href="">{{ $season->name }}</a>
                            </div>
                        </div>
                        {{-------------------------------------------------top-----------------------------------------}}
                        <div class="top-info-season">
                            <div class="back-page">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18.414" height="12.828"
                                     viewBox="0 0 18.414 12.828">
                                    <path id="Up_Arrow_2" data-name="Up Arrow 2" d="M1,6,6,1M6,1V17M6,1l5,5"
                                          transform="translate(18 0.414) rotate(90)" fill="none" stroke="#c49c74"
                                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                                <a href="{{ route('courses.show', ['course'=>$course->slug]) }}">
                                    <span>بازگشت به صفحه قبل</span>
                                </a>
                            </div>
                            <div class="info-video-page">
                                <span>در حال مشاهده دوره </span>
                                <a href="">آموزش آنلاین {{ $course->title }}</a>
                                <span> می باشید.</span>
                            </div>
                            <div class="info-episode">
                                <i class="icon-circle"></i>
                                <strong>{{ $season->name }}</strong>
                            </div>
                        </div>
                        {{-------------------------------------------------bottom-----------------------------------------}}
                        <div class="bottom-info-season">
                            <div class="tab-season" x-data="{tabSeason:'viewEduction'}">
                                <div class="tab-season-select">
                                    <button @click="tabSeason='viewEduction'"
                                            :class="{'active-season':tabSeason==='viewEduction'}" class="viewEduction">
                                        مشاهده آموزش های اصلی فصل انتخابی
                                    </button>
                                    <button @click="tabSeason='viewLesson'"
                                            :class="{'active-season':tabSeason==='viewLesson'}" class="viewLesson">
                                        مشاهده درس های فصل انتخابی ({{ count($subSeasons) }})
                                    </button>
                                </div>
                                <div class="tab-opened-season">
                                    <div x-show="tabSeason==='viewEduction'" class="viewEduction-o"
                                         x-transition:enter="animated fadeInUp">
                                        {!! $season->description !!}
                                    </div>
                                    <div x-show="tabSeason==='viewLesson'" class="viewLesson-o"
                                         x-transition:enter="animated fadeInUp">
                                        @foreach($subSeasons ?? [] as $subSeason)
                                            <div>
                                                {{ $subSeason->name }}
                                            </div>
                                            <div>
                                                {!! $subSeason->description !!}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
