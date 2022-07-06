<div>
    <x-parnas.modal>
        <x-slot name="title">
            <h5 class="modal-title">تغییر رمز عبور</h5>
        </x-slot>
        <form wire:submit.prevent="submit">
            <x-parnas.form-group class="c-input mb-2">
                <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                    <label for="password" class="d-flex f-12 text-63">
                        رمز عبور
                        <div class="rx-title title-input pb-10">
                            <div class="p-rx">
                                <div class="rx-border-rectangle-after label-input"></div>
                            </div>
                        </div>
                    </label>
                </div>
                <x-parnas.inputs.text class="form-control" wire:model.defer="password" id="password" />
                @error('password')
                <p>{{ $message }}</p>
                @enderror
            </x-parnas.form-group>
            <x-parnas.form-group class="c-btn justify-content-end my-10">
                <x-parnas.buttons.button class="btn bg-success text-white radius-5">
                    ثبت
                </x-parnas.buttons.button>
            </x-parnas.form-group>
        </form>
    </x-parnas.modal>
</div>
