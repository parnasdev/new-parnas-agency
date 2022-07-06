<div>
    <div class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 my-5 m-mx-5">
        <div class="dark-theme box-design bg-white flex-99 px-5 py-10">
            <div class="">
                <!--? row form  -->
                <div class="mx-10 m-mx-5 mb-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-3">
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center py-10">
                                    <div class="text">
                                        <h6>مشخصات تخفیف</h6>
                                    </div>
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle"></div>
                                        <div class="rx-border-rectangle-after"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form wire:submit.prevent="submit" class="m-pr-5">
                            <div class="d-flex pos-relative">

                                <div class="c-input flex-30 xl-flex-20">
                                    <!-- child -->
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            کد تخفیف
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <input type="text" wire:model.defer="discount.code" placeholder="روی دکمه کد تصادفی کلیک کنید">
                                    <div class="c-btn pos-absolute left-5" style="top:44%">
                                        <button type="button" class="btn bg-success text-white radius-5"
                                                wire:click="randomCode()">
                                            کد تصادفی
                                        </button>
                                    </div>
                                    @error('discount.code')
                                    <p class="text-danger alert-invalid f-12">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <x-parnas.inputs.date-time-picker wire:model.defer="discount.expire_date" :minDate="jdate()->format('Y/m/d')"   placeholder="تاریخ انقضا" />
                                @error('discount.expire_date')
                                <p class="text-danger alert-invalid f-12">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="c-input flex-49 m-flex-100" x-data>
                                    <!-- child -->
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            مقدار مبلغ مورد نظر
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <input type="text" x-mask:dynamic="$money($input)" wire:model.defer="discount.amount" max="{{ $discount->is_percent ? 100 : null }}" placeholder="مقدار">
                                    @error('discount.amount')
                                    <p class="text-danger alert-invalid f-12">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="c-input input-number-wrapper flex-49 m-flex-100" x-data="{
                                    num: @entangle('discount.use_time').defer,
                                    incInputNumber(step) {

                                        if (!$refs.numInput.disabled) {
                                            let val = +$refs.numInput.value;

                                            if (isNaN(val)) val = 0
                                                val += +step;

                                            if ($refs.numInput.max && val > $refs.numInput.max) {
                                                    val = $refs.numInput.max;
                                            } else if ($refs.numInput.min && val < $refs.numInput.min) {
                                                    val = $refs.numInput.min;
                                            } else if (val < 0) {
                                                    val = 0;
                                            }

                                            this.num = val
                                            console.log(this.num)
                                        }

                                    }

                                }">
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            تعداد استفاده هر کاربر
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <input type="number" x-model="num" x-ref="numInput" min="0"  placeholder="تعداد استفاده هر نفر">
                                    <div class="controller-number">
                                        <div class="increase d-flex image cursor-pointer mb-3" @click="incInputNumber(1)">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.5" y="0.5" width="15" height="15" rx="2.5" stroke="#CCD2E3" stroke-opacity="1.5"></rect>
                                                <path d="M4 8H12" stroke="#CCD2E3" stroke-opacity="1.5" stroke-linecap="round"></path>
                                                <line x1="8" y1="4.5" x2="8" y2="11.5" stroke="#CCD2E3" stroke-opacity="1.5" stroke-linecap="round"></line>
                                            </svg>
                                        </div>
                                        <div class="decrease d-flex image cursor-pointer mb-3" @click="incInputNumber(-1)">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.5" y="0.5" width="15" height="15" rx="2.5" stroke="#CCD2E3" stroke-opacity="1.5"></rect>
                                                <line x1="4.5" y1="8.5" x2="11.5" y2="8.5" stroke="#CCD2E3" stroke-opacity="1.5" stroke-linecap="round"></line>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('discount.use_time')
                                    <p class="text-danger alert-invalid f-12">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="c-input input-number-wrapper flex-49 m-flex-100" x-data="{
                                    num: @entangle('discount.max_user').defer,
                                    incInputNumber(step) {

                                        if (!$refs.numInput.disabled) {
                                            let val = +$refs.numInput.value;

                                            if (isNaN(val)) val = 0
                                                val += +step;

                                            if ($refs.numInput.max && val > $refs.numInput.max) {
                                                    val = $refs.numInput.max;
                                            } else if ($refs.numInput.min && val < $refs.numInput.min) {
                                                    val = $refs.numInput.min;
                                            } else if (val < 0) {
                                                    val = 0;
                                            }

                                            this.num = val
                                            console.log(this.num)
                                        }

                                    }

                                }">
                                    <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            تعداد استفاده
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <input type="number" x-model="num" x-ref="numInput" min="0"  placeholder="تعداد استفاده هر نفر">
                                    <div class="controller-number">
                                        <div class="increase d-flex image cursor-pointer mb-3" @click="incInputNumber(1)">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.5" y="0.5" width="15" height="15" rx="2.5" stroke="#CCD2E3" stroke-opacity="1.5"></rect>
                                                <path d="M4 8H12" stroke="#CCD2E3" stroke-opacity="1.5" stroke-linecap="round"></path>
                                                <line x1="8" y1="4.5" x2="8" y2="11.5" stroke="#CCD2E3" stroke-opacity="1.5" stroke-linecap="round"></line>
                                            </svg>
                                        </div>
                                        <div class="decrease d-flex image cursor-pointer mb-3" @click="incInputNumber(-1)">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.5" y="0.5" width="15" height="15" rx="2.5" stroke="#CCD2E3" stroke-opacity="1.5"></rect>
                                                <line x1="4.5" y1="8.5" x2="11.5" y2="8.5" stroke="#CCD2E3" stroke-opacity="1.5" stroke-linecap="round"></line>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('discount.max_user')
                                    <p class="text-danger alert-invalid f-12">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="checkbox-list justify-content-start flex-50 mb-10">
                                <label class="checkbox f-12">
                                    <input class="checkbox-input" type="checkbox" value="1"
                                           wire:model="discount.is_percent">
                                    <span class="checkbox-checkmark-box">
                                        <span class="checkbox-checkmark"></span>
                                    </span>
                                    {{ $discount->is_percent ? 'درصدی' : 'تومانی' }}
                                </label>
                            </div>
                            <div class="c-btn justify-content-end">
                                <button class="btn bg-success text-white radius-5">ثبت کد تخفیف</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
