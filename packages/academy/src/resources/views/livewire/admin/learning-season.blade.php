<div>
    <x-parnas.modal>
        <x-slot name="title">
            ویرایش فصل ها
        </x-slot>
        <form wire:submit.prevent="submit">
            <ul class="pr-10">
                @foreach($seasons as $season)
                    <li class="pb-5">
                        <label class="checkbox f-12">
                            <input class="checkbox-input" type="checkbox" value="{{ $season->id }}" wire:model.defer="learning.season_unlock">
                            <span class="checkbox-checkmark-box">
                                <span class="checkbox-checkmark"></span>
                            </span>
                            {{ $season->name }}
                        </label>
                    </li>
                @endforeach
            </ul>

            <x-parnas.form-group class="mt-10 mb-2">
                <div class="c-btn justify-content-end pb-5">
                    <button
                       class="btn btn-effect bg-primary text-white radius-5">
                        <div class="circle-solid top-right bg-white"></div>
                         اعمال تغییرات</button>
                </div>
            </x-parnas.form-group>
        </form>
    </x-parnas.modal>
</div>
