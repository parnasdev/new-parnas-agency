<div>
    <form wire:submit.prevent="submit">
        <div
            class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 my-5">
            <div class="box-design bg-white flex-99 m-flex-100 px-5 py-10">
                <div class="c-data mx-10 m-mx-5 mb-15">
                    <!--! title  -->
                    <div class="rx-title pb-10">
                        <div class="flex-100 d-flex justify-content-between">
                            <div class="title d-flex align-items-center pt-7">
                                <div class="text">
                                    <h6>توضیحات ویدیو</h6>
                                </div>
                                <div class="p-rx">
                                    <div class="rx-border-rectangle"></div>
                                    <div class="rx-border-rectangle-after"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--! data form  -->
                    <div class="my-10">
                        <x-parnas.form-group class="mb-2">
                            <!-- child -->
                            <div class="d-flex justify-content-start m-left-auto pos-relative pr-10">
                                <label for="body" class="d-flex f-12 text-dark">
                                    {{ $episode->title }}
                                    <div class="rx-title title-input pb-10">
                                        <div class="p-rx">
                                            <div class="rx-border-rectangle-after label-input"></div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </x-parnas.form-group>

                        <x-parnas.form-group class="mb-2" wire:ignore>
                            <!-- child -->
                            <div class="d-flex justify-content-start m-left-auto pos-relative pr-10 mr-10 pb-5">
                                <label for="body" class="d-flex f-12 text-63">
                                    متن
                                    <div class="rx-title title-input pb-10">
                                        <div class="p-rx">
                                            <div class="rx-border-rectangle-after label-input"></div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <x-parnas.inputs.editor rows="5" class="form-control" name="episode.description" id="body"
                                                    wire:model.debounce.1000ms="episode.description"/>
                            @error('episode.description')
                            <p>{{ $message }}</p>
                            @enderror
                        </x-parnas.form-group>

                        <x-parnas.form-group class="mt-10 mb-2">
                            <div class="c-btn justify-content-end pb-5">
                                <button
                                   class="btn btn-effect bg-success text-white radius-5">
                                    <div class="circle-solid top-right bg-white"></div>
                                     اعمال تغییرات</button>
                            </div>
                        </x-parnas.form-group>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
