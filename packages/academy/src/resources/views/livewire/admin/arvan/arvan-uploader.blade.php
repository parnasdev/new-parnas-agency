<div>
    <x-parnas.modal>
        <form wire:submit.prevent="submit">
            <x-parnas.form-group class="mb-2">
                <x-parnas.inputs.text class="form-control form-control-sm" wire:model.defer="request.video_url"/>
                <x-parnas.buttons.link class="btn-primary btn btn-sm" href="{{ url('/file-manager/fm-button') }}" x-init="
        $($el).fancybox({
            'type'		: 'iframe',
            'autoScale'    	: false
        });
        window.addEventListener('my_event', function(e) {
            let {url} = e.detail
            let array = url.split('/');
            $wire.set('request.video_url' , url)
            $.fancybox.close();
         }, false);
        ">
                    انتخاب فایل
                </x-parnas.buttons.link>
            </x-parnas.form-group>
            <x-parnas.buttons.button type="button" wire:click="storeVideo()" wire:loading.attr="disabled" wire:target="storeVideo" class="btn-primary btn btn-sm">
                شروع آپلود
            </x-parnas.buttons.button>
            <x-parnas.form-group class="mb-2">
                <x-parnas.label>شناسه ویدیو</x-parnas.label>
                <ul>
                    @foreach($videos as $video)
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model.defer="file.url" value="{{ $video->id }}" id="{{ $video->id }}">
                                <label class="form-check-label" for="{{ $video->id }}">
                                    {{ $video->title }}
                                </label>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </x-parnas.form-group>
            <x-parnas.buttons.button class="btn-primary btn btn-sm">
                ذخیره شناسه
            </x-parnas.buttons.button>
        </form>
    </x-parnas.modal>
</div>
