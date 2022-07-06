<div>
    <div>
        <form wire:submit.prevent="submit">
            <div
                class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 m-mx-5 my-5">
                <div class="box-design bg-white flex-99 m-flex-100 px-5 py-10" x-data="{
                episodes: @entangle('episodes').defer,
                seasons: @entangle('seasons').defer,
                addEpisode() {
                let episode = {id : 0 , number: 0 , file: {url: '' , id: 0} , created: false , title : '' , season: 'null' , description: ''};
                let id = 0;
                do {
                    id = Math.round(Math.random() * 100);
                } while (this.episodes.find(x => x.id === id))
                episode.id = id;
                episode.number = this.episodes.length

                this.episodes.push(episode);
            },
            removeEpisode(id) {
                let index = this.episodes.findIndex(x => x.id === id);

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });

                swalWithBootstrapButtons.fire({
                    title: 'اطمینان دارید؟',
                    text : '',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'بله، حذف کن!',
                    cancelButtonText: 'نه، لغو کن!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.episodes.splice(index , 1);
                    }
                })
            }
    }">
                    <x-parnas.spinners :full="true" wire:loading wire:target="submit"/>
                    <div class="c-data mx-10 m-mx-5 mb-15">
                        <!--! title  -->
                        <div class="rx-title pb-10">
                            <div class="flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center">
                                    <div class="text">
                                        <h6>ویدیو ها</h6>
                                    </div>
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle"></div>
                                        <div class="rx-border-rectangle-after"></div>
                                    </div>
                                </div>
                                <!--? group[button]  -->
                                <div class="c-group-btn d-flex flex-wrap justify-content-start">
                                    <div class="c-btn ml-7 pb-5">
                                        <button class="ancher btn-effect bg-success text-white radius-5" type="button"
                                                @click="addEpisode()">
                                            <div class="circle-solid top-right bg-white"></div>
                                            ایجاد قسمت
                                        </button>
                                    </div>
                                    <div class="c-btn ml-7 pb-5">
                                        <x-parnas.buttons.link href="{{ route('admin.courses.index') }}" class="ancher btn-effect bg-danger text-white radius-5">
                                            <div class="circle-solid top-right bg-white"></div>
                                            برگشت
                                        </x-parnas.buttons.link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--! data form  -->
                        <div class="my-10">
                            <!-- parent -->
                            <div class="p-table p-0">
                                <!--! table  -->
                                <div class="controller-table bg-light">
                                    <!--? thead -->
                                    <div class="d-thead">
                                        <div class="head flex-9 m-flex-15">
                                            <span class="f-12 f-bold">شناسه</span>
                                        </div>
                                        <div class="head flex-10 m-flex-40">
                                            <span class="f-12 f-bold">شماره ویدیو</span>
                                        </div>
                                        <div class="head flex-46 m-flex-55">
                                            <span class="f-12 f-bold">عنوان</span>
                                        </div>
                                        <div class="head flex-20 m-flex-57">
                                            <span class="f-12 f-bold">فصل</span>
                                        </div>
                                        <div class="head sticky-table flex-15 m-flex-30">
                                            <span class="f-12 f-bold">عملیات</span>
                                        </div>
                                    </div>
                                    <!--? tdetail  -->
                                    <div class="data">
                                        <!--! (backend) loop data  -->
                                        <template x-for="episode in episodes">
                                            <div class="main-detail">
                                                <!--? child(n)  -->
                                                <div class="d-detail">
                                                    <div class="detail flex-9 m-flex-15">
                                                        <span class="f-12" x-text="episode.id"></span>
                                                    </div>
                                                    <div class="detail flex-10 m-flex-40">
                                                        <x-parnas.form-group class="c-input h-2rem mb-2 px-5 mr-5">
                                                            <x-parnas.inputs.text type="number" class="form-control form-control-sm text-align-center" style="width:90%"
                                                                                  x-model="episode.number"/>
                                                            @error('episodes.*.number')
                                                            <p>{{ $message }}</p>
                                                            @enderror
                                                        </x-parnas.form-group>
                                                    </div>
                                                    <div class="detail flex-46 m-flex-57">
                                                        <x-parnas.form-group class="c-input h-2rem mb-2">
                                                            <x-parnas.inputs.text class="form-control form-control-sm" x-model="episode.title" style="width:90%;margin:auto"/>
                                                            @error('episodes.*.title')
                                                            <p>{{ $message }}</p>
                                                            @enderror
                                                        </x-parnas.form-group>
                                                    </div>
                                                    <div class="detail flex-20 m-flex-55">
                                                        <x-parnas.form-group class="select c-s h-2rem" style="width: 90%">
                                                            <x-parnas.inputs.select class="form-select form-select-sm"
                                                                                    x-model="episode.season">
                                                                <x-parnas.inputs.option x-bind:value="null">بدونه فصل</x-parnas.inputs.option>
                                                                <template x-for="parent in seasons">
                                                                    <x-parnas.inputs.option x-bind:value="parent.id" x-init="parent.id == episode.season ? $el.setAttribute('selected') : ''"
                                                                                            x-text="parent.name == '' ? 'بدونه نام' + ' - ' + parent.id :  parent.name"></x-parnas.inputs.option>
                                                                </template>
                                                            </x-parnas.inputs.select>
                                                            @error('episodes.*.season')
                                                            <p>{{ $message }}</p>
                                                            @enderror
                                                        </x-parnas.form-group>
                                                    </div>
                                                    <div class="detail sticky-table flex-15 m-flex-30">
                                                        <a x-bind:href=`/admin/episodes/edit/${episode.id}` class="bg-transparent ml-5">
                                                            <div class="image tooltip d-flex cursor-pointer">
                                                                <svg width="20" height="20" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.0013 28.2652L12.0013 28.2652C11.9882 28.2783 11.9748 28.2917 11.961 28.3054C11.8092 28.4567 11.6171 28.6481 11.4806 28.8897C11.3441 29.1313 11.2793 29.3946 11.2281 29.6027C11.2234 29.6216 11.2189 29.64 11.2144 29.658L12.181 29.899L11.2144 29.658L9.6376 35.9809C9.63481 35.9921 9.63189 36.0037 9.62888 36.0158C9.59215 36.1623 9.54126 36.3652 9.5238 36.5448C9.5037 36.7515 9.49728 37.2035 9.86628 37.5721C10.2353 37.9406 10.6872 37.9337 10.8939 37.9133C11.0735 37.8956 11.2764 37.8445 11.4228 37.8076C11.4348 37.8046 11.4465 37.8017 11.4577 37.7989L11.2174 36.8403L11.4577 37.7989L17.7605 36.2192L17.7606 36.2192C17.7614 36.219 17.7622 36.2188 17.763 36.2186C17.7802 36.2143 17.7978 36.2099 17.8159 36.2055C18.0244 36.1539 18.2884 36.0886 18.5303 35.9513L18.0368 35.0815L18.5303 35.9513C18.7723 35.814 18.9637 35.6209 19.115 35.4684C19.1287 35.4545 19.1421 35.441 19.1552 35.4279L34.5653 19.9793L34.6037 19.9408C34.9025 19.6414 35.193 19.3503 35.4004 19.0779C35.6342 18.7707 35.8538 18.3733 35.8538 17.8606C35.8538 17.3479 35.6342 16.9505 35.4004 16.6434C35.193 16.371 34.9025 16.0799 34.6037 15.7804L34.5653 15.7419L31.6533 12.8227L31.6148 12.7841C31.3147 12.4831 31.0231 12.1906 30.7501 11.9819C30.4425 11.7466 30.044 11.5254 29.5293 11.5254C29.0147 11.5254 28.6162 11.7466 28.3085 11.9819C28.0356 12.1906 27.7439 12.4831 27.4438 12.7841C27.431 12.7969 27.4182 12.8098 27.4053 12.8227L12.0124 28.254L12.0124 28.254L12.0013 28.2652Z" stroke="#4a0373" stroke-width="2"/>
                                                                    <path d="M24.7461 14.9865L30.483 11.1523L36.2199 16.9036L32.3953 22.6548L24.7461 14.9865Z" fill="#4a0373"/>
                                                                </svg>
                                                                <div class="s-tooltip">
                                                                    <span>ویرایش</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <button class="bg-transparent ml-5"
                                                                @click="removeEpisode(episode.id)"
                                                                type="button">
                                                            <div class="image tooltip d-flex cursor-pointer">
                                                                <svg width="20" height="20" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.7852 19.2988L12.7852 15.4647" stroke="#ff383f" stroke-width="2" stroke-linecap="round"/>
                                                                    <path d="M17.8828 19.2988L17.8828 15.4647" stroke="#ff383f" stroke-width="2" stroke-linecap="round"/>
                                                                    <path d="M3.85938 9.07617H26.8071V9.07617C25.0914 9.07617 24.2336 9.07617 23.6689 9.56799C23.5996 9.62832 23.5346 9.69336 23.4743 9.76264C22.9824 10.3273 22.9824 11.1851 22.9824 12.9008V21.6909C22.9824 23.5765 22.9824 24.5193 22.3967 25.1051C21.8109 25.6909 20.8681 25.6909 18.9824 25.6909H11.684C9.79837 25.6909 8.85556 25.6909 8.26977 25.1051C7.68399 24.5193 7.68399 23.5765 7.68399 21.6909V12.9008C7.68399 11.1851 7.68399 10.3273 7.19217 9.76264C7.13184 9.69336 7.0668 9.62832 6.99752 9.56799C6.43283 9.07617 5.57501 9.07617 3.85938 9.07617V9.07617Z" stroke="#ff383f" stroke-width="2" stroke-linecap="round"/>
                                                                    <path d="M12.8702 4.43653C13.0155 4.30065 13.3356 4.18058 13.7809 4.09494C14.2262 4.00931 14.7718 3.96289 15.3331 3.96289C15.8944 3.96289 16.44 4.00931 16.8853 4.09494C17.3306 4.18058 17.6507 4.30065 17.7959 4.43653" stroke="#ff383f" stroke-width="2" stroke-linecap="round"/>
                                                                </svg>
                                                                <div class="s-tooltip">
                                                                    <span>حذف</span>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                        <template x-if="episodes.length === 0">
                                            <div class="empty-data">
                                                <div class="main-empty d-flex flex-direction-column align-items-center">
                                                    <div class="image">
                                                        <img src="/img/svg/empty-data.svg" alt="empty"/>
                                                    </div>
                                                    <div class="text mt-20">
                                                    <span
                                                        class="f-12 text-info f-bold">اطلاعاتی در این مورد وجود ندارد</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="c-btn justify-content-end pb-5">
                            <button class="ancher btn-effect bg-success text-white radius-5">
                                <div class="circle-solid top-right bg-white"></div>
                                ثبت ویدیو ها
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
{{--    @livewire('arvan-uploader')--}}
</div>
