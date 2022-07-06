<div>

    <form wire:submit.prevent="submit">
        <div
            class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 m-mx-5 my-5">
            <div class="dark-theme c-right box-design bg-white flex-70 px-5 py-10">
                <div class="mx-10 m-mx-5 mb-15">
                    <div class="c-data">
                        <div class="rx-title pb-3">
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center pb-10">
                                    <div class="text">
                                        <h6>جزئیات</h6>
                                    </div>
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle"></div>
                                        <div class="rx-border-rectangle-after"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-10">
                            <div class="p-table p-0">
                                <!--! table  -->
                                <div class="controller-table scroller">
                                    <!--? thead -->
                                    <div class="d-thead">
                                        <div class="head flex-37 m-flex-40">
                                            <span class="f-12 f-bold">عنوان</span>
                                        </div>
                                        <div class="head flex-17 m-flex-35">
                                            <span class="f-12 f-bold">قیمت(تومان)</span>
                                        </div>
                                        <div class="head flex-24 m-flex-40">
                                            <span class="f-12 f-bold">قیمت تخفیف خورده(تومان)</span>
                                        </div>
                                        <div class="head flex-20 m-flex-35">
                                            <span class="f-12 f-bold">قیمت کل(تومان)</span>
                                        </div>
                                    </div>
                                    <!--? tdetail  -->
                                    <div class="data">
                                        <!--? child(1)  -->
                                        @forelse($order->details()->get() as $detail)
                                            <div class="d-detail">
                                                <div class="detail flex-37 m-flex-40">
                                                    <span class="f-12">{{ $detail->post->title }}</span>
                                                </div>
                                                <div class="detail flex-17 m-flex-35">
                                                    <span class="f-12">{{ number_format($detail->price) }}</span>
                                                </div>
                                                <div class="detail flex-24 m-flex-40">
                                                    <span
                                                        class="f-12">{{ number_format($detail->special_price) }}</span>
                                                </div>
                                                <div class="detail flex-20 m-flex-35">
                                                    <span class="f-12">{{ number_format($detail->total_price) }}</span>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="empty-data">
                                                <div class="main-empty d-flex flex-direction-column align-items-center">
                                                    <div class="image">
                                                        <img src="/img/gif/empty-data.gif" alt="empty"/>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="c-left sticky-data box-design bg-white flex-28">
                <div class="mx-10 m-mx-5 mb-15">
                    <div class="c-data">
                        <div class="rx-title pb-3 pt-15">
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center pb-10">
                                    <div class="text">
                                        <h6>اطلاعات سفارش</h6>
                                    </div>
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle"></div>
                                        <div class="rx-border-rectangle-after"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="f-12 flex-100 mb-8 mr-7">
                                شماره فاکتور:
                                <span class="text-base-light pr-5">{{ $order->id }}</span>
                            </div>
                            <div class="f-12 flex-100 mb-8 mr-7">
                                قیمت کل:
                                <span class="text-base-light pr-5">{{ number_format($order->total_price) }}</span>
                                <span class="text-base-light">تومان</span>
                            </div>
                            <div class="f-12 flex-100 mb-8 mr-7">
                                نوع پرداخت:
                                <span class="text-base-light pr-5">
                                    @if($order->payment_type == 'cart')
                                        کارت به کارت
                                    @else
                                        {{ $order->payment_type }}
                                    @endif
                                </span>
                            </div>
                            @if($order->payment_type == 'cart')
                                <div class="f-12 flex-100 mb-8 mr-7">
                                    فایل ضمینه:
                                    @if(count($order->attachment ?? []) > 0)
                                        @foreach($order->attachment as $key => $attachment)
                                            <a class="text-base-light pr-5" href="{{ $attachment }}">دانلود فایل فاکتور({{ $key + 1 }})</a>
                                        @endforeach
                                    @else
                                        <span class="text-base-light pr-5">
                                            فایل هایی ارسال نشده
                                        </span>
                                    @endif

                                </div>
                            @endif
                            <div class="flex-100">
                                <div class="select mt-5">
                                    <x-parnas.inputs.select2 placeholder="بر اساس وضعیت" wire:model="order.status_id">
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
               <div class="d-flex justify-content-end mb-10">
                    <div class="m-flex-75 c-btn justify-content-end mx-8">
                        <button class="btn bg-success radius-5 text-white">
                            ثبت
                        </button>
                    </div>
                    <div class="m-flex-20 c-btn ml-7">
                        <a href="{{ route('admin.orders.index') }}" class="ancher bg-danger text-white radius-5">
                            برگشت
                        </a>
                    </div>
               </div>
            </div>
        </div>
    </form>
</div>
@push('title' , 'سفارش ها')
