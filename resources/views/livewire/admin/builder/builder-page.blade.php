<div>
    <section style="padding: 5rem"></section>
    <div class="section-saw col-xl-12 col-lg-12 col-12" style="position: relative;
    top: 70px;">
        <button class="image d-flex align-items-center justify-content-center ms-auto bg-white p-1 me-1"
                style="flex: 0 0 3%;max-width:3%;border-radius: 5px;cursor:pointer">
            <svg width="20" height="20" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19.4333 15.6532C19.4333 17.9267 17.5956 19.7655 15.3339 19.7655C13.0721 19.7655 11.2344 17.9267 11.2344 15.6532C11.2344 13.3798 13.0721 11.541 15.3339 11.541C17.5956 11.541 19.4333 13.3798 19.4333 15.6532Z"
                    stroke="#237e8c" stroke-width="2"/>
                <path
                    d="M26.0082 14.5827C26.3908 15.0629 26.5821 15.3031 26.5821 15.6527C26.5821 16.0024 26.3908 16.2425 26.0082 16.7227C24.3283 18.8313 20.182 23.321 15.3332 23.321C10.4844 23.321 6.33814 18.8313 4.6582 16.7227C4.27562 16.2425 4.08432 16.0024 4.08432 15.6527C4.08432 15.3031 4.27562 15.0629 4.6582 14.5827C6.33814 12.4741 10.4844 7.98438 15.3332 7.98438C20.182 7.98438 24.3283 12.4741 26.0082 14.5827Z"
                    stroke="#237e8c" stroke-width="2"/>
            </svg>
        </button>
    </div>
    <section class="bg-white" style="margin-top: 5rem;">
        <div class="container" wire:ignore>
            <div class="row g-1"
                 x-data="builder()">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            ابزارهای صفحه ساز
                        </div>
                        <!--? group[button]  -->
                        <div
                            class="c-group-btn d-flex flex-wrap justify-content-start col-xl-12 col-lg-12 col-12 p-2 ps-5">
                            <div class="c-btn select-objectData col-xl-2 col-lg-2 col-6 me-4 mb-2">
                                <button class="btn btn-sm btn-dark col-xl-12 col-lg-12 col-12" type="button"
                                        style="font-size: 12px;border-radius:10px;border:none;padding: 20px">
                                    همه ابزارها
                                </button>
                            </div>
                            {{--                            <div class="c-btn select-objectData col-xl-2 col-lg-2 col-6 me-4 mb-2">--}}
                            {{--                                <button class="btn btn-sm btn-dark col-xl-12 col-lg-12 col-12" type="button" style="font-size: 12px;border-radius:10px;border:none;padding: 20px"">--}}
                            {{--                                        ابزارهای نوشته--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="c-btn select-objectData col-xl-2 col-lg-2 col-6 me-4 mb-2">--}}
                            {{--                                <button class="btn btn-sm btn-dark col-xl-12 col-lg-12 col-12" type="button" style="font-size: 12px;border-radius:10px;border:none;padding: 20px"">--}}
                            {{--                                ابزارهای تصویر--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="c-btn select-objectData col-xl-2 col-lg-2 col-6 me-4 mb-2">--}}
                            {{--                                <button class="btn btn-sm btn-dark col-xl-12 col-lg-12 col-12" type="button" style="font-size: 12px;border-radius:10px;border:none;padding: 20px"">--}}
                            {{--                                    ابزارهای دیگر--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="c-btn select-objectData col-xl-2 col-lg-2 col-6 me-4 mb-2">--}}
                            {{--                                <button class="btn btn-sm btn-dark col-xl-12 col-lg-12 col-12" type="button" style="font-size: 12px;border-radius:10px;border:none;padding: 20px"">--}}
                            {{--                                    ستون بندی--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="c-btn select-objectData col-xl-2 col-lg-2 col-6 me-4 mb-2">--}}
                            {{--                                <button class="btn btn-sm btn-dark col-xl-12 col-lg-12 col-12" type="button" style="font-size: 12px;border-radius:10px;border:none;padding: 20px"">--}}
                            {{--                                    عنوان ها--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="c-btn select-objectData col-xl-2 col-lg-2 col-6 me-4 mb-2">--}}
                            {{--                                <button class="btn btn-sm btn-dark col-xl-12 col-lg-12 col-12" type="button" style="font-size: 12px;border-radius:10px;border:none;padding: 20px"">--}}
                            {{--                                   سایه ها--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}
                        </div>
                        <!--? group[component] -->
                        <div class="d-flex justify-content-start flex-wrap col-xl-12 col-lg-12 col-12 py-2 ps-4 pe-3">
                            <!-- child component -->
                            <template x-for="component in components">
                                <div class="c-component me-2 mb-2" style="flex: 0 0 13.1%;max-width:13.1%">

                                    <button
                                        class="col-xl-12 col-lg-12 col-12 d-flex flex-column align-items-center pt-3"
                                        style="font-size: 12px;border-radius:10px;border:none;"
                                        x-data="{draging: false}"
                                        x-on:dragstart="dragId = component.id ; draging = true"
                                        x-on:dragend="draging = false"
                                        draggable="true"
                                    >
                                        <svg class="mb-1" width="19" height="19" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.79 21.0009L3 11.2109V13.2109C3 13.7409 3.21 14.2509 3.59 14.6209L11.38 22.4109C12.16 23.1909 13.43 23.1909 14.21 22.4109L20.42 16.2009C21.2 15.4209 21.2 14.1509 20.42 13.3709L12.79 21.0009Z"
                                                fill="black"/>
                                            <path
                                                d="M11.38 17.41C11.77 17.8 12.28 18 12.79 18C13.3 18 13.81 17.8 14.2 17.41L20.41 11.2C21.19 10.42 21.19 9.15 20.41 8.37L12.62 0.58C12.25 0.21 11.74 0 11.21 0H5C3.9 0 3 0.9 3 2V8.21C3 8.74 3.21 9.25 3.59 9.62L11.38 17.41V17.41ZM5 2H11.21L19 9.79L12.79 16L5 8.21V2Z"
                                                fill="black"/>
                                            <path
                                                d="M7.25 5.5C7.94036 5.5 8.5 4.94036 8.5 4.25C8.5 3.55964 7.94036 3 7.25 3C6.55964 3 6 3.55964 6 4.25C6 4.94036 6.55964 5.5 7.25 5.5Z"
                                                fill="black"/>
                                        </svg>
                                        <span x-text="component.title"></span>
                                    </button>
                                </div>
                            </template>

                        </div>
                        <button class="btn btn-sm btn-success" type="button"
                                @click="publish()">
                            انتشار
                        </button>
                    </div>
                </div>
                <div class="col-md-12">
                    <div :class="{'bg-success' : addel}"
                         @drop="drop"
                         class="drop"
                         @dragover.prevent="addel = true"
                         @dragleave.prevent="addel = false">
                        <div class="edit" @click.prevent="edit(event)" x-ref="body"></div>
                    </div>

                    <div>
                        <form @submit.prevent="updateElement()" enctype="multipart/form-data"
                              x-show="el !== null">

                            <div class="mb-2"
                                 x-show="['h1' , 'h2' , 'h3' , 'h4' , 'h5' , 'h6' , 'a' , 'button'].includes(data.type)">
                                <label>متن</label>
                                <input type="text" class="form-control" x-model="data.text">
                            </div>

                            <div class="mb-2" x-show="data.type === 'p'">
                                <label>متن</label>
                                <textarea id="editor" x-init="


                                                    " x-model="data.text"></textarea>
                            </div>
                            <template x-if="['img'].includes(data.type)">
                                <div class="mb-2">

                                    <label for="image">تصویر</label>
                                    <input type="file" @change="uploadFile($el)">
                                    <div x-show="isUpload">
                                        <progress max="100" x-bind:value="progress"></progress>
                                    </div>
                                </div>
                            </template>
                            <template x-if="['h1' , 'h2' , 'h3' , 'h4' , 'h5' , 'h6'].includes(data.type)">
                                <div class="mb-2">
                                    <label>نوع تگ</label>
                                    <select class="form-select" x-model="data.type">
                                        <option value="h1">h1</option>
                                        <option value="h2">h2</option>
                                        <option value="h3">h3</option>
                                        <option value="h4">h4</option>
                                        <option value="h5">h5</option>
                                        <option value="h6">h6</option>
                                    </select>
                                </div>
                            </template>
                            <template x-if="['a' , 'button'].includes(data.type)">
                                <div class="mb-2">
                                    <label>نوع تگ</label>
                                    <select class="form-select" x-model="data.type">
                                        <option value="a">a</option>
                                        <option value="button">button</option>
                                    </select>
                                </div>
                            </template>
                            <template x-if="['a'].includes(data.type)">
                                <div class="mb-2">
                                    <label>لینک</label>
                                    <input type="text" class="form-control" x-model="data.href">
                                    <label>حالت باز کردن</label>
                                    <select class="form-select" x-model="data.target">
                                        <option value="null">-</option>
                                        <option value="_blank">_blank</option>
                                        <option value="_self">_self</option>
                                        <option value="_parent">_parent</option>
                                        <option value="_top">_top</option>
                                    </select>
                                </div>
                            </template>
                            <template x-if="data.hasOwnProperty('dataValue')">
                                <div class="mb-2">
                                    <label>دیتای مربط</label>
                                    <input type="text" class="form-control" x-model="data.dataValue">
                                </div>
                            </template>
                            <div class="mb-2">
                                <label>کلاس</label>
                                <textarea class="form-control" x-model="data.class" rows="5"></textarea>
                            </div>

                            <div class="mb-2">
                                <button class="btn btn-sm btn-primary">
                                    ثبت
                                </button>

                                <button type="button" class="btn btn-sm btn-danger"
                                        @click="deleteElement()">
                                    حذف
                                </button>

                                <button type="button" class="btn btn-sm btn-warning"
                                        @click="cancelElement()">
                                    انصراف
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('styles')
    <style>
        .c-group-btn {
            border-bottom: 2.5px solid gainsboro;
        }

        .select-objectData button {
            border: 3px solid gainsboro;
        }

        .edit {
            padding: 30px;
        }

        .drop {
            border: 3px dashed #e2e3e5;
            width: 100%;
            min-height: 150px;
        }

        [data-type="dropable"] {
            border: 3px dashed #e2e3e5;
            min-height: 150px;
        }

        .edit [data-type="editable"] {
            position: relative;
            padding: 10px;
        }

        .edit [data-type="editable"]:hover {
            border: 1px solid #000;
        }

        [x-data="formbuilder"]:after {
            content: "فرم ساز";
        }

    </style>
@endpush

@push('scripts')
    <script src="{{asset('assets/plugins/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>
    <script>
        function builder() {
            return {
                page: @entangle('page.body').defer,
                components: @js($components),
                addel: false,
                addtoel: false,
                dragId: 0,
                tab: "setting",
                el: null,
                data: {
                    text: '',
                    type: '',
                    href: '',
                    target: 'null',
                    class: '',
                    src: ''
                },
                file: '',
                isUpload: false,
                progress: 0,
                editor: null,
                init() {
                    if (this.page) {
                        this.$refs.body.innerHTML = this.page
                    }
                    tinymce.init({
                        selector: '#editor',
                        width: '100%',
                        height: 500,
                        theme: 'silver',
                        menubar: true,
                        branding: false,
                        skin: 'oxide',
                        toolbar1: 'undo redo | formatSelect | bold italic blockquote strikethrough underline forecolor backcolor | numlist bullist | alignright aligncenter alignleft alignjustify | rtl ltr | link unlink | removeformat',
                        fontsize_formats: '6pt 7pt 8pt 9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 17pt 18pt 19pt 20pt 21pt 22pt 23pt 24pt 25pt 26pt 27pt 28pt 29pt 30pt 32pt 34pt 36pt 40pt',
                        lineheight_formats: '1pt 2pt 3pt 4pt 5pt 6pt 7pt 8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 36pt 38pt 40pt 42pt 44pt 46pt 48pt 50pt 60pt 70pt 80pt 100pt',
                        directionality: 'rtl',
                        language: 'fa_IR',
                    });
                },
                drop(e) {
                    let component = this.components.find(x => x.id === this.dragId);

                    let dom = document.createElement(component.context);

                    if (component.options) {
                        let keys = Object.keys(component.options);

                        keys.forEach(item => {
                            dom.setAttribute(item, component.options[item])
                        });
                    }

                    if (['h1', 'p', 'a', 'button'].includes(component.context)) {
                        if (!component.inner)
                            dom.innerHTML = "لورم ایپسوم"
                    }

                    if (component.inner) {
                        component.inner.forEach(item => {
                            let child = item.split('-');
                            let domChild = document.createElement(child[0]);
                            domChild.setAttribute('data-type', child[1]);
                            if (child[0] === 'img') {
                                domChild.setAttribute('src', '/images/folder.png');
                                domChild.setAttribute('class', 'img-fluid');
                            }
                            dom.appendChild(domChild)
                        })
                    }

                    if (e.target.getAttribute('data-type') !== 'dropable') {
                        if (e.target.parentNode.getAttribute('data-type') === 'dropable') {
                            e.target.parentNode.appendChild(dom)
                        } else {
                            this.$refs.body.appendChild(dom);
                        }

                    } else {
                        e.target.appendChild(dom)
                    }

                    if (component.script) {
                        this.$refs.body.innerHTML += component.script;
                    }

                    this.addel = false;
                },
                edit(e) {
                    if (e.target.getAttribute('data-type') === 'editable') {

                        this.data = {
                            text: e.target.innerHTML,
                            type: e.target.tagName.toLowerCase(),
                            class: e.target.getAttribute('class')
                        };
                        if (this.data.type === 'a') {
                            this.data.href = e.target.href;
                            this.data.target = e.target.target;
                        }

                        if (this.data.type === 'img') {
                            this.data.src = e.target.src
                        }

                        if (this.data.type === 'p') {
                            tinymce.activeEditor.setContent(this.data.text)
                        }

                        if (e.target.hasAttribute('data-value')) {
                            this.data.dataValue = e.target.getAttribute('data-value')
                        }


                        this.el = e.target;
                        this.tab = 'setting';
                    }
                },
                deleteElement() {
                    this.el.remove();
                    this.cancelElement();
                },
                cancelElement() {
                    this.el = null;
                    this.data = {
                        text: '',
                        type: '',
                        href: '',
                        target: 'null',
                        class: '',
                        src: ''
                    };
                },
                updateElement() {
                    if (this.data.type !== this.el.tagName.toLowerCase()) {
                        let newOne = document.createElement(this.data.type);

                        if (this.data.class) {
                            let classes = this.data.class.split(' ');

                            classes.forEach(item => {
                                newOne.classList.add(item)
                            });
                        }

                        if (this.data.type === 'p') {
                            this.data.text = tinymce.activeEditor.getContent()
                        }

                        newOne.innerHTML = this.data.text;

                        if (this.data.type === 'a') {
                            newOne.setAttribute('href', this.data.href)
                            newOne.setAttribute('target', this.data.target)
                        }

                        newOne.setAttribute('data-type', this.el.getAttribute('data-type'))

                        this.$refs.body.replaceChild(newOne, this.el)

                    } else {
                        if (this.data.class) {
                            let classes = this.data.class.split(' ');

                            classes.forEach(item => {
                                this.el.classList.add(item)
                            });
                        } else {
                            this.el.removeAttribute('class');
                        }

                        if (this.data.type === 'p') {
                            this.data.text = tinymce.activeEditor.getContent()
                        }

                        this.el.innerHTML = this.data.text;

                        if (this.data.type === 'a') {
                            this.el.setAttribute('href', this.data.href)
                            this.el.setAttribute('target', this.data.target)
                        }

                        if (this.data.type === 'img') {
                            this.el.setAttribute('src', this.data.src)
                        }

                        if (this.data.hasOwnProperty('dataValue')) {
                            this.el.setAttribute('data-value', this.data.dataValue)
                        }
                    }

                    this.cancelElement();

                },
                publish() {
                    this.page = this.$refs.body.innerHTML
                    this.$wire.submit();
                },
                uploadFile(el) {
                    this.$wire.upload(
                        'photo',
                        el.files[0],
                        finishCallback = (uploadedFilename) => {
                            this.$wire.uploadFile().then(result => {
                                this.data.src = result;
                                this.isUpload = false;
                            })
                        },
                        errorCallback = () => {
                        },
                        progressCallback = (event) => {
                            this.isUpload = true;
                            this.progress = event.detail.progress
                        }
                    )
                }
            }
        }
    </script>

@endpush
