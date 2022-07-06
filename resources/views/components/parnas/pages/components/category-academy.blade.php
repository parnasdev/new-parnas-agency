@props(['data' => []]);
<section class="Education">
    <div class="prs-responsive">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 m-auto-x parent-Education">
                    <div class="title w-100 justify-content-center">
                        <div class="text align-items-center">
                            <h1 class="title-fa-second">{{ $data['title'] }}</h1>
                            <h1 class="title-en">{{ $data['titleEn'] }}</h1>
                        </div>
                    </div>
                    <div class="parent-box-eduction">
                        @php
                            $categories = \App\Models\Category::query()->whereIn('id' , $data['categoryAcademyIds'] ?? [])->get()
                        @endphp
                        @foreach($categories as $category)
                            <div class="box-eduction">
                                <figure class="img-eduction">
                                    <img class="img-fix" src="{{ optional($category->files()->first())->url }}"
                                         alt="{{optional($category->files()->first())->alt}}">
                                    <a class="view-box-eduction animated pulse"
                                       href="{{ route('courses.category', ['category'=>$category->slug]) }}">
                                        <img src="/img/M.safaei3.svg" width="200" alt="">
                                        <div class="view-category-text">
                                            <span>مشاهده دسته بندی</span>
                                            <i class="icon-circle"></i>
                                        </div>
                                    </a>
                                </figure>
                                <a href="{{ route('courses.category', ['category'=>$category->slug]) }}">
                                    <h3>آموزش {{ $category->name }}</h3>
                                </a>
                                <small>{{ $category->posts()->where('status_id' , getStatus('publish'))->count() }} دوره کامل</small>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
