<div>
    <x-parnas.modal name="editFileUpdate">
        <x-slot name="title">
            <h5 class="modal-title">ویرایش تصویر</h5>
        </x-slot>
        <form wire:submit.prevent="submit">
            <x-parnas.form-group class="d-flex justify-content-center">
                <img src="{{ $file['url'] }}" width="80" alt="">
            </x-parnas.form-group>
            <x-parnas.form-group class="c-input align-items-end flex-100">
                <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                    <label class="d-flex f-12 text-63">
                       متن جایگزین
                        <div class="rx-title title-input pb-10">
                            <div class="p-rx">
                                <div class="rx-border-rectangle-after label-input"></div>
                            </div>
                        </div>
                    </label>
                </div>
                <x-parnas.inputs.text class="form-control form-control-sm" id="alt"
                                      wire:model.defer="file.alt"/>
                @error('file.alt')
                <p class="text-danger f-12 m-right-auto alert-invalid">{{ $message }}</p>
                @enderror
            </x-parnas.form-group>
            <div>
                <div class="d-flex justify-content-start m-left-auto pos-relative pr-10 pb-5">
                    <label class="d-flex f-12 text-63">
                       انتخاب نوع
                        <div class="rx-title title-input pb-10">
                            <div class="p-rx">
                                <div class="rx-border-rectangle-after label-input"></div>
                            </div>
                        </div>
                    </label>
                </div>
                <x-parnas.form-group class="select mb-2">
                    <x-parnas.inputs.select
                                            wire:model.defer="file.type">
                        <x-parnas.inputs.option value="{{ null }}">انتخاب نوع</x-parnas.inputs.option>
                        <x-parnas.inputs.option value="1">عکس شاخص</x-parnas.inputs.option>
                        <x-parnas.inputs.option value="2">گالری</x-parnas.inputs.option>
                        <x-parnas.inputs.option value="3">فایل</x-parnas.inputs.option>
                    </x-parnas.inputs.select>
                    @error('file.type')
                    <p class="text-danger f-12 m-right-auto alert-invalid">{{ $message }}</p>
                    @enderror
                </x-parnas.form-group>
            </div>
            <x-parnas.form-group class="c-btn justify-content-end mb-2 mt-10">
                <x-parnas.buttons.button class="btn bg-success text-white radius-5"
                                         type="submit"
                                         wire:loading.attr="disabled" wire:target="upload"
                >
                    ویرایش
                </x-parnas.buttons.button>
            </x-parnas.form-group>
        </form>
    </x-parnas.modal>
</div>
