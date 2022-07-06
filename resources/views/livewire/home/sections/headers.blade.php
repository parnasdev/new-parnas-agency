<div>
    @if(str_starts_with($route , 'portifilos') || str_starts_with($route , 'posts') || str_starts_with($route , 'dashboard'))
        <x-parnas.layouts.home-section.headerTwo/>
    @else
        <x-parnas.layouts.home-section.header-desktop/>
    @endif
    <x-parnas.layouts.home-section.header-mobile :route="$route"/>
    <x-parnas.layouts.home-section.sidebar-mobi/>
</div>
