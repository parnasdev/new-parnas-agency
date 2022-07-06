<div>
    <div class="parent-list-courses-dashboard">
        @forelse($latestCourses as $course)
            <div class="courses-item-dashboard">
                {{--                <label for="" class="label-id-courses">{{ $course->id }}</label>--}}
                <a class="w-100" target="_blank" href="{{ $course->post->path() }}">
                    <img class="img-courses"
                         src="{{ $course->post->files->firstWhere('type' , 1)?->url ?? '/images/noPicture.png' }}"
                         alt="">
                </a>
                <div class="details-courses">
                    <div class="info">
                        <span class="title">نام دوره</span>
                        <a href="{{ $course->post->path() }}" target="_blank"
                           class="text">{{ $course->post->title }}</a>
                    </div>
                    <div class="info">
                        <span class="title">نام مدرس</span>
                        <span
                            class="text">{{ \App\Models\User::find($course->post->options['teacher'])?->name . ' ' . \App\Models\User::find($course->post->options['teacher'])?->family }}</span>
                    </div>
                    <div class="info">
                        <span class="title">تاریخ انقضا</span>
                        <span class="text">{{ jdate($course->expire)->format('Y-m-d') }}</span>
                    </div>
                    <div class="info">
                        <span class="title">قیمت دوره</span>
                        <span class="text">{{ number_format($course->post->options['price']) }}تومان </span>
                    </div>


                </div>
                <a class="btn-view" href="{{ $course->post->path() }}" target="_blank">
                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.4333 15.6532C19.4333 17.9267 17.5956 19.7655 15.3339 19.7655C13.0721 19.7655 11.2344 17.9267 11.2344 15.6532C11.2344 13.3798 13.0721 11.541 15.3339 11.541C17.5956 11.541 19.4333 13.3798 19.4333 15.6532Z"
                            stroke="#CCD2E3" stroke-width="2"/>
                        <path
                            d="M26.0082 14.5827C26.3908 15.0629 26.5821 15.3031 26.5821 15.6527C26.5821 16.0024 26.3908 16.2425 26.0082 16.7227C24.3283 18.8313 20.182 23.321 15.3332 23.321C10.4844 23.321 6.33814 18.8313 4.6582 16.7227C4.27562 16.2425 4.08432 16.0024 4.08432 15.6527C4.08432 15.3031 4.27562 15.0629 4.6582 14.5827C6.33814 12.4741 10.4844 7.98438 15.3332 7.98438C20.182 7.98438 24.3283 12.4741 26.0082 14.5827Z"
                            stroke="#CCD2E3" stroke-width="2"/>
                    </svg>
                    مشاهده دوره
                </a>
            </div>
        @empty
        @endforelse
    </div>
</div>
@push('title' , 'پیشخوان')
