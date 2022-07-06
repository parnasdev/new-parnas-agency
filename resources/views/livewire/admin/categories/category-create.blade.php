<div>
    <form wire:submit.prevent="submit">
        <div
            class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 my-5">
            <!--! c-right -->
            <div class="c-right box-design bg-white flex-70 px-5 py-10">
                <!--? row form  -->
                <div class="mx-10 m-mx-5 mb-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-10">
                            <div class="text">
                                <h6>مشخصات</h6>
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
                                        دسته بندی
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <!--? input  -->
                                <x-parnas.form-group class="select align-items-end flex-100 mb-15" wire:ignore>
                                    <x-parnas.inputs.select2 placeholder="نوع دسته بندی" class="form-select" id="parent_id"
                                                             wire:model.defer="category.parent_id">
                                        <x-parnas.inputs.option :value="null">
                                            دسته بندی اصلی
                                        </x-parnas.inputs.option>
                                        @foreach($categories as $category)
                                            <x-parnas.inputs.option :value="$category->id">
                                                {{ $category->name }}
                                            </x-parnas.inputs.option>
                                        @endforeach
                                    </x-parnas.inputs.select2>
                                    @error('category.parent_id')
                                    <p>{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>
                            </div>
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
                                <x-parnas.inputs.text id="name" placeholder="نام دسته بندی"
                                                      wire:model.defer="category.name" wire:change="generateSlug"/>
                                @error('category.name')
                                <p>{{ $message }}</p>
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
                                <x-parnas.inputs.text id="slug" placeholder="نامک"
                                                      wire:change="generateSlug" wire:model.defer="category.slug"/>
                                @error('category.slug')
                                <p>{{ $message }}</p>
                                @enderror
                            </x-parnas.form-group>
                            <x-parnas.form-group class="c-input align-items-end flex-100 mr-9 m-mr-7 mb-2">
                                <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                    <label for="useData" class="d-flex f-12 text-63">
                                        توضیحات کوتاه
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <x-parnas.inputs.textarea rows="5" placeholder="توضیحات کوتاه" id="description"
                                                          wire:model.defer="category.description"/>
                                @error('category.description')
                                <p>{{ $message }}</p>
                                @enderror
                            </x-parnas.form-group>
                            <div class="pr-10">
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
                                <x-parnas.form-group class="select align-items-end flex-100 mt-5" wire:ignore>
                                    <x-parnas.inputs.select2 placeholder="زبان دسته بندی" class="form-select" id="lang"
                                                             wire:model.defer="category.lang">
                                        <x-parnas.inputs.option value="fa">
                                            فارسی
                                        </x-parnas.inputs.option>
                                        <x-parnas.inputs.option value="en">
                                            انگلیسی
                                        </x-parnas.inputs.option>
                                    </x-parnas.inputs.select2>
                                    @error('category.lang')
                                    <p>{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--! c-left -->
            <div class="c-left sticky-data flex-28">
                <div>
                      <!--! data form  -->
                      <div class="p-7 bg-white box-design radius-5" x-data="{
                        file: @entangle('file'),
                        filemangerCallback(e) {
                            let {urls , file_type} = e.detail
                            urls.forEach(url => this.file = {
                                url: url,
                                type: file_type,
                                alt: ''
                            });
                        }
                    }"
                         @prs-file-manager.window="filemangerCallback">
                        <ul class="list-unstyled list-inline">
                            <li class="f-12 f-bold">
                                <div class="d-flex justify-content-start m-left-auto pos-relative pt-5 pr-10 pb-5">
                                    <label for="useData" class="d-flex f-12 text-63">
                                        تصویر
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="d-flex flex-wrap align-items-center">
                                    <div
                                        class="flex-direction-column align-items-start flex-wrap justify-content-start ml-6">
                                        <button type="button"
                                                wire:click="openFileManager(1 , 1 , 'image')"
                                                class="btn border-dotted-2 border-secondary text-white w-100 d-flex align-items-center justify-content-around p-10 radius-5 mb-4">
                                                <svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.9375 8.02344L15.9375 23.3601" stroke="#333" stroke-width="2" stroke-linecap="round"/>
                                                    <path d="M23.5898 15.6914L8.29139 15.6914" stroke="#333" stroke-width="2" stroke-linecap="round"/>
                                                </svg>
                                        </button>
                                    </div>
                                    @if($file['url'] != '')
                                        <div
                                            class="flex-48 flex-direction-column align-items-start flex-wrap justify-content-start ml-3">
                                            <div
                                                class="w-100 d-flex align-items-center justify-content-around bg-light text-white py-5 radius-5 mb-4">
                                                <img src="{{ $file['url'] }}" width="50">
                                                <div class="flex-50 d-flex mr-3">
                                                    <button type="button"
                                                            wire:click="deleteFile()"
                                                            wire:loading.attr="disabled"
                                                            wire:target="deleteFile"
                                                            class="flex-48 d-flex align-items-center justify-content-center bg-white radius-5 py-3 ml-3">
                                                        <svg width="20" height="20" viewBox="0 0 31 31"
                                                             fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.7852 19.2988L12.7852 15.4647"
                                                                  stroke="#ff383f" stroke-width="2"
                                                                  stroke-linecap="round" />
                                                            <path d="M17.8828 19.2988L17.8828 15.4647"
                                                                  stroke="#ff383f" stroke-width="2"
                                                                  stroke-linecap="round" />
                                                            <path
                                                                d="M3.85938 9.07617H26.8071V9.07617C25.0914 9.07617 24.2336 9.07617 23.6689 9.56799C23.5996 9.62832 23.5346 9.69336 23.4743 9.76264C22.9824 10.3273 22.9824 11.1851 22.9824 12.9008V21.6909C22.9824 23.5765 22.9824 24.5193 22.3967 25.1051C21.8109 25.6909 20.8681 25.6909 18.9824 25.6909H11.684C9.79837 25.6909 8.85556 25.6909 8.26977 25.1051C7.68399 24.5193 7.68399 23.5765 7.68399 21.6909V12.9008C7.68399 11.1851 7.68399 10.3273 7.19217 9.76264C7.13184 9.69336 7.0668 9.62832 6.99752 9.56799C6.43283 9.07617 5.57501 9.07617 3.85938 9.07617V9.07617Z"
                                                                stroke="#ff383f" stroke-width="2"
                                                                stroke-linecap="round" />
                                                            <path
                                                                d="M12.8702 4.43653C13.0155 4.30065 13.3356 4.18058 13.7809 4.09494C14.2262 4.00931 14.7718 3.96289 15.3331 3.96289C15.8944 3.96289 16.44 4.00931 16.8853 4.09494C17.3306 4.18058 17.6507 4.30065 17.7959 4.43653"
                                                                stroke="#ff383f" stroke-width="2"
                                                                stroke-linecap="round" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-10 p-7 pt-10 bg-white box-design radius-5">
                        <x-parnas.form-group class="c-input align-items-end flex-100 m-mr-7 mt-10 mb-2">
                            <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                <label for="useData" class="d-flex f-12 text-63">
                                    متن جایگزین
                                    <div class="rx-title title-input pb-10">
                                        <div class="p-rx">
                                            <div class="rx-border-rectangle-after label-input"></div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <x-parnas.inputs.text id="alt" placeholder="متن جایگزین برای تصویر"
                                                  wire:model.defer="file.alt"/>
                            @error('file.alt')
                            <p>{{ $message }}</p>
                            @enderror
                        </x-parnas.form-group>
                        <!--? insert data  -->
                        <div class="c-btn justify-content-end pt-8 pr-8">
                            <button class="btn bg-success text-white radius-5">ثبت دسته بندی</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <livewire:admin.uploader-modal></livewire:admin.uploader-modal>
</div>
@push('title' , 'دسته بندی بلاگ')
