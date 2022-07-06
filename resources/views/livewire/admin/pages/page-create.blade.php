<div>
    <form wire:submit.prevent="submit">
        <div
            class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 my-5">
            <!--! c-right -->
            <div class="c-right box-design bg-white flex-70 px-5 py-15" x-data="{
                page_type: @entangle('pageType')
            }">
                <!--? row form  -->
                <div class="mx-10 m-mx-5 mb-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-10">
                            <div class="text">
                                <h6>مشخصات صفحه</h6>
                            </div>
                            <div class="p-rx ">
                                <div class="rx-border-rectangle"></div>
                                <div class="rx-border-rectangle-after"></div>
                            </div>
                        </div>
                        <!--! data form  -->
                        <div class="my-10 ml-5">
                            <!--? input  -->
                            <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7">
                                <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                    <label for="useData" class="d-flex f-12 text-63">
                                        عنوان
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <x-parnas.inputs.text id="title" wire:model.defer="post.title"
                                                      placeholder="عنوان صفحه خود را بنویسید"
                                                      wire:change="generateSlug"/>
                                @error('post.title')
                                <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                @enderror
                            </x-parnas.form-group>
                            <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7">
                                <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                    <label for="useData" class="d-flex f-12 text-63">
                                        لینک صفحه
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <x-parnas.inputs.text id="slug" wire:model.defer="post.slug"
                                                      placeholder="نامک"
                                                      wire:change="generateSlug"/>
                                @error('post.slug')
                                <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                @enderror
                            </x-parnas.form-group>
                            <div class="pr-10">
                                <div class="d-flex justify-content-start m-left-auto pos-relative pb-10 pr-10">
                                    <label for="useData" class="d-flex f-12 text-63">
                                        برگه
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <x-parnas.form-group class="select align-items-center flex-100">

                                    <x-parnas.inputs.select wire:model.defer="post.options.master">
                                        <x-parnas.inputs.option value="{{ null }}">برگه نمونه</x-parnas.inputs.option>
                                        @foreach(config('pagebuilder.masters') as $master)
                                            <x-parnas.inputs.option value="{{ $master['loc'] }}">{{ $master['title'] }}</x-parnas.inputs.option>
                                        @endforeach
                                    </x-parnas.inputs.select>
                                    @error('post.options.master')
                                    <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>
                            </div>

                           <div class="pr-10 pt-15">
                               <div class="d-flex justify-content-start m-left-auto pos-relative pr-10">
                                   <label for="useData" class="d-flex f-12 text-63">
                                       زبان
                                       <div class="rx-title title-input pb-10">
                                           <div class="p-rx">
                                               <div class="rx-border-rectangle-after label-input"></div>
                                           </div>
                                       </div>
                                   </label>
                               </div>
                               <x-parnas.form-group class="select align-items-end flex-100 my-10" wire:ignore>
                                   <x-parnas.inputs.select2 placeholder="زبان صفحه" class="form-select" id="lang"
                                                            wire:model.defer="post.lang">
                                       <x-parnas.inputs.option value="fa">
                                           فارسی
                                       </x-parnas.inputs.option>
                                       <x-parnas.inputs.option value="en">
                                           انگلیسی
                                       </x-parnas.inputs.option>
                                   </x-parnas.inputs.select2>
                                   @error('post.lang')
                                   <p>{{ $message }}</p>
                                   @enderror
                               </x-parnas.form-group>
                           </div>

                            <x-parnas.form-group class="checkbox-list justify-content-start align-items-center flex-100 my-10 mr-9 m-mr-7">
                                <x-parnas.label class="checkbox f-12">
                                    <x-parnas.inputs.text class="radio-input" type="radio"
                                                          value="null" name="type" x-model="page_type"/>
                                    <span class="radio-checkmark-box">
                                        <span class="radio-checkmark"></span>
                                    </span>
                                    خام
                                </x-parnas.label>
                            </x-parnas.form-group>
                            <x-parnas.form-group class="checkbox-list justify-content-start align-items-center flex-100 my-10 mr-9 m-mr-7">
                                <x-parnas.label class="checkbox f-12">
                                    <x-parnas.inputs.text class="radio-input" type="radio"
                                                          value="teacher_page" name="type" x-model="page_type"/>
                                    <span class="radio-checkmark-box">
                                        <span class="radio-checkmark"></span>
                                    </span>
                                    صفحه مدرس
                                </x-parnas.label>
                            </x-parnas.form-group>
                            <x-parnas.form-group class="checkbox-list justify-content-start align-items-center flex-100 my-10 mr-9 m-mr-7">
                                <x-parnas.label class="checkbox f-12">
                                    <x-parnas.inputs.text class="radio-input" type="radio"
                                                          value="about_page" name="type" x-model="page_type"/>
                                    <span class="radio-checkmark-box">
                                        <span class="radio-checkmark"></span>
                                    </span>
                                    صفحه درباره ما
                                </x-parnas.label>
                            </x-parnas.form-group>

                            <x-parnas.form-group class="checkbox-list justify-content-start align-items-center flex-100 my-10 mr-9 m-mr-7">
                                <x-parnas.label class="checkbox f-12">
                                    <x-parnas.inputs.text class="radio-input" type="radio"
                                                          value="contact_page" name="type" x-model="page_type"/>
                                    <span class="radio-checkmark-box">
                                        <span class="radio-checkmark"></span>
                                    </span>
                                    صفحه تماس با ما
                                </x-parnas.label>
                            </x-parnas.form-group>
                        </div>
                    </div>
                </div>
                    <div class="mx-10 m-mx-5 mb-15" x-show="page_type === 'teacher_page'">
                        <div class="c-data">
                            <!--! title  -->
                            <div class="rx-title pb-10">
                                <div class="text">
                                    <h6>مشخصات مدرس</h6>
                                </div>
                                <div class="p-rx ">
                                    <div class="rx-border-rectangle"></div>
                                    <div class="rx-border-rectangle-after"></div>
                                </div>
                            </div>
                            <!--! data form  -->
                            <div class="my-10 ml-5">
                                <div class="pr-10">
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pb-5 pr-10">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            نام مدرس
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <x-parnas.form-group class="select mb-10" wire:ignore>
                                        <x-parnas.inputs.select2 class="form-select" id="teacher"
                                                                 placeholder="مدرس"
                                                                 wire:model="post.options.teacher_id">
                                            <x-parnas.inputs.option></x-parnas.inputs.option>
                                            @foreach(\App\Models\User::query()->where('role_id' , '!=' , 3)->get() as $user)
                                                <x-parnas.inputs.option :value="$user->id">
                                                    {{ $user->name }} {{ $user->family }}
                                                </x-parnas.inputs.option>
                                            @endforeach
                                        </x-parnas.inputs.select2>
                                        @error('post.options.teacher_id')
                                        <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                        @enderror
                                    </x-parnas.form-group>
                                </div>

                                <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7">
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pb-5 pr-5">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            زیر عنوان
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <x-parnas.inputs.text  wire:model.defer="post.options.subtitle"
                                                           placeholder="زیر عنوان"/>
                                    @error('post.options.subtitle')
                                    <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>

                                <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7">
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pb-5 pr-5">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            آدرس اینستاگرام
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <x-parnas.inputs.text  wire:model.defer="post.options.instagram"
                                                          placeholder="instagram"/>
                                    @error('post.options.instagram')
                                    <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>

                                <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7">
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pb-5 pr-5">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            آدرس واتساپ
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <x-parnas.inputs.text  wire:model.defer="post.options.whatsapp"
                                                          placeholder="whatsapp"/>
                                    @error('post.options.whatsapp')
                                    <p class="text-danger f-12 pt-7 m-left-auto">{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>

                                <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7">
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pb-5 pr-5">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            آدرس ایمیل
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <x-parnas.inputs.text  wire:model.defer="post.options.email"
                                                          placeholder="email"/>
                                    @error('post.options.email')
                                    <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>

                                <x-parnas.form-group class="align-items-end flex-100 mr-9 m-mr-7 mb-2" wire:ignore>
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pb-10 pr-10">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            توضیحات
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <x-parnas.inputs.editor id="description" placeholder="توضیحات کوتاه"
                                                            wire:model="post.options.teacher_description"/>
                                    @error('post.options.teacher_description')
                                    <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>
                            </div>
                        </div>
                    </div>

                    <div class="mx-10 m-mx-5 mb-15" x-show="page_type === 'about_page'">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-10">
                            <div class="text">
                                <h6>مشخصات درباره ما</h6>
                            </div>
                            <div class="p-rx ">
                                <div class="rx-border-rectangle"></div>
                                <div class="rx-border-rectangle-after"></div>
                            </div>
                        </div>
                        <!--! data form  -->
                        <div class="my-10 ml-10">

                            <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7">
                                <div class="d-flex justify-content-start m-left-auto pos-relative pb-5 pr-5">
                                    <label for="useData" class="d-flex f-12 text-63">
                                        زیر عنوان
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <x-parnas.inputs.text  wire:model.defer="post.options.subtitle"
                                                       placeholder="زیر عنوان"/>
                                @error('post.options.subtitle')
                                <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                @enderror
                            </x-parnas.form-group>

                            <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7">
                                <div class="d-flex justify-content-start m-left-auto pos-relative pb-5 pr-5">
                                    <label for="useData" class="d-flex f-12 text-63">
                                        شعار
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <x-parnas.inputs.text  wire:model.defer="post.options.quote"
                                                       placeholder="شعار"/>
                                @error('post.options.quote')
                                <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                @enderror
                            </x-parnas.form-group>

                            <x-parnas.form-group class="align-items-end flex-100 mr-9 m-mr-7 mb-2" wire:ignore>
                                <div class="d-flex justify-content-start m-left-auto pos-relative pb-10 pr-10">
                                    <label for="useData" class="d-flex f-12 text-63">
                                        توضیحات
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <x-parnas.inputs.editor id="about_body" placeholder="توضیحات کوتاه"
                                                        wire:model="post.options.about_body"/>
                                @error('post.options.about_body')
                                <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                @enderror
                            </x-parnas.form-group>
                        </div>
                    </div>
                </div>

                    <div class="mx-10 m-mx-5 mb-15" x-show="page_type === 'contact_page'">
                        <div class="c-data">
                            <!--! title  -->
                            <div class="rx-title pb-10">
                                <div class="text">
                                    <h6>مشخصات تماس با ما</h6>
                                </div>
                                <div class="p-rx ">
                                    <div class="rx-border-rectangle"></div>
                                    <div class="rx-border-rectangle-after"></div>
                                </div>
                            </div>
                            <!--! data form  -->
                            <div class="my-10 ml-5">
                                <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7">
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pb-5 pr-5">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            زیر عنوان
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <x-parnas.inputs.text  wire:model.defer="post.options.subtitle"
                                                           placeholder="زیر عنوان"/>
                                    @error('post.options.subtitle')
                                    <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>

                                <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7">
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pb-5 pr-5">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            شعار
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <x-parnas.inputs.text  wire:model.defer="post.options.quote"
                                                           placeholder="شعار"/>
                                    @error('post.options.quote')
                                    <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>

                                <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7">
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pb-5 pr-5">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            کد فرم
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <x-parnas.inputs.text  wire:model.defer="post.options.form_code"
                                                           placeholder="کد فرم"/>
                                    @error('post.options.form_code')
                                    <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>

                                <x-parnas.form-group class="align-items-end flex-100 mr-9 m-mr-7 mb-15" wire:ignore>
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pb-10 pr-10">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            توضیحات
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <x-parnas.inputs.editor id="contact_info" placeholder=""
                                                            wire:model="post.options.contact_info"/>
                                    @error('post.options.contact_info')
                                    <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>

                                <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7 mb-15">
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pb-5 pr-5">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            مپ
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <x-parnas.inputs.textarea  wire:model.defer="post.options.map_frame"
                                                           placeholder="مپ"/>
                                    @error('post.options.map_frame')
                                    <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>
                            </div>
                        </div>
                    </div>
{{--                <div class="mx-5 mr-20 m-mr-5 mb-15">--}}
{{--                    <div class="c-data">--}}
{{--                        <!--! title  -->--}}
{{--                        <div class="rx-title pb-10">--}}
{{--                            <div class="text">--}}
{{--                                <h6>تصاویر | فایل ها</h6>--}}
{{--                            </div>--}}
{{--                            <div class="p-rx ">--}}
{{--                                <div class="rx-border-rectangle"></div>--}}
{{--                                <div class="rx-border-rectangle-after"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--! data form  -->--}}
{{--                        <div class="my-10">--}}
{{--                            <x-parnas.inputs.file :file="$file['url']" model="file.url">--}}
{{--                                @error('file.url')--}}
{{--                                <p>{{ $message }}</p>--}}
{{--                                @enderror--}}
{{--                            </x-parnas.inputs.file>--}}
{{--                            <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7">--}}
{{--                                <x-parnas.label class="mb-1" for="alt">متن جایگزین</x-parnas.label>--}}
{{--                                <x-parnas.inputs.text class="form-control form-control-sm" id="alt"--}}
{{--                                                      wire:model.defer="file.alt"/>--}}
{{--                                @error('file.alt')--}}
{{--                                <p class="text-danger f-12 pt-7 m-left-auto">{{ $message }}</p>--}}
{{--                                @enderror--}}
{{--                            </x-parnas.form-group>--}}
{{--                            <x-parnas.form-group class="select align-items-center flex-100 mr-9 m-mr-7">--}}

{{--                                <x-parnas.inputs.select wire:model.defer="file.type">--}}
{{--                                    <x-parnas.inputs.option value="{{ null }}">انتخاب نوع</x-parnas.inputs.option>--}}
{{--                                    <x-parnas.inputs.option value="1">عکس شاخص</x-parnas.inputs.option>--}}
{{--                                    <x-parnas.inputs.option value="2">گالری</x-parnas.inputs.option>--}}
{{--                                    <x-parnas.inputs.option value="3">فایل</x-parnas.inputs.option>--}}
{{--                                </x-parnas.inputs.select>--}}
{{--                                @error('file.type')--}}
{{--                                <p class="text-danger f-12 pt-7 m-left-auto">{{ $message }}</p>--}}
{{--                                @enderror--}}
{{--                            </x-parnas.form-group>--}}
{{--                            <x-parnas.form-group class="c-btn justify-content-end p-8">--}}
{{--                                <x-parnas.buttons.button class="btn bg-primary text-white radius-5"--}}
{{--                                                         type="button" wire:click="upload"--}}
{{--                                                         wire:loading.attr="disabled" wire:target="upload"--}}
{{--                                >--}}
{{--                                    ثبت--}}
{{--                                </x-parnas.buttons.button>--}}
{{--                                <x-parnas.buttons.button class="btn bg-warning text-white radius-5"--}}
{{--                                                         type="button" wire:click="resetForm"--}}
{{--                                                         wire:loading.attr="disabled" wire:target="resetForm"--}}
{{--                                >--}}
{{--                                    لغو--}}
{{--                                </x-parnas.buttons.button>--}}
{{--                            </x-parnas.form-group>--}}

{{--                            <ul class="list-unstyled list-inline">--}}
{{--                                <li>--}}
{{--                                    عکس های شاخص--}}
{{--                                </li>--}}
{{--                                @foreach($files->where('type' , 1) as $key => $_file)--}}
{{--                                    <li class="list-inline-item">--}}
{{--                                        <img src="{{ $_file['url'] }}" width="80" alt="{{ $_file['alt'] }}">--}}
{{--                                        <x-parnas.buttons.button type="button"--}}
{{--                                                                 class="btn btn-sm btn-danger"--}}
{{--                                                                 wire:click="deleteFile({{ $key }})"--}}
{{--                                                                 wire:loading.attr="disabled" wire:target="deleteFile">--}}
{{--                                            <i class="fas fa-times"></i>--}}
{{--                                        </x-parnas.buttons.button>--}}
{{--                                        <x-parnas.buttons.button type="button"--}}
{{--                                                                 class="btn btn-sm btn-primary"--}}
{{--                                                                 wire:click="editFile({{ $key }})"--}}
{{--                                                                 wire:loading.attr="disabled" wire:target="deleteFile , editFile">--}}
{{--                                            <i class="fas fa-edit"></i>--}}
{{--                                        </x-parnas.buttons.button>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}

{{--                            <ul class="list-unstyled list-inline">--}}
{{--                                <li>--}}
{{--                                    گالری--}}
{{--                                </li>--}}
{{--                                @foreach($files->where('type' , 2) as $key => $_file)--}}
{{--                                    <li class="list-inline-item">--}}
{{--                                        <img src="{{ $_file['url'] }}" width="80" alt="{{ $_file['alt'] }}">--}}
{{--                                        <x-parnas.buttons.button type="button"--}}
{{--                                                                 class="btn btn-sm btn-danger"--}}
{{--                                                                 wire:click="deleteFile({{ $key }})"--}}
{{--                                                                 wire:loading.attr="disabled" wire:target="deleteFile">--}}
{{--                                            <i class="fas fa-times"></i>--}}
{{--                                        </x-parnas.buttons.button>--}}
{{--                                        <x-parnas.buttons.button type="button"--}}
{{--                                                                 class="btn btn-sm btn-primary"--}}
{{--                                                                 wire:click="editFile({{ $key }})"--}}
{{--                                                                 wire:loading.attr="disabled" wire:target="deleteFile , editFile">--}}
{{--                                            <i class="fas fa-edit"></i>--}}
{{--                                        </x-parnas.buttons.button>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}

{{--                            <ul class="list-unstyled list-inline">--}}
{{--                                <li>--}}
{{--                                    فایل ها--}}
{{--                                </li>--}}
{{--                                @foreach($files->where('type' ,3) as $key => $_file)--}}
{{--                                    <li class="list-inline-item">--}}
{{--                                        @switch($mime = \Illuminate\Support\Facades\File::mimeType(public_path($_file['url'])))--}}
{{--                                            @case(str_starts_with($mime , 'image/'))--}}
{{--                                            <img src="{{ $_file['url'] }}" width="80" alt="{{ $_file['alt'] }}">--}}
{{--                                            @break--}}
{{--                                            @case(str_starts_with($mime , 'video/'))--}}
{{--                                            <video width="100%" height="150">--}}
{{--                                                <source src="{{ $_file['url'] }}" type="{{ $mime }}">--}}
{{--                                            </video>--}}
{{--                                            @break--}}
{{--                                            @default--}}
{{--                                            <a href="{{ $_file['url'] }}">فایل ضمینه</a>--}}
{{--                                        @endswitch--}}
{{--                                        <x-parnas.buttons.button type="button"--}}
{{--                                                                 class="btn btn-sm btn-danger"--}}
{{--                                                                 wire:click="deleteFile({{ $key }})"--}}
{{--                                                                 wire:loading.attr="disabled" wire:target="deleteFile">--}}
{{--                                            <i class="fas fa-times"></i>--}}
{{--                                        </x-parnas.buttons.button>--}}
{{--                                        <x-parnas.buttons.button type="button"--}}
{{--                                                                 class="btn btn-sm btn-primary"--}}
{{--                                                                 wire:click="editFile({{ $key }})"--}}
{{--                                                                 wire:loading.attr="disabled" wire:target="deleteFile , editFile">--}}
{{--                                            <i class="fas fa-edit"></i>--}}
{{--                                        </x-parnas.buttons.button>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <!--! c-left -->
            <div class="c-left sticky-data flex-28">
                <div>
                    <div class="p-7 bg-white box-design">
                        <!--? select -->
                        <div class="select-data">
                            <!-- parent -->
                            <div class="flex-100 selective-custom justify-content-start pt-5">
                                <!-- child -->
                                <div class="d-flex justify-content-start m-left-auto pos-relative pb-5 pr-10">
                                    <label for="useData" class="d-flex f-12 text-63">
                                        وضعیت
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="select">
                                    <x-parnas.inputs.select wire:model.defer="post.status_id">
                                        <option value="">-</option>
                                        @foreach($statuses as $status)
                                            <x-parnas.inputs.option :value="$status->id">
                                                {{ $status->label }}
                                            </x-parnas.inputs.option>
                                        @endforeach
                                    </x-parnas.inputs.select>
                                </div>
                            </div>
                        </div>
                        <!--? insert data  -->
                        <div class="c-btn justify-content-end pt-8 pr-8">
                            <button class="btn bg-success text-white radius-5">ثبت صفحه</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <livewire:admin.post-files.edit-popup />
</div>

@push('title' , 'صفحه ها')
