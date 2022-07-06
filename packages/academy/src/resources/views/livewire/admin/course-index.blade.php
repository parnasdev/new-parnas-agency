<div>
    <div
        class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 m-mx-5 my-5">
        <!--! c-right -->
        <x-parnas.spinners :full="true" wire:loading
            wire:target="status , gotoPage , previousPage , nextPage , changeStatus , selectedAction , delete , forceDelete , selected , cStatus , changeCourseStatus" />
        <div class="dark-theme box-design bg-white flex-99 px-5 py-10" x-data="{
            selectAll(el) {
                let checkboxes = document.querySelectorAll('[x-ref=checkbox]');
                let ids = [];
                if (el.checked) {
                    checkboxes.forEach(item => ids.push(item.value))
                } else {
                    ids = [];
                }

                $wire.set('selected', ids)
            }
        }">
            <div>
                <!--? row form  -->
                <div class="mx-10 m-mx-5 mb-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-3">
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center pb-10">
                                    <div class="text">
                                        <h6>لیست دوره ها</h6>
                                    </div>
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle"></div>
                                        <div class="rx-border-rectangle-after"></div>
                                    </div>
                                </div>
                                <!--? group[button]  -->
                                <div class="c-group-btn d-flex flex-wrap justify-content-start">
                                    <div class="c-btn justify-content-end ml-7 mb-5">
                                        <button
                                            class="ancher btn-effect {{ $trash ? 'bg-info' : 'bg-danger' }} text-white radius-5"
                                            wire:click="showTrash()">
                                            @if ($trash)
                                                <div class="circle-solid top-right bg-white"></div> مشاهده دوره ها
                                            @else
                                                <svg width="20" height="20" viewBox="0 0 31 31" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.7852 19.2988L12.7852 15.4647" stroke="#fff"
                                                        stroke-width="2" stroke-linecap="round"></path>
                                                    <path d="M17.8828 19.2988L17.8828 15.4647" stroke="#fff"
                                                        stroke-width="2" stroke-linecap="round"></path>
                                                    <path
                                                        d="M3.85938 9.07617H26.8071V9.07617C25.0914 9.07617 24.2336 9.07617 23.6689 9.56799C23.5996 9.62832 23.5346 9.69336 23.4743 9.76264C22.9824 10.3273 22.9824 11.1851 22.9824 12.9008V21.6909C22.9824 23.5765 22.9824 24.5193 22.3967 25.1051C21.8109 25.6909 20.8681 25.6909 18.9824 25.6909H11.684C9.79837 25.6909 8.85556 25.6909 8.26977 25.1051C7.68399 24.5193 7.68399 23.5765 7.68399 21.6909V12.9008C7.68399 11.1851 7.68399 10.3273 7.19217 9.76264C7.13184 9.69336 7.0668 9.62832 6.99752 9.56799C6.43283 9.07617 5.57501 9.07617 3.85938 9.07617V9.07617Z"
                                                        stroke="#fff" stroke-width="2" stroke-linecap="round"></path>
                                                    <path
                                                        d="M12.8702 4.43653C13.0155 4.30065 13.3356 4.18058 13.7809 4.09494C14.2262 4.00931 14.7718 3.96289 15.3331 3.96289C15.8944 3.96289 16.44 4.00931 16.8853 4.09494C17.3306 4.18058 17.6507 4.30065 17.7959 4.43653"
                                                        stroke="#fff" stroke-width="2" stroke-linecap="round"></path>
                                                </svg>
                                                <div class="circle-solid top-right bg-white"></div> مشاهده دوره های حذف
                                                شده
                                            @endif
                                        </button>
                                    </div>
                                    <div class="c-btn ml-7 pb-5">
                                        <a href="{{ route('admin.academy.index') }}"
                                            class="ancher btn-effect bg-warning text-white radius-5">
                                            <div class="circle-solid top-right bg-white"></div>
                                            <svg class="pl-3" width="17" height="17" viewBox="0 0 1024 1024"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M600.703 64C607.478 64.0002 614.078 66.1506 619.553 70.1416C625.027 74.1326 629.094 79.7581 631.167 86.208L666.367 195.584C681.151 202.816 695.295 210.944 708.799 220.096L821.183 195.904C827.809 194.489 834.714 195.214 840.901 197.975C847.089 200.735 852.241 205.388 855.615 211.264L944.319 364.8C947.706 370.672 949.141 377.469 948.416 384.209C947.692 390.95 944.845 397.286 940.287 402.304L863.167 487.424C864.29 503.746 864.29 520.126 863.167 536.448L940.287 621.696C944.845 626.714 947.692 633.05 948.416 639.791C949.141 646.531 947.706 653.328 944.319 659.2L855.615 812.8C852.232 818.664 847.076 823.304 840.889 826.053C834.702 828.801 827.803 829.517 821.183 828.096L708.799 803.904C695.359 812.992 681.151 821.184 666.431 828.416L631.167 937.792C629.094 944.242 625.027 949.867 619.553 953.858C614.078 957.849 607.478 960 600.703 960H423.295C416.52 960 409.92 957.849 404.446 953.858C398.971 949.867 394.904 944.242 392.831 937.792L357.695 828.48C342.951 821.27 328.729 813.037 315.135 803.84L202.815 828.096C196.189 829.511 189.285 828.786 183.097 826.025C176.909 823.265 171.757 818.612 168.383 812.736L79.6791 659.2C76.2919 653.328 74.8572 646.531 75.5818 639.791C76.3065 633.05 79.1531 626.714 83.7111 621.696L160.831 536.448C159.714 520.168 159.714 503.832 160.831 487.552L83.7111 402.304C79.1531 397.286 76.3065 390.95 75.5818 384.209C74.8572 377.469 76.2919 370.672 79.6791 364.8L168.383 211.2C171.766 205.336 176.922 200.696 183.109 197.947C189.296 195.199 196.196 194.483 202.815 195.904L315.135 220.16C328.703 211.008 342.911 202.752 357.695 195.52L392.895 86.208C394.961 79.7789 399.009 74.1682 404.458 70.1792C409.907 66.1902 416.478 64.0272 423.231 64H600.639H600.703ZM577.279 128H446.719L410.367 241.088L385.855 253.056C373.805 258.953 362.173 265.667 351.039 273.152L328.383 288.512L212.159 263.424L146.879 376.576L226.559 464.768L224.639 491.904C223.72 505.286 223.72 518.714 224.639 532.096L226.559 559.232L146.751 647.424L212.095 760.576L328.319 735.552L350.975 750.848C362.109 758.333 373.741 765.047 385.791 770.944L410.303 782.912L446.719 896H577.407L613.887 782.848L638.335 770.944C650.372 765.061 661.984 758.346 673.087 750.848L695.679 735.552L811.967 760.576L877.247 647.424L797.503 559.232L799.423 532.096C800.346 518.693 800.346 505.243 799.423 491.84L797.503 464.704L877.311 376.576L811.967 263.424L695.679 288.384L673.087 273.152C661.985 265.652 650.373 258.937 638.335 253.056L613.887 241.152L577.343 128H577.279ZM511.999 320C562.921 320 611.757 340.229 647.764 376.236C683.771 412.242 703.999 461.078 703.999 512C703.999 562.922 683.771 611.758 647.764 647.765C611.757 683.772 562.921 704 511.999 704C461.078 704 412.242 683.772 376.235 647.765C340.228 611.758 319.999 562.922 319.999 512C319.999 461.078 340.228 412.242 376.235 376.236C412.242 340.229 461.078 320 511.999 320V320ZM511.999 384C478.051 384 445.494 397.486 421.489 421.49C397.485 445.495 383.999 478.052 383.999 512C383.999 545.948 397.485 578.505 421.489 602.51C445.494 626.514 478.051 640 511.999 640C545.947 640 578.504 626.514 602.509 602.51C626.513 578.505 639.999 545.948 639.999 512C639.999 478.052 626.513 445.495 602.509 421.49C578.504 397.486 545.947 384 511.999 384V384Z"
                                                    fill="#fff"></path>
                                            </svg>
                                            تنظیمات آکادمی
                                        </a>
                                    </div>
                                    <div class="c-btn ml-7 pb-5">
                                        <a href="{{ route('admin.comments.index', ['type' => 'academy']) }}"
                                            class="ancher btn-effect bg-info text-white radius-5">
                                            <div class="circle-solid top-right bg-white"></div>
                                            دیدگاه ها
                                        </a>
                                    </div>
                                    <div class="c-btn ml-7 pb-5">
                                        <a href="{{ route('admin.categories.index', ['type' => 2]) }}"
                                            class="ancher btn-effect bg-info text-white radius-5">
                                            <div class="circle-solid top-right bg-white"></div>
                                            دسته بندی
                                        </a>
                                    </div>
                                    <div class="c-btn ml-7 pb-5">
                                        <a href="{{ route('admin.tags.index', ['type' => 2]) }}"
                                            class="ancher btn-effect bg-info text-white radius-5">
                                            <div class="circle-solid top-right bg-white"></div>
                                            برچسب ها
                                        </a>
                                    </div>
                                    <div class="c-btn pb-5">
                                        <a href="{{ route('admin.courses.create') }}"
                                            class="ancher btn-effect bg-success text-white radius-5">
                                            <div class="circle-solid top-right bg-white"></div>
                                            <svg width="20" height="20" viewBox="0 0 32 32" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.9375 8.02344L15.9375 23.3601" stroke="#fff"
                                                    stroke-width="2" stroke-linecap="round" />
                                                <path d="M23.5898 15.6914L8.29139 15.6914" stroke="#fff"
                                                    stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                            ایجاد دوره
                                        </a>
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
                                        <div class="c-filters flex-100">
                                            <!--? input  -->
                                            <div class="c-input flex-40 ml-10 mb-8">
                                                <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                                    <label for="useData" class="d-flex f-12 text-63">
                                                        جستجو
                                                        <div class="rx-title title-input pb-10">
                                                            <div class="p-rx">
                                                                <div class="rx-border-rectangle-after label-input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="search">
                                                    <svg width="25" height="25" viewBox="0 0 31 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <ellipse cx="14.0569" cy="14.6788" rx="8.9241" ry="8.94638"
                                                            stroke="#CCD2E3" stroke-width="2" />
                                                        <path
                                                            d="M14.059 10.8457C13.5567 10.8457 13.0594 10.9449 12.5954 11.1376C12.1313 11.3302 11.7097 11.6127 11.3546 11.9687C10.9994 12.3247 10.7177 12.7474 10.5255 13.2126C10.3333 13.6778 10.2344 14.1764 10.2344 14.6799"
                                                            stroke="#CCD2E3" stroke-width="2" stroke-linecap="round" />
                                                        <path d="M25.5316 26.1818L21.707 22.3477" stroke="#CCD2E3"
                                                            stroke-width="2" stroke-linecap="round" />
                                                    </svg>
                                                </div>
                                                <input type="text" wire:model="q"
                                                    placeholder="کلمه یا عبارت خود را جستجو کنید" />
                                            </div>
                                            <!--? select -->
                                            <div class="select-data flex-20 m-flex-50">
                                                <!-- parent -->
                                                <div class="flex-100 selective-custom justify-content-start mx-8">
                                                    <!-- child -->
                                                    <div
                                                        class="d-flex justify-content-start m-left-auto pos-relative pr-10">
                                                        <label for="useData" class="d-flex f-12 text-63">
                                                            بر اساس وضعیت
                                                            <div class="rx-title title-input pb-10">
                                                                <div class="p-rx">
                                                                    <div class="rx-border-rectangle-after label-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div x-data="{ data: '' }" class="select mt-5">
                                                        <x-parnas.inputs.select2 wire:model="status">
                                                            <x-parnas.inputs.option value="0">
                                                                همه
                                                            </x-parnas.inputs.option>
                                                            @foreach ($statuses as $status)
                                                                <x-parnas.inputs.option :value="$status->id">
                                                                    {{ $status->label }}
                                                                </x-parnas.inputs.option>
                                                            @endforeach
                                                        </x-parnas.inputs.select2>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--? select -->
                                            <div class="select-data flex-20 m-flex-50">
                                                <!-- parent -->
                                                <div class="flex-100 selective-custom justify-content-start mx-8">
                                                    <!-- child -->
                                                    <div
                                                        class="d-flex justify-content-start m-left-auto pos-relative pr-10">
                                                        <label for="useData" class="d-flex f-12 text-63">
                                                            بر اساس وضعیت دوره
                                                            <div class="rx-title title-input pb-10">
                                                                <div class="p-rx">
                                                                    <div class="rx-border-rectangle-after label-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div x-data="{ data: '' }" class="select mt-5">
                                                        <x-parnas.inputs.select2 wire:model="cStatus">
                                                            <x-parnas.inputs.option value="0">
                                                                همه
                                                            </x-parnas.inputs.option>
                                                            @foreach ($cStatuses as $status)
                                                                <x-parnas.inputs.option :value="$status->id">
                                                                    {{ $status->label }}
                                                                </x-parnas.inputs.option>
                                                            @endforeach
                                                        </x-parnas.inputs.select2>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--? select -->
                                            <div class="select-data flex-20 m-flex-50">
                                                <!-- parent -->
                                                <div class="flex-100 selective-custom justify-content-start mx-8">
                                                    <!-- child -->
                                                    <div
                                                        class="d-flex justify-content-start m-left-auto pos-relative pr-10">
                                                        <label for="useData" class="d-flex f-12 text-63">
                                                            بر اساس دسته بندی
                                                            <div class="rx-title title-input pb-10">
                                                                <div class="p-rx">
                                                                    <div class="rx-border-rectangle-after label-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="select mt-5">
                                                        <x-parnas.inputs.select2 wire:model="category">
                                                            <x-parnas.inputs.option value="0">
                                                                همه
                                                            </x-parnas.inputs.option>
                                                            @foreach ($categories as $category)
                                                                <x-parnas.inputs.option :value="$category->id">
                                                                    {{ $category->name }}
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
                                                <input class="checkbox-input" type="checkbox" x-ref="allCheckbox"
                                                    @change="selectAll($el)" />
                                                <span class="checkbox-checkmark-box">
                                                    <span class="checkbox-checkmark"></span>
                                                </span>
                                                انتخاب همه
                                            </label>
                                            <div class="select flex-18 m-flex-30 c-s h-2rem">
                                                <x-parnas.inputs.select class="radius-7" wire:model="action"
                                                    @change="$refs.allCheckbox.checked = false">
                                                    <option value="0">-</option>
                                                    <option value="1">حذف</option>
                                                    @if ($trash)
                                                        <option value="2">بازگردانی</option>
                                                    @endif
                                                </x-parnas.inputs.select>
                                            </div>
                                        </div>
                                        <!--! Result  -->
                                        <div class="result">
                                            <span class="f-12 text-info">تعداد اطلاعات :</span>
                                            <span
                                                class="f-12 px-6">{{ count($posts) > 0 ? $posts->total() : '0' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!--! table  -->
                                <div class="controller-table">
                                    <!--? thead -->
                                    <div class="d-thead">
                                        <div class="head flex-6 m-flex-10"></div>
                                        <div class="head flex-5 m-flex-15">
                                            <span class="f-12 f-bold">شناسه</span>
                                        </div>
                                        <div class="head flex-13 m-flex-40">
                                            <span class="f-12 f-bold">عکس شاخص</span>
                                        </div>
                                        <div class="head flex-15 m-flex-40">
                                            <span class="f-12 f-bold">عنوان</span>
                                        </div>
                                        <div class="head flex-10 m-flex-40">
                                            <span class="f-12 f-bold">نام کاربر</span>
                                        </div>
                                        <div class="head flex-10 m-flex-40">
                                            <span class="f-12 f-bold">قیمت</span>
                                        </div>
                                        <div class="head flex-10 m-flex-40">
                                            <span class="f-12 f-bold">وضعیت</span>
                                        </div>
                                        <div class="head flex-10 m-flex-40">
                                            <span class="f-12 f-bold">وضعیت دوره</span>
                                        </div>
                                        <div class="head flex-20 m-flex-60">
                                            <span class="f-12 f-bold">عملیات</span>
                                        </div>
                                    </div>
                                    <!--? tdetail  -->
                                    <div class="data" wire:init="loadCourses">
                                        <!--? child(1)  -->
                                        @forelse($posts as $post)
                                            <div class="d-detail" x-data="{ showDrop: false }">
                                                <div class="detail flex-6 m-flex-10">
                                                    <div class="checkbox-list flex-50">
                                                        <label class="checkbox mr-10 f-12">
                                                            <input class="checkbox-input" type="checkbox"
                                                                x-ref="checkbox" wire:model.defer="selected"
                                                                value="{{ $post->id }}">
                                                            <span class="checkbox-checkmark-box">
                                                                <span class="checkbox-checkmark"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="detail flex-5 m-flex-15">
                                                    <span class="f-12">{{ $post->id }}</span>
                                                </div>
                                                <div class="detail flex-13 m-flex-40">
                                                    <img src="{{ $post->files()->where('type', 1)->first()->url ?? '/images/noPicture.png' }}"
                                                        alt="" />
                                                </div>
                                                <div class="detail flex-15 m-flex-40">
                                                    <a class="f-12 text-info"
                                                        href="{{ $post->path() }}">{{ $post->title }}</a>
                                                </div>
                                                <div class="detail flex-10 m-flex-40">
                                                    <span class="f-12">{{ $post->user->name }}
                                                        {{ $post->user->family }}</span>
                                                </div>
                                                <div class="detail flex-10 m-flex-40">
                                                    <span
                                                        class="f-12">{{ number_format($post->options['price']) }}</span>
                                                </div>
                                                <div class="detail flex-10 m-flex-40">
                                                    <div class="select c-s h-2rem" x-data>
                                                        <x-parnas.inputs.select class="radius-7"
                                                            @change="$wire.changeStatus({{ $post->id }} , $el.value)">
                                                            @foreach ($statuses as $status)
                                                                <option value="{{ $status->id }}"
                                                                    {{ $post->status_id == $status->id ? 'selected' : '' }}>
                                                                    {{ $status->label }}
                                                                </option>
                                                            @endforeach
                                                        </x-parnas.inputs.select>
                                                    </div>
                                                </div>
                                                <div class="detail flex-10 m-flex-40">
                                                    <div class="select c-s h-2rem" x-data>
                                                        <x-parnas.inputs.select class="radius-7"
                                                            @change="$wire.changeCourseStatus({{ $post->id }} , $el.value)">
                                                            @foreach ($cStatuses as $status)
                                                                <option value="{{ $status->id }}"
                                                                    {{ $post->options['course_status'] == $status->id ? 'selected' : '' }}>
                                                                    {{ $status->label }}
                                                                </option>
                                                            @endforeach
                                                        </x-parnas.inputs.select>
                                                    </div>
                                                </div>
                                                <div class="detail d-flex flex-wrap c-t flex-20 m-flex-60">
                                                    <a class="d-flex justify-content-center bg-transparent ml-5"
                                                        href="{{ route('admin.courses.edit', ['post' => $post->id]) }}">
                                                        <div class="image tooltip d-flex cursor-pointer">
                                                            <svg width="20" height="20" viewBox="0 0 47 47" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M12.0013 28.2652L12.0013 28.2652C11.9882 28.2783 11.9748 28.2917 11.961 28.3054C11.8092 28.4567 11.6171 28.6481 11.4806 28.8897C11.3441 29.1313 11.2793 29.3946 11.2281 29.6027C11.2234 29.6216 11.2189 29.64 11.2144 29.658L12.181 29.899L11.2144 29.658L9.6376 35.9809C9.63481 35.9921 9.63189 36.0037 9.62888 36.0158C9.59215 36.1623 9.54126 36.3652 9.5238 36.5448C9.5037 36.7515 9.49728 37.2035 9.86628 37.5721C10.2353 37.9406 10.6872 37.9337 10.8939 37.9133C11.0735 37.8956 11.2764 37.8445 11.4228 37.8076C11.4348 37.8046 11.4465 37.8017 11.4577 37.7989L11.2174 36.8403L11.4577 37.7989L17.7605 36.2192L17.7606 36.2192C17.7614 36.219 17.7622 36.2188 17.763 36.2186C17.7802 36.2143 17.7978 36.2099 17.8159 36.2055C18.0244 36.1539 18.2884 36.0886 18.5303 35.9513L18.0368 35.0815L18.5303 35.9513C18.7723 35.814 18.9637 35.6209 19.115 35.4684C19.1287 35.4545 19.1421 35.441 19.1552 35.4279L34.5653 19.9793L34.6037 19.9408C34.9025 19.6414 35.193 19.3503 35.4004 19.0779C35.6342 18.7707 35.8538 18.3733 35.8538 17.8606C35.8538 17.3479 35.6342 16.9505 35.4004 16.6434C35.193 16.371 34.9025 16.0799 34.6037 15.7804L34.5653 15.7419L31.6533 12.8227L31.6148 12.7841C31.3147 12.4831 31.0231 12.1906 30.7501 11.9819C30.4425 11.7466 30.044 11.5254 29.5293 11.5254C29.0147 11.5254 28.6162 11.7466 28.3085 11.9819C28.0356 12.1906 27.7439 12.4831 27.4438 12.7841C27.431 12.7969 27.4182 12.8098 27.4053 12.8227L12.0124 28.254L12.0124 28.254L12.0013 28.2652Z"
                                                                    stroke="#4a0373" stroke-width="2" />
                                                                <path
                                                                    d="M24.7461 14.9865L30.483 11.1523L36.2199 16.9036L32.3953 22.6548L24.7461 14.9865Z"
                                                                    fill="#4a0373" />
                                                            </svg>
                                                            <div class="s-tooltip">
                                                                <span>ویرایش</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <button @click="showDrop = !showDrop"
                                                        class="d-flex justify-content-center bg-transparent pos-relative ml-5">
                                                        <div class="image d-flex cursor-pointer"
                                                            data-toggle="show-dropdown">
                                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9 8C8.73478 8 8.48043 8.10536 8.29289 8.29289C8.10536 8.48043 8 8.73478 8 9C8 9.26522 8.10536 9.51957 8.29289 9.70711C8.48043 9.89464 8.73478 10 9 10H11V12C11 12.2652 11.1054 12.5196 11.2929 12.7071C11.4804 12.8946 11.7348 13 12 13C12.2652 13 12.5196 12.8946 12.7071 12.7071C12.8946 12.5196 13 12.2652 13 12V10H15C15.2652 10 15.5196 9.89464 15.7071 9.70711C15.8946 9.51957 16 9.26522 16 9C16 8.73478 15.8946 8.48043 15.7071 8.29289C15.5196 8.10536 15.2652 8 15 8H13V6C13 5.73478 12.8946 5.48043 12.7071 5.29289C12.5196 5.10536 12.2652 5 12 5C11.7348 5 11.4804 5.10536 11.2929 5.29289C11.1054 5.48043 11 5.73478 11 6V8H9Z"
                                                                    fill="#007bff" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M4 4C4 3.20435 4.31607 2.44129 4.87868 1.87868C5.44129 1.31607 6.20435 1 7 1H17C17.7956 1 18.5587 1.31607 19.1213 1.87868C19.6839 2.44129 20 3.20435 20 4V14C20 14.7956 19.6839 15.5587 19.1213 16.1213C18.5587 16.6839 17.7956 17 17 17H7C6.20435 17 5.44129 16.6839 4.87868 16.1213C4.31607 15.5587 4 14.7956 4 14V4ZM7 3H17C17.2652 3 17.5196 3.10536 17.7071 3.29289C17.8946 3.48043 18 3.73478 18 4V14C18 14.2652 17.8946 14.5196 17.7071 14.7071C17.5196 14.8946 17.2652 15 17 15H7C6.73478 15 6.48043 14.8946 6.29289 14.7071C6.10536 14.5196 6 14.2652 6 14V4C6 3.73478 6.10536 3.48043 6.29289 3.29289C6.48043 3.10536 6.73478 3 7 3Z"
                                                                    fill="#007bff" />
                                                                <path
                                                                    d="M5 20C4.73478 20 4.48043 20.1054 4.29289 20.2929C4.10536 20.4804 4 20.7348 4 21C4 21.2652 4.10536 21.5196 4.29289 21.7071C4.48043 21.8946 4.73478 22 5 22H19C19.2652 22 19.5196 21.8946 19.7071 21.7071C19.8946 21.5196 20 21.2652 20 21C20 20.7348 19.8946 20.4804 19.7071 20.2929C19.5196 20.1054 19.2652 20 19 20H5Z"
                                                                    fill="#007bff" />
                                                            </svg>
                                                            <div class="action-internal" x-show="showDrop"
                                                                @click.outside="showDrop = false">
                                                                <ul
                                                                    class="ul-internal d-flex flex-direction-column justify-content-center align-items-start">
                                                                    <li
                                                                        class="w-100 li-internal d-flex justify-content-start mb-4">
                                                                        <a href="{{ route('admin.seasons.index', ['post' => $post->id]) }}"
                                                                            class="ancher d-flex align-items-center bg-secondary f-11 text-white radius-5 w-100 py-6 px-5">
                                                                            <svg class="pl-3" width="17" height="17" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M12.984 3.40332C13.005 3.30664 13.0067 3.20675 12.9889 3.10943C12.9711 3.0121 12.9343 2.91925 12.8805 2.83623C12.8266 2.7532 12.7569 2.68165 12.6754 2.62568C12.5938 2.56971 12.5019 2.53044 12.4051 2.51012C12.3083 2.48981 12.2084 2.48885 12.1112 2.50731C12.014 2.52576 11.9214 2.56327 11.8387 2.61766C11.7561 2.67206 11.685 2.74227 11.6296 2.82425C11.5743 2.90622 11.5356 2.99835 11.516 3.09532L10.28 8.99932H3.75C3.55109 8.99932 3.36032 9.07834 3.21967 9.21899C3.07902 9.35964 3 9.55041 3 9.74932C3 9.94823 3.07902 10.139 3.21967 10.2796C3.36032 10.4203 3.55109 10.4993 3.75 10.4993H9.966L8.606 16.9993H2.75C2.55109 16.9993 2.36032 17.0783 2.21967 17.219C2.07902 17.3596 2 17.5504 2 17.7493C2 17.9482 2.07902 18.139 2.21967 18.2796C2.36032 18.4203 2.55109 18.4993 2.75 18.4993H8.292L7.016 24.5953C6.995 24.692 6.99334 24.7919 7.01111 24.8892C7.02888 24.9865 7.06573 25.0794 7.11954 25.1624C7.17335 25.2454 7.24306 25.317 7.32464 25.373C7.40623 25.4289 7.49808 25.4682 7.59491 25.4885C7.69174 25.5088 7.79163 25.5098 7.88883 25.4913C7.98603 25.4729 8.07862 25.4354 8.16126 25.381C8.2439 25.3266 8.31496 25.2564 8.37035 25.1744C8.42574 25.0924 8.46437 25.0003 8.484 24.9033L9.824 18.4993H16.292L15.016 24.5953C14.9767 24.7894 15.0158 24.9911 15.1246 25.1565C15.2335 25.3219 15.4033 25.4375 15.5971 25.4782C15.7909 25.5188 15.9929 25.4812 16.159 25.3735C16.3252 25.2658 16.442 25.0968 16.484 24.9033L17.824 18.4993H24.25C24.4489 18.4993 24.6397 18.4203 24.7803 18.2796C24.921 18.139 25 17.9482 25 17.7493C25 17.5504 24.921 17.3596 24.7803 17.219C24.6397 17.0783 24.4489 16.9993 24.25 16.9993H18.138L19.498 10.4993H25.25C25.4489 10.4993 25.6397 10.4203 25.7803 10.2796C25.921 10.139 26 9.94823 26 9.74932C26 9.55041 25.921 9.35964 25.7803 9.21899C25.6397 9.07834 25.4489 8.99932 25.25 8.99932H19.813L20.984 3.40332C21.005 3.30664 21.0067 3.20675 20.9889 3.10943C20.9711 3.0121 20.9343 2.91925 20.8805 2.83623C20.8266 2.7532 20.7569 2.68165 20.6754 2.62568C20.5938 2.56971 20.5019 2.53044 20.4051 2.51012C20.3083 2.48981 20.2084 2.48885 20.1112 2.50731C20.014 2.52576 19.9214 2.56327 19.8387 2.61766C19.7561 2.67206 19.685 2.74227 19.6296 2.82425C19.5743 2.90622 19.5356 2.99835 19.516 3.09532L18.28 8.99932H11.813L12.984 3.40332V3.40332ZM16.606 16.9993H10.138L11.498 10.4993H17.966L16.606 16.9993Z" fill="#fff"></path>
                                                                            </svg>
                                                                             فصل ها
                                                                        </a>
                                                                    </li>
                                                                    <li
                                                                        class="w-100 li-internal d-flex justify-content-start mb-4">
                                                                        <a href="{{ route('admin.episodes.index', ['post' => $post->id]) }}"
                                                                            class="ancher d-flex align-items-center bg-secondary f-11 text-white radius-5 w-100 py-6 px-5">
                                                                            <svg class="pl-3" width="17"
                                                                                height="17" viewBox="0 0 20 20"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M17.8125 5.9043L15.3125 7.34375V4.375C15.3125 3.68555 14.752 3.125 14.0625 3.125H2.5C1.81055 3.125 1.25 3.68555 1.25 4.375V15.625C1.25 16.3145 1.81055 16.875 2.5 16.875H14.0625C14.752 16.875 15.3125 16.3145 15.3125 15.625V12.6562L17.8125 14.0957C18.2285 14.3359 18.75 14.0352 18.75 13.5566V6.44531C18.75 5.96484 18.2285 5.66406 17.8125 5.9043ZM13.9062 15.4688H2.65625V4.53125H13.9062V15.4688ZM17.3438 12.207L15.3125 11.0391V8.96289L17.3438 7.79297V12.207ZM4.0625 7.03125H6.25C6.33594 7.03125 6.40625 6.96094 6.40625 6.875V5.9375C6.40625 5.85156 6.33594 5.78125 6.25 5.78125H4.0625C3.97656 5.78125 3.90625 5.85156 3.90625 5.9375V6.875C3.90625 6.96094 3.97656 7.03125 4.0625 7.03125Z"
                                                                                    fill="#fff" />
                                                                            </svg>
                                                                             ویدیو ها
                                                                        </a>
                                                                    </li>
                                                                    <li
                                                                        class="w-100 li-internal d-flex justify-content-start mb-4">
                                                                        <a href="{{ route('admin.learnings.index', ['post' => $post->id]) }}"
                                                                            class="ancher d-flex align-items-center bg-secondary f-11 text-white radius-5 w-100 py-6 px-5">
                                                                            <svg class="pl-3" width="17"
                                                                                height="17" viewBox="0 0 256 256"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M121.198 157.899C131.932 150.769 140.085 140.373 144.45 128.249C148.816 116.125 149.162 102.918 145.438 90.582C141.714 78.2459 134.118 67.4365 123.773 59.7535C113.428 52.0704 100.884 47.9219 87.9984 47.9219C75.1125 47.9219 62.569 52.0704 52.2241 59.7535C41.8792 67.4365 34.2826 78.2459 30.5586 90.582C26.8346 102.918 27.181 116.125 31.5466 128.249C35.9122 140.373 44.065 150.769 54.7984 157.899C36.4881 164.633 20.6792 176.812 9.4984 192.799C8.76967 193.644 8.22554 194.631 7.90095 195.698C7.57636 196.765 7.47849 197.889 7.61361 198.996C7.74874 200.103 8.11387 201.169 8.68557 202.127C9.25727 203.085 10.0229 203.912 10.9333 204.557C11.8438 205.201 12.8788 205.648 13.9722 205.868C15.0655 206.089 16.1928 206.079 17.2819 205.838C18.3709 205.597 19.3976 205.131 20.2959 204.47C21.1943 203.809 21.9445 202.968 22.4984 201.999C29.8911 191.497 39.7009 182.926 51.1004 177.01C62.5 171.094 75.155 168.005 87.9984 168.005C100.842 168.005 113.497 171.094 124.896 177.01C136.296 182.926 146.106 191.497 153.498 201.999C154.052 202.968 154.803 203.809 155.701 204.47C156.599 205.131 157.626 205.597 158.715 205.838C159.804 206.079 160.931 206.089 162.025 205.868C163.118 205.648 164.153 205.201 165.063 204.557C165.974 203.912 166.74 203.085 167.311 202.127C167.883 201.169 168.248 200.103 168.383 198.996C168.518 197.889 168.42 196.765 168.096 195.698C167.771 194.631 167.227 193.644 166.498 192.799C155.318 176.812 139.509 164.633 121.198 157.899V157.899ZM43.9984 107.999C43.9984 99.2971 46.579 90.7901 51.4137 83.5544C56.2485 76.3186 63.1204 70.679 71.1603 67.3488C79.2003 64.0185 88.0472 63.1472 96.5824 64.8449C105.118 66.5427 112.958 70.7333 119.111 76.8868C125.265 83.0403 129.455 90.8803 131.153 99.4155C132.851 107.951 131.979 116.798 128.649 124.838C125.319 132.877 119.679 139.749 112.443 144.584C105.208 149.419 96.7008 151.999 87.9984 151.999C76.3289 151.999 65.1373 147.364 56.8857 139.112C48.6341 130.861 43.9984 119.669 43.9984 107.999ZM246.098 203.899C245.248 204.512 244.284 204.949 243.263 205.185C242.241 205.421 241.184 205.451 240.15 205.274C239.117 205.098 238.13 204.717 237.245 204.155C236.361 203.592 235.597 202.86 234.998 201.999C227.6 191.502 217.79 182.935 206.391 177.018C194.993 171.101 182.341 168.008 169.498 167.999C167.377 167.999 165.342 167.157 163.842 165.656C162.341 164.156 161.498 162.121 161.498 159.999C161.498 157.878 162.341 155.843 163.842 154.343C165.342 152.842 167.377 151.999 169.498 151.999C181.168 151.999 192.359 147.364 200.611 139.112C208.863 130.861 213.498 119.669 213.498 107.999C213.498 96.3299 208.863 85.1384 200.611 76.8868C192.359 68.6352 181.168 63.9995 169.498 63.9995C165.48 64.0262 161.481 64.5639 157.598 65.5995C156.587 65.8895 155.529 65.9772 154.484 65.8577C153.439 65.7381 152.427 65.4136 151.508 64.9028C150.588 64.3919 149.778 63.7047 149.125 62.8805C148.471 62.0563 147.986 61.1112 147.698 60.0995C147.14 58.0579 147.403 55.8788 148.431 54.0285C149.459 52.1783 151.17 50.8039 153.198 50.1995C158.514 48.7681 163.993 48.0287 169.498 47.9995C182.398 47.953 194.967 52.0719 205.337 59.7433C215.708 67.4147 223.324 78.2287 227.055 90.5769C230.785 102.925 230.429 116.147 226.041 128.277C221.653 140.407 213.466 150.796 202.698 157.899C221.02 164.66 236.854 176.832 248.098 192.799C249.299 194.539 249.762 196.682 249.387 198.762C249.013 200.842 247.83 202.689 246.098 203.899V203.899Z"
                                                                                    fill="#fff"></path>
                                                                            </svg>
                                                                            ثبت نام کنندگان
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <a href="{{ route('admin.comments.index', ['post' => $post->id, 'type' => 'academy']) }}"
                                                        class="d-flex justify-content-center bg-transparent ml-5">
                                                        <div class="image tooltip d-flex cursor-pointer">
                                                            <svg width="18" height="18" viewBox="0 0 32 32" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M23.5176 4.65713V4.65713C24.2841 4.65713 24.6673 4.65713 24.9848 4.72677C26.1285 4.97757 27.0218 5.87083 27.2726 7.0145C27.3422 7.33204 27.3422 7.71528 27.3422 8.48174L27.3422 11.3254C27.3422 11.7969 27.3422 12.0326 27.1958 12.179C27.0493 12.3255 26.8136 12.3255 26.3422 12.3255L19.693 12.3255M23.5176 4.65713V4.65713C22.7511 4.65713 22.3679 4.65713 22.0504 4.72677C20.9067 4.97757 20.0134 5.87083 19.7626 7.0145C19.693 7.33204 19.693 7.71528 19.693 8.48174L19.693 12.3255M23.5176 4.65713L8.39453 4.65713C6.50891 4.65713 5.5661 4.65713 4.98032 5.24292C4.39453 5.8287 4.39453 6.77151 4.39453 8.65713L4.39453 27.6621L8.21914 26.3841L12.0438 27.6621L15.8684 26.3841L19.693 27.6621L19.693 12.3255"
                                                                    stroke="#6c757d" stroke-width="2" />
                                                                <path d="M9.49609 9.76953L14.5956 9.76953"
                                                                    stroke="#6c757d" stroke-width="2"
                                                                    stroke-linecap="round" />
                                                                <path d="M10.7695 14.8809H9.49148" stroke="#6c757d"
                                                                    stroke-width="2" stroke-linecap="round" />
                                                                <path d="M9.49609 19.9922L13.3207 19.9922"
                                                                    stroke="#6c757d" stroke-width="2"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                            <div class="s-tooltip">
                                                                <span>دیدگاه ها</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <button
                                                        wire:click="message({{ $post->id }} , {{ $trash }})"
                                                        class="d-flex justify-content-center bg-transparent ml-5">
                                                        <div class="image tooltip d-flex cursor-pointer">
                                                            <svg width="20" height="20" viewBox="0 0 31 31" fill="none"
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
                                                            <div class="s-tooltip">
                                                                <span>حذف</span>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        @empty
                                            @if ($readyToLoad)
                                                <div class="empty-data">
                                                    <div
                                                        class="main-empty d-flex flex-direction-column align-items-center">
                                                        <div class="image">
                                                            <img src="/img/gif/empty-data.gif" alt="empty" />
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                @foreach (range(1, 5) as $item)
                                                    <div class="d-detail placeholder-wave" x-data="{ showDrop: false }">
                                                        <div class="detail placeholder flex-6 m-flex-10">

                                                        </div>
                                                        <div class="detail placeholder flex-5 m-flex-15">

                                                        </div>
                                                        <div class="detail placeholder flex-13 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-15 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-10 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-10 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-10 m-flex-40">

                                                        </div>
                                                        <div class="detail placeholder flex-10 m-flex-40">

                                                        </div>
                                                        <div
                                                            class="detail placeholder d-flex flex-wrap sticky-table flex-20 m-flex-50">

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
                                                @foreach ($perPages as $count)
                                                    <x-parnas.inputs.option>
                                                        {{ $count }}
                                                    </x-parnas.inputs.option>
                                                @endforeach
                                            </x-parnas.inputs.select>
                                        </div>
                                    </div>
                                    <!-- ul pagination -->
                                    {{ count($posts) > 0 ? $posts->links() : '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('title', 'دوره ها')
