@component('layouts.app')
    <div class="not-found">
        <div class="box-not-found">
            <span>403</span>
            <span class="error-message">{{__($exception->getMessage() ?: 'Forbidden')}}</span>
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
