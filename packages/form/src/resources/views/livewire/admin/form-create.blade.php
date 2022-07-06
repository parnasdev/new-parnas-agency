<div>
    <div class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 my-5">
        <!--! c-right -->
        <div class="dark-theme box-design bg-white flex-99 px-5 py-10">
            <div class="">
                <!--? row form  -->
                <div class="mx-5 mr-20 m-mr-5 m-ml-0 mb-15">
                    <div class="c-data" x-data="{
                        inputs: @entangle('inputs').defer,
                        init() {

                        },
                        addInput(data) {
                            this.inputs.push({
                                 'id': null,
                                 'label': null,
                                 'icon': null,
                                 'rules': [],
                                 'controlType': data,
                                 'placeholder': '',
                                 'type': 'text',
                                 'options': [],
                                 'multiple': '0',
                                 'order': this.inputs.length + 1
                            });
                        }
                    }">
                        <!--! title  -->
                        <div class="rx-title pb-3">
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center pb-10">
                                    <div class="text">
                                        <h6>ایجاد فرم</h6>
                                    </div>
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle"></div>
                                        <div class="rx-border-rectangle-after"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--! data form  -->
                        <div class="my-10">
                            <!-- parent -->
                            <form wire:submit.prevent="submit" class="d-flex flex-wrap">
                                <div class="c-right box-design bg-white flex-30 px-5 py-10 ml-10">
                                    <div class="c-btn mb-3">
                                        <button type="button" class="btn bg-primary text-white radius-5" @click="addInput('textbox')">
                                            اضافه کردن کادر متن تک خطی
                                        </button>
                                    </div>
                                    <div class="c-btn mb-3">
                                        <button type="button" class="btn bg-primary text-white radius-5" @click="addInput('textarea')">
                                            اضافه کردن کادر متن چند خطی
                                        </button>
                                    </div>
{{--                                    <div class="c-btn mb-3">--}}
{{--                                        <button class="btn bg-primary text-white radius-5" @click="addInput('dropdown')">--}}
{{--                                            اضافه کردن کشویی--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="c-left box-design bg-white flex-65 px-5 py-10">
                                    <template x-for="(input , index) in inputs">
                                        <div class="box-design bg-white d-flex flex-wrap px-5 py-10 mx-5 mr-20 pr-20 m-pr-10 m-mr-5 m-ml-0 mb-15">
                                            <div class="d-flex flex-48 m-flex-100 ml-10">
                                                <div class="c-input flex-100">
                                                    <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                                        <label class="d-flex f-12 text-63">
                                                            عنوان
                                                            <div class="rx-title title-input pb-10">
                                                                <div class="p-rx">
                                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <input type="text" placeholder="عنوان را وارد کنید " x-model="input.label">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-48 m-flex-100 ml-10">
                                                <div class="c-input flex-100">
                                                    <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                                        <label class="d-flex f-12 text-63">
                                                            آیکن
                                                            <div class="rx-title title-input pb-10">
                                                                <div class="p-rx">
                                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <input type="text" placeholder="آیکون را وارد کنید " x-model="input.icon">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-48 m-flex-100 ml-10">
                                                <div class="c-input flex-100">
                                                    <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                                        <label class="d-flex f-12 text-63">
                                                            متن
                                                            <div class="rx-title title-input pb-10">
                                                                <div class="p-rx">
                                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <input type="text" placeholder="متن داخل کادر را وارد کنید " x-model="input.placeholder">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-48 m-flex-100 ml-10">
                                                <div class="c-input flex-100">
                                                    <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                                        <label class="d-flex f-12 text-63">
                                                            محتوای انگلیسی
                                                            <div class="rx-title title-input pb-10">
                                                                <div class="p-rx">
                                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <input type="text" placeholder="نام انگلیسی را وارد کنید " x-model="input.id">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-100">
                                                <template x-if="input.controlType === 'textbox'">
                                                    <div class="d-flex flex-50">
                                                        <div class="select flex-96">
                                                            <x-parnas.inputs.select2 placeholder="نوع جعبه متن"
                                                                                     x-model="input.type">
                                                                <option value="text">متن</option>
                                                                <option value="number">عدد</option>
                                                                <option value="color">رنگ</option>
                                                                <option value="tel">تلفن</option>
                                                                <option value="email">ایمیل</option>
                                                            </x-parnas.inputs.select2>
                                                        </div>
                                                    </div>
                                                </template>
                                                <div class="c-btn d-flex flex-48">
                                                    <button class="btn bg-white radius-5 text-danger box-shadow-pattern" type="button" @click="inputs.splice(index , 1)">
                                                        <svg width="20" height="20" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.7852 19.2988L12.7852 15.4647" stroke="#ff383f" stroke-width="2" stroke-linecap="round"/>
                                                            <path d="M17.8828 19.2988L17.8828 15.4647" stroke="#ff383f" stroke-width="2" stroke-linecap="round"/>
                                                            <path d="M3.85938 9.07617H26.8071V9.07617C25.0914 9.07617 24.2336 9.07617 23.6689 9.56799C23.5996 9.62832 23.5346 9.69336 23.4743 9.76264C22.9824 10.3273 22.9824 11.1851 22.9824 12.9008V21.6909C22.9824 23.5765 22.9824 24.5193 22.3967 25.1051C21.8109 25.6909 20.8681 25.6909 18.9824 25.6909H11.684C9.79837 25.6909 8.85556 25.6909 8.26977 25.1051C7.68399 24.5193 7.68399 23.5765 7.68399 21.6909V12.9008C7.68399 11.1851 7.68399 10.3273 7.19217 9.76264C7.13184 9.69336 7.0668 9.62832 6.99752 9.56799C6.43283 9.07617 5.57501 9.07617 3.85938 9.07617V9.07617Z" stroke="#ff383f" stroke-width="2" stroke-linecap="round"/>
                                                            <path d="M12.8702 4.43653C13.0155 4.30065 13.3356 4.18058 13.7809 4.09494C14.2262 4.00931 14.7718 3.96289 15.3331 3.96289C15.8944 3.96289 16.44 4.00931 16.8853 4.09494C17.3306 4.18058 17.6507 4.30065 17.7959 4.43653" stroke="#ff383f" stroke-width="2" stroke-linecap="round"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <template x-if="input.controlType === 'dropdown'">
                                                <div class="d-flex flex-wrap flex-99">
                                                    <div class="d-flex flex-100 ml-20">
                                                        <div class="checkbox-list justify-content-start flex-50">
                                                            <label class="checkbox f-12">
                                                                <input class="checkbox-input" type="checkbox" value="1" x-model="input.multiple">
                                                                <span class="checkbox-checkmark-box">
                                                                <span class="checkbox-checkmark"></span>
                                                            </span>
                                                                چند انتخابی
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-60 ml-20">
                                                        <div class="c-input">
                                                            <textarea rows="3" placeholder="مقادیر را و با '|' از هم جدا کنید. "  x-model="input.options"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </template>

                                </div>
                                <div class="c-btn flex-100 justify-content-end mt-20">
                                    <button class="btn bg-success radius-5 text-white">
                                        ثبت فرم
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
