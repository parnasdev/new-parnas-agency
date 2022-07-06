@props(['data' => []])

<section class="Introduction">
    <div id="bg-fix-Introduction"></div>
    <div id="bg-fix-Introduction-two">
        <div class=" parent-title-en-Introduction">
            <h1 class="one-title-en-floating">
                SUCCESS — PERSISTENCE — HARD WORK — PRIDE —SUCCESS — PERSISTENCE — HARD WORK — PRIDE —
                SUCCESS — PERSISTENCE — HARD WORK — PRIDE —SUCCESS — PERSISTENCE — HARD WORK — PRIDE —
                SUCCESS — PERSISTENCE — HARD WORK — PRIDE —SUCCESS — PERSISTENCE — HARD WORK — PRIDE —
                SUCCESS — PERSISTENCE — HARD WORK — PRIDE —SUCCESS — PERSISTENCE — HARD WORK — PRIDE —
            </h1>
            <h1 class="two-title-en-floating">
                SUPPORT — RESPECT — BEAUTY WILL SAVE THE WORLD —SUPPORT — RESPECT — BEAUTY WILL SAVE THE WORLD —
                SUPPORT — RESPECT — BEAUTY WILL SAVE THE WORLD —SUPPORT — RESPECT — BEAUTY WILL SAVE THE WORLD —
                SUPPORT — RESPECT — BEAUTY WILL SAVE THE WORLD —SUPPORT — RESPECT — BEAUTY WILL SAVE THE WORLD —
                SUPPORT — RESPECT — BEAUTY WILL SAVE THE WORLD —SUPPORT — RESPECT — BEAUTY WILL SAVE THE WORLD —
            </h1>
        </div>
    </div>
    <div class="prs-responsive">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 m-auto-x parent-Introduction">
                    <div class="top-Introduction">
                        <div class="titles-Introduction">
                            <div class="title">
                                <i class="icon-circle"></i>
                                <div class="text">
                                    <h1 class="title-fa">{{ $data['title'] }}</h1>
                                    <h1 class="title-en">{{ $data['titleEn'] }}</h1>
                                </div>
                            </div>
                            <p>{{ $data['text'] }}</p>
                        </div>
                        <div class="img-Introduction">
                            <img src="/img/M.safaei3.svg" width="200" alt="">
                        </div>
                    </div>
                    <div class="parent-tab-tab-Introduction">
                        <div id="tab-Introduction"
                             x-data="{tabs:'{{ collect($data['tabs'])->firstWhere('show' , true)['name'] ?? null }}'}">
                            <div class="top-tab">
                                @foreach($data['tabs'] as $tab)
                                    <div :class="{'active-class-Introduction':tabs==='{{ $tab['name'] }}'}"
                                         @click="tabs='{{ $tab['name'] }}'"
                                         class="item-Introduction">
                                        {!! $tab['icon'] !!}
                                        <span>{{ $tab['title'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="bottom-tab">
                                @foreach($data['tab_contents'] as $key => $content)
                                    <div class="tab-opened" x-show="tabs==='{{ $content['name'] }}'">
                                        <div class="tab-opened-details" x-data="{video:false}"
                                             x-init="$watch('video', (value) => {
                                                    if (value) {
                                                        $refs.video.play()
                                                    } else {
                                                        $refs.video.pause()
                                                    }
                                                })
                                                $watch('tabs' , value => {
                                                    video = false;
                                                    $refs.video.pause();
                                                })"
                                             x-transition:leave="animated fadeOutRight"
                                        >
                                            <div class="box-video" x-show="video===true">
                                                <button aria-label="Stop" class="close-video" @click="video=false">
                                                    <i class="icon-circle"></i>
                                                    بستن ویدیو
                                                </button>
                                                <div style="height: 100%;width: 100%"
                                                     :class="{'animated fadeInRight':video===true,'animated fadeOutRight':video===false}"
                                                     class="parents-videos">
                                                    <video style="object-fit: cover" width="100%" height="100%;"
                                                           x-ref="video"
                                                           id="plyr_{{ $key }}"
                                                           playsinline controls data-poster="{{ $content['poster'] }}">
                                                        <source src="{{ $content['video'] }}" type="video/mp4"/>
                                                    </video>
                                                </div>
                                            </div>
                                            <a class="button-fixed-rotate" href="{{ $content['btn1']['link'] }}">
                                                <i class="icon-circle"></i>
                                                {{ $content['btn1']['title'] }}</a>
                                            @if($content['video'] != '')
                                                <a class="play-video" @click="video=!video">
                                                    <img class="icon-play-video" src="/img/paly-video.svg" alt="">
                                                </a>
                                            @else
                                                <a class="play-video">
                                                    <img class="icon-play-video" src="/img/paly-video.svg" alt="">
                                                </a>
                                            @endif

                                            <div class="details-play-video">
                                                <div class="preview-text">
                                                    {{ $content['title'] }}
                                                </div>
                                                <div class="text-help-play-video">
                                                    {{ $content['subtitle'] }}
                                                </div>
                                            </div>

                                        </div>
                                        <img src="{{ $content['poster'] }}" width="100" alt="">
                                    </div>
                                    @push('scripts')
                                        <script>
                                            const player_{{ $key }} = new Plyr('#plyr_{{ $key }}')
                                        </script>
                                    @endpush
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
