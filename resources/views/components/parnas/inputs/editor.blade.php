
<div class="main-editor" x-data="
                    tinymce.init({
                        selector: '#'+$refs.editor.id,
                        placeholder: '{{ $attributes['placeholder'] ?? '' }}',
                        width: '100%',
                        height: 500,
                        theme:'silver',
                        menubar: true,
                        branding: false,
                        skin: 'oxide',
                        toolbar1: 'undo redo | formatSelect | bold italic blockquote strikethrough underline forecolor backcolor | numlist bullist | alignright aligncenter alignleft alignjustify | rtl ltr | link unlink | removeformat | template',
                        toolbar2: 'fontsizeselect | indent outdent | cut copy paste pastetext | charmap image media responsivefilemanager table emoticons hr | searchreplace preview code fullscreen help editormode',
                        plugins: 'lists,advlist,directionality,link,paste,charmap,table,emoticons,codesample,preview,code,fullscreen,help,hr,nonbreaking,searchreplace,visualblocks,visualchars,autolink,image,media,template',
                        advlist_bullet_styles: 'square,circle,disc',
                        advlist_number_styles: 'lower-alpha,lower-roman,upper-alpha,upper-roman',
                        help_tabs: ['shortcuts'],
                        fontsize_formats: '6pt 7pt 8pt 9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 17pt 18pt 19pt 20pt 21pt 22pt 23pt 24pt 25pt 26pt 27pt 28pt 29pt 30pt 32pt 34pt 36pt 40pt',
                        lineheight_formats: '1pt 2pt 3pt 4pt 5pt 6pt 7pt 8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 36pt 38pt 40pt 42pt 44pt 46pt 48pt 50pt 60pt 70pt 80pt 100pt',
                        directionality :'rtl',
                        language: 'fa_IR',
                        templates : [
                            {
                                title: 'قسمت بالا درباره ما',
                                description: '',
                                content: `
                                <section class='s-about-us-bottom-1'>
<div class='prs-responsive'>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-11 m-auto-x parent-about-us-1'>
                <div class='text-page-about'>
                    <div class='title-about-page'>
                        <i class='icon-circle'></i>
                        <h1 class='heading'>بزرگترین آکادمی زیبایی - در جهان</h1>
                    </div>
                    <p class='text' >لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                        است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                        فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. لورم
                        ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                        تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                </div>
                <div class='img-page-about'>
                    <img class='image-editor' src='/img/hero-down.jpg' alt=''>
                </div>
            </div>
        </div>
    </div>
</div>
<div class='col-md-11 m-auto-x page-about-us-bottom-1'>
</div>
</section>
                                `

                            },
                            {
                                'title' : 'قسمت وسط درباره ما',
                                'description': '',
                                'content': `
                                    <section class='s-about-us-bottom'>
    <div class='col-md-11 m-auto-x page-about-us-bottom'>
        <div data-aos='fade-up' data-aos-anchor-placement='center-bottom' data-aos-duration='1500'
             class='img-gold-fix'>
            <img src='/img/logo-gold.svg' alt=''>
        </div>
        <div class='img-right-about' data-aos='fade-left'
             data-aos-duration='1500'>
            <img src='/img/hero-up.jpg' alt=''>
        </div>
        <div class='img-center-about'>
            <div class='top-parent-img'
                 data-aos='fade-down'
                 data-aos-duration='1500'
            >
                <img src='/img/hero-left.jpg' alt=''>
            </div>
            <div class='bottom-parent-img'>
                <img data-aos='flip-right' data-aos-duration='1000' class='b-r' src='/img/hero-left.jpg' alt=''>
                <img data-aos='flip-left' data-aos-duration='1000' class='b-l' src='/img/hero-left.jpg' alt=''>

            </div>
        </div>
        <div class='img-left-about' data-aos='fade-right'
             data-aos-duration='1500'
        >
            <img src='/img/hero-right.jpg' alt=''>
        </div>
    </div>
</section>
                                `
                            },
                            {
                                'title' : 'قسمت پایین درباره ما',
                                'description': '',
                                'content': `
                                <section class='s-description-about'>
    <div class='s-responsive'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-11 m-auto-x parent-description'>
                    <img class='img-about-main' src='/img/hero-down.jpg' alt=''>
                    <p class='text-description'>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                        تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. لورم ایپسوم متن
                        ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون
                        بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                        کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                        تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. لورم ایپسوم متن
                        ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون
                        بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                        کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                        تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. لورم ایپسوم متن
                        ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون
                        بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                        کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                        تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. لورم ایپسوم متن
                        ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون
                        بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                        کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
                                `
                            }
                        ],
                        setup: function (editor) {
                            editor.on('init change', function () {
                                editor.save();
                            });
                            editor.on('change', function (e) {
                                $wire.set('{{$attributes->whereStartsWith('wire:model')->first()}}', editor.getContent());
                            });
                        },
                        file_picker_callback (callback, value, meta) {
                            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
                            let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

                            tinymce.activeEditor.windowManager.openUrl({
                                url : '/file-manager/tinymce5',
                                title : 'Laravel File manager',
                                width : x * 0.8,
                                height : y * 0.8,
                                onMessage: (api, message) => {
                                    callback(message.content, { text: message.text })
                                }
                            })
                        }
                    });
">
    <textarea x-ref="editor" {{ $attributes }}></textarea>
</div>
