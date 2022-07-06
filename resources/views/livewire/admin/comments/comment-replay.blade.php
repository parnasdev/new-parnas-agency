<div>
    <form wire:submit.prevent="submit">
    <x-parnas.modal>
        @if($comment != null)
            <div class="row g-1">
                <div class="col-md-12">
                    <p>
                        متن نظر:<br>
                        {{ $comment->body ?? '' }}
                    </p>
                </div>
               @if(is_null($comment->parent_id))
                    <div class="col-md-12">
                        <x-parnas.form-group class="c-input align-items-end flex-100 mr-8 mb-7">
                            <x-parnas.inputs.textarea placeholder="پاسخ نظر"  wire:model.defer="replay.body" />
                            @error('replay.body')
                            <p class="text-danger f-12 pt-7 m-left-auto">{{ $message }}</p>
                            @enderror
                        </x-parnas.form-group>
                    </div>
                @endif
            </div>
            @if(is_null($comment->parent_id))
            <x-slot name="actions">
                <x-parnas.form-group class="c-ancher ml-6">
                    <x-parnas.buttons.button class="ancher radius-7 bg-success text-white">
                        ثبت
                    </x-parnas.buttons.button>
                </x-parnas.form-group>
            </x-slot>
            @endif
        @endif
            <x-slot name="title">
                پاسخ دادن به نظر
            </x-slot>
    </x-parnas.modal>
    </form>
</div>
