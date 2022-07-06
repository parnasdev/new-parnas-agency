@props(['lang' => ''])

<section class="blog-index">
    <div class="prs-responsive">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 m-auto-x"
                     data-aos="fade-down"
                     data-aos-easing="linear"
                     data-aos-duration="1200"
                >
                    <div class="parent-title-blog">
                        <div class="title">
                            <i class="icon-circle"></i>
                            <div class="text">
                                <h1 class="title-fa">{{ __('اخبار و مقالات') }}</h1>
                                <h1 class="title-en">Blog & News</h1>
                            </div>
                        </div>
                        <a href="{{ route('posts.index') }}" class="btn-view-blog">
                            <i class="icon-circle"></i>
                            {{ __('همه اخبار و مقالات') }}
                        </a>
                    </div>
                    <div class="blog-list blog-list-index">
                        @foreach(\App\Models\Post::query()->where('post_type' , 'post')->where('lang' , $lang)->where('status_id'  , 1)->limit(3)->get() as $post)
                            <div class="card-blog">
                                <figure class="top-blog">
                                    <label class="category-blog">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13.868" height="9.912"
                                             viewBox="0 0 13.868 9.912">
                                            <path id="Align_Center" data-name="Align Center"
                                                  d="M1,1H12.868M4.956,4.956H8.912M2.978,8.912H10.89" fill="none"
                                                  stroke="#c49c74" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"/>
                                        </svg>
                                        <span>{{ optional($post->categories()->first())->name ?? __('نوشته') }}</span>
                                    </label>
                                    <img class="img-blog" src="{{ optional($post->files()->where('type' , 1)->first())->url ?? '/images/noPicture.png' }}" alt="">
                                </figure>
                                <div class="bottom-blog">
                                    <div class="card-blog-title">
                                        <i class="icon-circle"></i>
                                        <h2 class="title-blog-link"><a href="{{ route('posts.show' , ['post' => $post->slug]) }}">{{ $post->title }}</a></h2>
                                    </div>
                                    <p class="card-description">
                                       {!! \Illuminate\Support\Str::limit(strip_tags($post->description) , 100) !!}
                                    </p>
                                    <a class="btn-Read-more" href="{{ route('posts.show' , ['post' => $post->slug]) }}">
                                        ادامه مطلب
                                        <i class="icon-left-big"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
