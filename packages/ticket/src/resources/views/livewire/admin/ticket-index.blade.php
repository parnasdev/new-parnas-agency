<div>
    <div class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 my-5 m-mx-5">
        <x-parnas.spinners :full="true" wire:loading
                           wire:target="status , gotoPage , previousPage , nextPage , changeStatus , selectedAction , delete , forceDelete , selected , perPage"/>
        <!--! c-right  -->
        <div class="dark-theme box-design bg-white flex-99 px-5 py-10">
            <div>
                <!--? row form  -->
                <div class="mx-10 m-mx-5 mb-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-3">
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center pb-10">
                                    <div class="text">
                                        <h6>لیست تیکت ها</h6>
                                    </div>
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle"></div>
                                        <div class="rx-border-rectangle-after"></div>
                                    </div>
                                </div>
                                <!--? group[button]  -->
{{--                                <div class="c-group-btn d-flex flex-wrap justify-content-start">--}}
{{--                                    <div class="c-btn ml-7 pb-5">--}}
{{--                                        <a href="{{ route('admin.posts.create') }}" class="ancher btn-effect bg-success text-white radius-5">--}}
{{--                                            <div class="circle-solid top-right bg-white"></div>ایجاد نوشته</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
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
                                            <div class="c-input flex-40 ml-20">
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
                                                    <svg width="25" height="25" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <ellipse cx="14.0569" cy="14.6788" rx="8.9241" ry="8.94638" stroke="#CCD2E3" stroke-width="2"/>
                                                        <path d="M14.059 10.8457C13.5567 10.8457 13.0594 10.9449 12.5954 11.1376C12.1313 11.3302 11.7097 11.6127 11.3546 11.9687C10.9994 12.3247 10.7177 12.7474 10.5255 13.2126C10.3333 13.6778 10.2344 14.1764 10.2344 14.6799" stroke="#CCD2E3" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M25.5316 26.1818L21.707 22.3477" stroke="#CCD2E3" stroke-width="2" stroke-linecap="round"/>
                                                    </svg>
                                                </div>
                                                <input type="text" wire:model="q" placeholder="کلمه یا عبارت خود را جستجو کنید" />
                                            </div>
                                            <!--? select -->
                                            <div class="select-data flex-20 m-flex-50">
                                                <!-- parent -->
                                                <div class="flex-100 selective-custom justify-content-start mx-8">
                                                    <div class="d-flex justify-content-start m-left-auto pos-relative pr-10">
                                                        <label for="useData" class="d-flex f-12 text-63">
                                                            بر اساس وضعیت
                                                            <div class="rx-title title-input pb-10">
                                                                <div class="p-rx">
                                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div x-data="{ data: '' }" class="select mt-5">
                                                        <x-parnas.inputs.select2 wire:model="status">
                                                            <x-parnas.inputs.option value="0">
                                                                همه
                                                            </x-parnas.inputs.option>
                                                            @foreach($statuses as $status)
                                                                <x-parnas.inputs.option :value="$status->id">
                                                                    {{ $status->label }}
                                                                </x-parnas.inputs.option>
                                                            @endforeach
                                                        </x-parnas.inputs.select2>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--? insert data  -->
{{--                                            <div class="c-btn justify-content-end px-8 pb-8">--}}
{{--                                                <button class="btn btn-outline border-color-danger text-danger radius-5" wire:click="showTrash()">--}}
{{--                                                    @if($trash)--}}
{{--                                                        <svg width="20" height="20" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                            <path d="M12.7852 19.2988L12.7852 15.4647" stroke="#ea4141 " stroke-width="2" stroke-linecap="round"></path>--}}
{{--                                                            <path d="M17.8828 19.2988L17.8828 15.4647" stroke="#ea4141 " stroke-width="2" stroke-linecap="round"></path>--}}
{{--                                                            <path d="M3.85938 9.07617H26.8071V9.07617C25.0914 9.07617 24.2336 9.07617 23.6689 9.56799C23.5996 9.62832 23.5346 9.69336 23.4743 9.76264C22.9824 10.3273 22.9824 11.1851 22.9824 12.9008V21.6909C22.9824 23.5765 22.9824 24.5193 22.3967 25.1051C21.8109 25.6909 20.8681 25.6909 18.9824 25.6909H11.684C9.79837 25.6909 8.85556 25.6909 8.26977 25.1051C7.68399 24.5193 7.68399 23.5765 7.68399 21.6909V12.9008C7.68399 11.1851 7.68399 10.3273 7.19217 9.76264C7.13184 9.69336 7.0668 9.62832 6.99752 9.56799C6.43283 9.07617 5.57501 9.07617 3.85938 9.07617V9.07617Z" stroke="#ea4141" stroke-width="2" stroke-linecap="round"></path>--}}
{{--                                                            <path d="M12.8702 4.43653C13.0155 4.30065 13.3356 4.18058 13.7809 4.09494C14.2262 4.00931 14.7718 3.96289 15.3331 3.96289C15.8944 3.96289 16.44 4.00931 16.8853 4.09494C17.3306 4.18058 17.6507 4.30065 17.7959 4.43653" stroke="#ea4141 " stroke-width="2" stroke-linecap="round"></path>--}}
{{--                                                        </svg> مشاهده تی ها--}}
{{--                                                    @else--}}
{{--                                                        <svg width="20" height="20" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                            <path d="M12.7852 19.2988L12.7852 15.4647" stroke="#ea4141 " stroke-width="2" stroke-linecap="round"></path>--}}
{{--                                                            <path d="M17.8828 19.2988L17.8828 15.4647" stroke="#ea4141 " stroke-width="2" stroke-linecap="round"></path>--}}
{{--                                                            <path d="M3.85938 9.07617H26.8071V9.07617C25.0914 9.07617 24.2336 9.07617 23.6689 9.56799C23.5996 9.62832 23.5346 9.69336 23.4743 9.76264C22.9824 10.3273 22.9824 11.1851 22.9824 12.9008V21.6909C22.9824 23.5765 22.9824 24.5193 22.3967 25.1051C21.8109 25.6909 20.8681 25.6909 18.9824 25.6909H11.684C9.79837 25.6909 8.85556 25.6909 8.26977 25.1051C7.68399 24.5193 7.68399 23.5765 7.68399 21.6909V12.9008C7.68399 11.1851 7.68399 10.3273 7.19217 9.76264C7.13184 9.69336 7.0668 9.62832 6.99752 9.56799C6.43283 9.07617 5.57501 9.07617 3.85938 9.07617V9.07617Z" stroke="#ea4141" stroke-width="2" stroke-linecap="round"></path>--}}
{{--                                                            <path d="M12.8702 4.43653C13.0155 4.30065 13.3356 4.18058 13.7809 4.09494C14.2262 4.00931 14.7718 3.96289 15.3331 3.96289C15.8944 3.96289 16.44 4.00931 16.8853 4.09494C17.3306 4.18058 17.6507 4.30065 17.7959 4.43653" stroke="#ea4141 " stroke-width="2" stroke-linecap="round"></path>--}}
{{--                                                        </svg> مشاهده نوشته های حذف شده--}}
{{--                                                    @endif--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
                                        </div>

                                    </div>
                                    <!--! data -->
                                    <div class="info-data" style="justify-content: flex-end">
                                        <!--! Result  -->
                                        <div class="result">
                                            <span class="f-12 text-info">تعداد اطلاعات :</span>
                                            <span class="f-12 px-6">{{ count($tickets) > 0 ? $tickets->total() : '0' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!--! table  -->
                                <div class="controller-table">
                                    <!--? thead -->
                                    <div class="d-thead">
                                        <div class="head flex-10 m-flex-15">
                                            <span class="f-12 f-bold">شناسه</span>
                                        </div>
                                        <div class="head flex-22 m-flex-50">
                                            <span class="f-12 f-bold">نام کاربر</span>
                                        </div>
                                        <div class="head flex-15 m-flex-50">
                                            <span class="f-12 f-bold">تاریخ</span>
                                        </div>
                                        <div class="head flex-22 m-flex-50">
                                            <span class="f-12 f-bold">عنوان</span>
                                        </div>
                                        <div class="head flex-15 m-flex-50">
                                            <span class="f-12 f-bold">وضعیت</span>
                                        </div>
                                        <div class="head sticky-table flex-15 m-flex-44">
                                            <span class="f-12 f-bold">عملیات</span>
                                        </div>
                                    </div>
                                    <!--? tdetail  -->
                                    <div class="data" wire:init="loadTickets">
                                        <!--? child(1)  -->
                                        @forelse($tickets as $ticket)
                                            <div class="d-detail">
                                                <div class="detail flex-10 m-flex-15">
                                                    <span class="f-12">{{ $ticket->id }}</span>
                                                </div>
                                                <div class="detail flex-22 m-flex-50">
                                                    <span class="f-12">{{ $ticket->user->fullname() ?? $ticket->user->phone }}</span>
                                                </div>
                                                <div class="detail flex-15 m-flex-50">
                                                    <span class="f-12">{{ jdate($ticket->created_at)->format('Y-m-d H:i') }}</span>
                                                </div>
                                                <div class="detail flex-22 m-flex-50">
                                                    <span class="f-12">
                                                        {{ $ticket->title }}
                                                    </span>
                                                </div>
                                                <div class="detail flex-15 m-flex-50">
                                                    <div class="perpage" style="width: 90%">
                                                        <div class="select c-s h-2rem" x-data="">
                                                            <x-parnas.inputs.select class="radius-7"
                                                                                    @change="$wire.changeStatus({{ $ticket->id }} , $el.value)">
                                                                @foreach($statuses as $status)
                                                                    <option value="{{ $status->id }}" {{ $ticket->status_id == $status->id ? 'selected' : '' }}>
                                                                        {{ $status->label }}
                                                                    </option>
                                                                @endforeach
                                                            </x-parnas.inputs.select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="detail sticky-table flex-15 m-flex-44">
                                                    <a href="{{ route('admin.tickets.edit' , ['ticket' => $ticket->id]) }}" class="bg-transparent ml-5">
                                                        <div class="image tooltip d-flex cursor-pointer">
                                                            <svg width="20" height="20" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M23.861 8.43555V8.43555C29.7517 8.43555 32.697 8.43555 34.8609 9.76115C36.0727 10.5035 37.0914 11.5223 37.8338 12.7341C39.1594 14.8979 39.1594 17.8433 39.1594 23.734V35.1089C39.1594 36.9945 39.1594 37.9373 38.5736 38.5231C37.9878 39.1089 37.045 39.1089 35.1594 39.1089H23.8992C17.9722 39.1089 15.0087 39.1089 12.8355 37.7675C11.6434 37.0318 10.6396 36.0279 9.90382 34.8359C8.5625 32.6627 8.5625 29.6992 8.5625 23.7722V23.7722" stroke="#222" stroke-width="2"/>
                                                                <path d="M18.125 21.8555L29.5988 21.8555" stroke="#222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M10.4766 16.1035L10.4766 4.60102" stroke="#222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M4.73828 10.3535L16.2121 10.3535" stroke="#222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M23.8633 29.5234H29.6002" stroke="#222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                            <div class="s-tooltip">
                                                                <span>پاسخ</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <button class="bg-transparent ml-5" wire:click="message({{ $ticket->id }} , {{ $trash }})">
                                                        <div class="image tooltip d-flex cursor-pointer">
                                                            <svg width="20" height="20" viewBox="0 0 31 31" fill="none"
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
                                                        <div class="detail placeholder flex-10 m-flex-15"></div>
                                                        <div class="detail placeholder flex-22 m-flex-50"></div>
                                                        <div class="detail placeholder flex-15 m-flex-50"></div>
                                                        <div class="detail placeholder flex-22 m-flex-50"></div>
                                                        <div class="detail placeholder flex-15 m-flex-50"></div>
                                                        <div class="detail placeholder sticky-table flex-15 m-flex-44"></div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforelse
                                    </div>
                                </div>
                                <!--! pagination  -->
                                <div class="main-data p-pagination d-flex m-direction-column-reverse justify-content-between py-20 px-2">
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
                                    {{ count($tickets) > 0 ? $tickets->links() : '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
