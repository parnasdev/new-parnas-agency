<div>
    <form wire:submit.prevent="submit">
        <div class="main-data flex-100 d-flex align-items-start flex-direction-row-reverse m-align-items-stretch justify-content-between mx-10 my-5"
            x-data="{
                isDrag: false,
                adding: false,
                moving: true,
                links: @entangle('links').defer,
                dropElement(e) {
                    if (this.isDrag) {
                        const value = e.dataTransfer.getData('text/plain');

                        this.addElement(JSON.parse(value));
                    }
                    this.adding = false;
                },
                addElement(item, index = null) {
                    let link = { 'id': 0, 'title': 'لینک خالی', 'icon': '', 'parent': '', 'href': '/', 'is_link': true, 'image': '', 'order_item': 0 };
                    link.id = this.links.length + 1;
                    link.order_item = this.links.length;
                    switch (item.value) {
                        case 'emptyLink':
                            if (index != null) {
                                link.parent = index;
                            } else {
                                link.parent = '';
                            }
                            this.links.push(link)
                            break;
                        case 'category':
                            let category;
                            $wire.getCategory(item.id).then(res => {
                                category = JSON.parse(res);
                                if (index != null) {
                                    link.parent = index;
                                } else {
                                    link.parent = ''
                                }
                                link.title = category.name;
                                link.href = `/category/${category.slug}`;
                                this.links.push(link)
                            });
                            break;
                        case 'page':
                            let page;
                          $wire.getPage(item.id).then(res => {
                                page = JSON.parse(res);
                                if (index != null) {
                                    link.parent = index;
                                } else {
                                    link.parent = ''
                                }
                                link.title = page.title;
                                link.href = `/${page.slug}`;
                                this.links.push(link)
                            });
                            break;
                    }
                },
                dropChildElement(e, index) {
                    if (this.isDrag) {
                        const value = e.dataTransfer.getData('text/plain');
                        this.addElement(JSON.parse(value), index);
                    }
                    this.adding = false;
                },
                removeElement(id) {
                    let index = this.links.findIndex(item => item.id === id);
                    this.links.splice(index, 1);

                    for (let link of this.getLinks(id)) {
                        let _index = this.links.findIndex(item => item.id === link.id);
                        this.links.splice(_index, 1);
                    }
                },
                getLinks(parent = '') {
                    return this.links.filter(item => item.parent === parent).sort((a, b) => a.order_item - b.order_item)
                }
            }">
            <!--! c-right  -->
            <div class="c-right box-design bg-white flex-28">
                <!--? add menu -->
                <div class="bg-white mx-10 m-mx-5 my-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-10">
                            <div class="text">
                                <h6>اضافه کردن لینک</h6>
                            </div>
                            <div class="p-rx">
                                <div class="rx-border-rectangle"></div>
                                <div class="rx-border-rectangle-after"></div>
                            </div>
                        </div>
                        <!--! data form  -->
                        <div class="my-10">
                            <!--?  -->
                            <div class="our-service mt-10">
                                <!--? Details -->
                                <div class="section-details-our-services">
                                    <div class="card bg-light radius-10">
                                        <!--! Detail 1 -->
                                        <div class="card-paragraph mt-3 card-paragraph-image-odd" id="Card-1">
                                            <div class="card-data d-flex align-items-center flex-wrap pt-5 pl-15 pr-10 pb-10 scroller"
                                                @dragstart="event.dataTransfer.setData('text/plain', JSON.stringify({'value' : event.target.getAttribute('data-value') , 'id': event.target.getAttribute('data-id')}));isDrag = true;"
                                                @dragend="isDrag = false">
                                                <!--? child(n)  -->
                                                <div class="info-data flex-40" draggable="true" data-value="emptyLink"
                                                    data-id="1">
                                                    <span class="f-11">لبنک خالی</span>
                                                </div>
                                            </div>
                                            <div class="card-data d-flex align-items-center flex-wrap py-10 pr-15 scroller"
                                                @dragstart="event.dataTransfer.setData('text/plain', JSON.stringify({'value' : event.target.getAttribute('data-value') , 'id': event.target.getAttribute('data-id')}));isDrag = true;"
                                                @dragend="isDrag = false">
                                                <!--? child(n)  -->
                                                @foreach ($categories as $category)
                                                    <div class="info-data flex-35 ml-10 mb-8" draggable="true"
                                                        data-value="category" data-id="{{ $category->id }}">
                                                        <span class="f-11">{{ $category->name }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="card-data d-flex align-items-center flex-wrap py-10 pr-15 scroller"
                                                 @dragstart="event.dataTransfer.setData('text/plain', JSON.stringify({'value' : event.target.getAttribute('data-value') , 'id': event.target.getAttribute('data-id')}));isDrag = true;"
                                                 @dragend="isDrag = false">
                                                <!--? child(n)  -->
                                                @foreach ($pages as $page)
                                                    <div class="info-data flex-35 ml-10 mb-8" draggable="true"
                                                         data-value="page" data-id="{{ $page->id }}">
                                                        <span class="f-11">{{ $page->name }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--! c-left -->
            <div class="c-left box-design bg-white sticky-data flex-70 px-5">
                <div class="pt-10">
                    <div class="drop-box border-dotted-2 border-color-secondary mt-10 m-mx-10"
                        :class="{ 'drag-in': isDrag, 'adding': adding }" @drop="dropElement"
                        @dragover.prevent="adding = true" @dragleave.prevent="adding = false">
                    </div>
                    <template x-for="(link , index) in getLinks()" :key="link.id">
                        <div class="box-design radius-5 p-10" x-data="{ show: false }">
                            <div class="d-flex justify-content-between" @click="show = !show">
                                <span x-text="link.title"></span>
                                <x-parnas.buttons.button class="btn text-danger btn-sm" @click="removeElement(link.id)">
                                    <i class="fas fa-times"></i>
                                </x-parnas.buttons.button>

                            </div>
                            <template x-if="show">
                                <div class="d-flex flex-wrap justify-content-between">
                                    <x-parnas.form-group class="c-input mb-2 flex-40">
                                        <x-parnas.label x-bind:for="'title_' + link.id">عنوان</x-parnas.label>
                                        <x-parnas.inputs.text x-model="link.title" x-bind:id="'title_' + link.id"
                                            class="form-control form-control-sm" />
                                    </x-parnas.form-group>
                                    <x-parnas.form-group class="c-switch mr-10 mb-2 flex-40">
                                        <x-parnas.label class="f-12">
                                            <x-parnas.inputs.text class="ios-switch __custom"
                                                x-bind:value="1" x-model="link.is_link" type="checkbox"
                                                role="switch" />
                                            <span x-text="link.is_link ? 'لینک باشد' : 'لینک نباشد'"></span>
                                        </x-parnas.label>
                                    </x-parnas.form-group>
                                    <x-parnas.form-group class="c-input mb-2 flex-40">
                                        <x-parnas.label x-bind:for="'href_' + link.id">پیوند</x-parnas.label>
                                        <x-parnas.inputs.text x-model="link.href" x-bind:id="'href_' + link.id"
                                            x-bind:disabled="!link.is_link" class="form-control form-control-sm" />
                                    </x-parnas.form-group>
                                    <x-parnas.form-group class="c-input mb-2 flex-40">
                                        <x-parnas.label x-bind:for="'icon_' + link.id">ایکن</x-parnas.label>
                                        <x-parnas.inputs.text x-model="link.icon" x-bind:id="'icon_' + link.id"
                                            class="form-control form-control-sm" />
                                    </x-parnas.form-group>
                                    <x-parnas.form-group class="c-input mb-2 flex-40">
                                        <x-parnas.label x-bind:for="'image_' + link.id">تصویر داخل منو</x-parnas.label>
                                        <x-parnas.inputs.text x-model="link.image" x-bind:id="'image_' + link.id"
                                            class="form-control form-control-sm" />
                                    </x-parnas.form-group>
                                </div>
                            </template>
                            <div id="children">
                                <template x-for="(child1 , index2) in getLinks(link.id)" :key="child1.id">
                                    <div class="box-design radius-5 p-10 mr-20" x-data="{ show: false }">
                                        <div class="d-flex justify-content-between" @click="show = !show">
                                            <span x-text="child1.title"></span>
                                            <x-parnas.buttons.button class="btn text-danger btn-sm"
                                                @click="removeElement(child1.id)">
                                                <i class="fas fa-times"></i>
                                            </x-parnas.buttons.button>

                                        </div>
                                        <template x-if="show">
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <x-parnas.form-group class="c-input mb-2 flex-40">
                                                    <x-parnas.label x-bind:for="'title_' + child1.id">عنوان
                                                    </x-parnas.label>
                                                    <x-parnas.inputs.text x-model="child1.title"
                                                        x-bind:id="'title_' + child1.id"
                                                        class="form-control form-control-sm" />
                                                </x-parnas.form-group>
                                                <x-parnas.form-group class="c-switch mr-10 mb-2 flex-40">
                                                    <x-parnas.label class="f-12">
                                                        <x-parnas.inputs.text class="ios-switch __custom"
                                                            x-bind:value="1" x-model="child1.is_link"
                                                            type="checkbox" role="switch" />
                                                        <span
                                                            x-text="child1.is_link ? 'لینک باشد' : 'لینک نباشد'"></span>
                                                    </x-parnas.label>
                                                </x-parnas.form-group>
                                                <x-parnas.form-group class="c-input mb-2 flex-40">
                                                    <x-parnas.label x-bind:for="'href_' + child1.id">پیوند
                                                    </x-parnas.label>
                                                    <x-parnas.inputs.text x-model="child1.href"
                                                        x-bind:id="'href_' + child1.id"
                                                        x-bind:disabled="!child1.is_link"
                                                        class="form-control form-control-sm" />
                                                </x-parnas.form-group>
                                                <x-parnas.form-group class="c-input mb-2 flex-40">
                                                    <x-parnas.label x-bind:for="'icon_' + child1.id">ایکن
                                                    </x-parnas.label>
                                                    <x-parnas.inputs.text x-model="child1.icon"
                                                        x-bind:id="'icon_' + child1.id"
                                                        class="form-control form-control-sm" />
                                                </x-parnas.form-group>
                                                <x-parnas.form-group class="c-input mb-2 flex-40">
                                                    <x-parnas.label x-bind:for="'image_' + child1.id">تصویر داخل منو
                                                    </x-parnas.label>
                                                    <x-parnas.inputs.text x-model="child1.image"
                                                        x-bind:id="'image_' + child1.id"
                                                        class="form-control form-control-sm" />
                                                </x-parnas.form-group>
                                            </div>
                                        </template>
                                        <div id="children">
                                            <template x-for="(child2 , index3) in getLinks(child1.id)"
                                                :key="child2.id">
                                                <div class="box-design radius-5 p-10 mr-20" x-data="{ show: false }">
                                                    <a class="d-flex justify-content-between" @click="show = !show">
                                                        <span x-text="child2.title"></span>
                                                        <x-parnas.buttons.button class="btn text-danger"
                                                            @click="removeElement(child2.id)">
                                                            <i class="fas fa-times"></i>
                                                        </x-parnas.buttons.button>
                                                    </a>
                                                    <template x-if="show">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <x-parnas.form-group class="c-input mb-2 flex-40">
                                                                <x-parnas.label x-bind:for="'title_' + child2.id">عنوان
                                                                </x-parnas.label>
                                                                <x-parnas.inputs.text x-model="child2.title"
                                                                    x-bind:id="'title_' + child2.id"
                                                                    class="form-control form-control-sm" />
                                                            </x-parnas.form-group>
                                                            <x-parnas.form-group class="c-switch mr-10 mb-2 flex-40">
                                                                <x-parnas.label class="f-12">
                                                                    <x-parnas.inputs.text class="ios-switch __custom"
                                                                        x-bind:value="1"
                                                                        x-model="child2.is_link" type="checkbox"
                                                                        role="switch" />
                                                                    <span
                                                                        x-text="child2.is_link ? 'لینک باشد' : 'لینک نباشد'"></span>
                                                                </x-parnas.label>
                                                            </x-parnas.form-group>
                                                            <x-parnas.form-group class="c-input mb-2 flex-40">
                                                                <x-parnas.label x-bind:for="'href_' + child2.id">پیوند
                                                                </x-parnas.label>
                                                                <x-parnas.inputs.text x-model="child2.href"
                                                                    x-bind:id="'href_' + child2.id"
                                                                    x-bind:disabled="!child2.is_link"
                                                                    class="form-control form-control-sm" />
                                                            </x-parnas.form-group>
                                                            <x-parnas.form-group class="c-input mb-2 flex-40">
                                                                <x-parnas.label x-bind:for="'icon_' + child2.id">ایکن
                                                                </x-parnas.label>
                                                                <x-parnas.inputs.text x-model="child2.icon"
                                                                    x-bind:id="'icon_' + child2.id"
                                                                    class="form-control form-control-sm" />
                                                            </x-parnas.form-group>
                                                            <x-parnas.form-group class="c-input mb-2 flex-40">
                                                                <x-parnas.label x-bind:for="'image_' + child2.id">تصویر
                                                                    داخل منو</x-parnas.label>
                                                                <x-parnas.inputs.text x-model="child2.image"
                                                                    x-bind:id="'image_' + child2.id"
                                                                    class="form-control form-control-sm" />
                                                            </x-parnas.form-group>
                                                        </div>
                                                    </template>
                                                </div>
                                            </template>
                                        </div>
                                        <div class="mr-20 mt-10"
                                            :class="{ 'drop-box drag-in': isDrag, 'adding': adding }"
                                            @drop="dropChildElement($event , child1.id)"
                                            @dragover.prevent="adding = true" @dragleave.prevent="adding = false">
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div class="mr-20 mt-10" :class="{ 'drop-box drag-in': isDrag, 'adding': adding }"
                                @drop="dropChildElement($event , link.id)" @dragover.prevent="adding = true"
                                @dragleave.prevent="adding = false">
                            </div>
                        </div>
                    </template>
                    <!--? select -->
                    <div class="select-data d-flex align-items-center flex-wrap pt-6">
                        <div class="flex-48 m-flex-45 selective-custom justify-content-start mx-8">
                            <!-- child -->
                            <div class="d-flex justify-content-start m-left-auto pos-relative pt-5 pr-10 pb-5">
                                <label for="useData" class="d-flex f-12 text-63">
                                    نوع
                                    <div class="rx-title title-input">
                                        <div class="p-rx">
                                            <div class="rx-border-rectangle-after label-input"></div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="select mt-5">
                                <x-parnas.inputs.select id="type" class="form-select"
                                    wire:model.defer="link.type">
                                    @foreach ($link_types as $type)
                                        <x-parnas.inputs.option :value="$type['name']">
                                            {{ $type['label'] }}
                                        </x-parnas.inputs.option>
                                    @endforeach
                                </x-parnas.inputs.select>
                            </div>
                        </div>
                        <div class="flex-48 m-flex-45 pr-10">
                            <div class="d-flex justify-content-start m-left-auto pos-relative pt-5 pr-10 pb-10">
                                <label for="useData" class="d-flex f-12 text-63">
                                    زبان
                                    <div class="rx-title title-input">
                                        <div class="p-rx">
                                            <div class="rx-border-rectangle-after label-input"></div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <x-parnas.form-group class="select align-items-end flex-100" wire:ignore>
                                <x-parnas.inputs.select2 placeholder="زبان منو" class="form-select" id="lang"
                                    wire:model.defer="link.lang">
                                    <x-parnas.inputs.option value="fa">
                                        فارسی
                                    </x-parnas.inputs.option>
                                    <x-parnas.inputs.option value="en">
                                        انگلیسی
                                    </x-parnas.inputs.option>
                                </x-parnas.inputs.select2>
                                @error('link.lang')
                                    <p>{{ $message }}</p>
                                @enderror
                            </x-parnas.form-group>
                        </div>
                    </div>
                    <!--? switch -->
                    <div class="c-switch mr-10">
                        <label for="" class="f-12">
                            <input class='ios-switch __custom' type="checkbox" value="1"
                                wire:model.defer="link.used" />
                            استفاده
                        </label>
                    </div>




                    <!--? insert data  -->
                    <div class="c-btn justify-content-end py-8 pr-8">
                        <x-parnas.buttons.button class="btn bg-success text-white radius-5">
                            ثبت
                        </x-parnas.buttons.button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('title', 'منو سایت')

@push('styles')
    <style>
        .drop-box {
            min-height: 50px;
            display: flex;
            flex-direction: column;
        }

        .drag-in {
            border: 3px dashed #E0E0DD;
        }

        .adding {
            background-image: repeating-linear-gradient(-45deg, transparent, transparent 8px, #eee 0, #eee 10px) !important;
        }

        .border {
            border: 1px solid;
        }
    </style>
@endpush
