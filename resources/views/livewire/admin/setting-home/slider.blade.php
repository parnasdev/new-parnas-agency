<div>
    <div class="mx-10">
        <div>
            <div class="d-flex justify-content-start m-left-auto pos-relative pr-10 pb-5">
                <label for="useData" class="d-flex f-12 text-63">
                   تصویر
                    <div class="rx-title title-input pb-10">
                        <div class="p-rx">
                            <div class="rx-border-rectangle-after label-input"></div>
                        </div>
                    </div>
                </label>
            </div>
            <x-parnas.inputs.file :file="$file['url']" model="file.url">
                @error('file.url')
                <p>{{ $message }}</p>
                @enderror
            </x-parnas.inputs.file>
        </div>
        <x-parnas.form-group class="c-input align-items-end flex-100 mt-10">
            <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                <label for="useData" class="d-flex f-12 text-63">
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
            <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
            @enderror
        </x-parnas.form-group>
        <x-parnas.form-group class="c-input align-items-end flex-100 mt-10">
            <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
                <label for="useData" class="d-flex f-12 text-63">
                    لینک
                    <div class="rx-title title-input pb-10">
                        <div class="p-rx">
                            <div class="rx-border-rectangle-after label-input"></div>
                        </div>
                    </div>
                </label>
            </div>
            <x-parnas.inputs.text class="form-control form-control-sm" id="alt"
                                  wire:model.defer="file.link"/>
            @error('file.link')
            <p class="text-danger f-12 pt-7 m-left-auto alert-invalid">{{ $message }}</p>
            @enderror
        </x-parnas.form-group>
        <x-parnas.form-group class="c-btn flex-100 justify-content-between py-8">
            <x-parnas.buttons.button class="btn flex-48 bg-success text-white radius-5 ml-5"
                                     type="button" wire:click="upload"
                                     wire:loading.attr="disabled" wire:target="upload"
            >
                ثبت
            </x-parnas.buttons.button>
            <x-parnas.buttons.button class="btn flex-48 bg-danger text-white radius-5 mr-5"
                                     type="button" wire:click="resetForm"
                                     wire:loading.attr="disabled" wire:target="resetForm"
            >
                لغو
            </x-parnas.buttons.button>
        </x-parnas.form-group>

       <div>
            <div class="line-horizontal bg-orange"></div>
       </div>

        <ul class="list-unstyled list-inline">
            <li class="f-12 mb-8">
                گالری
            </li>
            @foreach($files as $key => $_file)
                <li class="list-inline-item">
                    @php
                        $path = str_replace(env('APP_URL') . '/storage' , 'public' , $_file['url']);
                        $fs = '';
                        if (\Illuminate\Support\Facades\Storage::exists($path)){
                         $fs = \Illuminate\Support\Facades\Storage::mimeType($path);
                        }
                    @endphp
                    @switch($fs)
                        @case(\Illuminate\Support\Str::startsWith($fs , 'image'))
                        <img src="{{ $_file['url'] }}" width="80" alt="{{ $_file['alt'] }}">
                        @break
                        @default
                        <a href="{{ $_file['url'] }}">فایل</a>
                    @endswitch
                    <x-parnas.buttons.button type="button"
                                             class="btn btn-sm btn-danger"
                                             wire:click="deleteFile({{ $key }})"
                                             wire:loading.attr="disabled" wire:target="deleteFile">
                        <i class="fas fa-times"></i>
                    </x-parnas.buttons.button>
                    <x-parnas.buttons.button type="button"
                                             class="btn btn-sm btn-primary"
                                             wire:click="editFile({{ $key }})"
                                             wire:loading.attr="disabled" wire:target="deleteFile , editFile">
                        <i class="fas fa-edit"></i>
                    </x-parnas.buttons.button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
