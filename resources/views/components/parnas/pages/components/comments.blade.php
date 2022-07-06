@props(['comments'=> []])
<div id="comment-course-tab">
    <div class="title-comment">
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
        <h2>{{ __('نظرات کاربران') }}</h2>
    </div>
    <div class="details-comment-user">
        <div class="tip">
            <h3>{{ __('دقت کنید') }}</h3>
            <div class="item-tip">
                <i class="icon-circle"></i>
                <p>{{ __('ابتدا در سایت ثبت نام یا ورود کنید.') }}</p>
            </div>
            <div class="item-tip">
                <i class="icon-circle"></i>
                <p>{{ __('اگر در مورد جزئیات دوره سوالی دارید از طریق پنل ارسال فرمائید.') }}</p>
            </div>
            <div class="item-tip">
                <i class="icon-circle"></i>
                <p>{{ __('جهت حفظ امنیت در این قسمت صبور باشید!') }}</p>
            </div>
        </div>
        <div class="rate-parent">
            <div class="rate-box">
                <strong>{{ number_format($comments->avg('rate'), 1) }}</strong>
                <div class="stars">
                    @foreach(range(1, 5) as $star)
                        @if($comments->avg('rate') < $star )
                            <i class="icon-star-empty"></i>
                        @else
                            <i class="icon-star"></i>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="box-ranking-rate">
                <div class="rate-five">
                    <div class="line-rate-five"></div>
                    <div class="stars">
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                    </div>
                    <span>{{ count($comments->where('rate', 5)) }}</span>
                </div>
                <div class="rate-four">
                    <div class="line-rate-four"></div>
                    <div class="stars">
                        <i class="icon-star-empty"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                    </div>
                    <span>{{ count($comments->where('rate', 4)) }}</span>
                </div>
                <div class="rate-three">
                    <div class="line-rate-three"></div>
                    <div class="stars">
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                    </div>
                    <span>{{ count($comments->where('rate', 3)) }}</span>
                </div>
                <div class="rate-two">
                    <div class="line-rate-two"></div>
                    <div class="stars">
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                    </div>
                    <span>{{ count($comments->where('rate', 2)) }}</span>
                </div>
                <div class="rate-one">
                    <div class="line-rate-one"></div>
                    <div class="stars">
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star"></i>
                    </div>
                    <span>{{ count($comments->where('rate', 1)) }}</span>
                </div>
                <div class="rate-zero">
                    <div class="line-rate-zero"></div>
                    <div class="stars">
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                        <i class="icon-star-empty"></i>
                    </div>
                    <span>{{ count($comments->where('rate', 0)) }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="title-send-massage">
        <h2>{{ __('دیدگاه های ارسالی شما !') }}</h2>
        @guest()
            <a class="btn-send-massage-course">
                <i class="icon-circle"></i>
                {{__('ارسال دیدگاه')}}
            </a>
        @endguest
        @auth()
            <a class="btn-send-massage-course" wire:click="showLoginMessage()">
                <i class="icon-circle"></i>
                {{ __('ارسال دیدگاه') }}
            </a>
        @endauth


    </div>
    <div class="faq">
        @if(count($comments) > 0)
            @foreach($comments as $comment)
                <div class="question-user">
                    <div class="user-question">
                        <img src="/images/user-question.png" alt="">
                        <div class="info-user-question">
                            <span>{{ $comment->user->fullName() }}</span>
                            <small>{{ jdate($comment->created_at)->ago() }}</small>
                            <div class="stars">
                                @foreach(range(1, 5) as $star)
                                    @if($comment->rate < $star )
                                        <i class="icon-star-empty"></i>
                                    @else
                                        <i class="icon-star"></i>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="box-question" x-data="{modal:false}"
                    @close-comment.window="modal = false">
                        <div class="box-main-questions" >
                            <p>{{ $comment->body }}</p>
                        </div>
                        <div class="box-fix-send-massage" >
                            <a @click="modal=!modal" class="btn-send-answer" href=""
                               wire:click.prevent="showLoginMessage({{ $comment->id }})">
                                <svg id="Scanning_5" data-name="Scanning 5" width="22"
                                     height="22"
                                     viewBox="0 0 22 22">
                                    <path id="Path_1132" data-name="Path 1132"
                                          d="M1.834,13.76a.938.938,0,0,0-.929-.881.9.9,0,0,0-.9.955C.391,19.7,2.3,21.609,8.166,22a.9.9,0,0,0,.955-.9.938.938,0,0,0-.881-.929A16.553,16.553,0,0,1,5.8,19.843a4.807,4.807,0,0,1-2.47-1.171A4.807,4.807,0,0,1,2.157,16.2,16.554,16.554,0,0,1,1.834,13.76Zm18.252,0a.938.938,0,0,1,.929-.881.9.9,0,0,1,.9.955c-.389,5.862-2.3,7.774-8.164,8.164a.9.9,0,0,1-.955-.9.938.938,0,0,1,.881-.929,16.555,16.555,0,0,0,2.442-.323,4.807,4.807,0,0,0,2.47-1.171,4.807,4.807,0,0,0,1.171-2.47A16.555,16.555,0,0,0,20.087,13.76ZM22,11.082v0Zm-.081-2.837a.9.9,0,0,1-.9.955.938.938,0,0,1-.929-.881,16.553,16.553,0,0,0-.323-2.442,4.807,4.807,0,0,0-1.171-2.47,4.807,4.807,0,0,0-2.47-1.171,16.553,16.553,0,0,0-2.442-.323A.938.938,0,0,1,12.8.984a.9.9,0,0,1,.955-.9C19.617.47,21.53,2.383,21.919,8.245ZM1.834,8.319A.938.938,0,0,1,.906,9.2.9.9,0,0,1,0,8.245C.391,2.383,2.3.47,8.166.081a.9.9,0,0,1,.955.9.938.938,0,0,1-.881.929A16.551,16.551,0,0,0,5.8,2.236a4.807,4.807,0,0,0-2.47,1.171,4.807,4.807,0,0,0-1.171,2.47A16.552,16.552,0,0,0,1.834,8.319ZM10.961,0h0Z"
                                          transform="translate(0)" fill="#e0e0e0"
                                          fill-rule="evenodd"/>
                                    <path id="Path_1133" data-name="Path 1133"
                                          d="M6,11.914H17"
                                          transform="translate(-0.5 -0.993)"
                                          fill="rgba(0,0,0,0)"
                                          stroke="#ffffff"
                                          stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"/>
                                    <path id="Path_1134" data-name="Path 1134"
                                          d="M10,15.914h3.667"
                                          transform="translate(-0.834 -1.327)"
                                          fill="rgba(0,0,0,0)"
                                          stroke="#ffffff"
                                          stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"/>
                                    <path id="Path_1135" data-name="Path 1135"
                                          d="M8,7.914h7.333"
                                          transform="translate(-0.667 -0.66)"
                                          fill="rgba(0,0,0,0)"
                                          stroke="#ffffff"
                                          stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"/>
                                </svg>
                                {{ __('ارسال پاسخ') }}
                            </a>
                        </div>
                        @auth
                        <div style="display: none" x-show="modal" x-transition.scale.60 x-transition.duration.700ms class="modal-send-answer">
                            <div class="send-massage-user">
                            <form wire:submit.prevent="submit({{ $comment->id }})" class="form-send-massage">
                                <div class="top-form">
                                    <div class="item">
                                        <div class="label">
                                            <svg id="User" xmlns="http://www.w3.org/2000/svg" width="22"
                                                 height="24" viewBox="0 0 22 24">
                                                <path id="Path_1192" data-name="Path 1192"
                                                      d="M1,19a4.777,4.777,0,0,0,.343,2.079,2.207,2.207,0,0,0,1.174,1.055A10.011,10.011,0,0,0,5.56,22.8c1.405.142,3.185.2,5.44.2s4.035-.055,5.44-.2a10.011,10.011,0,0,0,3.043-.669,2.207,2.207,0,0,0,1.174-1.055A4.776,4.776,0,0,0,21,19a4.776,4.776,0,0,0-.343-2.079,2.207,2.207,0,0,0-1.174-1.055A10.011,10.011,0,0,0,16.44,15.2c-1.405-.142-3.185-.2-5.44-.2s-4.035.055-5.44.2a10.011,10.011,0,0,0-3.043.669,2.207,2.207,0,0,0-1.174,1.055A4.777,4.777,0,0,0,1,19Z"
                                                      fill="none" stroke="#caa85e" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"/>
                                                <circle id="Ellipse_69" data-name="Ellipse 69" cx="5" cy="5"
                                                        r="5" transform="translate(16 11) rotate(180)"
                                                        fill="none" stroke="#caa85e" stroke-width="2"/>
                                            </svg>
                                            <label for="">{{ __('نام ونام خانوادگی') }}</label>
                                        </div>
                                        <input type="text" wire:model.defer="comment.name">
                                        @if ($errors->has('comment.name'))
                                            <span class="text-danger">{{ $errors->first('comment.name') }}</span>
                                        @endif
                                    </div>
                                    <div class="item">
                                        <div class="label">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21.162"
                                                 height="16.698" viewBox="0 0 21.162 16.698">
                                                <path id="_001-mail_inbox_app" data-name="001-mail inbox app"
                                                      d="M16.2,70.7H4.96A4.965,4.965,0,0,1,0,65.738V58.96A4.965,4.965,0,0,1,4.96,54H16.2a4.965,4.965,0,0,1,4.96,4.96v6.778A4.965,4.965,0,0,1,16.2,70.7ZM4.96,55.653A3.31,3.31,0,0,0,1.653,58.96v6.778A3.31,3.31,0,0,0,4.96,69.045H16.2a3.31,3.31,0,0,0,3.307-3.307V58.96A3.31,3.31,0,0,0,16.2,55.653Zm8.65,8.159L17.7,60.691a.827.827,0,0,0-1-1.314L12.607,62.5a3.315,3.315,0,0,1-4.008,0L4.641,59.423a.827.827,0,0,0-1.015,1.305l3.962,3.08.006,0a4.972,4.972,0,0,0,6.016,0Z"
                                                      transform="translate(0 -54)" fill="#c49c74"></path>
                                            </svg>
                                            <label for=""> {{ __('ایمیل') }} </label>
                                        </div>
                                        <input type="text" wire:model.defer="comment.email">
                                        @if ($errors->has('comment.email'))
                                            <span class="text-danger">{{ $errors->first('comment.email') }}</span>
                                        @endif
                                    </div>
                                    <div class="item">
                                        <x-parnas.rating></x-parnas.rating>
                                        @if ($errors->has('comment.rate'))
                                            <span class="text-danger">{{ $errors->first('comment.rate') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="bottom-form">
                                    <div class="label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="15.333"
                                             viewBox="0 0 22 15.333">
                                            <path id="Align_right" data-name="Align right"
                                                  d="M21,1H1M21,7.667H14.333M21,14.333H7.667" fill="none"
                                                  stroke="#caa85e" stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-width="2"/>
                                        </svg>
                                        <label for="">{{ __('متن پیام') }}</label>
                                    </div>
                                    <textarea name="" id="" cols="30" rows="10"
                                              wire:model.defer="comment.body"></textarea>
                                    @if ($errors->has('comment.body'))
                                        <span class="text-danger">{{ $errors->first('comment.body') }}</span>
                                    @endif
                                    <button class="btn-send-form">
                                        <i class="icon-circle"></i>
                                        {{ __('ارسال دیدگاه') }}
                                    </button>
                                </div>
                            </form>
                            </div>
                        </div>
                        @endauth

                    </div>
                </div>
                @foreach($comment->comments()->where('approved' , 1)->get() as $child)
                    <div class="answer-user">
                        <div class="users-answer">
                            <svg width="18.987" height="23.995" viewBox="0 0 18.987 23.995">
                                <path id="redo-alt"
                                      d="M16.9,10.306a1,1,0,0,1,1.414,0l4.949,4.95a2.5,2.5,0,0,1,0,3.536l-4.95,4.949A1,1,0,0,1,16.9,22.329l4.3-4.3H5a5,5,0,0,1-5-5v-7c0-1.115,1.939-1.575,2,0v7a3,3,0,0,0,3,3H21.212L16.9,11.72A1,1,0,0,1,16.9,10.306Z"
                                      transform="translate(-5.013 23.995) rotate(-90)"
                                      fill="#3e3e3e"/>
                            </svg>
                            <img src="/images/manger.png" alt="">
                            <div class="info-users-answer">
                                <span>{{ $child->user->fullName() }}</span>
                                <small>{{ jdate($child->created_at)->ago() }}</small>
                                <div class="stars">
                                    @foreach(range(1, 5) as $star)
                                        @if($child->rate < $star )
                                            <i class="icon-star-empty"></i>
                                        @else
                                            <i class="icon-star"></i>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="box-answer-users-text">
                            <p>{{ $child->body }}</p>
                        </div>
                    </div>
                @endforeach
            @endforeach
        @else
            <p>{{ __('در حال حاضر نظری ثبت نشده است') }}</p>
        @endif
    </div>
    {{ $comments->links() }}

    @auth()
        <div class="send-massage-user">
            <div class="title-user-massage">
                <h2>{{ __('ارسال دیدگاه') }}</h2>
            </div>
            <form wire:submit.prevent="submit" class="form-send-massage">
                <div class="top-form">
                    <div class="item">
                        <div class="label">
                            <svg id="User" xmlns="http://www.w3.org/2000/svg" width="22"
                                 height="24" viewBox="0 0 22 24">
                                <path id="Path_1192" data-name="Path 1192"
                                      d="M1,19a4.777,4.777,0,0,0,.343,2.079,2.207,2.207,0,0,0,1.174,1.055A10.011,10.011,0,0,0,5.56,22.8c1.405.142,3.185.2,5.44.2s4.035-.055,5.44-.2a10.011,10.011,0,0,0,3.043-.669,2.207,2.207,0,0,0,1.174-1.055A4.776,4.776,0,0,0,21,19a4.776,4.776,0,0,0-.343-2.079,2.207,2.207,0,0,0-1.174-1.055A10.011,10.011,0,0,0,16.44,15.2c-1.405-.142-3.185-.2-5.44-.2s-4.035.055-5.44.2a10.011,10.011,0,0,0-3.043.669,2.207,2.207,0,0,0-1.174,1.055A4.777,4.777,0,0,0,1,19Z"
                                      fill="none" stroke="#caa85e" stroke-linecap="round"
                                      stroke-linejoin="round" stroke-width="2"/>
                                <circle id="Ellipse_69" data-name="Ellipse 69" cx="5" cy="5"
                                        r="5" transform="translate(16 11) rotate(180)"
                                        fill="none" stroke="#caa85e" stroke-width="2"/>
                            </svg>
                            <label for="">{{ __('نام ونام خانوادگی') }}</label>
                        </div>
                        <input type="text" wire:model.defer="comment.name">
                        @if ($errors->has('comment.name'))
                            <span class="text-danger">{{ $errors->first('comment.name') }}</span>
                        @endif
                    </div>
                    <div class="item">
                        <div class="label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21.162"
                                 height="16.698" viewBox="0 0 21.162 16.698">
                                <path id="_001-mail_inbox_app" data-name="001-mail inbox app"
                                      d="M16.2,70.7H4.96A4.965,4.965,0,0,1,0,65.738V58.96A4.965,4.965,0,0,1,4.96,54H16.2a4.965,4.965,0,0,1,4.96,4.96v6.778A4.965,4.965,0,0,1,16.2,70.7ZM4.96,55.653A3.31,3.31,0,0,0,1.653,58.96v6.778A3.31,3.31,0,0,0,4.96,69.045H16.2a3.31,3.31,0,0,0,3.307-3.307V58.96A3.31,3.31,0,0,0,16.2,55.653Zm8.65,8.159L17.7,60.691a.827.827,0,0,0-1-1.314L12.607,62.5a3.315,3.315,0,0,1-4.008,0L4.641,59.423a.827.827,0,0,0-1.015,1.305l3.962,3.08.006,0a4.972,4.972,0,0,0,6.016,0Z"
                                      transform="translate(0 -54)" fill="#c49c74"></path>
                            </svg>
                            <label for=""> {{ __('ایمیل') }} </label>
                        </div>
                        <input type="text" wire:model.defer="comment.email">
                        @if ($errors->has('comment.email'))
                            <span class="text-danger">{{ $errors->first('comment.email') }}</span>
                        @endif
                    </div>
                    <div class="item">
                        <x-parnas.rating></x-parnas.rating>
                        @if ($errors->has('comment.rate'))
                            <span class="text-danger">{{ $errors->first('comment.rate') }}</span>
                        @endif
                    </div>

                </div>
                <div class="bottom-form">
                    <div class="label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="15.333"
                             viewBox="0 0 22 15.333">
                            <path id="Align_right" data-name="Align right"
                                  d="M21,1H1M21,7.667H14.333M21,14.333H7.667" fill="none"
                                  stroke="#caa85e" stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="2"/>
                        </svg>
                        <label for="">{{ __('متن پیام') }}</label>
                    </div>
                    <textarea name="" id="" cols="30" rows="10"
                              wire:model.defer="comment.body"></textarea>
                    @if ($errors->has('comment.body'))
                        <span class="text-danger">{{ $errors->first('comment.body') }}</span>
                    @endif
                    <button class="btn-send-form">
                        <i class="icon-circle"></i>
                        {{ __('ارسال دیدگاه') }}
                    </button>
                </div>
            </form>
        </div>
    @endauth

</div>
