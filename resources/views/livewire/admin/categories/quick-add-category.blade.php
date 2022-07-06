<div>
        <div class="c-input">
            <!-- child -->
            <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                <label for="useData" class="d-flex f-12 text-63">
                    عنوان دسته بندی
                    <div class="rx-title title-input pb-10">
                        <div class="p-rx">
                            <div class="rx-border-rectangle-after label-input"></div>
                        </div>
                    </div>
                </label>
            </div>
            <input type="text" placeholder="عنوان دسته بندی" wire:model.defer="nCategory.name"/>
            @error('nCategory.name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <!-- parent -->
        <div class="flex-100 selective-custom justify-content-start mb-13">
            <!-- child -->
            <div class="d-flex justify-content-start m-left-auto pos-relative pr-10">
                <label for="useData" class="d-flex f-12 text-63">
                    نوع دسته بندی
                    <div class="rx-title title-input pb-10">
                        <div class="p-rx">
                            <div class="rx-border-rectangle-after label-input"></div>
                        </div>
                    </div>
                </label>

            </div>
            <div class="select mt-5">
                <x-parnas.form-group class="select align-items-end flex-100 mb-15" wire:ignore>
                    <x-parnas.inputs.select2 placeholder="نوع دسته بندی" class="form-select" id="parent_id"
                                             wire:model.defer="nCategory.parent_id">
                        <x-parnas.inputs.option :value="null">
                            دسته بندی اصلی
                        </x-parnas.inputs.option>
                        @foreach($categories as $category)
                            <x-parnas.inputs.option :value="$category->id">
                                {{ $category->name }}
                            </x-parnas.inputs.option>
                        @endforeach
                    </x-parnas.inputs.select2>
                    @error('nCategory.parent_id')
                    <p>{{ $message }}</p>
                    @enderror
                </x-parnas.form-group>
            </div>
        </div>

        <div class="flex-100 selective-custom justify-content-start">
            <!-- child -->
            <div class="d-flex justify-content-start m-left-auto pos-relative pr-10">
                <label for="useData" class="d-flex f-12 text-63">
                    زبان
                    <div class="rx-title title-input pb-10">
                        <div class="p-rx">
                            <div class="rx-border-rectangle-after label-input"></div>
                        </div>
                    </div>
                </label>
            </div>
            <x-parnas.form-group class="select align-items-end flex-100 mt-5" wire:ignore>
                <x-parnas.inputs.select2 placeholder="زبان دسته بندی" class="form-select" id="lang"
                                         wire:model.defer="nCategory.lang">
                    <x-parnas.inputs.option value="fa">
                        فارسی
                    </x-parnas.inputs.option>
                    <x-parnas.inputs.option value="en">
                        انگلیسی
                    </x-parnas.inputs.option>
                </x-parnas.inputs.select2>
                @error('nCategory.lang')
                <p>{{ $message }}</p>
                @enderror
            </x-parnas.form-group>
        </div>

        <div class="c-btn justify-content-end pt-10">
            <button class="btn bg-success text-white radius-5" type="button" wire:click="submit">ثبت دسته بندی</button>
        </div>
</div>
