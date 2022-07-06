<div class="form-contact-us">
    <form wire:submit.prevent="submit">
        @if(!empty($form))
            @foreach($form->inputs ?? [] as $input)
                @if($input['controlType'] == 'textbox')
                    <x-form::inputs.text id="{{ $input['id'] }}" wire:model.defer="formControls.{{ $input['id'] }}" type="{{ $input['type'] }}">
                        <x-slot name="icon">
                            {!! $input['icon'] !!}
                        </x-slot>
                        <x-slot name="label">
                            {!! $input['label'] !!}
                        </x-slot>
                    </x-form::inputs.text>
                @elseif($input['controlType'] == 'textarea')
                    <x-form::inputs.textarea id="{{ $input['id'] }}" wire:model.defer="formControls.{{ $input['id'] }}" row="10">
                        <x-slot name="icon">
                            {!! $input['icon'] !!}
                        </x-slot>
                        <x-slot name="label">
                            {!! $input['label'] !!}
                        </x-slot>
                    </x-form::inputs.textarea>
                @endif
            @endforeach

            <x-form::button>
                {{ $btnText }}
            </x-form::button>
        @endif
    </form>

</div>
