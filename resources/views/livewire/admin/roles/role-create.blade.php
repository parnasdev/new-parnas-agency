<div>
    <div class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 my-5">
        <div class="dark-theme box-design bg-white flex-99 px-5 py-10">
            <div class="">
                <!--? row form  -->
                <div class="mx-5 mr-20 m-mr-5 mb-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-3">
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center pb-10">
                                    <div class="text">
                                        <h6>ایجاد مقام</h6>
                                    </div>
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle"></div>
                                        <div class="rx-border-rectangle-after"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-10">
                            <form wire:submit.prevent="submit">

                                <div class="d-flex align-items-start justify-content-start flex-wrap">
                                    <x-parnas.form-group class="c-input flex-48 mb-2 ml-20">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            نام
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                        <x-parnas.inputs.text class="form-control" id="name"
                                                              wire:model.defer="role.name"/>
                                        @error('role.name')
                                        <p class="text-danger alert-invalid f-12">{{ $message }}</p>
                                        @enderror
                                    </x-parnas.form-group>
                                    <x-parnas.form-group class="c-input flex-48 mb-2 mr-15 m-mr-0">
                                        <label for="useData" class="d-flex f-12 text-63">
                                            برچسب
                                            <div class="rx-title title-input pb-10">
                                                <div class="p-rx">
                                                    <div class="rx-border-rectangle-after label-input"></div>
                                                </div>
                                            </div>
                                        </label>
                                        <x-parnas.inputs.text id="label" class="form-control"
                                                              wire:model.defer="role.label"/>
                                        @error('role.label')
                                        <p class="text-danger alert-invalid f-12">{{ $message }}</p>
                                        @enderror
                                    </x-parnas.form-group>
                                    <div class="select-data flex-48 m-flex-50" wire:ignore>
                                        <div class="d-flex justify-content-start m-left-auto pos-relative pt-5 pr-7 pb-5">
                                            <label for="useData" class="d-flex f-12 text-63">
                                                دسترسی ها
                                                <div class="rx-title title-input pb-10">
                                                    <div class="p-rx">
                                                        <div class="rx-border-rectangle-after label-input"></div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <x-parnas.form-group class="select mb-2">
                                            <x-parnas.inputs.select2 class="form-select" id="permissions" multiple
                                                                     placeholder="انتخاب دسترسی" wire:model="permissionIds">
                                                @foreach($permissions as $permission)
                                                    <x-parnas.inputs.option :value="$permission->id">
                                                        {{ $permission->label }}
                                                    </x-parnas.inputs.option>
                                                @endforeach
                                            </x-parnas.inputs.select2>
                                            @error('role.label')
                                            <p class="text-danger alert-invalid f-12">{{ $message }}</p>
                                            @enderror
                                        </x-parnas.form-group>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start justify-content-start flex-wrap mt-30">
                                    <x-parnas.form-group class="checkbox-list justify-content-start mb-5 flex-100">
                                        <x-parnas.label class="checkbox f-12">
                                            <x-parnas.inputs.text class="checkbox-input" type="checkbox"
                                                                  wire:model="role.see_all_post"
                                                                  value="1"/>
                                            <span class="checkbox-checkmark-box">
                                                                    <span class="checkbox-checkmark"></span>
                                                                </span>
                                            نمایش همه پست ها
                                        </x-parnas.label>
                                        @error('role.see_all_post')
                                        <p>{{ $message }}</p>
                                        @enderror
                                    </x-parnas.form-group>
                                    <x-parnas.form-group class="checkbox-list justify-content-start mb-5 flex-100">
                                        <x-parnas.label class="checkbox f-12">
                                            <x-parnas.inputs.text class="checkbox-input" type="checkbox"
                                                                  wire:model="role.is_access_panel"
                                                                  value="1"/>
                                            <span class="checkbox-checkmark-box">
                                                                    <span class="checkbox-checkmark"></span>
                                                                </span>
                                            دسترسی به پنل                                    </x-parnas.label>
                                        @error('role.is_access_panel')
                                        <p>{{ $message }}</p>
                                        @enderror
                                    </x-parnas.form-group>
                                    <x-parnas.form-group class="checkbox-list justify-content-start mb-5 flex-100">
                                        <x-parnas.label class="checkbox f-12">
                                            <x-parnas.inputs.text class="checkbox-input" type="checkbox"
                                                                  wire:model="role.is_access_dashboard"
                                                                  value="1"/>
                                            <span class="checkbox-checkmark-box">
                                                                    <span class="checkbox-checkmark"></span>
                                                                </span>
                                            دسترسی به داشبورد</x-parnas.label>
                                        @error('role.is_access_dashboard')
                                        <p class="text-danger alert-invalid f-12">{{ $message }}</p>
                                        @enderror
                                    </x-parnas.form-group>
                                    <x-parnas.form-group class="checkbox-list justify-content-start mb-5 flex-100">
                                        <x-parnas.label class="checkbox f-12">
                                            <x-parnas.inputs.text class="checkbox-input" type="checkbox"
                                                                  wire:model="role.is_custom"
                                                                  value="1"/>
                                            <span class="checkbox-checkmark-box">
                                                                    <span class="checkbox-checkmark"></span>
                                                                </span>
                                            دسترسی به مسیر دیگر</x-parnas.label>
                                        @error('role.is_custom')
                                        <p class="text-danger alert-invalid f-12">{{ $message }}</p>
                                        @enderror
                                    </x-parnas.form-group>
                                </div>
                                <p class="f-12 text-danger">برای وارد کردن نام مسیر با تیم پشتیبانی پارناس تماس حاصل
                                    فرماید</p>
                                <x-parnas.form-group class="c-input mb-2">
                                    <label for="useData" class="d-flex f-12 text-63">
                                        نام مسیر
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                    <input id="access_route" name="access" class="form-control" id="access_route"
                                           wire:model.defer="role.custom_route_name_access" {{ !$role->is_custom ? 'disabled' : '' }}>
                                    @error('role.custom_route_name_access')
                                    <p class="text-danger alert-invalid f-12">{{ $message }}</p>
                                    @enderror
                                </x-parnas.form-group>
                                    <div class="c-btn justify-content-end mt-10">
                                        <x-parnas.buttons.button class="btn text-white radius-5 bg-success">
                                            ثبت مقام
                                        </x-parnas.buttons.button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('title' , 'مقام ها')
