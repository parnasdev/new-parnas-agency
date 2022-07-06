<div>
    <div class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 my-5">
        <x-parnas.spinners :full="true" wire:loading
                           wire:target="status , gotoPage , previousPage , nextPage , changeStatus , selectedAction , delete , forceDelete , selected , perPage"/>
        <!--! c-right  -->
        <div class="dark-theme box-design bg-white flex-99 px-5 py-10" x-data="{
            selectAll(el) {
                let checkboxes = document.querySelectorAll('[x-ref=checkbox]');
                let ids = [];
                if (el.checked) {
                    checkboxes.forEach(item => ids.push(item.value))
                } else {
                    ids = [];
                }

                $wire.set('selected' , ids)
            }
        }">
            <div class="">
                <!--? row form  -->
                <div class="mx-10 m-mx-5 mb-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-3">
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center pb-10">
                                    <div class="text">
                                        <h6>لیست کاربران</h6>
                                    </div>
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle"></div>
                                        <div class="rx-border-rectangle-after"></div>
                                    </div>
                                </div>
                                <!--? group[button]  -->
                                <div class="c-group-btn d-flex flex-wrap justify-content-start">
                                    <!--? show Delete Data  -->
                                    <div class="c-btn justify-content-end ml-7 mb-5">
                                        <button class="btn btn-effect {{$trash ? 'bg-info': 'bg-danger'}} text-white radius-5"
                                                wire:click="showTrash()">
                                            @if($trash)
                                                <div class="circle-solid top-right bg-white"></div>مشاهده کاربران
                                            @else
                                                <svg width="20" height="20" viewBox="0 0 31 31" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.7852 19.2988L12.7852 15.4647" stroke="#fff"
                                                          stroke-width="2" stroke-linecap="round"></path>
                                                    <path d="M17.8828 19.2988L17.8828 15.4647" stroke="#fff"
                                                          stroke-width="2" stroke-linecap="round"></path>
                                                    <path
                                                        d="M3.85938 9.07617H26.8071V9.07617C25.0914 9.07617 24.2336 9.07617 23.6689 9.56799C23.5996 9.62832 23.5346 9.69336 23.4743 9.76264C22.9824 10.3273 22.9824 11.1851 22.9824 12.9008V21.6909C22.9824 23.5765 22.9824 24.5193 22.3967 25.1051C21.8109 25.6909 20.8681 25.6909 18.9824 25.6909H11.684C9.79837 25.6909 8.85556 25.6909 8.26977 25.1051C7.68399 24.5193 7.68399 23.5765 7.68399 21.6909V12.9008C7.68399 11.1851 7.68399 10.3273 7.19217 9.76264C7.13184 9.69336 7.0668 9.62832 6.99752 9.56799C6.43283 9.07617 5.57501 9.07617 3.85938 9.07617V9.07617Z"
                                                        stroke="#fff" stroke-width="2"
                                                        stroke-linecap="round"></path>
                                                    <path
                                                        d="M12.8702 4.43653C13.0155 4.30065 13.3356 4.18058 13.7809 4.09494C14.2262 4.00931 14.7718 3.96289 15.3331 3.96289C15.8944 3.96289 16.44 4.00931 16.8853 4.09494C17.3306 4.18058 17.6507 4.30065 17.7959 4.43653"
                                                        stroke="#fff" stroke-width="2"
                                                        stroke-linecap="round"></path>
                                                </svg><div class="circle-solid top-right bg-white"></div>مشاهده کاربران حذف شده
                                            @endif
                                        </button>
                                    </div>
                                    <div class="c-btn ml-7 pb-5">
                                        <a href="{{ route('admin.roles.index') }}"
                                           class="ancher btn-effect bg-info text-white radius-5">
                                            <div class="circle-solid top-right bg-white"></div>
                                             لیست مقام ها</a>
                                    </div>
                                    <div class="c-btn pb-5">
                                        <a href="{{ route('admin.users.create') }}"
                                           class="ancher btn-effect bg-success text-white radius-5">
                                            <div class="circle-solid top-right bg-white"></div>
                                            <svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.9375 8.02344L15.9375 23.3601" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                                                <path d="M23.5898 15.6914L8.29139 15.6914" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                            ایجاد کاربر</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--! data form  -->
                        <div class="my-10">
                            <!-- parent -->
                            <div class="p-table p-0">
                                <!--! filters  -->
                                <div class="controller-filters">
                                    <!--! search && button  -->
                                    <div class="filters d-flex flex-wrap justify-content-between">
                                        <div class="c-filters d-flex justify-content-start flex-100">
                                            <!--? input  -->
                                            <div class="c-input flex-45 ml-30">
                                                <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                                    <label for="useData" class="d-flex f-12 text-63">
                                                        جستجو
                                                        <div class="rx-title title-input pb-10">
                                                            <div class="p-rx">
                                                                <div class="rx-border-rectangle-after label-input"></div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="search">
                                                    <svg width="25" height="25" viewBox="0 0 31 32" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <ellipse cx="14.0569" cy="14.6788" rx="8.9241" ry="8.94638"
                                                                 stroke="#CCD2E3" stroke-width="2"/>
                                                        <path
                                                            d="M14.059 10.8457C13.5567 10.8457 13.0594 10.9449 12.5954 11.1376C12.1313 11.3302 11.7097 11.6127 11.3546 11.9687C10.9994 12.3247 10.7177 12.7474 10.5255 13.2126C10.3333 13.6778 10.2344 14.1764 10.2344 14.6799"
                                                            stroke="#CCD2E3" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M25.5316 26.1818L21.707 22.3477" stroke="#CCD2E3"
                                                              stroke-width="2" stroke-linecap="round"/>
                                                    </svg>
                                                </div>
                                                <input type="text" wire:model="q" placeholder="کلمه یا عبارت خود را جستجو کنید"/>
                                            </div>
                                            <!--? select -->
                                            <div class="select-data flex-20 m-flex-50">
                                                <!-- parent -->
                                                <div class="flex-100 selective-custom justify-content-start mx-8">
                                                    <!-- child -->
                                                    <div class="d-flex justify-content-start m-left-auto pos-relative pr-10">
                                                        <label for="useData" class="d-flex f-12 text-63">
                                                            بر اساس مقام
                                                            <div class="rx-title title-input pb-10">
                                                                <div class="p-rx">
                                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div x-data="{ data: '' }" class="select mt-5">
                                                        <x-parnas.inputs.select2 wire:model="role">
                                                            <x-parnas.inputs.option value="0">
                                                                همه
                                                            </x-parnas.inputs.option>
                                                            @foreach($roles as $role)
                                                                <x-parnas.inputs.option :value="$role->id">
                                                                    {{ $role->label }}
                                                                </x-parnas.inputs.option>
                                                            @endforeach
                                                        </x-parnas.inputs.select2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--! data -->
                                    <div class="info-data">
                                        <!--! checkbox  -->
                                        <div class="checkbox-list justify-content-start flex-50">
                                            <label class="checkbox f-12">
                                                <input class="checkbox-input" type="checkbox" x-ref="allCheckbox" @change="selectAll($el)">
                                                <span class="checkbox-checkmark-box">
                                                                        <span class="checkbox-checkmark"></span>
                                                                    </span>
                                                انتخاب همه
                                            </label>
                                            <div class="select flex-18 c-s h-2rem">
                                                <x-parnas.inputs.select class="radius-7" wire:model="action" @change="$refs.allCheckbox.checked = false">
                                                    <option value="0">-</option>
                                                    <option value="1">حذف</option>
                                                    @if($trash)
                                                        <option value="2">بازگردانی</option>
                                                    @endif
                                                </x-parnas.inputs.select>
                                            </div>
                                        </div>
                                        <!--! Result  -->
                                        <div class="result">
                                            <span class="f-12 text-info">تعداد اطلاعات :</span>
                                            <span class="f-12 px-6">{{ count($users) > 0 ? $users->total() : '0' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!--! table  -->
                                <div class="controller-table scroller">
                                    <!--? thead -->
                                    <div class="d-thead">
                                        <div class="head flex-5 m-flex-15"></div>
                                        <div class="head flex-7 m-flex-15">
                                            <span class="f-12 f-bold">شناسه</span>
                                        </div>
                                        <div class="head flex-12 m-flex-40">
                                            <span class="f-12 f-bold">نام</span>
                                        </div>
                                        <div class="head flex-12 m-flex-40">
                                            <span class="f-12 f-bold">نام خانوادگی</span>
                                        </div>
                                        <div class="head flex-10 m-flex-40">
                                            <span class="f-12 f-bold">تصویر شاخص</span>
                                        </div>
                                        <div class="head flex-13 m-flex-40">
                                            <span class="f-12 f-bold">شماره همراه</span>
                                        </div>
                                        <div class="head flex-30 m-flex-60">
                                            <span class="f-12 f-bold">ایمیل</span>
                                        </div>
                                        <div class="head flex-12 m-flex-40">
                                            <span class="f-12 f-bold">نام کاربری</span>
                                        </div>
                                        <div class="head flex-12 m-flex-40">
                                            <span class="f-12 f-bold">مقام</span>
                                        </div>
                                        <div class="head flex-12 m-flex-38">
                                            <span class="f-12 f-bold">تاریخ آخرین ورود</span>
                                        </div>
                                        <div class="head sticky-table flex-20 m-flex-43">
                                            <span class="f-12 f-bold">عملیات</span>
                                        </div>
                                    </div>
                                    <!--? tdetail  -->
                                    <div class="data" wire:init="loadUsers">
                                        <!--? child(1)  -->
                                        @forelse($users as $user)
                                            <div class="d-detail">
                                                <div class="detail flex-5 m-flex-15">
                                                    <x-parnas.form-group class="checkbox-list flex-50">
                                                        <x-parnas.label class="checkbox mr-10 f-12">
                                                            <x-parnas.inputs.text class="checkbox-input" type="checkbox"
                                                            x-ref="checkbox" type="checkbox" wire:model.defer="selected"
                                                                                  :value="$user->id"/>
                                                            <span class="checkbox-checkmark-box">
                                                                                <span class="checkbox-checkmark"></span>
                                                                            </span>
                                                        </x-parnas.label>
                                                    </x-parnas.form-group>
                                                </div>
                                                <div class="detail flex-7 m-flex-15">
                                                    <span class="f-12">{{ $user->id }}</span>
                                                </div>
                                                <div class="detail flex-12 m-flex-40">
                                                    <span class="f-12">{{ $user->name }}</span>
                                                </div>
                                                <div class="detail flex-12 m-flex-40">
                                                    <span class="f-12">{{ $user->family }}</span>
                                                </div>
                                                <div class="detail flex-10 m-flex-40">
                                                    <img
                                                        src="{{ $user->files()->where('type' , 1)->first()->url ?? '/images/noPicture.png' }}"
                                                        alt="">
                                                </div>
                                                <div class="detail flex-13 m-flex-40">
                                                    <span class="f-12">{{ $user->phone }}</span>
                                                </div>
                                                <div class="detail flex-30 m-flex-60">
                                                    <span class="f-12">
                                                        {{ $user->email }}
                                                    </span>
                                                </div>
                                                <div class="detail flex-12 m-flex-40">
                                                    <span class="f-12">{{ $user->username }}</span>
                                                </div>
                                                <div class="detail flex-12 m-flex-40">
                                                    <span class="f-12">{{ $user->role->label }}</span>
                                                </div>
                                                <div class="detail flex-12 m-flex-38">
                                                    <span
                                                        class="f-12">{{ jdate($user->last_login_at)->format('Y-m-d H:i') }}</span>
                                                </div>
                                                <div class="detail sticky-table box-shadow-pattern flex-20 m-flex-43">
                                                    <a href="{{ route('admin.users.edit' , ['user' => $user->id]) }}"
                                                       class="bg-transparent ml-5">
                                                        <div class="image tooltip d-flex cursor-pointer">
                                                            <svg width="20" height="20" viewBox="0 0 47 47" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M12.0013 28.2652L12.0013 28.2652C11.9882 28.2783 11.9748 28.2917 11.961 28.3054C11.8092 28.4567 11.6171 28.6481 11.4806 28.8897C11.3441 29.1313 11.2793 29.3946 11.2281 29.6027C11.2234 29.6216 11.2189 29.64 11.2144 29.658L12.181 29.899L11.2144 29.658L9.6376 35.9809C9.63481 35.9921 9.63189 36.0037 9.62888 36.0158C9.59215 36.1623 9.54126 36.3652 9.5238 36.5448C9.5037 36.7515 9.49728 37.2035 9.86628 37.5721C10.2353 37.9406 10.6872 37.9337 10.8939 37.9133C11.0735 37.8956 11.2764 37.8445 11.4228 37.8076C11.4348 37.8046 11.4465 37.8017 11.4577 37.7989L11.2174 36.8403L11.4577 37.7989L17.7605 36.2192L17.7606 36.2192C17.7614 36.219 17.7622 36.2188 17.763 36.2186C17.7802 36.2143 17.7978 36.2099 17.8159 36.2055C18.0244 36.1539 18.2884 36.0886 18.5303 35.9513L18.0368 35.0815L18.5303 35.9513C18.7723 35.814 18.9637 35.6209 19.115 35.4684C19.1287 35.4545 19.1421 35.441 19.1552 35.4279L34.5653 19.9793L34.6037 19.9408C34.9025 19.6414 35.193 19.3503 35.4004 19.0779C35.6342 18.7707 35.8538 18.3733 35.8538 17.8606C35.8538 17.3479 35.6342 16.9505 35.4004 16.6434C35.193 16.371 34.9025 16.0799 34.6037 15.7804L34.5653 15.7419L31.6533 12.8227L31.6148 12.7841C31.3147 12.4831 31.0231 12.1906 30.7501 11.9819C30.4425 11.7466 30.044 11.5254 29.5293 11.5254C29.0147 11.5254 28.6162 11.7466 28.3085 11.9819C28.0356 12.1906 27.7439 12.4831 27.4438 12.7841C27.431 12.7969 27.4182 12.8098 27.4053 12.8227L12.0124 28.254L12.0124 28.254L12.0013 28.2652Z"
                                                                    stroke="#4a0373" stroke-width="2"/>
                                                                <path
                                                                    d="M24.7461 14.9865L30.483 11.1523L36.2199 16.9036L32.3953 22.6548L24.7461 14.9865Z"
                                                                    fill="#4a0373"/>
                                                            </svg>
                                                            <div class="s-tooltip">
                                                                <span>ویرایش</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    @if($user->trashed())
                                                    <button wire:click="message({{ $user->id }} , {{ $trash }} , 1)"
                                                       class="bg-transparent ml-5">
                                                        <div class="image tooltip d-flex cursor-pointer">
                                                            <svg width="20" height="20" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M19.75 36.4984L19.042 35.7922L18.3375 36.4984L19.042 37.2046L19.75 36.4984ZM26.6912 28.1239L19.042 35.7922L20.458 37.2046L28.1072 29.5363L26.6912 28.1239ZM19.042 37.2046L26.6912 44.873L28.1072 43.4605L20.458 35.7922L19.042 37.2046Z" fill="#ffac00"/>
                                                                <path d="M11.9781 29.7895C10.5048 27.2312 9.91464 24.257 10.2993 21.3281C10.6839 18.3993 12.0218 15.6795 14.1055 13.5907C16.1891 11.5018 18.9021 10.1606 21.8236 9.77496C24.7452 9.38937 27.712 9.98098 30.264 11.458C32.8159 12.9351 34.8104 15.215 35.9381 17.9443C37.0657 20.6735 37.2636 23.6995 36.5009 26.553C35.7382 29.4064 34.0577 31.9279 31.7199 33.7262C29.382 35.5245 26.5176 36.4993 23.5709 36.4993" stroke="#ffac00" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>
                                                            <div class="s-tooltip">
                                                                <span>بازگردانی</span>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    @endif
                                                    @if(user()->id != $user->id)
                                                        <button class="bg-transparent ml-5"
                                                                wire:click="message({{ $user->id }} , {{ $trash }})">
                                                            <div class="image tooltip d-flex cursor-pointer">
                                                                <svg width="20" height="20" viewBox="0 0 31 31"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.7852 19.2988L12.7852 15.4647"
                                                                          stroke="#ff383f" stroke-width="2"
                                                                          stroke-linecap="round"/>
                                                                    <path d="M17.8828 19.2988L17.8828 15.4647"
                                                                          stroke="#ff383f" stroke-width="2"
                                                                          stroke-linecap="round"/>
                                                                    <path
                                                                        d="M3.85938 9.07617H26.8071V9.07617C25.0914 9.07617 24.2336 9.07617 23.6689 9.56799C23.5996 9.62832 23.5346 9.69336 23.4743 9.76264C22.9824 10.3273 22.9824 11.1851 22.9824 12.9008V21.6909C22.9824 23.5765 22.9824 24.5193 22.3967 25.1051C21.8109 25.6909 20.8681 25.6909 18.9824 25.6909H11.684C9.79837 25.6909 8.85556 25.6909 8.26977 25.1051C7.68399 24.5193 7.68399 23.5765 7.68399 21.6909V12.9008C7.68399 11.1851 7.68399 10.3273 7.19217 9.76264C7.13184 9.69336 7.0668 9.62832 6.99752 9.56799C6.43283 9.07617 5.57501 9.07617 3.85938 9.07617V9.07617Z"
                                                                        stroke="#ff383f" stroke-width="2"
                                                                        stroke-linecap="round"/>
                                                                    <path
                                                                        d="M12.8702 4.43653C13.0155 4.30065 13.3356 4.18058 13.7809 4.09494C14.2262 4.00931 14.7718 3.96289 15.3331 3.96289C15.8944 3.96289 16.44 4.00931 16.8853 4.09494C17.3306 4.18058 17.6507 4.30065 17.7959 4.43653"
                                                                        stroke="#ff383f" stroke-width="2"
                                                                        stroke-linecap="round"/>
                                                                </svg>
                                                                <div class="s-tooltip">
                                                                    <span>حذف</span>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    @endif
                                                    <button class="bg-transparent ml-5"
                                                            wire:click="changePassword({{ $user->id }})">
                                                        <div class="image tooltip d-flex cursor-pointer">
                                                            <svg width="20" height="20" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M23.9993 25.2794C23.285 25.2821 22.5914 25.5194 22.0251 25.9548C21.4588 26.3902 21.0511 26.9995 20.8648 27.689C20.6785 28.3786 20.7238 29.1103 20.9938 29.7716C21.2638 30.4329 21.7436 30.9872 22.3593 31.3494V35.9994H25.6793V31.3494C26.1664 31.0612 26.5707 30.6519 26.8528 30.1613C27.1349 29.6706 27.2853 29.1153 27.2893 28.5494V28.5494C27.2893 28.1182 27.204 27.6914 27.0385 27.2933C26.8729 26.8953 26.6302 26.5339 26.3244 26.23C26.0187 25.9261 25.6558 25.6857 25.2568 25.5225C24.8577 25.3594 24.4304 25.2767 23.9993 25.2794V25.2794Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M36.2909 17.7695H11.7009C9.31499 17.7695 7.38086 19.7037 7.38086 22.0895V39.1795C7.38086 41.5654 9.31499 43.4995 11.7009 43.4995H36.2909C38.6767 43.4995 40.6109 41.5654 40.6109 39.1795V22.0895C40.6109 19.7037 38.6767 17.7695 36.2909 17.7695Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M13.3496 17.77V15.16C13.3496 12.3328 14.4727 9.62138 16.4719 7.62224C18.471 5.6231 21.1824 4.5 24.0096 4.5C26.8368 4.5 29.5482 5.6231 31.5474 7.62224C33.5465 9.62138 34.6696 12.3328 34.6696 15.16V17.77" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                            <div class="s-tooltip">
                                                                <span>تغییر رمز عبور</span>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        @empty
                                            @if($readyToLoad)
                                                <div class="empty-data">
                                                    <div class="main-empty d-flex flex-direction-column align-items-center">
                                                        <div class="image">
                                                            <img src="/img/gif/empty-data.gif" alt="empty" />
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                @foreach(range(1 , 5) as $item)
                                                    <div class="d-detail placeholder-wave">
                                                        <div class="detail placeholder flex-5 m-flex-15">
                                                        </div>
                                                        <div class="detail placeholder flex-7 m-flex-15">

                                                        </div>
                                                        <div class="detail placeholder flex-12 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-12 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-10 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-13 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-30 m-flex-60">

                                                        </div>
                                                        <div class="detail placeholder flex-12 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-12 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-12 m-flex-38">

                                                        </div>
                                                        <div class="detail placeholder sticky-table box-shadow-pattern flex-20 m-flex-43">

                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforelse
                                    </div>
                                </div>
                                <!--! pagination  -->
                                <div
                                    class="main-data p-pagination d-flex m-direction-column-reverse justify-content-between py-20 px-2">
                                    <!-- perpage  -->
                                    <div class="perpage m-mt-10">
                                        <div class="select mt-5">
                                            <x-parnas.inputs.select wire:model="perPage" class="radius-7">
                                                @foreach($perPages as $count)
                                                    <x-parnas.inputs.option>
                                                        {{ $count }}
                                                    </x-parnas.inputs.option>
                                                @endforeach
                                            </x-parnas.inputs.select>
                                        </div>
                                    </div>
                                    <!-- ul pagination -->
                                    {{ count($users) ? $users->links() : '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:admin.users.user-change-password/>
</div>

@push('title' , 'کاربران')
