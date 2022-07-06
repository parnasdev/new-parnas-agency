<div>
    <div class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 m-mx-5 my-5">
        <!--! c-right -->
        <x-parnas.spinners :full="true" wire:loading
                           wire:target="status , gotoPage , previousPage , nextPage , changeStatus , selectedAction , delete , forceDelete , selected , cStatus , changeCourseStatus"/>
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
            <div>
                <!--? row form  -->
                <div class="mx-10 m-mx-5 m-ml-0 mb-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-3 pt-7">
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center pb-10">
                                    <div class="text">
                                        <h6>لیست سفارش ها</h6>
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
                                        <button class="ancher btn-effect {{$trash ? 'bg-info':'bg-danger'}} text-white radius-5" wire:click="showTrash()">
                                            @if($trash)
                                                <div class="circle-solid top-right bg-white"></div> مشاهده سفارش ها
                                            @else
                                                <svg width="20" height="20" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.7852 19.2988L12.7852 15.4647" stroke="#fff" stroke-width="2" stroke-linecap="round"></path>
                                                    <path d="M17.8828 19.2988L17.8828 15.4647" stroke="#fff" stroke-width="2" stroke-linecap="round"></path>
                                                    <path d="M3.85938 9.07617H26.8071V9.07617C25.0914 9.07617 24.2336 9.07617 23.6689 9.56799C23.5996 9.62832 23.5346 9.69336 23.4743 9.76264C22.9824 10.3273 22.9824 11.1851 22.9824 12.9008V21.6909C22.9824 23.5765 22.9824 24.5193 22.3967 25.1051C21.8109 25.6909 20.8681 25.6909 18.9824 25.6909H11.684C9.79837 25.6909 8.85556 25.6909 8.26977 25.1051C7.68399 24.5193 7.68399 23.5765 7.68399 21.6909V12.9008C7.68399 11.1851 7.68399 10.3273 7.19217 9.76264C7.13184 9.69336 7.0668 9.62832 6.99752 9.56799C6.43283 9.07617 5.57501 9.07617 3.85938 9.07617V9.07617Z" stroke="#fff" stroke-width="2" stroke-linecap="round"></path>
                                                    <path d="M12.8702 4.43653C13.0155 4.30065 13.3356 4.18058 13.7809 4.09494C14.2262 4.00931 14.7718 3.96289 15.3331 3.96289C15.8944 3.96289 16.44 4.00931 16.8853 4.09494C17.3306 4.18058 17.6507 4.30065 17.7959 4.43653" stroke="#fff" stroke-width="2" stroke-linecap="round"></path>
                                                </svg><div class="circle-solid top-right bg-white"></div> مشاهده سفارش های حذف شده
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--! data form  -->
                        <div class="my-10 ml-5">
                            <!-- parent -->
                            <div class="p-table p-0">
                                <div class="controller-filters">
                                    <!--! filter  -->
                                    <div class="filters d-flex flex-wrap justify-content-between mb-0">
                                        <div class="c-filters d-flex flex-100">
                                            <!--? input  -->
                                            <div class="c-input flex-45 ml-30 mb-8">
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
                                            <!--? select with Search  -->
                                            <!--? select -->
                                            <div class="select-data flex-20 m-flex-50 mb-10">
                                                <!-- parent -->
                                                <div class="flex-100 selective-custom justify-content-start mx-8">
                                                    <!-- child -->
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
                                            <span class="f-12 px-6">{{ count($orders) > 0 ? $orders->total() : '0' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!--! table  -->
                                <div class="controller-table scroller">
                                    <!--? thead -->
                                    <div class="d-thead">
                                        <div class="head flex-5 m-flex-10"></div>
                                        <div class="head flex-5 m-flex-15">
                                            <span class="f-12 f-bold">شناسه</span>
                                        </div>
                                        <div class="head flex-20 m-flex-40">
                                            <span class="f-12 f-bold">نام کاربر</span>
                                        </div>
                                        <div class="head flex-19 m-flex-40">
                                            <span class="f-12 f-bold">نوع پرداخت</span>
                                        </div>
                                        <div class="head flex-20 m-flex-40">
                                            <span class="f-12 f-bold">قیمت</span>
                                        </div>
                                        <div class="head flex-15 m-flex-40">
                                            <span class="f-12 f-bold">وضعیت</span>
                                        </div>
                                        <div class="head sticky-table flex-15 m-flex-40">
                                            <span class="f-12 f-bold">عملیات</span>
                                        </div>
                                    </div>
                                    <!--? tdetail  -->
                                    <div class="data" wire:init="loadOrders">
                                        <!--? child(1)  -->
                                        @forelse($orders as $order)
                                            <div class="d-detail" x-data="{showDrop: false}">
                                                <div class="detail flex-5 m-flex-10">
                                                    <div class="checkbox-list flex-50">
                                                        <label class="checkbox mr-10 f-12">
                                                            <input class="checkbox-input" x-ref="checkbox" type="checkbox"  wire:model.defer="selected" value="{{ $order->id }}">
                                                            <span class="checkbox-checkmark-box">
                                                                                    <span
                                                                                        class="checkbox-checkmark"></span>
                                                                                </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="detail flex-5 m-flex-15">
                                                    <span class="f-12">{{ $order->id }}</span>
                                                </div>
                                                <div class="detail flex-20 m-flex-40">
                                                    <span class="f-12">{{ $order->user->fullname() ?? $order->user->phone }}</span>
                                                </div>
                                                <div class="detail flex-19 m-flex-40">
                                                    <span class="f-12">
                                                        @if($order->payment_type == 'cart')
                                                            کارت به کارت
                                                        @else
                                                            {{ $order->payment_type }}
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="detail flex-20 m-flex-40">
                                                    <span class="f-12">{{ number_format($order->total_price) }}</span>
                                                </div>
                                                <div class="detail flex-15 m-flex-40">
                                                    <span class="f-12 {{ $order->status_id === getStatus('complete') ? 'bg-success': ($order->status_id === getStatus('waitforpay') ? 'bg-warning' : 'bg-danger') }} radius-5 text-white text-align-center" style="width:50%;padding: 7px 10px">{{ $order->status->label }}</span>
                                                </div>
                                                <div class="detail d-flex flex-wrap sticky-table flex-15 m-flex-40">
                                                    <a class="d-flex justify-content-center ml-7 bg-transparent"
                                                       href="{{ route('admin.orders.show' , ['order' => $order->id]) }}">
                                                        <div class="image tooltip d-flex cursor-pointer">
                                                            <svg width="20" height="20" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M19.4333 15.6532C19.4333 17.9267 17.5956 19.7655 15.3339 19.7655C13.0721 19.7655 11.2344 17.9267 11.2344 15.6532C11.2344 13.3798 13.0721 11.541 15.3339 11.541C17.5956 11.541 19.4333 13.3798 19.4333 15.6532Z" stroke="#237e8c" stroke-width="2"/>
                                                                <path d="M26.0082 14.5827C26.3908 15.0629 26.5821 15.3031 26.5821 15.6527C26.5821 16.0024 26.3908 16.2425 26.0082 16.7227C24.3283 18.8313 20.182 23.321 15.3332 23.321C10.4844 23.321 6.33814 18.8313 4.6582 16.7227C4.27562 16.2425 4.08432 16.0024 4.08432 15.6527C4.08432 15.3031 4.27562 15.0629 4.6582 14.5827C6.33814 12.4741 10.4844 7.98438 15.3332 7.98438C20.182 7.98438 24.3283 12.4741 26.0082 14.5827Z" stroke="#237e8c" stroke-width="2"/>
                                                            </svg>
                                                            <div class="s-tooltip">
                                                                <span>نمایش</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <button wire:click="message({{ $order->id }} , {{ $trash }})"
                                                            class="d-flex justify-content-center mr-7 bg-transparent">
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
                                                        <div class="detail placeholder flex-5 m-flex-10">

                                                        </div>
                                                        <div class="detail placeholder flex-5 m-flex-15">

                                                        </div>
                                                        <div class="detail placeholder flex-20 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-19 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-20 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-15 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder d-flex flex-wrap sticky-table flex-15 m-flex-40">

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
                                        <div x-data="{ data: '' }" class="select mt-5">
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
                                    {{ count($orders) > 0 ? $orders->links() : '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('title' , 'سفارش ها')
