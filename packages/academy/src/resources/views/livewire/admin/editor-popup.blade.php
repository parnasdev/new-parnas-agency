<div>
    <x-parnas.modal :lg="true" :backDrop="true">
        <x-slot name="title">
            توضیحات
        </x-slot>
        <form wire:submit.prevent="submit">
            @if($show)
                <x-parnas.form-group class="mb-2" wire:ignore>
                    <x-parnas.inputs.editor id="editor" wire:model.debounce.1000ms="episode.description" />
                </x-parnas.form-group>
            @endif
            <x-parnas.form-group class="mb-2">
                <x-parnas.buttons.button class="btn btn-sm btn-primary" wire:loading.attr="disabled">
                    ثبت
                </x-parnas.buttons.button>
            </x-parnas.form-group>
        </form>
    </x-parnas.modal>
</div>
