<div>
    @push('styles')
        <style>
            .menu {
                background-color: #151515 !important;
                box-shadow: unset;
            }
        </style>
    @endpush

    <div class="bg-white">
        <section class="courses-info" x-data="{tabCourse:'one'}">
            {{-------------------------------address-bar--------------------------------------}}
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
                                        <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="14.249"
                                             height="9.697" viewBox="0 0 14.249 9.697">
                                            <path id="Up_Arrow_2" data-name="Up Arrow 2" d="M1,5,5,1M5,1V13.8M5,1,9,5"
                                                  transform="translate(-0.151 9.849) rotate(-90)" fill="none"
                                                  stroke="#CAA85E" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="1.2"/>
                                        </svg>
                                        <a class="last-link" href=""> آموزش آنلاین {{ $course->title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-------------------------------info-course-top--------------------------------------}}
            <section class="s-info-course-top">
                <div class="prs-responsive">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-11 m-auto-x course-top">
                                <div class="left-course">
                                    <div class="title-eduction-info  title-eduction-info-desktop">
                                        <i class="icon-circle"></i>
                                        <h1>{{ $course->title }}</h1>
                                    </div>
                                    <div class="teacher-video-course">
                                        <img width="80" class="img-teacher" src="{{ $this->teacherImg()->url ?? '/images/noPicture.png' }}" alt="{{ $this->teacherImg()->alt ?? '' }}">
                                        <div class="info-video-teacher">
                                        <a href="{{ $teacher->path() }}"
                                            class="text-teacher"> مدرس دوره : {{ $teacher->title }}</a>
                                            <span class="text-place">{{ $teacher->options['subtitle'] }}</span>
                                        </div>
                                    </div>
                                    @if(isset($course->description))
                                        <p class="description-video">{!! $course->description !!}</p>
                                    @else
                                        <p class="description-video">توضیحات کوتاه ثبت نشده است</p>
                                    @endif

                                </div>
                                <div class="right-course">
                                    <div class="title-eduction-info  title-eduction-info-mobile">
                                        <i class="icon-circle"></i>
                                        <h1>{{ $course->title }}</h1>
                                    </div>
                                    @if($course->files->where('type', 4)->isNotEmpty())
                                        <div class="tab-opened">

                                            <div class="tab-opened-details" x-data="{video:false}"
                                                 x-init="$watch('video', (value) => {
                                                    if (value) {
                                                        $refs.video.play()
                                                    } else {
                                                        $refs.video.pause()
                                                    }
                                                })"
                                                 x-transition:leave="animated fadeOutRight">
                                                <div class="box-video" x-show="video===true">
                                                    <button aria-label="Stop" class="close-video"
                                                            @click.prevent="video=false">
                                                        <i class="icon-circle"></i>
                                                        بستن ویدیو
                                                    </button>
                                                    <div style="height: 100%;width: 100%"
                                                         :class="{'animated fadeInRight':video===true,'animated fadeOutRight':video===false}"
                                                         class="parents-videos">
                                                        <video style="object-fit: cover" width="100%" height="100%;"
                                                               x-ref="video"
                                                               id="player"
                                                               playsinline controls
                                                               data-poster="{{ $course->files->where('type', 1)->first()?->url }}">
                                                            <source
                                                                src="{{ $course->files->where('type', 4)->first()?->url }}"
                                                                type="video/mp4"/>
                                                        </video>
                                                    </div>
                                                </div>
                                                <a class="button-fixed-rotate" href="" wire:click.prevent="openModal()">
                                                    <i class="icon-circle"></i>
                                                    شرکت در این دوره</a>
                                                <a class="play-video" @click="video=!video">
                                                    <img class="icon-play-video" src="/img/paly-video.svg" alt="">
                                                </a>
                                                <div class="details-play-video">
                                                    <div class="preview-text">
                                                        پیش نمایش دوره {{ $course->title }} !
                                                    </div>
                                                    <div class="text-help-play-video">
                                                        جهت مشاهده ویدئو روی آیکون پلی کلیک کنید …
                                                    </div>
                                                </div>

                                            </div>


                                            <img src="{{ $course->files->where('type', 1)->first()?->url }}" width="100"
                                                 alt="">
                                        </div>
                                    @else
                                        <div class="tab-img-opened">
                                            <img src="{{ $course->files->where('type', 1)->first()?->url }}" width="100"
                                                 alt="">
                                        </div>
                                    @endif
                                    <div class="video-course-info">
                                        <div class="type-video-course">
                                            <svg width="25" height="20" viewBox="0 0 25 20">
                                                <path id="Education"
                                                      d="M19.717,2.692C16.6,1.01,14.586,0,12.5,0S8.4,1.01,5.283,2.692l-.056.03h0c-1.539.832-2.763,1.493-3.6,2.057a5.593,5.593,0,0,0-1.087.909A2,2,0,0,0,0,7v8a1,1,0,0,0,2,0V9.462c.559.352,1.253.742,2.064,1.185C4,11.452,4,12.492,4,13.833V14c0,5,1.494,6,8.466,6C19,20,21,19,21,14c0-1.42,0-2.512-.071-3.349,1-.549,1.828-1.016,2.441-1.43a5.592,5.592,0,0,0,1.087-.909A2,2,0,0,0,25,7a2,2,0,0,0-.543-1.313,5.592,5.592,0,0,0-1.087-.909c-.834-.563-2.058-1.225-3.6-2.057ZM18.982,11.7c-2.7,1.444-4.565,2.3-6.482,2.3s-3.778-.853-6.485-2.3C6,12.3,6,13.047,6,14c0,2.465.414,2.99.769,3.239a4.155,4.155,0,0,0,1.736.55A27.4,27.4,0,0,0,12.466,18a25.649,25.649,0,0,0,3.783-.211,4.606,4.606,0,0,0,1.827-.58c.447-.3.924-.888.924-3.209C19,13.046,19,12.3,18.982,11.7ZM2.749,6.436a3.734,3.734,0,0,0-.7.564,3.734,3.734,0,0,0,.7.564c.742.5,1.877,1.116,3.485,1.985C9.466,11.3,11.017,12,12.5,12s3.034-.7,6.266-2.451c1.607-.868,2.743-1.483,3.485-1.985a3.731,3.731,0,0,0,.7-.564,3.731,3.731,0,0,0-.7-.564c-.742-.5-1.877-1.116-3.485-1.985C15.534,2.7,13.983,2,12.5,2s-3.034.7-6.266,2.451C4.627,5.32,3.491,5.935,2.749,6.436Zm20.266.656v0Zm0-.18v0Zm-21.029,0v0Z"
                                                      fill="#646564" fill-rule="evenodd"/>
                                            </svg>
                                            <span class="title-type-video">نوع دوره :</span>
                                            <span
                                                class="text-type-video">{{ $this->checkCourseType($course->options['course_type']) }}</span>
                                        </div>
                                        <div class="time-video-course">
                                            <svg id="Time" width="22" height="22" viewBox="0 0 22 22">
                                                <path id="Path_1170" data-name="Path 1170"
                                                      d="M1,11a25.3,25.3,0,0,0,.42,5.3,5.63,5.63,0,0,0,1.4,2.883A5.63,5.63,0,0,0,5.7,20.58,25.307,25.307,0,0,0,11,21a25.307,25.307,0,0,0,5.3-.42,5.63,5.63,0,0,0,2.883-1.4,5.63,5.63,0,0,0,1.4-2.883A25.307,25.307,0,0,0,21,11a25.307,25.307,0,0,0-.42-5.3,5.63,5.63,0,0,0-1.4-2.883A5.63,5.63,0,0,0,16.3,1.42,25.3,25.3,0,0,0,11,1a25.3,25.3,0,0,0-5.3.42,5.63,5.63,0,0,0-2.883,1.4A5.63,5.63,0,0,0,1.42,5.7,25.3,25.3,0,0,0,1,11Z"
                                                      fill="none" stroke="#646564" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"/>
                                                <path id="Path_1171" data-name="Path 1171"
                                                      d="M12,6v4.545c0,.909,0,.909.909.909h4.545"
                                                      transform="translate(-1 -0.455)" fill="none" stroke="#646564"
                                                      stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                            </svg>
                                            <span class="title-time-video">مدت دوره :</span>
                                            <span class="text-time-video">{{ $course->options['course_period'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{---------------------------------------box-price--------------------------------------}}
            <section class="s-box-price">
                <div class="prs-responsive">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-11 m-auto-x parent-box-price">
                                <div class="right-box-price">
                                    <div class="price-invite-course">
                                        <span class="title-price">قیمت شرکت در دوره :</span>
                                        @if((int)$course->options['offer_price'] > 0)
                                            <div class="details-price" style="width: 70%">
                                                <del>
                                                    {{ number_format($course->options['price']) }}
                                                    تومان
                                                </del>
                                                <div class="price-main">
                                                    <strong>{{ number_format($course->options['offer_price']) }}</strong>
                                                    <span>تومان</span>
                                                </div>
                                                <label for=""
                                                       class="promo-price">{{ $this->checkDiscountPercent($course->options['price'], $course->options['offer_price']) }}
                                                    ٪</label>
                                            </div>
                                        @else
                                            <div class="details-price">
                                                <div class="price-main">
                                                    <strong>{{ number_format($course->options['price']) }}</strong>
                                                    <span>تومان</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="buttons-price-course">
                                        <a class="btn-view-season" @click="tabCourse = 'two'"
                                           href="#details-course-tab">
                                            <i class="icon-circle"></i>
                                            مشاهده سرفصل ها
                                        </a>
                                       @auth
                                            @if($course->options['course_status'] != getStatus('soon'))
                                                @if(is_null($learning))
                                                    <a class="btn-invite-course" href="" wire:click.prevent="addToCart()">
                                                        <i class="icon-circle"></i>
                                                        شرکت در دوره (خرید دوره آموزشی)
                                                    </a>
                                                @else
                                                    <a class="btn-invite-course">
                                                        <i class="icon-circle"></i>
                                                        دوره خریداری شده است
                                                    </a>
                                                @endif
                                            @else
                                                <a class="btn-invite-course">
                                                    <i class="icon-circle"></i>
                                                    شرکت در دوره (خرید دوره بزودی)
                                                </a>
                                            @endif
                                        @endauth

                                        @guest
                                            <a class="btn-invite-course" href="{{ route('login' , ['referrer-url' => url()->current()]) }}">
                                                <i class="icon-circle"></i>
                                                شرکت در دوره (خرید دوره آموزشی)
                                            </a>
                                        @endguest
                                    </div>
                                </div>
                                <div class="box-certificate">
                                    <svg width="66.445" height="66.445" viewBox="0 0 66.445 66.445">
                                        <g id="Verified" transform="translate(1.5 1.5)">
                                            <path id="Path_1193" data-name="Path 1193"
                                                  d="M32.417,10,15.691,26.726,9,20.036"
                                                  transform="translate(12.349 14.734)" fill="none" stroke="#c49c74"
                                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                            <path id="Path_1194" data-name="Path 1194"
                                                  d="M27.505,3.592a6.547,6.547,0,0,1,10.434,0l3.272,4.316a3.274,3.274,0,0,0,3.055,1.265l5.365-.738a6.548,6.548,0,0,1,7.378,7.378l-.738,5.365a3.274,3.274,0,0,0,1.265,3.055l4.316,3.272a6.548,6.548,0,0,1,0,10.434l-4.316,3.272a3.274,3.274,0,0,0-1.265,3.055l.738,5.365a6.548,6.548,0,0,1-7.378,7.378l-5.365-.738a3.274,3.274,0,0,0-3.055,1.265L37.94,61.854a6.548,6.548,0,0,1-10.434,0l-3.272-4.316a3.274,3.274,0,0,0-3.055-1.265l-5.365.738a6.548,6.548,0,0,1-7.378-7.378l.738-5.365a3.274,3.274,0,0,0-1.265-3.055L3.592,37.94a6.547,6.547,0,0,1,0-10.434l4.316-3.272a3.274,3.274,0,0,0,1.265-3.055l-.738-5.365a6.548,6.548,0,0,1,7.378-7.378l5.365.738a3.274,3.274,0,0,0,3.055-1.265Z"
                                                  transform="translate(-1 -1)" fill="none" stroke="#c49c74"
                                                  stroke-width="3"/>
                                        </g>
                                    </svg>
                                    <div class="text-certificate">
                                        <h3>{{ $course->options['waranty']['title'] ?? 'به همراه ارائه گواهی پایان دوره از آکادمی' }}</h3>
                                        <small>{{ $course->options['waranty']['subtitle'] ?? '(مخصوص دانشجویان شهر تهران و شهرستان)' }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </section>
        {{---------------------------------------box-course-bottom--------------------------------------}}

        <section class="s-box-course-bottom">
            <div class="prs-responsive">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-11 m-auto-x box-course-bottom">
                            <div class="tab-courses" x-data="{tabCourse:'one'}">
                                <a @click="tabCourse = 'one'"
                                   class="details-course-tab" href="#details-course-tab">
                                    <svg id="Document_Align_Right_1" data-name="Document Align Right 1" width="24"
                                         height="24" viewBox="0 0 24 24">
                                        <path id="Path_909" data-name="Path 909"
                                              d="M1,12a27.833,27.833,0,0,0,.462,5.827A6.193,6.193,0,0,0,3,21a6.193,6.193,0,0,0,3.172,1.54A27.838,27.838,0,0,0,12,23a27.838,27.838,0,0,0,5.827-.462A6.193,6.193,0,0,0,21,21a6.193,6.193,0,0,0,1.54-3.172A27.838,27.838,0,0,0,23,12a27.838,27.838,0,0,0-.462-5.827A6.193,6.193,0,0,0,21,3a6.193,6.193,0,0,0-3.172-1.54A27.833,27.833,0,0,0,12,1a27.833,27.833,0,0,0-5.827.462A6.193,6.193,0,0,0,3,3a6.193,6.193,0,0,0-1.54,3.172A27.833,27.833,0,0,0,1,12Z"
                                              fill="rgba(0,0,0,0)" stroke="#E0E0E0" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="2"/>
                                        <path id="Path_910" data-name="Path 910" d="M14,7h3" fill="rgba(0,0,0,0)"
                                              stroke="#E0E0E0" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"/>
                                        <path id="Path_911" data-name="Path 911" d="M7,12H17" fill="rgba(0,0,0,0)"
                                              stroke="#E0E0E0" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"/>
                                        <path id="Path_912" data-name="Path 912" d="M7,17h3" fill="rgba(0,0,0,0)"
                                              stroke="#E0E0E0" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"/>
                                    </svg>
                                    توضیحات دوره
                                </a>
                                <a @click="tabCourse = 'two'"
                                   class="season-course-tab" href="#season-course-tab">
                                    <svg id="Graph" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_967" data-name="Path 967" d="M19,12H17.25L14.5,7l-5,10L6.75,12H5"
                                              fill="rgba(0,0,0,0)" stroke="#e0e0e0" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="2"/>
                                        <path id="Path_968" data-name="Path 968"
                                              d="M1,12a27.833,27.833,0,0,0,.462,5.827A6.193,6.193,0,0,0,3,21a6.193,6.193,0,0,0,3.172,1.54A27.838,27.838,0,0,0,12,23a27.838,27.838,0,0,0,5.827-.462A6.193,6.193,0,0,0,21,21a6.193,6.193,0,0,0,1.54-3.172A27.838,27.838,0,0,0,23,12a27.838,27.838,0,0,0-.462-5.827A6.193,6.193,0,0,0,21,3a6.193,6.193,0,0,0-3.172-1.54A27.833,27.833,0,0,0,12,1a27.833,27.833,0,0,0-5.827.462A6.193,6.193,0,0,0,3,3a6.193,6.193,0,0,0-1.54,3.172A27.833,27.833,0,0,0,1,12Z"
                                              fill="rgba(0,0,0,0)" stroke="#e0e0e0" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="2"/>
                                    </svg>
                                    سر فصل های آموزشی
                                </a>
                                <a @click="tabCourse = 'three'"
                                   class="question-course-tab" href="#question-course-tab">
                                    <svg id="Message_Align_Left" data-name="Message Align Left" width="24.5"
                                         height="24.5" viewBox="0 0 24.5 24.5">
                                        <path id="Path_1028" data-name="Path 1028"
                                              d="M12.25,1a32.965,32.965,0,0,1,5.988.408A6.691,6.691,0,0,1,21.5,2.79c1.424,1.255,2,3.523,2,8.1,0,2.947-.265,5.115-.977,6.528a3.4,3.4,0,0,1-1.32,1.473,4.492,4.492,0,0,1-2.305.521,5.288,5.288,0,0,0-3.063.815,5.5,5.5,0,0,0-1.54,1.7l-.144.228a4.4,4.4,0,0,1-.719.966,1.608,1.608,0,0,1-1.182.378,1.608,1.608,0,0,1-1.182-.378,4.4,4.4,0,0,1-.719-.966l-.144-.228a5.5,5.5,0,0,0-1.54-1.7A5.288,5.288,0,0,0,5.6,19.409a4.4,4.4,0,0,1-2.3-.533,3.48,3.48,0,0,1-1.326-1.5C1.264,15.944,1,13.772,1,10.886,1,6.371,1.575,4.1,3,2.827A6.716,6.716,0,0,1,6.267,1.422,32.052,32.052,0,0,1,12.25,1Z"
                                              fill="none" stroke="#e0e0e0" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="2"/>
                                        <path id="Path_1029" data-name="Path 1029" d="M7,9h4.091"
                                              transform="translate(0.136 0.182)" fill="none" stroke="#e0e0e0"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                        <path id="Path_1030" data-name="Path 1030" d="M7,13H17.227"
                                              transform="translate(0.136 0.273)" fill="none" stroke="#e0e0e0"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    </svg>
                                    سوالات متداول
                                </a>
                                <a @click="tabCourse = 'four'"
                                   class="gallery-course-tab" href="#gallery-course-tab">
                                    <svg id="Instagram" width="22" height="22" viewBox="0 0 22 22">
                                        <path id="Path_993" data-name="Path 993"
                                              d="M1,11a25.3,25.3,0,0,0,.42,5.3,5.63,5.63,0,0,0,1.4,2.883A5.63,5.63,0,0,0,5.7,20.58,25.307,25.307,0,0,0,11,21a25.307,25.307,0,0,0,5.3-.42,5.63,5.63,0,0,0,2.883-1.4,5.63,5.63,0,0,0,1.4-2.883A25.307,25.307,0,0,0,21,11a25.307,25.307,0,0,0-.42-5.3,5.63,5.63,0,0,0-1.4-2.883A5.63,5.63,0,0,0,16.3,1.42,25.3,25.3,0,0,0,11,1a25.3,25.3,0,0,0-5.3.42,5.63,5.63,0,0,0-2.883,1.4A5.63,5.63,0,0,0,1.42,5.7,25.3,25.3,0,0,0,1,11Z"
                                              fill="none" stroke="#e0e0e0" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="2"/>
                                        <circle id="Ellipse_47" data-name="Ellipse 47" cx="0.5" cy="0.5" r="0.5"
                                                transform="translate(17 5.5) rotate(180)" fill="#e0e0e0"/>
                                        <circle id="Ellipse_48" data-name="Ellipse 48" cx="4" cy="4" r="4"
                                                transform="translate(7 14.5) rotate(-90)" fill="none" stroke="#e0e0e0"
                                                stroke-width="2"/>
                                    </svg>

                                    گالری دوره
                                </a>
                                <a @click="tabCourse = 'five'"
                                   class="comment-course-tab" href="#comment-course-tab">
                                    <svg id="Scanning_5" data-name="Scanning 5" width="22" height="22"
                                         viewBox="0 0 22 22">
                                        <path id="Path_1132" data-name="Path 1132"
                                              d="M1.834,13.76a.938.938,0,0,0-.929-.881.9.9,0,0,0-.9.955C.391,19.7,2.3,21.609,8.166,22a.9.9,0,0,0,.955-.9.938.938,0,0,0-.881-.929A16.553,16.553,0,0,1,5.8,19.843a4.807,4.807,0,0,1-2.47-1.171A4.807,4.807,0,0,1,2.157,16.2,16.554,16.554,0,0,1,1.834,13.76Zm18.252,0a.938.938,0,0,1,.929-.881.9.9,0,0,1,.9.955c-.389,5.862-2.3,7.774-8.164,8.164a.9.9,0,0,1-.955-.9.938.938,0,0,1,.881-.929,16.555,16.555,0,0,0,2.442-.323,4.807,4.807,0,0,0,2.47-1.171,4.807,4.807,0,0,0,1.171-2.47A16.555,16.555,0,0,0,20.087,13.76ZM22,11.082v0Zm-.081-2.837a.9.9,0,0,1-.9.955.938.938,0,0,1-.929-.881,16.553,16.553,0,0,0-.323-2.442,4.807,4.807,0,0,0-1.171-2.47,4.807,4.807,0,0,0-2.47-1.171,16.553,16.553,0,0,0-2.442-.323A.938.938,0,0,1,12.8.984a.9.9,0,0,1,.955-.9C19.617.47,21.53,2.383,21.919,8.245ZM1.834,8.319A.938.938,0,0,1,.906,9.2.9.9,0,0,1,0,8.245C.391,2.383,2.3.47,8.166.081a.9.9,0,0,1,.955.9.938.938,0,0,1-.881.929A16.551,16.551,0,0,0,5.8,2.236a4.807,4.807,0,0,0-2.47,1.171,4.807,4.807,0,0,0-1.171,2.47A16.552,16.552,0,0,0,1.834,8.319ZM10.961,0h0Z"
                                              transform="translate(0)" fill="#e0e0e0" fill-rule="evenodd"/>
                                        <path id="Path_1133" data-name="Path 1133" d="M6,11.914H17"
                                              transform="translate(-0.5 -0.993)" fill="rgba(0,0,0,0)" stroke="#e0e0e0"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                        <path id="Path_1134" data-name="Path 1134" d="M10,15.914h3.667"
                                              transform="translate(-0.834 -1.327)" fill="rgba(0,0,0,0)" stroke="#e0e0e0"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                        <path id="Path_1135" data-name="Path 1135" d="M8,7.914h7.333"
                                              transform="translate(-0.667 -0.66)" fill="rgba(0,0,0,0)" stroke="#e0e0e0"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    </svg>

                                    نظرات کاربران
                                </a>
                            </div>
                            <div class="tab-scrolled">

                                <div class="section-active editor" id="details-course-tab">
                                    @if(isset($course->body))
                                        {!! $course->body !!}
                                    @else
                                        <p>توضیحات ثبت نشده است</p>
                                    @endif

                                </div>

                                <div class="section-active" id="season-course-tab">
                                    <div class="season-course-title">
                                        <svg id="Graph" width="24" height="24" viewBox="0 0 24 24">
                                            <path id="Path_967" data-name="Path 967"
                                                  d="M19,12H17.25L14.5,7l-5,10L6.75,12H5"
                                                  fill="rgba(0,0,0,0)" stroke="#C49C74" stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-width="2"/>
                                            <path id="Path_968" data-name="Path 968"
                                                  d="M1,12a27.833,27.833,0,0,0,.462,5.827A6.193,6.193,0,0,0,3,21a6.193,6.193,0,0,0,3.172,1.54A27.838,27.838,0,0,0,12,23a27.838,27.838,0,0,0,5.827-.462A6.193,6.193,0,0,0,21,21a6.193,6.193,0,0,0,1.54-3.172A27.838,27.838,0,0,0,23,12a27.838,27.838,0,0,0-.462-5.827A6.193,6.193,0,0,0,21,3a6.193,6.193,0,0,0-3.172-1.54A27.833,27.833,0,0,0,12,1a27.833,27.833,0,0,0-5.827.462A6.193,6.193,0,0,0,3,3a6.193,6.193,0,0,0-1.54,3.172A27.833,27.833,0,0,0,1,12Z"
                                                  fill="rgba(0,0,0,0)" stroke="#C49C74" stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-width="2"/>
                                        </svg>
                                        <h2>سر فصل های آموزشی</h2>
                                    </div>
                                    @if($course->seasons()->where('parent',null)->get()->isNotEmpty())
                                        <div class="parent-heading">
                                            @foreach($course->seasons()->orderBy('id')->where('parent',null)->get() ?? [] as $season)
                                                @if($course->options['course_type'] != 'offline')
                                                    @if(!is_null($learning) && ($season->free ? $season->free : in_array($season->id, $learning->season_unlock ?? [])))
                                                        <a href="{{ route('courses.season', ['course' => $course->slug, 'season'=> $season->slug]) }}"
                                                           class="item-episode">
                                                            <h2 class="title-episode">{{ $season->name }}</h2>
                                                            <div class="view-episode">
                                                                <strong>مشاهده کنید …</strong>
                                                                <div class="box-unlock">
                                                                    <svg id="Unlock" width="22" height="22"
                                                                         viewBox="0 0 22 22">
                                                                        <path id="Path_1172" data-name="Path 1172"
                                                                              d="M7.422,5.609A5.06,5.06,0,0,1,8.484,3.021a3.381,3.381,0,0,1,2.154-1.144,5.262,5.262,0,0,1,2.519.3,3.867,3.867,0,0,1,1.7,1.122.917.917,0,0,0,1.459-1.111A5.657,5.657,0,0,0,13.795.462a7.092,7.092,0,0,0-3.415-.4A5.212,5.212,0,0,0,7.092,1.828,7.147,7.147,0,0,0,5.546,5.82C1.107,6.534,0,8.621,0,13.75,0,20.544,1.941,22,11,22s11-1.456,11-8.25S20.059,5.5,11,5.5C9.656,5.5,8.469,5.532,7.422,5.609ZM1.833,13.75c0,3.381.528,4.575,1.37,5.206a5.826,5.826,0,0,0,2.558.9A33.252,33.252,0,0,0,11,20.167a33.251,33.251,0,0,0,5.239-.309,5.827,5.827,0,0,0,2.558-.9c.841-.631,1.37-1.825,1.37-5.206s-.528-4.575-1.37-5.206a5.826,5.826,0,0,0-2.558-.9A33.252,33.252,0,0,0,11,7.333a33.253,33.253,0,0,0-5.239.309,5.826,5.826,0,0,0-2.558.9C2.362,9.175,1.833,10.369,1.833,13.75Z"
                                                                              transform="translate(0 0)" fill="#fff"
                                                                              fill-rule="evenodd"/>
                                                                        <circle id="Ellipse_64" data-name="Ellipse 64"
                                                                                cx="2"
                                                                                cy="2"
                                                                                r="2"
                                                                                transform="translate(13 15.7) rotate(180)"
                                                                                fill="none"
                                                                                stroke="#fff" stroke-width="2"/>
                                                                    </svg>

                                                                </div>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <a class="item-episode-lock">
                                                            <h2 class="title-episode">{{ $season->name }}</h2>
                                                            <div class="view-episode">
                                                                <strong>قفل میباشد ({{ !is_null($learning) ? 'برای باز شدن دوره تیکت بزنید': '' }})</strong>
                                                                <div class="box-lock">
                                                                    <svg id="Key" width="24" height="24"
                                                                         viewBox="0 0 24 24">
                                                                        <path id="Path_996" data-name="Path 996"
                                                                              d="M6,12a2,2,0,1,0,2-2A2,2,0,0,0,6,12ZM4,12a4,4,0,0,0,7.876.992A1.017,1.017,0,0,0,12,13h2v1a1,1,0,0,0,2,0V13h2v2a1,1,0,0,0,2,0V12a1,1,0,0,0-1-1H12a1.017,1.017,0,0,0-.124.008A4,4,0,0,0,4,12Z"
                                                                              fill="#fff" fill-rule="evenodd"/>
                                                                        <path id="Path_997" data-name="Path 997"
                                                                              d="M1,12a27.833,27.833,0,0,0,.462,5.827A6.193,6.193,0,0,0,3,21a6.193,6.193,0,0,0,3.172,1.54A27.838,27.838,0,0,0,12,23a27.838,27.838,0,0,0,5.827-.462A6.193,6.193,0,0,0,21,21a6.193,6.193,0,0,0,1.54-3.172A27.838,27.838,0,0,0,23,12a27.838,27.838,0,0,0-.462-5.827A6.193,6.193,0,0,0,21,3a6.193,6.193,0,0,0-3.172-1.54A27.833,27.833,0,0,0,12,1a27.833,27.833,0,0,0-5.827.462A6.193,6.193,0,0,0,3,3a6.193,6.193,0,0,0-1.54,3.172A27.833,27.833,0,0,0,1,12Z"
                                                                              fill="none" stroke="#fff"
                                                                              stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"/>
                                                                    </svg>

                                                                </div>
                                                            </div>
                                                        </a>
                                                    @endif
                                                @else
                                                    <div class="item-episode-lock">
                                                        <h2 class="title-episode">{{ $season->name }}</h2>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="d-flex">
                                            <p class="none-courses-text">در حال حاضر هیچ سرفصلی برای این دوره ثبت نشده
                                                است</p>
                                        </div>
                                    @endif

                                </div>

                                <div class="section-active" id="question-course-tab">
                                    <div class="question-title">
                                        <svg id="Message_Align_Left" data-name="Message Align Left" width="24.5"
                                             height="24.5" viewBox="0 0 24.5 24.5">
                                            <path id="Path_1028" data-name="Path 1028"
                                                  d="M12.25,1a32.965,32.965,0,0,1,5.988.408A6.691,6.691,0,0,1,21.5,2.79c1.424,1.255,2,3.523,2,8.1,0,2.947-.265,5.115-.977,6.528a3.4,3.4,0,0,1-1.32,1.473,4.492,4.492,0,0,1-2.305.521,5.288,5.288,0,0,0-3.063.815,5.5,5.5,0,0,0-1.54,1.7l-.144.228a4.4,4.4,0,0,1-.719.966,1.608,1.608,0,0,1-1.182.378,1.608,1.608,0,0,1-1.182-.378,4.4,4.4,0,0,1-.719-.966l-.144-.228a5.5,5.5,0,0,0-1.54-1.7A5.288,5.288,0,0,0,5.6,19.409a4.4,4.4,0,0,1-2.3-.533,3.48,3.48,0,0,1-1.326-1.5C1.264,15.944,1,13.772,1,10.886,1,6.371,1.575,4.1,3,2.827A6.716,6.716,0,0,1,6.267,1.422,32.052,32.052,0,0,1,12.25,1Z"
                                                  fill="none" stroke="#C49C74" stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-width="2"/>
                                            <path id="Path_1029" data-name="Path 1029" d="M7,9h4.091"
                                                  transform="translate(0.136 0.182)" fill="none" stroke="#C49C74"
                                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                            <path id="Path_1030" data-name="Path 1030" d="M7,13H17.227"
                                                  transform="translate(0.136 0.273)" fill="none" stroke="#C49C74"
                                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                        </svg>
                                        <h2> سوالات متداول</h2>
                                    </div>
                                    <div class="parent-accordion">
                                        @if(isset($course->options['faq']) || count($course->options['faq']) > 0)
                                            @foreach($course->options['faq'] as $index=>$faq)
                                                <div :class="{'active-item-accordion':collapse===true}"
                                                     class="item-accordion"
                                                     x-data="{collapse:false}">
                                                    <div class="question-accordion" @click="collapse=!collapse">
                                                        <div class="text-question">
                                                            <label class="count-collapse" for="">{{$index + 1}}.</label>
                                                            <span>{{ $faq['question'] }}</span>
                                                        </div>
                                                        <i :class="{'fa fa-plus':collapse===false,'icon-minus':collapse===true}"></i>
                                                    </div>
                                                    <div class="answer-accordion" x-show="collapse"
                                                         @click.outside="collapse=false">
                                                        <p>{{ $faq['answer'] }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="d-flex">
                                                <p>سوالی برای این دوره ثبت نشده است</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            @php
                                $images = array_values($course->files->where('type', 2)->toArray());
                            @endphp
                            <div class="section-active" id="gallery-course-tab">
                                <div class="title-gallery">
                                    <div class="r-title-gallery">
                                        <svg id="Instagram" width="22" height="22" viewBox="0 0 22 22">
                                            <path id="Path_993" data-name="Path 993"
                                                  d="M1,11a25.3,25.3,0,0,0,.42,5.3,5.63,5.63,0,0,0,1.4,2.883A5.63,5.63,0,0,0,5.7,20.58,25.307,25.307,0,0,0,11,21a25.307,25.307,0,0,0,5.3-.42,5.63,5.63,0,0,0,2.883-1.4,5.63,5.63,0,0,0,1.4-2.883A25.307,25.307,0,0,0,21,11a25.307,25.307,0,0,0-.42-5.3,5.63,5.63,0,0,0-1.4-2.883A5.63,5.63,0,0,0,16.3,1.42,25.3,25.3,0,0,0,11,1a25.3,25.3,0,0,0-5.3.42,5.63,5.63,0,0,0-2.883,1.4A5.63,5.63,0,0,0,1.42,5.7,25.3,25.3,0,0,0,1,11Z"
                                                  fill="none" stroke="#C49C74" stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-width="2"/>
                                            <circle id="Ellipse_47" data-name="Ellipse 47" cx="0.5" cy="0.5" r="0.5"
                                                    transform="translate(17 5.5) rotate(180)" fill="#C49C74"/>
                                            <circle id="Ellipse_48" data-name="Ellipse 48" cx="4" cy="4" r="4"
                                                    transform="translate(7 14.5) rotate(-90)" fill="none"
                                                    stroke="#C49C74"
                                                    stroke-width="2"/>
                                        </svg>
                                        <h2>گالری دوره</h2>
                                    </div>
                                    @if(count($images) > 0)
                                        <div class="l-title-gallery">
                                            <a data-lightbox="roadtrip" class="btn-view-gallery"
                                               href="{{ isset($images[0]) ? $images[0]['url'] : '/images/noPicture.png' }}">
                                                {{--                                        {{ dd($course->files->where('type', 2)->first()->url) }}--}}
                                                <img class="d-none"
                                                     src="{{ isset($images[0]) ? $images[0]['url'] : '/images/noPicture.png' }}"
                                                     alt="">
                                                <i class="icon-circle"></i>
                                                مشاهده همه گالری
                                            </a>
                                        </div>
                                        @foreach($images ?? [] as $image)
                                            @if($loop->first)
                                            @else
                                                <a data-lightbox="roadtrip" class="d-none"
                                                   href="{{ $image['url'] ?? '/images/noPicture.png' }}">
                                                    <img class="d-none"
                                                         src="{{ $image['url'] }}"
                                                         alt="">
                                                </a>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="d-flex">
                                            <p>در حال حاضر هیچ تصویری برای این دوره ثبت نشده است</p>
                                        </div>
                                    @endif
                                </div>
                                @if(count($images) > 0)
                                    <div class="parent-gallery">
                                        <div class="right-gallery">
                                            <div class="t-gallery">
                                                <div class="item-gallery">
                                                    <img
                                                        src="{{ isset($images[1]) ? $images[1]['url'] : '/images/noPicture.png' }}"
                                                        alt="{{ isset($images[1]) ? $images[1]['alt'] : '' }}">
                                                </div>
                                                <div class="item-gallery">
                                                    <img
                                                        src="{{ isset($images[2]) ? $images[2]['url'] : '/images/noPicture.png' }}"
                                                        alt="{{ isset($images[2]) ? $images[2]['alt'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="b-gallery">
                                                <div class="item-gallery">
                                                    <img
                                                        src="{{ isset($images[3]) ? $images[3]['url'] : '/images/noPicture.png' }}"
                                                        alt="{{ isset($images[3]) ? $images[3]['alt'] : '' }}">
                                                </div>
                                                <div class="item-gallery">
                                                    <img
                                                        src="{{ isset($images[4]) ? $images[4]['url'] : '/images/noPicture.png' }}"
                                                        alt="{{ isset($images[4]) ? $images[4]['alt'] : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="left-gallery">
                                            <img
                                                src="{{ isset($images[0]) ? $images[0]['url'] : '/images/noPicture.png' }}"
                                                alt="{{ isset($images[0]) ? $images[0]['alt'] : '' }}">
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if(!$course->comment)
                            <x-parnas.pages.components.comments
                                :comments="$comments"></x-parnas.pages.components.comments>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            {{---------------------------------------box-course-bottom--------------------------------------}}

        </section>

        <section class="s-slider-Similar">
            <div class="bg-smiler-slider"></div>
            <div class="prs-responsive">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-11 m-auto-x parent-slider-courses parent-slider-courses-desktop">
                            <div class="line-between-swiper">

                            </div>
                            <div class="slider-blog-similar">
                                <div class="title-slider-fix">
                                    <i class="icon-circle"></i>
                                    <h3>مقالات مرتبط</h3>
                                </div>
                                @if(count($similarPosts) > 0)
                                    <div class="swiper w-100 swiper-blog-courses">
                                        <div class="swiper-wrapper">
                                            @foreach($similarPosts ?? [] as $post)
                                                <div class="swiper-slide item-blog-swiper">
                                                    <div class="card-blog">
                                                        <a href="{{ $post->path() }}">
                                                            <figure class="top-blog">
                                                                <label class="category-blog">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.868"
                                                                         height="9.912"
                                                                         viewBox="0 0 13.868 9.912">
                                                                        <path id="Align_Center" data-name="Align Center"
                                                                              d="M1,1H12.868M4.956,4.956H8.912M2.978,8.912H10.89"
                                                                              fill="none"
                                                                              stroke="#c49c74" stroke-linecap="round"
                                                                              stroke-linejoin="round"
                                                                              stroke-width="2"/>
                                                                    </svg>
                                                                    <span>{{ $post->categories()->pluck('name')->first() }}</span>
                                                                </label>
                                                                <img class="img-blog"
                                                                     src="{{ $post->files->where('type', 1)->first()?->url ?? '/images/noPicture.png' }}"
                                                                     alt="">
                                                            </figure>
                                                        </a>
                                                        <div class="bottom-blog">
                                                            <div class="title-blog-cart">
                                                                <i class="icon-circle"></i>
                                                                <h3>{{ $post->title }}</h3>
                                                            </div>
                                                            <a class="btn-Read-more d-flex justify-content-center"
                                                               href="{{ $post->path() }}">
                                                                ادامه مطلب
                                                                <i class="icon-left-big"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                @else
                                    <div class="item-slide-similar-courses-empty">
                                        <figure class="parent-img-similar-courses">
                                            <div class="fix-img-similar">
                                                <img src="/img/M.safaei3.svg" alt="">
                                            </div>
                                            <img class="img"
                                                 src="{{ '/images/noPicture.png' }}"
                                                 alt="">
                                        </figure>
                                        <div class="information-similar">
                                            <div class="text-information">
                                                <i class="icon-circle"></i>
                                                <div class="parent-more">
                                                    <h3>مطلب مشابهی یافت نشد</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="slider-similar-courses">
                                <div class="title-slider-fix">
                                    <i class="icon-circle"></i>
                                    <h3>دوره های مشابه</h3>
                                </div>
                                @if( count($similarCourses) > 0)
                                    <div class="swiper w-100 swiper-similar-courses">
                                        <div class="swiper-wrapper">
                                            @foreach($similarCourses ?? [] as $_course)
                                                <div class="swiper-slide ">
                                                    <div class="item-slide-similar-courses">
                                                        <a href="{{ $_course->path() }}">
                                                            <figure class="parent-img-similar-courses">
                                                                <div class="fix-img-similar"><img src="/img/M.safaei3.svg"
                                                                                                  alt="">
                                                                </div>
                                                                <img class="img"
                                                                     src="{{ $_course->files->where('type', 1)->first()?->url ?? '/images/noPicture.png' }}"
                                                                     alt="">
                                                            </figure>
                                                        </a>
                                                        <div class="information-similar">
                                                            <div class="text-information">
                                                                <i class="icon-circle"></i>
                                                                <div class="parent-more">
                                                                    <h3>{{ $_course->title }}</h3>
                                                                    <small> مدرس دوره
                                                                        :{{ $this->getTeacher($_course)?->title }}</small>
                                                                </div>
                                                            </div>
                                                            <a href="{{ $_course->path() }}">
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
                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                @else
                                    <div class="item-slide-similar-courses-empty">
                                        <figure class="parent-img-similar-courses">
                                            <div class="fix-img-similar">
                                                <img src="/img/M.safaei3.svg" alt="">
                                            </div>
                                            <img class="img"
                                                 src="{{ '/images/noPicture.png' }}"
                                                 alt="">
                                        </figure>
                                        <div class="information-similar">
                                            <div class="text-information">
                                                <i class="icon-circle"></i>
                                                <div class="parent-more">
                                                    <h3>دوره ی مشابهی یافت نشد</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="parent-slider-courses-mobile">
                            <div class="tab-mobile-similar" x-data="{tabSimilar:'swiperOne'}">
                                <div class="parent-link-tab-similar">
                                    @if(count($similarCourses) > 0)
                                        <a class="similar-tab-link"
                                           :class="{'active-similar-tab':tabSimilar==='swiperOne'}"
                                           @click="tabSimilar='swiperOne'">دوره های مشابه</a>
                                    @endif
                                    @if(count($similarPosts) > 0)
                                        <a class="similar-tab-link"
                                           :class="{'active-similar-tab':tabSimilar==='swiperTwo'}"
                                           @click="tabSimilar='swiperTwo'">مقالات مرتبط</a>
                                    @endif
                                </div>
                                <div class="parent-show-slider">
                                    <div x-show="tabSimilar==='swiperOne'" class="slider-similar-courses">
                                        <div class="swiper w-100 swiper-similar-courses">
                                            <div class="swiper-wrapper">
                                                @foreach($similarCourses ?? [] as $course)
                                                    <div class="swiper-slide">
                                                        <div class="item-slide-similar-courses">
                                                            <a href="{{ $course->path() }}">
                                                                <figure class="parent-img-similar-courses">
                                                                    <div class="fix-img-similar"><img
                                                                            src="/img/M.safaei3.svg"
                                                                            alt="">
                                                                    </div>
                                                                    <img class="img"
                                                                         src="{{ $course->files->where('type', 1)->first()?->url ?? '/images/noPicture.png' }}"
                                                                         alt="">
                                                                </figure>
                                                            </a>
                                                            <div class="information-similar">
                                                                <div class="text-information">
                                                                    <i class="icon-circle"></i>
                                                                    <div class="parent-more">
                                                                        <h3>{{ $course->title }}</h3>
                                                                        <small> مدرس دوره
                                                                            :{{ $this->getTeacher($_course)?->title }}</small>
                                                                    </div>
                                                                </div>
                                                                <a href="{{ $course->path() }}">
                                                                    <svg width="30" height="30" viewBox="0 0 37 37">
                                                                        <g id="Up"
                                                                           transform="translate(1 36) rotate(-90)">
                                                                            <path id="Path_1177" data-name="Path 1177"
                                                                                  d="M0,17.5a44.279,44.279,0,0,0,.734,9.27,9.852,9.852,0,0,0,2.45,5.046,9.854,9.854,0,0,0,5.046,2.45A44.278,44.278,0,0,0,17.5,35a44.277,44.277,0,0,0,9.27-.734,9.853,9.853,0,0,0,5.046-2.45,9.853,9.853,0,0,0,2.45-5.046A44.287,44.287,0,0,0,35,17.5a44.288,44.288,0,0,0-.734-9.27,9.853,9.853,0,0,0-2.45-5.046A9.852,9.852,0,0,0,26.77.734,44.28,44.28,0,0,0,17.5,0,44.281,44.281,0,0,0,8.23.734a9.852,9.852,0,0,0-5.046,2.45A9.852,9.852,0,0,0,.734,8.23,44.28,44.28,0,0,0,0,17.5Z"
                                                                                  transform="translate(0 0)" fill="none"
                                                                                  stroke="#151515"
                                                                                  stroke-linecap="round"
                                                                                  stroke-linejoin="round"
                                                                                  stroke-width="2"/>
                                                                            <path id="Path_1178" data-name="Path 1178"
                                                                                  d="M0,6.059,6.059,0l6.059,6.059"
                                                                                  transform="translate(11.441 14.471)"
                                                                                  fill="none"
                                                                                  stroke="#151515"
                                                                                  stroke-linecap="round"
                                                                                  stroke-linejoin="round"
                                                                                  stroke-width="2"/>
                                                                        </g>
                                                                    </svg>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach>
                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                    </div>
                                    <div x-show="tabSimilar==='swiperTwo'" class="slider-blog-similar">
                                        <div class="swiper w-100 swiper-blog-courses">
                                            <div class="swiper-wrapper">
                                                @foreach($similarPosts ?? [] as $post)
                                                    <div class="swiper-slide item-blog-swiper">
                                                        <div class="card-blog">
                                                            <a href="{{ $post->path() }}">
                                                                <figure class="top-blog">
                                                                    <label class="category-blog">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="13.868"
                                                                             height="9.912"
                                                                             viewBox="0 0 13.868 9.912">
                                                                            <path id="Align_Center" data-name="Align Center"
                                                                                  d="M1,1H12.868M4.956,4.956H8.912M2.978,8.912H10.89"
                                                                                  fill="none"
                                                                                  stroke="#c49c74" stroke-linecap="round"
                                                                                  stroke-linejoin="round"
                                                                                  stroke-width="2"/>
                                                                        </svg>
                                                                        <span>{{ $post->categories()->pluck('name')->first() }}</span>
                                                                    </label>
                                                                    <img class="img-blog"
                                                                         src="{{ $post->files->where('type', 1)->first()?->url ?? '/images/noPicture.png' }}"
                                                                         alt="">
                                                                </figure>
                                                            </a>
                                                            <div class="bottom-blog">
                                                                <div class="title-blog-cart">
                                                                    <i class="icon-circle"></i>
                                                                    <h3>{{ $post->title }}</h3>
                                                                </div>
                                                                <a class="btn-Read-more d-flex justify-content-center"
                                                                   href="{{ $post->path() }}">
                                                                    ادامه مطلب
                                                                    <i class="icon-left-big"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
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
</div>
@push('scripts')
    <script>

        const player = new Plyr('#player')

        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });

        var swiper = new Swiper(".swiper-similar-courses", {
            grabCursor: true,
            slidesPerView: 1.3,
            spaceBetween: 2,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                480: {
                    slidesPerView: 1.1,
                },
                640: {
                    slidesPerView: 2,
                },
                800: {
                    slidesPerView: 2.2,
                },
                900: {
                    slidesPerView: 1.3,
                }
            }
        });
        var swiper = new Swiper(".swiper-blog-courses", {
            grabCursor: true,
            slidesPerView: 1.3,
            spaceBetween: 17,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                480: {
                    slidesPerView: 1.1,
                },
                640: {
                    slidesPerView: 2,
                },
                800: {
                    slidesPerView: 2.2,
                },
                900: {
                    slidesPerView: 1.3,
                }
            }
        });

        function progressIndicator() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("progressBar").style.width = scrolled + "%";
        }

        var menu_selector = ".tab-courses";

        function onScroll() {
            var scroll_top = $(document).scrollTop();
            $(menu_selector + " a").each(function () {
                var hash = $(this).attr("href");
                var target = $(hash);
                if (target.position().top <= scroll_top && target.position().top + target.outerHeight() > scroll_top) {
                    $(menu_selector + " a.active-tab-Course").removeClass("active-tab-Course");
                    $(this).addClass("active-tab-Course");
                } else {
                    $(this).removeClass("active-tab-Course");
                }
            });
        }

        $(document).ready(function () {
            $(document).on("scroll", onScroll);
            $("a[href^=#]").click(function (e) {
                e.preventDefault();
                $(document).off("scroll");
                $(menu_selector + " a.active-tab-Course").removeClass("active-tab-Course");
                $(this).addClass("active-tab-Course");
                var hash = $(this).attr("href");
                var target = $(hash);
                $("html, body").animate({
                    scrollTop: target.offset().top
                }, 0, function () {
                    window.location.hash = hash;
                    $(document).on("scroll", onScroll);
                });
            });
            $('.tab-courses').on(click, a, function () {
                $('a').removeClass('active-tab-Course')
                $(this).addClass('active-tab-Course')
            })
        });
    </script>
@endpush
