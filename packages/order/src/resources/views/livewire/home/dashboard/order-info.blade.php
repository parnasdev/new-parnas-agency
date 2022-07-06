<div>
    <div class="container px-0">
        <div class="col-md-12 border-bottom-0 border-top-0 border-end-0 border-start-1">
            <div class="title-courses-dashboard justify-content-between">
                <div class="d-flex">
                    <i class="icon-circle"></i>
                    <h2>فاکتور ها</h2>
                </div>
            </div>
            <div class="courses-dashboard">
                <div class="list-courses-dashboard list-factor">
                    <div class="header-factor">
                        <span>شماره فاکتور</span>
                        <span>قیمت فاکتور</span>
                        <span>وضعیت فاکتور</span>
                        <span>نوع پرداخت</span>
                    </div>
                    <div class="body-factor">
                        <span>#{{ $order->id }}</span>
                        <span>{{ number_format($order->total_price) . 'تومان' }}</span>
                        <span>{{ $order->status->label }}</span>
                        <span>
                                @if ($order->payment_type == 'cart')
                                کارت به کارت
                            @else
                                {{ $order->payment_type }}
                            @endif
                            </span>
                    </div>
                </div>
            </div>
            @if ($order->payment_type == 'cart')
                <div class="d-flex flex-column align-items-start text-dark pb-2 pt-4">
                    فایل رسید:
                        <div x-data="{
                                photos: [],
                                isUpload: false,
                                progress: 0,
                                uploadFile() {
                                    $wire.uploadMultiple(
                                        'photos',
                                        $refs.uploader.files,
                                        finishCallback = (uploadedFilenames) => {
                                            $wire.uploadFiles().then(result => {
                                                this.isUpload = false;
                                            })
                                        },
                                        errorCallback = () => {},
                                        progressCallback = (event) => {
                                            this.isUpload = true;
                                            this.progress = event.detail.progress
                                        }
                                    )
                                }
                            }">
                            <input type="file" multiple x-ref="uploader">
                            <button class="btn-list-courses" @click="uploadFile()">
                                ثبت
                            </button>
                            <div x-show="isUpload">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                            @error('photos')
                            <p class="text-danger small mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        @foreach ($order->attachment ?? [] as $key => $attachment)
                            <a class="text-info ps-3" href="{{ $attachment }}">دانلود فایل
                                رسید({{ $key + 1 }})</a>
                        @endforeach
                </div>
            @endif
        </div>
        <div class="row g-1">
            <div class="col-md-12">
                <div class="courses-dashboard">
                    <div class="list-courses-dashboard list-factor">
                        <div class="header-factor">
                            <span>عنوان</span>
                            <span>قیمت(تومان)</span>
                            <span>قیمت تخفیف خورده(تومان)</span>
                            <span>قیمت کل(تومان)</span>
                        </div>
                        @foreach ($order->details ?? [] as $item)
                            <div class="body-factor">
                                <span>{{ $item->post->title }}</span>
                                <span>{{ number_format($item->price) . 'تومان' }}</span>
                                <span>{{ number_format($item->special_price) . 'تومان' }}</span>
                                <span>{{ number_format($item->total_price) . 'تومان' }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('title' , 'فاکتور ها')
