<div>
    <div class="parentTeacher">
        <div class="information-teacher-box">
            <img class="picture-teacher" src="{{ $this->teacherImg()->url ?? '/images/noPicture.png' }}" alt="{{ $this->teacherImg()->alt ?? '' }}">
            <div class="teacher">
                                <span class="title-teacher">
                                    مدرس دوره :
                                </span>
                <span class="name-teacher">{{$post->title}}</span>
            </div>
            <small class="user-maqam">{{ $post->options['subtitle'] }}</small>
            <div class="wrapper">
                <div class="icon instagram">
                    <div class="tooltip">{{ $post->options['instagram']  }}</div>
                    <div class="span-margin"><i class=" icon-instagram"></i></div>
                </div>
                <div class="icon instagram">
                    <div class="tooltip">{{ $post->options['email']  }}</div>
                    <div class="span-margin"><i class="icon-mail-alt"></i></div>
                </div>
                <div class="icon instagram">
                    <div class="tooltip">{{ $post->options['whatsapp']  }}
                    </div>
                    <div class="span-margin"><i class="icon-whatsapp"></i></div>
                </div>
            </div>
        </div>
        <div class="parent-details-teacher">
            <div class="topBar" x-data="{activeSection:'first'}">
                <a href="#p-teacherBody" :class="{'activeTabTeacher':activeSection==='first'}" @click="activeSection='first'"
                   class="btn-linkTeacher" :class="{'activeTabTeacher':activeSection==='first'}">
                    <svg width="32" height="32" viewBox="0 0 49.812 49.812">
                        <g id="Document_Align_Left_1" data-name="Document Align Left 1"
                           transform="translate(0.5 0.5)">
                            <path id="Path_902" data-name="Path 902"
                                  d="M24.406,47.812a59.235,59.235,0,0,1-12.4-.982,13.178,13.178,0,0,1-6.749-3.277A13.176,13.176,0,0,1,1.982,36.8,59.224,59.224,0,0,1,1,24.406a59.224,59.224,0,0,1,.982-12.4A13.177,13.177,0,0,1,5.259,5.259a13.177,13.177,0,0,1,6.749-3.276A59.224,59.224,0,0,1,24.406,1a59.224,59.224,0,0,1,12.4.982,13.176,13.176,0,0,1,6.749,3.276,13.178,13.178,0,0,1,3.277,6.749,59.235,59.235,0,0,1,.982,12.4,59.234,59.234,0,0,1-.982,12.4,13.177,13.177,0,0,1-3.277,6.749A13.177,13.177,0,0,1,36.8,46.83,59.234,59.234,0,0,1,24.406,47.812Z"
                                  fill="none" stroke="#e0e0e0" stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="3"/>
                            <path id="Path_903" data-name="Path 903" d="M7,7h6.383"
                                  transform="translate(6.767 6.767)" fill="none" stroke="#e0e0e0"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                            <path id="Path_904" data-name="Path 904" d="M7,12H28.278"
                                  transform="translate(6.767 12.406)" fill="none" stroke="#e0e0e0"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                            <path id="Path_905" data-name="Path 905" d="M14,17h6.383"
                                  transform="translate(14.662 18.045)" fill="none" stroke="#e0e0e0"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                        </g>
                    </svg>

                    توضیحات مدرس
                </a>
                <a href="#head-season-eduction" :class="{'activeTabTeacher':activeSection==='second'}"
                   @click="activeSection='second'" class="btn-linkTeacher-2">
                    <svg width="32" height="32" viewBox="0 0 34.381 34.381">
                        <g id="Graph" transform="translate(1 1)">
                            <path id="Path_967" data-name="Path 967"
                                  d="M25.606,14.359H23.031L18.983,7,11.623,21.719,7.576,14.359H5"
                                  transform="translate(0.888 1.831)" fill="rgba(0,0,0,0)"
                                  stroke="#e0e0e0" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"/>
                            <path id="Path_968" data-name="Path 968"
                                  d="M1,17.191a40.967,40.967,0,0,0,.679,8.577,9.115,9.115,0,0,0,2.266,4.668A9.116,9.116,0,0,0,8.614,32.7a40.975,40.975,0,0,0,8.577.679,40.974,40.974,0,0,0,8.577-.679,9.115,9.115,0,0,0,4.668-2.267A9.115,9.115,0,0,0,32.7,25.767a40.974,40.974,0,0,0,.679-8.577A40.975,40.975,0,0,0,32.7,8.614a9.116,9.116,0,0,0-2.267-4.668,9.115,9.115,0,0,0-4.668-2.266A40.967,40.967,0,0,0,17.191,1a40.967,40.967,0,0,0-8.577.679A9.115,9.115,0,0,0,3.946,3.946,9.115,9.115,0,0,0,1.679,8.614,40.967,40.967,0,0,0,1,17.191Z"
                                  transform="translate(-1 -1)" fill="rgba(0,0,0,0)" stroke="#e0e0e0"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </g>
                    </svg>

                    دوره های آموزشی
                </a>
            </div>
            <div id="p-teacherBody" class="p-teacherBody editor">
                {!! $post->options['teacher_description'] !!}
            </div>
        </div>
        <div id="head-season-eduction" class="head-season-eduction">
            <div class="title-head-season">
                <svg width="30" height="30" viewBox="0 0 34.843 34.843">
                    <g id="Graph" transform="translate(1 1)">
                        <path id="Path_967" data-name="Path 967"
                              d="M25.9,14.464H23.288L19.182,7,11.718,21.929,7.613,14.464H5"
                              transform="translate(0.972 1.957)" fill="rgba(0,0,0,0)" stroke="#c49c74"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <path id="Path_968" data-name="Path 968"
                              d="M1,17.422a41.551,41.551,0,0,0,.689,8.7,9.245,9.245,0,0,0,2.3,4.735,9.246,9.246,0,0,0,4.735,2.3,41.559,41.559,0,0,0,8.7.689,41.559,41.559,0,0,0,8.7-.689,9.245,9.245,0,0,0,4.735-2.3,9.245,9.245,0,0,0,2.3-4.735,41.559,41.559,0,0,0,.689-8.7,41.559,41.559,0,0,0-.689-8.7,9.246,9.246,0,0,0-2.3-4.735,9.245,9.245,0,0,0-4.735-2.3A41.551,41.551,0,0,0,17.422,1a41.552,41.552,0,0,0-8.7.689,9.245,9.245,0,0,0-4.735,2.3,9.245,9.245,0,0,0-2.3,4.735A41.552,41.552,0,0,0,1,17.422Z"
                              transform="translate(-1 -1)" fill="rgba(0,0,0,0)" stroke="#c49c74"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </g>
                </svg>
                <h2>سر فصل های آموزشی</h2>
            </div>
            <div class="list-courses-teacher">
                @foreach($courses as $course)
                    <div class="item-slide-similar-courses mb-2">
                        <a href="{{ $course->path() }}">
                            <figure class="parent-img-similar-courses">
                                <div class="fix-img-similar">
                                    <img src="/img/M.safaei3.svg" alt="">
                                </div>
                                <img class="img" src="{{ $course->files->firstWhere('type' , 1)?->url ?? '/images/noPicture.png' }}" alt="{{ $course->title }}">
                            </figure>
                        </a>
                        <div class="information-similar">
                            <div class="text-information">
                                <i class="icon-circle"></i>
                                <div class="parent-more">
                                    <a href="{{ $course->path() }}">
                                        <h3>{{ $course->title }}</h3>
                                    </a>
                                    <small> مدرس دوره
                                        {{ \App\Models\User::find($course->options['teacher'])?->fullname() ?? null }}</small>
                                </div>
                            </div>
                            <a href="{{ $course->path() }}">
                                <svg width="30" height="30" viewBox="0 0 37 37">
                                    <g id="Up" transform="translate(1 36) rotate(-90)">
                                        <path id="Path_1177" data-name="Path 1177" d="M0,17.5a44.279,44.279,0,0,0,.734,9.27,9.852,9.852,0,0,0,2.45,5.046,9.854,9.854,0,0,0,5.046,2.45A44.278,44.278,0,0,0,17.5,35a44.277,44.277,0,0,0,9.27-.734,9.853,9.853,0,0,0,5.046-2.45,9.853,9.853,0,0,0,2.45-5.046A44.287,44.287,0,0,0,35,17.5a44.288,44.288,0,0,0-.734-9.27,9.853,9.853,0,0,0-2.45-5.046A9.852,9.852,0,0,0,26.77.734,44.28,44.28,0,0,0,17.5,0,44.281,44.281,0,0,0,8.23.734a9.852,9.852,0,0,0-5.046,2.45A9.852,9.852,0,0,0,.734,8.23,44.28,44.28,0,0,0,0,17.5Z" transform="translate(0 0)" fill="none" stroke="#151515" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                        <path id="Path_1178" data-name="Path 1178" d="M0,6.059,6.059,0l6.059,6.059" transform="translate(11.441 14.471)" fill="none" stroke="#151515" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                    </g>
                                </svg>
                            </a>

                        </div>
                    </div>
                @endforeach

                {{ $courses->links() }}
            </div>
        </div>
    </div>
</div>
