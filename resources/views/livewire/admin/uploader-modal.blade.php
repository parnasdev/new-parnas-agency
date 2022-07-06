<div>
    <x-parnas.modal name="uploader" :lg="true">
        <div class="our-service" x-data="{
            changeTab: 'UploadFile',
            selectedFiles: @entangle('selectedFiles'),
            maxItem: @entangle('maxItems'),
            type: @entangle('type'),
            uploads: [],
            photos: [],
            isUpload: false,
            loading: false,
            progress: 0,
            dropingFile: false,
            init() {
                $wire.getfiles(1).then(res => {
                    this.uploads = JSON.parse(res)
                });
                $watch('type' , value => {
                   $wire.getfiles(1).then(res => {
                        this.uploads = JSON.parse(res)
                   });
                })
            },
            handleFileDrop(e) {
                if (event.dataTransfer.files.length > 0) {
                    const files = e.dataTransfer.files;
                    $wire.uploadMultiple(
                        'files',
                        files,
                        finishCallback = (uploadedFilenames) => {
                            $wire.uploads().then(result => {
                                this.isUpload = false;
                                this.uploads = JSON.parse(result);
                                this.changeTab = 'File'
                            })
                        },
                        errorCallback = () => {},
                        progressCallback = (event) => {
                            this.isUpload = true;
                            this.progress = event.detail.progress
                        }
                    )
                }
            },
            uploadFile() {
                $wire.uploadMultiple(
                    'files',
                    $refs.files.files,
                    finishCallback = (uploadedFilenames) => {
                        $wire.uploads().then(result => {
                            this.isUpload = false;
                            this.uploads = JSON.parse(result);
                            this.changeTab = 'File'
                        })
                    },
                    errorCallback = () => {},
                    progressCallback = (event) => {
                        this.isUpload = true;
                        this.progress = event.detail.progress
                    }
                )
            },
            selectAll() {
                let checkboxes = document.querySelectorAll('[x-ref=checkbox]');
                let ids = [];
                if ($refs.allCheckbox.checked) {
                    if (this.maxItem === 1) {
                        ids.push(checkboxes[0].value)
                    } else {
                        checkboxes.forEach(item => ids.push(item.value))
                    }

                } else {
                    ids = [];
                }
                this.selectedFiles = ids;

            },
            deleteFiles(path) {
                if (!this.loading) {
                    this.loading = true;
                    $wire.deleteFile(path).then(res => {
                        this.uploads = JSON.parse(res);

                        this.loading = false;
                    })
                }
            }
        }">
            <!--? Head Cards -->
            <div class="controller-head mb-9 scroller">
                <!--? Header buttons -->
                <div class="main-grid our">
                    <div class="flex-services d-flex justify-content-between radius-6">
                        <!--! button 1  -->
                        <div class="our-services-card  flex-25 m-flex-45 px-7"
                            :class="{ 'selected-services': changeTab === 'UploadFile' }"
                            @click="changeTab = 'UploadFile'">
                            <!-- Title -->
                            <div class="paragraph">
                                <span class="f-12">بخش آپلود</span>
                            </div>
                        </div>
                        <!--! Button 2 -->
                        <div class="our-services-card flex-25 m-flex-45 px-7"
                            :class="{ 'selected-services': changeTab === 'File' }" @click="changeTab = 'File'">
                            <!-- Title -->
                            <div class="paragraph">
                                <span class="f-12">فایل ها</span>
                                <span class="f-12 bg-info radius-100 py-5 px-10 text-white" x-text="maxItem"></span>
                            </div>
                        </div>
                        <!--! Button 2 -->
                        <div class="our-services-card flex-25 m-flex-45 px-7"
                            :class="{ 'selected-services': changeTab === 'Icon' }" @click="changeTab = 'Icon'">
                            <!-- Title -->
                            <div class="paragraph">
                                <span class="f-12">آیکون ها</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--? Details -->
            <div class="section-details-our-services">
                <div class="card">
                    <div x-show="changeTab == 'UploadFile'">
                        <div class="drag-area" x-on:drop="dropingFile = false"
                            x-on:drop.prevent="handleFileDrop($event)" x-on:dragover.prevent="dropingFile = true"
                            x-on:dragleave.prevent="dropingFile = false">
                            <div class="icon">
                                <svg width="47" height="47" viewBox="0 0 47 47" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.0759 16.4741C12.5236 16.4741 12.0759 16.9218 12.0759 17.4741C12.0759 18.0264 12.5236 18.4741 13.0759 18.4741V16.4741ZM20.7306 10.2989L19.8018 10.6695V10.6695L20.7306 10.2989ZM21.4956 12.2159L22.4243 11.8454L21.4956 12.2159ZM39.8043 25.1424V30.8937H41.8043V25.1424H39.8043ZM33.1551 37.562H14.032V39.562H33.1551V37.562ZM7.38281 30.8937V11.7228H5.38281V30.8937H7.38281ZM10.2074 8.88867H17.1796V6.88867H10.2074V8.88867ZM19.8018 10.6695L20.5668 12.5865L22.4243 11.8454L21.6594 9.92827L19.8018 10.6695ZM17.9445 16.4741H13.0759V18.4741H17.9445V16.4741ZM13.0759 18.4741H33.1551V16.4741H13.0759V18.4741ZM17.1796 8.88867C17.8287 8.88867 18.2348 8.89007 18.5417 8.92387C18.8239 8.95494 18.9251 9.00519 18.9848 9.0457L20.1079 7.39086C19.682 7.10176 19.2268 6.98721 18.7606 6.93588C18.3191 6.88727 17.7846 6.88867 17.1796 6.88867V8.88867ZM21.6594 9.92827C21.4347 9.36503 21.2376 8.86737 21.0288 8.47482C20.8085 8.06058 20.5337 7.67984 20.1079 7.39086L18.9848 9.0457C19.0446 9.08633 19.1291 9.16223 19.2631 9.41405C19.4086 9.68755 19.5608 10.0654 19.8018 10.6695L21.6594 9.92827ZM20.5668 12.5865C21.0542 13.8082 21.3755 14.6204 21.5209 15.2325C21.6617 15.8249 21.5774 15.9928 21.5238 16.0721L23.1813 17.1914C23.6965 16.4285 23.6591 15.5796 23.4667 14.7702C23.2791 13.9806 22.8875 13.0061 22.4243 11.8454L20.5668 12.5865ZM17.9445 18.4741C19.1913 18.4741 20.2399 18.4767 21.0415 18.358C21.8639 18.2362 22.6655 17.9551 23.1813 17.1914L21.5238 16.0721C21.4707 16.1507 21.3481 16.2908 20.7485 16.3796C20.1281 16.4715 19.2572 16.4741 17.9445 16.4741V18.4741ZM14.032 37.562C12.2008 37.562 10.9281 37.5599 9.96897 37.4306C9.03882 37.3052 8.55444 37.0771 8.211 36.7328L6.79503 38.1452C7.5718 38.9239 8.54898 39.2573 9.70182 39.4127C10.8256 39.5641 12.2574 39.562 14.032 39.562V37.562ZM5.38281 30.8937C5.38281 32.6729 5.3807 34.1077 5.53171 35.2337C5.68655 36.3882 6.0186 37.3668 6.79503 38.1452L8.211 36.7328C7.86723 36.3881 7.63918 35.9015 7.51396 34.9679C7.38493 34.0057 7.38281 32.7293 7.38281 30.8937H5.38281ZM39.8043 30.8937C39.8043 32.7293 39.8022 34.0057 39.6732 34.9679C39.548 35.9015 39.3199 36.3881 38.9761 36.7328L40.3921 38.1452C41.1685 37.3668 41.5006 36.3882 41.6554 35.2337C41.8064 34.1077 41.8043 32.6729 41.8043 30.8937H39.8043ZM33.1551 39.562C34.9297 39.562 36.3615 39.5641 37.4853 39.4127C38.6381 39.2573 39.6153 38.9239 40.3921 38.1452L38.9761 36.7328C38.6327 37.0771 38.1483 37.3052 37.2182 37.4306C36.259 37.5599 34.9864 37.562 33.1551 37.562V39.562ZM41.8043 25.1424C41.8043 23.3632 41.8064 21.9284 41.6554 20.8024C41.5006 19.6478 41.1685 18.6692 40.3921 17.8909L38.9761 19.3033C39.3199 19.6479 39.548 20.1346 39.6732 21.0682C39.8022 22.0304 39.8043 23.3068 39.8043 25.1424H41.8043ZM33.1551 18.4741C34.9864 18.4741 36.259 18.4762 37.2182 18.6055C38.1483 18.7309 38.6327 18.959 38.9761 19.3033L40.3921 17.8909C39.6153 17.1121 38.6381 16.7788 37.4853 16.6234C36.3615 16.4719 34.9297 16.4741 33.1551 16.4741V18.4741ZM7.38281 11.7228C7.38281 10.7909 7.38493 10.1923 7.44395 9.7522C7.49915 9.34058 7.58718 9.22028 7.6509 9.1564L6.23493 7.74395C5.73855 8.24156 5.54652 8.85387 5.4617 9.48635C5.3807 10.0903 5.38281 10.8473 5.38281 11.7228H7.38281ZM10.2074 6.88867C9.33429 6.88867 8.5786 6.88654 7.97553 6.96782C7.34344 7.05302 6.73165 7.24599 6.23493 7.74395L7.6509 9.1564C7.71428 9.09286 7.83328 9.00508 8.24268 8.9499C8.68111 8.89081 9.27762 8.88867 10.2074 8.88867V6.88867Z"
                                        fill="#A9B0A6"></path>
                                </svg>
                            </div>
                            <span class="text-dark f-16 f-bold">برای بارگذاری بکش و رها کن </span>
                            <span class="text-dark f-16">یا</span>
                            <div class="c-btn pb-5">
                                <button type="button" @click="$refs.files.click()"
                                    class="ancher btn-effect bg-success text-white radius-5">
                                    <div class="circle-solid top-right bg-white"></div>
                                    <svg width="20" height="20" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.9375 8.02344L15.9375 23.3601" stroke="#fff" stroke-width="2"
                                            stroke-linecap="round" />
                                        <path d="M23.5898 15.6914L8.29139 15.6914" stroke="#fff" stroke-width="2"
                                            stroke-linecap="round" />
                                    </svg>
                                    انتخاب کن
                                </button>
                            </div>
                            <input type="file" hidden x-ref="files" @change="uploadFile()">
                            <div x-show="isUpload">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                        </div>
                    </div>
                    <div x-show="changeTab == 'File'">
                        <div
                            class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between my-5">
                            <!--! c-right -->
                            <div class="w-100 box-design bg-white px-5 py-15">
                                <!--? row form  -->
                                <div class="mx-10 m-mx-5">
                                    <div class="c-data">
                                        <!--! title  -->
                                        <div class="rx-title pb-10">
                                            <div class="text">
                                                <h6>گالری</h6>
                                            </div>
                                            <div class="p-rx ">
                                                <div class="rx-border-rectangle"></div>
                                                <div class="rx-border-rectangle-after"></div>
                                            </div>
                                        </div>
                                        <!--! data form  -->
                                        <div class="p-table ml-5">
                                            <!--! data -->
                                            <div class="info-data d-flex justify-content-between mb-10">
                                                <!--! checkbox  -->
                                                <div class="checkbox-list justify-content-start flex-50">
                                                    <label class="checkbox f-12">
                                                        <input class="checkbox-input" type="checkbox"
                                                            x-ref="allCheckbox" @change="selectAll()">
                                                        <span class="checkbox-checkmark-box">
                                                            <span class="checkbox-checkmark"></span>
                                                        </span>
                                                        انتخاب همه
                                                    </label>
                                                    {{-- <div class="select flex-35 c-s h-2rem"> --}}
                                                    {{-- <x-parnas.inputs.select class="radius-7"> --}}
                                                    {{-- <option value="0">-</option> --}}
                                                    {{-- <option value="1">حذف</option> --}}
                                                    {{--  --}}{{-- @if ($trash) --}}
                                                    {{-- <option value="2">بازگردانی</option> --}}
                                                    {{-- @endif --}}
                                                    {{-- </x-parnas.inputs.select> --}}
                                                    {{-- </div> --}}
                                                </div>
                                                <!--! Result  -->
                                                <div class="d-flex">
                                                    <div class="result">
                                                        <span class="f-12 text-info">تعداد اطلاعات :</span>
                                                        <span class="f-12 px-6" x-text="uploads.length"></span>
                                                    </div>
                                                    <form wire:submit.prevent="submit">
                                                        <!--? select -->
                                                        <!--? insert data  -->
                                                        <div class="c-btn">
                                                            <button
                                                                class="btn bg-info text-white radius-5">ارسال</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- parent -->
                                            <div class="box-design d-flex flex-wrap flex-100 m-flex-100 py-15 pr-15 m-pr-0 scroller"
                                                style="height: 290px">
                                                <!-- child -->

                                                <template x-for="(upload , index) in uploads">
                                                    <div class="c-gallery pos-relative bg-white box-design flex-24 m-flex-95 ml-5 mb-7 cursor-pointer radius-5"
                                                             style="height: 180px;" :class="{ 'placeholder-wave': loading }">
                                                            <div @click="deleteFiles(upload.path)"
                                                                 class="bg-up d-flex bg-white box-design align-items-center justify-content-center radius-5 py-4 px-5"
                                                                 :class="{ 'placeholder': loading }">
                                                                <svg width="20" height="20" viewBox="0 0 31 31" fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.7852 19.2988L12.7852 15.4647"
                                                                          stroke="#ff383f" stroke-width="2"
                                                                          stroke-linecap="round" />
                                                                    <path d="M17.8828 19.2988L17.8828 15.4647"
                                                                          stroke="#ff383f" stroke-width="2"
                                                                          stroke-linecap="round" />
                                                                    <path
                                                                        d="M3.85938 9.07617H26.8071V9.07617C25.0914 9.07617 24.2336 9.07617 23.6689 9.56799C23.5996 9.62832 23.5346 9.69336 23.4743 9.76264C22.9824 10.3273 22.9824 11.1851 22.9824 12.9008V21.6909C22.9824 23.5765 22.9824 24.5193 22.3967 25.1051C21.8109 25.6909 20.8681 25.6909 18.9824 25.6909H11.684C9.79837 25.6909 8.85556 25.6909 8.26977 25.1051C7.68399 24.5193 7.68399 23.5765 7.68399 21.6909V12.9008C7.68399 11.1851 7.68399 10.3273 7.19217 9.76264C7.13184 9.69336 7.0668 9.62832 6.99752 9.56799C6.43283 9.07617 5.57501 9.07617 3.85938 9.07617V9.07617Z"
                                                                        stroke="#ff383f" stroke-width="2"
                                                                        stroke-linecap="round" />
                                                                    <path
                                                                        d="M12.8702 4.43653C13.0155 4.30065 13.3356 4.18058 13.7809 4.09494C14.2262 4.00931 14.7718 3.96289 15.3331 3.96289C15.8944 3.96289 16.44 4.00931 16.8853 4.09494C17.3306 4.18058 17.6507 4.30065 17.7959 4.43653"
                                                                        stroke="#ff383f" stroke-width="2"
                                                                        stroke-linecap="round" />
                                                                </svg>
                                                            </div>
                                                            <div
                                                                class="checked-gallery bg-white box-design radius-5 py-4 px-8">
                                                                <label class="checkbox f-10 text-dark">
                                                                    <input class="checkbox-input" :value="upload.url"
                                                                           type="checkbox"
                                                                           :disabled="!selectedFiles.includes(upload.url) &&
                                                                        selectedFiles.length >= maxItem"
                                                                           x-ref="checkbox" x-model="selectedFiles">
                                                                    <span class="checkbox-checkmark-box">
                                                                    <span class="checkbox-checkmark"></span>
                                                                </span>
                                                                    انتخاب
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="image d-flex align-items-center justify-content-center">
                                                                <template x-if="upload.type.startsWith('image')">
                                                                    <img :src="upload.url"
                                                                         class="radius-5 object-fit-cover" width="100%"
                                                                         height="100px" alt="" />
                                                                </template>

                                                                <template x-if="upload.type.startsWith('pdf')">
                                                                    <svg
                                                                        class="object-fit-cover" width="100" height="100"
                                                                        viewBox="0 0 14 16" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                              d="M14 4.5V14C14 14.5304 13.7893 15.0391 13.4142 15.4142C13.0391 15.7893 12.5304 16 12 16H11V15H12C12.2652 15 12.5196 14.8946 12.7071 14.7071C12.8946 14.5196 13 14.2652 13 14V4.5H11C10.6022 4.5 10.2206 4.34196 9.93934 4.06066C9.65804 3.77936 9.5 3.39782 9.5 3V1H4C3.73478 1 3.48043 1.10536 3.29289 1.29289C3.10536 1.48043 3 1.73478 3 2V11H2V2C2 1.46957 2.21071 0.960859 2.58579 0.585786C2.96086 0.210714 3.46957 0 4 0L9.5 0L14 4.5ZM1.6 11.85H0V15.849H0.791V14.507H1.594C1.881 14.507 2.125 14.45 2.326 14.334C2.529 14.217 2.684 14.059 2.789 13.86C2.89799 13.6512 2.95331 13.4185 2.95 13.183C2.95 12.933 2.897 12.707 2.792 12.506C2.68756 12.3062 2.52789 12.1406 2.332 12.029C2.132 11.909 1.889 11.85 1.6 11.85V11.85ZM2.145 13.183C2.1486 13.3148 2.1194 13.4453 2.06 13.563C2.00671 13.6654 1.92377 13.7494 1.822 13.804C1.70559 13.8616 1.57683 13.8897 1.447 13.886H0.788V12.48H1.448C1.666 12.48 1.837 12.54 1.96 12.661C2.083 12.783 2.145 12.957 2.145 13.183ZM3.362 11.85V15.849H4.822C5.223 15.849 5.556 15.769 5.82 15.612C6.08716 15.4522 6.29577 15.2106 6.415 14.923C6.545 14.623 6.611 14.261 6.611 13.839C6.611 13.419 6.546 13.061 6.415 12.764C6.29718 12.4797 6.09056 12.2412 5.826 12.084C5.562 11.928 5.227 11.85 4.821 11.85H3.362V11.85ZM4.153 12.495H4.716C4.964 12.495 5.166 12.545 5.325 12.647C5.49004 12.7549 5.61456 12.9146 5.679 13.101C5.758 13.302 5.797 13.553 5.797 13.854C5.8001 14.0534 5.77724 14.2525 5.729 14.446C5.69337 14.5986 5.62665 14.7423 5.533 14.868C5.44599 14.9801 5.33072 15.0671 5.199 15.12C5.04466 15.1777 4.88075 15.2056 4.716 15.202H4.153V12.495V12.495ZM7.896 14.258V15.849H7.106V11.85H9.654V12.503H7.896V13.62H9.502V14.258H7.896V14.258Z"
                                                                              fill="#999" />
                                                                    </svg>

                                                                </template>

                                                                <template x-if="upload.type.startsWith('video')">
                                                                    <svg
                                                                        class="object-fit-cover" width="100" height="100"
                                                                        viewBox="0 0 20 20" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M17.8125 5.9043L15.3125 7.34375V4.375C15.3125 3.68555 14.752 3.125 14.0625 3.125H2.5C1.81055 3.125 1.25 3.68555 1.25 4.375V15.625C1.25 16.3145 1.81055 16.875 2.5 16.875H14.0625C14.752 16.875 15.3125 16.3145 15.3125 15.625V12.6562L17.8125 14.0957C18.2285 14.3359 18.75 14.0352 18.75 13.5566V6.44531C18.75 5.96484 18.2285 5.66406 17.8125 5.9043ZM13.9062 15.4688H2.65625V4.53125H13.9062V15.4688ZM17.3438 12.207L15.3125 11.0391V8.96289L17.3438 7.79297V12.207ZM4.0625 7.03125H6.25C6.33594 7.03125 6.40625 6.96094 6.40625 6.875V5.9375C6.40625 5.85156 6.33594 5.78125 6.25 5.78125H4.0625C3.97656 5.78125 3.90625 5.85156 3.90625 5.9375V6.875C3.90625 6.96094 3.97656 7.03125 4.0625 7.03125Z"
                                                                            fill="#999" />
                                                                    </svg>
                                                                </template>

                                                                <template x-if="!upload.type.startsWith('video') && !upload.type.startsWith('image')
                                                                && !upload.type.startsWith('pdf')">
                                                                    <svg
                                                                        class="object-fit-cover" width="100" height="100"
                                                                        viewBox="0 0 47 47" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                              d="M24.5935 4.74805V16.1676L24.5935 16.222V16.2221C24.5934 16.6461 24.5934 17.0582 24.6391 17.3981C24.6906 17.7813 24.8161 18.2186 25.1793 18.5818C25.5425 18.9451 25.9798 19.0706 26.363 19.1221C26.7029 19.1678 27.1151 19.1677 27.5391 19.1676L27.5935 19.1676H38.9797V31.5872C38.9797 37.0095 38.9797 39.7207 37.2994 41.4052C35.6191 43.0897 32.9147 43.0897 27.5059 43.0897H19.8567C14.4478 43.0897 11.7434 43.0897 10.0631 41.4052C8.38281 39.7207 8.38281 37.0095 8.38281 31.5872V16.2505C8.38281 10.8282 8.38281 8.11705 10.0631 6.43255C11.7434 4.74805 14.4478 4.74805 19.8567 4.74805H24.5935ZM26.5935 4.74818V16.1676C26.5935 16.6673 26.5957 16.9415 26.6212 17.1316L26.6222 17.1389L26.6295 17.1399C26.8197 17.1655 27.0939 17.1676 27.5935 17.1676H38.9796C38.9781 15.8246 38.9577 15.1057 38.6886 14.4544C38.3975 13.7497 37.8447 13.1956 36.7393 12.0875L31.6586 6.99405C30.5532 5.88586 30.0004 5.33176 29.2976 5.03991C28.6482 4.77027 27.9316 4.74974 26.5935 4.74818Z"
                                                                              fill="#999" />
                                                                    </svg>
                                                                </template>
                                                            </div>
                                                            <div class="d-flex flex-direction-column justify-content-between"
                                                                 style="height: 80px">
                                                                <div class="text pr-7"
                                                                     style="overflow-wrap: break-word;">
                                                                <span class="f-12"
                                                                      x-text="upload.filename"></span>
                                                                </div>
                                                                <div class="text text-align-left pl-7 pb-4">
                                                                <span class="f-12"
                                                                      x-text="upload.size"></span>
                                                                    <span class="f-12">کیلوبایت</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show="changeTab == 'Icon'" x-data="{
                        show: false,
                        selectFolder(path) {
                            this.show = true;
                            $wire.set('folderSelected' , path)
                        },
                        back() {
                            this.show = false;
                            $wire.set('folderSelected' , '/')
                        }
                    }">
                        <div class="flex-wrap flex-100 m-flex-100 scroller pr-15" style="height: 390px" :class="{'d-flex' : !show , 'd-none' : show}">
                            @foreach($iconFolders as $iconFolder)
                            <div @click="selectFolder('{{$iconFolder}}')" class="flex-24 m-flex-47 d-flex align-items-center flex-direction-column bg-white box-design py-20 ml-5 mb-7 cursor-pointer">
                                <div class="image">
                                    <svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.0759 16.4741C12.5236 16.4741 12.0759 16.9218 12.0759 17.4741C12.0759 18.0264 12.5236 18.4741 13.0759 18.4741V16.4741ZM20.7306 10.2989L19.8018 10.6695V10.6695L20.7306 10.2989ZM21.4956 12.2159L22.4243 11.8454L21.4956 12.2159ZM39.8043 25.1424V30.8937H41.8043V25.1424H39.8043ZM33.1551 37.562H14.032V39.562H33.1551V37.562ZM7.38281 30.8937V11.7228H5.38281V30.8937H7.38281ZM10.2074 8.88867H17.1796V6.88867H10.2074V8.88867ZM19.8018 10.6695L20.5668 12.5865L22.4243 11.8454L21.6594 9.92827L19.8018 10.6695ZM17.9445 16.4741H13.0759V18.4741H17.9445V16.4741ZM13.0759 18.4741H33.1551V16.4741H13.0759V18.4741ZM17.1796 8.88867C17.8287 8.88867 18.2348 8.89007 18.5417 8.92387C18.8239 8.95494 18.9251 9.00519 18.9848 9.0457L20.1079 7.39086C19.682 7.10176 19.2268 6.98721 18.7606 6.93588C18.3191 6.88727 17.7846 6.88867 17.1796 6.88867V8.88867ZM21.6594 9.92827C21.4347 9.36503 21.2376 8.86737 21.0288 8.47482C20.8085 8.06058 20.5337 7.67984 20.1079 7.39086L18.9848 9.0457C19.0446 9.08633 19.1291 9.16223 19.2631 9.41405C19.4086 9.68755 19.5608 10.0654 19.8018 10.6695L21.6594 9.92827ZM20.5668 12.5865C21.0542 13.8082 21.3755 14.6204 21.5209 15.2325C21.6617 15.8249 21.5774 15.9928 21.5238 16.0721L23.1813 17.1914C23.6965 16.4285 23.6591 15.5796 23.4667 14.7702C23.2791 13.9806 22.8875 13.0061 22.4243 11.8454L20.5668 12.5865ZM17.9445 18.4741C19.1913 18.4741 20.2399 18.4767 21.0415 18.358C21.8639 18.2362 22.6655 17.9551 23.1813 17.1914L21.5238 16.0721C21.4707 16.1507 21.3481 16.2908 20.7485 16.3796C20.1281 16.4715 19.2572 16.4741 17.9445 16.4741V18.4741ZM14.032 37.562C12.2008 37.562 10.9281 37.5599 9.96897 37.4306C9.03882 37.3052 8.55444 37.0771 8.211 36.7328L6.79503 38.1452C7.5718 38.9239 8.54898 39.2573 9.70182 39.4127C10.8256 39.5641 12.2574 39.562 14.032 39.562V37.562ZM5.38281 30.8937C5.38281 32.6729 5.3807 34.1077 5.53171 35.2337C5.68655 36.3882 6.0186 37.3668 6.79503 38.1452L8.211 36.7328C7.86723 36.3881 7.63918 35.9015 7.51396 34.9679C7.38493 34.0057 7.38281 32.7293 7.38281 30.8937H5.38281ZM39.8043 30.8937C39.8043 32.7293 39.8022 34.0057 39.6732 34.9679C39.548 35.9015 39.3199 36.3881 38.9761 36.7328L40.3921 38.1452C41.1685 37.3668 41.5006 36.3882 41.6554 35.2337C41.8064 34.1077 41.8043 32.6729 41.8043 30.8937H39.8043ZM33.1551 39.562C34.9297 39.562 36.3615 39.5641 37.4853 39.4127C38.6381 39.2573 39.6153 38.9239 40.3921 38.1452L38.9761 36.7328C38.6327 37.0771 38.1483 37.3052 37.2182 37.4306C36.259 37.5599 34.9864 37.562 33.1551 37.562V39.562ZM41.8043 25.1424C41.8043 23.3632 41.8064 21.9284 41.6554 20.8024C41.5006 19.6478 41.1685 18.6692 40.3921 17.8909L38.9761 19.3033C39.3199 19.6479 39.548 20.1346 39.6732 21.0682C39.8022 22.0304 39.8043 23.3068 39.8043 25.1424H41.8043ZM33.1551 18.4741C34.9864 18.4741 36.259 18.4762 37.2182 18.6055C38.1483 18.7309 38.6327 18.959 38.9761 19.3033L40.3921 17.8909C39.6153 17.1121 38.6381 16.7788 37.4853 16.6234C36.3615 16.4719 34.9297 16.4741 33.1551 16.4741V18.4741ZM7.38281 11.7228C7.38281 10.7909 7.38493 10.1923 7.44395 9.7522C7.49915 9.34058 7.58718 9.22028 7.6509 9.1564L6.23493 7.74395C5.73855 8.24156 5.54652 8.85387 5.4617 9.48635C5.3807 10.0903 5.38281 10.8473 5.38281 11.7228H7.38281ZM10.2074 6.88867C9.33429 6.88867 8.5786 6.88654 7.97553 6.96782C7.34344 7.05302 6.73165 7.24599 6.23493 7.74395L7.6509 9.1564C7.71428 9.09286 7.83328 9.00508 8.24268 8.9499C8.68111 8.89081 9.27762 8.88867 10.2074 8.88867V6.88867Z" fill="#CCD2E3"/>
                                    </svg>
                                </div>
                                <div class="text">
                                    @php
                                        $array = explode('/' , $iconFolder);
                                        $foldername = end($array);
                                    @endphp
                                    <span class="f-12">{{ $foldername }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="sticky-data" x-show="show">
                            <div class="c-btn">
                                <button class="btn bg-danger text-white radius-5" @click="back()">
                                    برگشت
                                </button>
                            </div>
                        </div>
                        <div class="flex-wrap flex-100 m-flex-100 scroller pr-15" style="height: 390px" :class="{'d-flex' : show , 'd-none' : !show}">
                            @foreach($icons as $icon)
                                <div
                                    wire:click="sendIcons('{{ url('/icons/' . $icon->getRelativePathname()) }}')"
                                    class="flex-24 m-flex-47 d-flex align-items-center flex-direction-column bg-white box-design py-20 ml-5 mb-7 cursor-pointer">
                                    <div class="image">
                                        {!! \Illuminate\Support\Facades\File::get($icon) !!}
                                    </div>
                                    <div class="text">
                                        <span class="f-12">{{ $icon->getFilename() }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-parnas.modal>
</div>
