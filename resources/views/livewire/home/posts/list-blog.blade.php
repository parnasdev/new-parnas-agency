<div>
    <section class="blog-index blog-page-list">
        <div class="prs-responsive">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto-x">
                        <div class="address-bar pb-4">
                            <div class="right-address-bar">
                                <svg class="location-svg" xmlns="http://www.w3.org/2000/svg" width="17.642"
                                     height="20.742" viewBox="0 0 17.642 20.742">
                                    <g id="Location" transform="translate(-0.229 -0.25)">
                                        <path id="Path_1011" data-name="Path 1011"
                                              d="M1.114,10.586a11.93,11.93,0,0,0,3.1,6.039,19.469,19.469,0,0,0,4.1,3.38,1.356,1.356,0,0,0,1.471,0,19.47,19.47,0,0,0,4.1-3.38,11.93,11.93,0,0,0,3.1-6.039,9.156,9.156,0,0,0-1.242-6.267A7.488,7.488,0,0,0,9.05,1,7.488,7.488,0,0,0,2.356,4.319,9.156,9.156,0,0,0,1.114,10.586Z"
                                              transform="translate(0)" fill="none" stroke="#212135"
                                              stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="1.5"/>
                                        <circle id="Ellipse_49" data-name="Ellipse 49" cx="3" cy="3" r="3"
                                                transform="translate(12.013 12.142) rotate(180)" fill="none"
                                                stroke="#212135"
                                                stroke-width="1.5"/>
                                    </g>
                                </svg>
                                <a>آکادمی مریم صفایی</a>
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="14.249"
                                     height="9.697" viewBox="0 0 14.249 9.697">
                                    <path id="Up_Arrow_2" data-name="Up Arrow 2" d="M1,5,5,1M5,1V13.8M5,1,9,5"
                                          transform="translate(-0.151 9.849) rotate(-90)" fill="none"
                                          stroke="#212135" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.2"/>
                                </svg>
                                <a>لیست مطالب</a>
                            </div>
                        </div>
                        <div class="parent-title-blog">
                            <div class="title">
                                <i class="icon-circle"></i>
                                <div class="text">
                                    <h1 class="title-fa">اخبار و مقالات</h1>
                                    <h1 class="title-en">Blog & News</h1>
                                </div>
                            </div>
                        </div>
                        @if(count($posts)===0)
                            <div class="box-empty-courses">
                                <svg viewBox="0 0 24 24" width="45" height="45">
                                    <path d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414A3.194,3.194,0,0,0,18.656.93Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0A1.123,1.123,0,0,1,21.656,3.93Z"/><path d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,0,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z"/></svg>

                                <p> لیست وبلاگ خالی است  </p>
                            </div>
                        @endif
                        <div class="blog-list">
                            @foreach($posts as $post)
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
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
