<div>
    <form wire:submit.prevent="submit">
        <div
            class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 my-5 m-mx-5">
            <div class="box-design flex-99 bg-white px-5 py-10">
                <div class="mx-10 m-mx-5 mb-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title py-10">
                            <div class="text">
                                <h6>مشخصات دوره</h6>
                            </div>
                            <div class="p-rx ">
                                <div class="rx-border-rectangle"></div>
                                <div class="rx-border-rectangle-after"></div>
                            </div>
                        </div>
                        <div class="my-10">
                            <x-parnas.form-group class="">
                                <label class="checkbox f-12">
                                    <input class="checkbox-input" type="checkbox" value="1" id="rial" wire:model="setting.rial">
                                    <span class="checkbox-checkmark-box">
                                            <span class="checkbox-checkmark"></span>
                                        </span>
                                    {{ $setting['rial'] ? 'ریال':'تومان' }}
                                </label>
                            </x-parnas.form-group>
                            <div class="mt-10">
                                <div class="d-flex justify-content-start m-left-auto pos-relative pt-5 pr-10">
                                    <label for="useData" class="d-flex f-12 text-63">
                                        تاریخ انقضای دوره های خریداری شده
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <x-parnas.form-group class="select flex-40 m-flex-100 mt-10">
                                    <x-parnas.inputs.select id="courses" class="form-select" wire:model.defer="setting.expireLearning.value">
                                        <x-parnas.inputs.option :value="null">
                                            تاریخ انقضای دوره های خریداری شده
                                        </x-parnas.inputs.option>
                                        @foreach($setting['expireLearning']['enums'] as $enum)
                                            <x-parnas.inputs.option :value="$enum['value']">
                                                {{ $enum['text'] }}
                                            </x-parnas.inputs.option>
                                        @endforeach
                                    </x-parnas.inputs.select>
                                </x-parnas.form-group>
                            </div>

                            <x-parnas.form-group class="c-btn justify-content-end py-8 pr-8">
                                <x-parnas.buttons.button class="btn bg-primary text-white radius-5">
                                    اعمال تغییرات
                                </x-parnas.buttons.button>
                            </x-parnas.form-group>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
