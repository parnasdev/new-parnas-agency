<div>
    <div class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 m-mx-5 my-5">
        <!--! c-right -->
        <x-parnas.spinners :full="true" wire:loading
                           wire:target="status , gotoPage , previousPage , nextPage , changeStatus , selectedAction , delete , forceDelete , selected , cStatus , changeCourseStatus"/>
        <div class="dark-theme box-design bg-white flex-99 px-5 py-10">
            <div class="">
                <!--? row form  -->
                <div class="mx-10 m-mx-5 m-ml-0 mb-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-3">
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center pb-10">
                                    <div class="text">
                                        <h6>لیست پرداخت ها</h6>
                                    </div>
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle"></div>
                                        <div class="rx-border-rectangle-after"></div>
                                    </div>
                                </div>
                                <div class="c-group-btn d-flex flex-wrap justify-content-start">
                                    <div class="c-btn pb-5">
                                        <a href="{{ route('admin.payments.setting' , ['type' => 'post']) }}" class="ancher btn-effect bg-warning text-white radius-5">
                                            <div class="circle-solid top-right bg-white"></div>
                                            <svg class="pl-3" width="17" height="17" viewBox="0 0 1024 1024" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M600.703 64C607.478 64.0002 614.078 66.1506 619.553 70.1416C625.027 74.1326 629.094 79.7581 631.167 86.208L666.367 195.584C681.151 202.816 695.295 210.944 708.799 220.096L821.183 195.904C827.809 194.489 834.714 195.214 840.901 197.975C847.089 200.735 852.241 205.388 855.615 211.264L944.319 364.8C947.706 370.672 949.141 377.469 948.416 384.209C947.692 390.95 944.845 397.286 940.287 402.304L863.167 487.424C864.29 503.746 864.29 520.126 863.167 536.448L940.287 621.696C944.845 626.714 947.692 633.05 948.416 639.791C949.141 646.531 947.706 653.328 944.319 659.2L855.615 812.8C852.232 818.664 847.076 823.304 840.889 826.053C834.702 828.801 827.803 829.517 821.183 828.096L708.799 803.904C695.359 812.992 681.151 821.184 666.431 828.416L631.167 937.792C629.094 944.242 625.027 949.867 619.553 953.858C614.078 957.849 607.478 960 600.703 960H423.295C416.52 960 409.92 957.849 404.446 953.858C398.971 949.867 394.904 944.242 392.831 937.792L357.695 828.48C342.951 821.27 328.729 813.037 315.135 803.84L202.815 828.096C196.189 829.511 189.285 828.786 183.097 826.025C176.909 823.265 171.757 818.612 168.383 812.736L79.6791 659.2C76.2919 653.328 74.8572 646.531 75.5818 639.791C76.3065 633.05 79.1531 626.714 83.7111 621.696L160.831 536.448C159.714 520.168 159.714 503.832 160.831 487.552L83.7111 402.304C79.1531 397.286 76.3065 390.95 75.5818 384.209C74.8572 377.469 76.2919 370.672 79.6791 364.8L168.383 211.2C171.766 205.336 176.922 200.696 183.109 197.947C189.296 195.199 196.196 194.483 202.815 195.904L315.135 220.16C328.703 211.008 342.911 202.752 357.695 195.52L392.895 86.208C394.961 79.7789 399.009 74.1682 404.458 70.1792C409.907 66.1902 416.478 64.0272 423.231 64H600.639H600.703ZM577.279 128H446.719L410.367 241.088L385.855 253.056C373.805 258.953 362.173 265.667 351.039 273.152L328.383 288.512L212.159 263.424L146.879 376.576L226.559 464.768L224.639 491.904C223.72 505.286 223.72 518.714 224.639 532.096L226.559 559.232L146.751 647.424L212.095 760.576L328.319 735.552L350.975 750.848C362.109 758.333 373.741 765.047 385.791 770.944L410.303 782.912L446.719 896H577.407L613.887 782.848L638.335 770.944C650.372 765.061 661.984 758.346 673.087 750.848L695.679 735.552L811.967 760.576L877.247 647.424L797.503 559.232L799.423 532.096C800.346 518.693 800.346 505.243 799.423 491.84L797.503 464.704L877.311 376.576L811.967 263.424L695.679 288.384L673.087 273.152C661.985 265.652 650.373 258.937 638.335 253.056L613.887 241.152L577.343 128H577.279ZM511.999 320C562.921 320 611.757 340.229 647.764 376.236C683.771 412.242 703.999 461.078 703.999 512C703.999 562.922 683.771 611.758 647.764 647.765C611.757 683.772 562.921 704 511.999 704C461.078 704 412.242 683.772 376.235 647.765C340.228 611.758 319.999 562.922 319.999 512C319.999 461.078 340.228 412.242 376.235 376.236C412.242 340.229 461.078 320 511.999 320V320ZM511.999 384C478.051 384 445.494 397.486 421.489 421.49C397.485 445.495 383.999 478.052 383.999 512C383.999 545.948 397.485 578.505 421.489 602.51C445.494 626.514 478.051 640 511.999 640C545.947 640 578.504 626.514 602.509 602.51C626.513 578.505 639.999 545.948 639.999 512C639.999 478.052 626.513 445.495 602.509 421.49C578.504 397.486 545.947 384 511.999 384V384Z" fill="#fff"></path>
                                            </svg>
                                            تنظیمات</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--! data form  -->
                        <div class="my-10">
                            <!-- parent -->
                            <div class="p-table p-0">
                                <div class="controller-filters">
                                    <!--! filter  -->
                                    <div class="filters d-flex flex-wrap justify-content-between mb-0">
                                        <div class="c-filters flex-100">
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
                                            <!--? select -->
                                            <div class="select-data flex-20 m-flex-50">
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
                                    <div class="info-data" style="justify-content: flex-end">
                                        <!--! Result  -->
                                        <div class="result">
                                            <span class="f-12 text-info">تعداد اطلاعات :</span>
                                            <span class="f-12 px-6">{{ count($transactions) > 0 ? $transactions->total() : '0' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!--! table  -->
                                <div class="controller-table scroller">
                                    <!--? thead -->
                                    <div class="d-thead">
                                        <div class="head flex-5 m-flex-20">
                                            <span class="f-12 f-bold">شناسه</span>
                                        </div>
                                        <div class="head flex-20 m-flex-35">
                                            <span class="f-12 f-bold">قیمت</span>
                                        </div>
                                        <div class="head flex-27 m-flex-35">
                                            <span class="f-12 f-bold">تاریخ ورود به درگاه</span>
                                        </div>
                                        <div class="head flex-27 m-flex-35">
                                            <span class="f-12 f-bold">تاریخ خروج از درگاه</span>
                                        </div>
                                        <div class="head flex-20 m-flex-35">
                                            <span class="f-12 f-bold">وضعیت</span>
                                        </div>
                                    </div>
                                    <!--? tdetail  -->
                                    <div class="data" wire:init="loadTransactions">
                                        <!--? child(1)  -->
                                        @forelse($transactions as $transaction)
                                            <div class="d-detail">
                                                <div class="detail flex-5 m-flex-20">
                                                    <span class="f-12">{{ $transaction->id }}</span>
                                                </div>
                                                <div class="detail flex-20 m-flex-35">
                                                    <span class="f-12">{{ number_format($transaction->amount) }}</span>
                                                </div>
                                                <div class="detail flex-27 m-flex-35">
                                                    <span class="f-12">{{ jdate($transaction->enter_port_at)->format('Y-m-d H:i') }}</span>
                                                </div>
                                                <div class="detail flex-27 m-flex-35">
                                                    <span class="f-12">{{ jdate($transaction->exit_port_at)->format('Y-m-d H:i') }}</span>
                                                </div>
                                                <div class="detail flex-20 m-flex-35">
                                                   <span class="f-12 {{ $transaction->status_id === getStatus('successful') ? 'bg-success': 'bg-danger' }} radius-5 text-white text-align-center" style="width:50%;padding: 7px 10px">{{ $transaction->status->label }}</span>
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
                                                        <div class="detail placeholder flex-5 m-flex-20">

                                                        </div>
                                                        <div class="detail placeholder flex-20 m-flex-35">

                                                        </div>
                                                        <div class="detail placeholder flex-27 m-flex-35">

                                                        </div>
                                                        <div class="detail placeholder flex-27 m-flex-35">

                                                        </div>
                                                        <div class="detail placeholder flex-20 m-flex-35">

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
                                    {{ count($transactions) > 0 ? $transactions->links() : '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
