<x-parnas.layouts.home>
    <x-slot name="title">
        @stack('title')
    </x-slot>
    <x-slot name="styles">
        @stack('styles')
    </x-slot>
    <x-parnas.layouts.inner-layout>
        <x-slot name="addressbar">
            @stack('addressbar')
        </x-slot>
        <x-slot name="about_page">
            @stack('about_page')
        </x-slot>
        <x-slot name="page_title">
            @stack('page_title')
        </x-slot>
        <x-slot name="page_subtitle">
            @stack('page_subtitle')
        </x-slot>
        <x-slot name="page_quote">
            @stack('page_quote')
        </x-slot>
        {{ $slot }}
    </x-parnas.layouts.inner-layout>
    <x-slot name="scripts">
        @stack('scripts')
    </x-slot>
</x-parnas.layouts.home>
