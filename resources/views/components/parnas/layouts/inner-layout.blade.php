<section class="s-about-us-top">
    <div class="bg-dark-opacity"></div>
    <div class="prs-responsive">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-11 m-auto-x page-about-us-top">
                    <h1 class="title-fa">{{ $page_title ?? '' }}</h1>
                    <h1 class="title-en">{{ $page_subtitle ?? '' }}</h1>
                    <div class="text-top-about-us">
                        <h1>{{ $page_quote ?? '' }}</h1>
                    </div>
                    {{ $addressbar ?? '' }}
                </div>
            </div>
        </div>
    </div>
</section>

{{ $slot }}
