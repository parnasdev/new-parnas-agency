@component('layouts.app')
    <div class="not-found">
        <div class="box-not-found">
            <img width="50%" src="/gif/404.gif" alt="">
            <span class="error-message">{{ __('Not Found') }}</span>
            <div class="button-not-found">
                <a class="btn-base" href="/">
                    صفحه اصلی
                </a>
            </div>
        </div>


    </div>

@endcomponent
{{--@section('title', __('Not Found'))--}}
{{--@section('code', '404')--}}
{{--@section('message', __('Not Found'))--}}
