<div>
    <main>
        <article class="article-controller">
            <section class="s-container">
                <div class="container-fluid">
                    <!-- parent data -->
                    <div class="p-container d-flex p-0">
                        <div class="opacity-bg"></div>
                        <div class="bg-pattern d-flex align-items-center justify-content-center">
                            <div class="p-login flex-100 d-flex flex-direction-column align-items-center justify-content-center">
                                <!-- logo -->
                                <div class="logo-comy mb-25">
                                    <div class="d-flex justify-content-center image logo">
                                        <img src="/img/png/Parnas-Company.png" width="40px" height="40px" alt="parnas-logo"/>
                                    </div>
                                    <div class="text">
                                        <span class="text-dark f-14 f-bold">پنل مدیریت ساتراپ (آژانس خلاقیت پارناس)</span>
                                    </div>
                                </div>
                                <div class="content-login m-flex-90 bg-white radius-8">
                                    <div class="data-topBorder"></div>
                                    <!--! title  -->
                                    <div class="rx-title pr-10 py-10">
                                        <div class="title d-flex align-items-center pb-10">
                                            <div class="text">
                                                <h6>ورود به پنل کاربری</h6>
                                            </div>
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle"></div>
                                                <div class="rx-border-rectangle-after"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--! detail -->
                                    <form wire:submit.prevent="submit" class="main-login px-10">
                                        <!--? user -->
                                        <div class="c-input align-items-end flex-95 mr-9 m-mr-7">
                                            <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                                <label for="useData" class="d-flex f-12 text-63">
                                                    نام کاربری یا ایمیل
                                                    <div class="rx-title title-input pb-10">
                                                        <div class="p-rx">
                                                            <div class="rx-border-rectangle-after label-input"></div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <!-- text -->
                                            <input type="text" class="data-invalid border-light" name="txtuser" id="txtuser" wire:model.defer="username" placeholder="نام کاربری را به صورت انگلیسی" />
                                            @error('username')
                                                <span class="text-danger f-12 pt-7 m-left-auto">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!--? password -->
                                        <div class="c-input align-items-end flex-95 mr-9 m-mr-7">
                                            <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                                <label for="useData" class="d-flex f-12 text-63">
                                                    رمز عبور
                                                    <div class="rx-title title-input pb-10">
                                                        <div class="p-rx">
                                                            <div class="rx-border-rectangle-after label-input"></div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <!-- text -->
                                            <input type="password" class="data-invalid border-light" name="txtpassword" id="txtpassword" wire:model.defer="password" placeholder="رمز عبور خود را بنویسید" />
                                            @error('password')
                                            <span class="text-danger f-12 pt-7 m-left-auto">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!--? remember -->
                                        <div class="checkbox-list flex-40 justify-content-start">
                                            <label class="checkbox mr-10 f-12">
                                                <input class="checkbox-input" x-ref="checkbox" type="checkbox" wire:model="remember" value="11">
                                                <span class="checkbox-checkmark-box">
                                                    <span class="checkbox-checkmark"></span>
                                                </span>
                                                <span class="f-13">مرا به خاطر بسپار</span>
                                            </label>
                                        </div>
                                        <!--? btn -->
                                        <div class="d-flex justify-content-end">
                                            <div class="c-btn p-8 ml-2">
                                                <button class="ancher btn-effect bg-success text-white radius-5">
                                                    ورود به پنل
                                                    <x-parnas.spinners :forBtn="true" wire:loading wire:target="submit" />
                                                    <div class="circle-solid up-line-right bg-white"></div>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-center mt-20">
                                    <a href="/" target="_target" class="text-dark border-bottom-solid-2 pb-4 px-10">مشاهده سایت آکادمی</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>
</div>

@push('title' , 'ورود به پنل')
