@component('layouts.app')
<div class="not-found">
    <div class="box-not-found">
        <iframe src="https://embed.lottiefiles.com/animation/91191"></iframe>
        <span class="error-message">{{ __('Not Found') }}</span>
        <div class="button-not-found">
            <a class="btn-home-p-nf" href="/">
                <i class="icon-circle"></i>
                صفحه اصلی
            </a>
            <a class="btn-courses-nf" href="{{ route('courses.index') }}">
                <i class="icon-circle"></i>
                دوره ها</a>
        </div>
    </div>


</div>

@endcomponent
{{--@section('title', __('Not Found'))--}}
{{--@section('code', '404')--}}
{{--@section('message', __('Not Found'))--}}
