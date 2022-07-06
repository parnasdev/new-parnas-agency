<div class="bg-white">
    <x-parnas.loading wire:loading.flex wire:target="submit"/>
    <section class="s-about-us-top">
        <div class="bg-dark-opacity"></div>
        <div class="prs-responsive">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto-x page-about-us-top">
                        <h1 class="title-fa">ورود / عضویت</h1>
                        <h1 class="title-en">login-register</h1>
                        <div class="text-top-about-us">
                            <h1>زیبا کردن زندگی مردم</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="prs-responsive">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 parent-auth m-auto-x">
                        <div class="box-auth" x-data="timer()" @start-timer.window="startTimer">
                            <img class="logo-circle-fixed" width="150" src="/img/circle-logo.svg" alt="">
                            <div class="box-auth-fix"></div>
                            <div class="login-box w-100">
                                <form class="w-100 login-form" wire:submit.prevent="submit">
                                    <div class="item">
                                        @if($step == 'validation')
                                        <div class="label">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21.162" height="16.698"
                                                 viewBox="0 0 21.162 16.698">
                                                <path id="_001-mail_inbox_app" data-name="001-mail inbox app"
                                                      d="M16.2,70.7H4.96A4.965,4.965,0,0,1,0,65.738V58.96A4.965,4.965,0,0,1,4.96,54H16.2a4.965,4.965,0,0,1,4.96,4.96v6.778A4.965,4.965,0,0,1,16.2,70.7ZM4.96,55.653A3.31,3.31,0,0,0,1.653,58.96v6.778A3.31,3.31,0,0,0,4.96,69.045H16.2a3.31,3.31,0,0,0,3.307-3.307V58.96A3.31,3.31,0,0,0,16.2,55.653Zm8.65,8.159L17.7,60.691a.827.827,0,0,0-1-1.314L12.607,62.5a3.315,3.315,0,0,1-4.008,0L4.641,59.423a.827.827,0,0,0-1.015,1.305l3.962,3.08.006,0a4.972,4.972,0,0,0,6.016,0Z"
                                                      transform="translate(0 -54)" fill="#c49c74"></path>
                                            </svg>
                                            <label for=""> شماره همراه</label>
                                        </div>
                                        <input type="text" wire:model.defer="user.username">
                                        @endif
                                    </div>
                                    @isset($user['password'])
                                        <div class="item">
                                            <div class="label d-flex justify-content-between">
                                               <div>
                                                   <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24"
                                                        width="22" height="22">
                                                       <path fill="#C49C74"
                                                             d="M19,8.424V7A7,7,0,0,0,5,7V8.424A5,5,0,0,0,2,13v6a5.006,5.006,0,0,0,5,5H17a5.006,5.006,0,0,0,5-5V13A5,5,0,0,0,19,8.424ZM7,7A5,5,0,0,1,17,7V8H7ZM20,19a3,3,0,0,1-3,3H7a3,3,0,0,1-3-3V13a3,3,0,0,1,3-3H17a3,3,0,0,1,3,3Z"/>
                                                       <path fill="#C49C74"
                                                             d="M12,14a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V15A1,1,0,0,0,12,14Z"/>
                                                   </svg>
                                                   <label for="">{{ $is_temp ? "لطفا رمز یکبار مصرف ارسال شده برای شماره {$user['username']} را وارد کنید" : "لطفا رمزعبور خود را برای شماره {$user['username']} را وارد کنید"}}</label>
                                               </div>
                                                @if($step != 'validation')
                                                    <div class="submit">
                                                        <a class="under-link" type="button" wire:click="backToStep()">
                                                            تغییر شماره
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                            <input type="{{ $is_temp ? 'text' : 'password'}}"
                                                   wire:model.defer="user.password">
                                        </div>
                                    @endisset

                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="erorr-auth-no-match">
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>

                                @isset($user['token'])
                                        <div class="item">
                                            <div class="label flex justify-content-between">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24"
                                                         width="22" height="22">
                                                        <path fill="#C49C74"
                                                              d="M19,8.424V7A7,7,0,0,0,5,7V8.424A5,5,0,0,0,2,13v6a5.006,5.006,0,0,0,5,5H17a5.006,5.006,0,0,0,5-5V13A5,5,0,0,0,19,8.424ZM7,7A5,5,0,0,1,17,7V8H7ZM20,19a3,3,0,0,1-3,3H7a3,3,0,0,1-3-3V13a3,3,0,0,1,3-3H17a3,3,0,0,1,3,3Z"/>
                                                        <path fill="#C49C74"
                                                              d="M12,14a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V15A1,1,0,0,0,12,14Z"/>
                                                    </svg>
                                                    <label for="">کد تایید</label>
                                                </div>
                                                @if($step != 'validation')
                                                    <div class="submit">
                                                        <a class="under-link" type="button" wire:click="backToStep()">
                                                            تغییر شماره
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                            <input type="text" wire:model.defer="user.token">
                                        </div>
                                    @endisset
                                    <div class="submit w-50">
                                        <button class="btn-login">
                                            <i class="icon-circle"></i>
                                            بررسی حساب کاربری
                                        </button>
                                        @if($step != 'validation' || $is_temp)

                                            <div class="resend-code mt-10">
                                                {{--                                                <template x-if="!buttonSelected">--}}
                                                @if(!$this->buttonSelected)
                                                    <a class="under-link" type="button" wire:click="sendMessage()">
                                                        @switch($step)
                                                            @case('login')
                                                            رمز یکبار مصرف
                                                            @break
                                                            @case('register')
                                                            ارسال دوباره کد تایید
                                                            @break
                                                        @endswitch
                                                    </a>
                                                @else
                                                    {{--                                                    <template x-if="buttonSelected">--}}
                                                    <div class="timer">
                                                        <span class="f-13">ارسال مجدد کد بعد از : </span>
                                                        <span class="f-13" x-text="formatter(seconds)[1]"></span>
                                                        <span class="f-13" x-text="formatter(seconds)[0]"></span>
                                                        <span class="f-13">:</span>
                                                        <span class="f-13" x-text="formatter(minutes)[1]"></span>
                                                        <span class="f-13" x-text="formatter(minutes)[0]"></span>

                                                    </div>
                                                    {{--                                                    </template>   --}}
                                                @endif
                                                {{--                                                </template>--}}

                                            </div>

                                        @endif
                                        <p class="text-center mt-3 f-13">
                                            با ورود و یا ثبت نام در آکادمی مریم صفایی شما شرایط و قوانین استفاده از
                                            سرویس های سایت آکادمی مریم صفایی و قوانین حریم خصوصی آن را می‌پذیرید.
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        function timer() {
            return {
                showButton: @entangle('buttonSelected'),
                interval: {},
                seconds: 0,
                minutes: 1,
                init() {
                },
                startTimer() {
                    // this.buttonSelected = true;
                    this.interval = setInterval(() => {
                        if (this.seconds > 0) {
                            this.seconds--;
                        } else if (this.minutes > 0) {
                            this.seconds = 59;
                            this.minutes--;
                        } else {
                            // this.$wire.set('buttonSelected', false)
                            this.showButton = false;
                            clearInterval(this.interval);
                            this.minutes = 2;
                        }
                    }, 1000);
                },
                formatter(n) {
                    return n > 9 ? '' + n : '0' + n;
                }
            }
        }
    </script>
@endpush
