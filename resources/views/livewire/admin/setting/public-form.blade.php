<div>
    <form wire:submit.prevent="submit" x-data="{
        changeTab: @entangle('settingTab')
    }">
        <div class="c-group-btn d-flex flex-wrap justify-content-start">
            <div class="c-btn ml-7 pb-5">
                <button type="button" class="ancher btn-effect text-white bg-info radius-5" @click="changeTab = 'seo'" :class="{'bg-secondary': changeTab==='seo'}">
                    <div class="circle-solid top-right bg-white"></div>
                    سئو
                </button>
            </div>
            <div class="c-btn ml-7 pb-5">
                <button type="button" class="ancher btn-effect text-white bg-info radius-5" @click="changeTab = 'file'" :class="{'bg-secondary': changeTab==='file'}">
                    <div class="circle-solid top-right bg-white"></div>
                    آدرس فایل ها
                </button>
            </div>

            <div class="c-btn ml-7 pb-5">
                <button type="button" class="ancher btn-effect text-white bg-info radius-5" @click="changeTab = 'logo'" :class="{'bg-secondary': changeTab==='logo'}">
                    <div class="circle-solid top-right bg-white"></div>
                    لوگو و فایکون
                </button>
            </div>

            <div class="c-btn ml-7 pb-5">
                <button type="button" class="ancher btn-effect text-white bg-info radius-5" @click="changeTab = 'footer'" :class="{'bg-secondary': changeTab==='footer'}">
                    <div class="circle-solid top-right bg-white"></div>
                    فوتر
                </button>
            </div>
        </div>
        <div x-show="changeTab == 'seo'">
            <div class="d-flex flex-wrap">
                <div class="flex-30 m-flex-100 ml-10">
                    <x-parnas.form-group class="c-input mb-2">
                        <div class="d-flex justify-content-start m-left-auto pos-relative">
                            <label class="d-flex f-12 text-63">
                                <x-parnas.label class="f-12">عنوان کوتاه سایت</x-parnas.label>
                                <div class="rx-title title-input pb-10">
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle-after label-input"></div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <x-parnas.inputs.text class="form-control" wire:model.defer="setting.siteTitle"/>
                    </x-parnas.form-group>
                </div>
                <div class="flex-30 m-flex-100 ml-10">
                    <x-parnas.form-group class="c-input mb-2">
                        <div class="d-flex justify-content-start m-left-auto pos-relative">
                            <label class="d-flex f-12 text-63">
                                <x-parnas.label class="f-12">جداکننده</x-parnas.label>
                                <div class="rx-title title-input pb-10">
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle-after label-input"></div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <x-parnas.inputs.text class="form-control" wire:model.defer="setting.separator"/>
                    </x-parnas.form-group>
                </div>
                <div class="flex-30 m-flex-100 ml-10">
                    <x-parnas.form-group class="c-input mb-2">
                        <div class="d-flex justify-content-start m-left-auto pos-relative">
                            <label class="d-flex f-12 text-63">
                                <x-parnas.label class="f-12">عنوان بلند سایت</x-parnas.label>
                                <div class="rx-title title-input pb-10">
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle-after label-input"></div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <x-parnas.inputs.text class="form-control" wire:model.defer="setting.siteLongTitle"/>
                    </x-parnas.form-group>
                </div>
                <div class="flex-100 mb-10">
                    <x-parnas.form-group class="c-input mb-2">
                        <div class="d-flex justify-content-start m-left-auto pos-relative">
                            <label class="d-flex f-12 text-63">
                                <x-parnas.label class="f-12">توضیحات</x-parnas.label>
                                <div class="rx-title title-input pb-10">
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle-after label-input"></div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <x-parnas.inputs.textarea rows="5" class="form-control"
                                                  wire:model.defer="setting.siteDescription"/>
                    </x-parnas.form-group>
                </div>
                <div class="flex-100 mb-10" x-data="{
                metaTags: @entangle('setting.metas').defer,
                addMeta() {
                    this.metaTags.push({text:''});
                },
                removeMeta(index) {
                    this.metaTags.splice(index , 1);
                }
            }">
                    <x-parnas.form-group class="mb-2">
                        <x-parnas.label class="f-12 f-bold">متا تگ ها</x-parnas.label>
                        <div class="c-btn justify-content-end p-8">
                            <button class="btn bg-success text-white radius-5" type="button" @click="addMeta()">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <template x-for="(tag , index) in metaTags">
                            <div class="d-flex flex-wrap mb-2">
                                <div class="c-input flex-70">
                                    <x-parnas.inputs.text x-model="tag.text"/>
                                </div>
                                <div class="flex-20 m-right-auto">
                                    <div class="c-btn justify-content-start pr-8 pb-8">
                                        <button class="btn bg-danger text-white radius-5" type="button"
                                                @click="removeMeta(index)">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </x-parnas.form-group>
                </div>
            </div>
        </div>

        <div x-show="changeTab == 'file'">
            <div class="d-flex flex-warp justify-content-start">
                <div class="c-btn flex-100 justify-content-center mt-10">
                    <button type="button" class="btn bg-danger radius-5 text-white" wire:click="syncUrls()">سینک کردن آدرس
                        ها
                    </button>
                </div>
            </div>
        </div>

        <div x-show="changeTab == 'logo'">
            <div class="d-flex flex-wrap justify-content-start">
                <div class="flex-47 ml-15">
                    <p class="f-12 text-danger">نکته: اگر دو نوع لوگو نداشته اید فقط کافی هست لوگو روشن انتخاب کنید</p>
                    <x-parnas.form-group class="mb-2">
                        <x-parnas.label class="f-12 f-bold">لوگو های سایت</x-parnas.label>
                        <br>
                        <x-parnas.label class="f-12">لوگو روشن</x-parnas.label>
                        <x-parnas.inputs.file :file="$setting['siteLogos']['light']" model="setting.siteLogos.light"/>
                        <x-parnas.label class="f-12">لوگو تاریک</x-parnas.label>
                        <x-parnas.inputs.file :file="$setting['siteLogos']['dark']" model="setting.siteLogos.dark"/>
                    </x-parnas.form-group>
                </div>
                <div class="flex-47 mr-15">
                    <x-parnas.form-group class="mb-2">
                        <x-parnas.label class="f-12">فایآکون</x-parnas.label>
                        <x-parnas.inputs.file :file="$setting['favicon']" model="setting.favicon"/>
                    </x-parnas.form-group>
                </div>
            </div>
        </div>

        <div x-show="changeTab == 'footer'">
            <div class="d-flex flex-wrap justify-content-start">
                <div class="flex-100">
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="flex-48 ml-15" x-data="{
                                    namads: @entangle('setting.footer.namad').defer,
                                    addNamad() {
                                        this.namads.push({text:''});
                                    },
                                    removeNamad(index) {
                                        this.namads.splice(index , 1);
                                    }
                                }">
                            <x-parnas.form-group class="mb-2">
                                <div class="d-flex justify-content-start m-left-auto pos-relative pr-10">
                                    <label class="d-flex f-12 text-63">
                                        <x-parnas.label class="f-12">نماد های فوتر</x-parnas.label>
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="c-btn justify-content-end p-8">
                                    <button class="btn bg-success text-white radius-5" type="button" @click="addNamad()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <template x-for="(namad , index) in namads">
                                    <div class="d-flex mb-2">
                                        <div class="c-input flex-70">
                                            <x-parnas.inputs.text x-model="namad.text"/>
                                        </div>
                                        <div class="flex-20">
                                            <div class="c-btn justify-content-start p-8">
                                                <button class="btn bg-danger text-white radius-5" type="button"
                                                        @click="removeNamad(index)">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </x-parnas.form-group>
                        </div>
                        <div class="flex-48 mr-15">
                            <x-parnas.form-group class="c-input mb-2">
                                <div class="d-flex justify-content-start m-left-auto pos-relative">
                                    <label class="d-flex f-12 text-63">
                                        <x-parnas.label class="f-12">توضیحات فوتر</x-parnas.label>
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <x-parnas.inputs.textarea rows="5" class="form-control"
                                                          wire:model.defer="setting.footer.description"/>
                            </x-parnas.form-group>
                        </div>
                        <div class="flex-100">
                            <x-parnas.form-group class="c-input mb-2">
                                <div class="d-flex justify-content-start m-left-auto pos-relative">
                                    <label class="d-flex f-12 text-63">
                                        <x-parnas.label class="f-12">نقشه فوتر</x-parnas.label>
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <x-parnas.inputs.textarea rows="5" class="form-control"
                                                          wire:model.defer="setting.footer.map"/>
                            </x-parnas.form-group>
                        </div>
                        <div class="flex-100" x-data="{
                                    infos: @entangle('setting.footer.info').defer,
                                    addInfo() {
                                        this.infos.push({ icon: '', text: '' });
                                    },
                                    removeInfo(index) {
                                        this.infos.splice(index , 1);
                                    }
                                }">
                            <x-parnas.form-group class="mb-2">
                                <div class="d-flex justify-content-start m-left-auto pos-relative pr-10">
                                    <label class="d-flex f-12 text-63">
                                        <x-parnas.label class="f-12">اطلاعات</x-parnas.label>
                                        <div class="rx-title title-input pb-10">
                                            <div class="p-rx">
                                                <div class="rx-border-rectangle-after label-input"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="c-btn justify-content-end p-8 ml-7">
                                    <button class="btn bg-success text-white radius-5" type="button"
                                            @click="addInfo()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <template x-for="(info , index) in infos">
                                    <div class="d-flex mb-2" style="justify-content: space-around">
                                        <div class="c-input flex-40">
                                            <x-parnas.inputs.textarea class="scroller" placeholder="آیکون" x-model="info.icon"/>
                                        </div>
                                        <div class="c-input flex-40">
                                            <x-parnas.inputs.text class="scroller" placeholder="متن" x-model="info.text"/>
                                        </div>
                                        <div class="flex-17">
                                            <div class="c-btn justify-content-start p-8">
                                                <button class="btn bg-danger text-white radius-5" type="button"
                                                        @click="removeInfo(index)">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </x-parnas.form-group>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="c-btn justify-content-end p-8">
            <button class="btn bg-success justify-content-end text-white radius-5">
                ثبت
            </button>
        </div>
    </form>
</div>
