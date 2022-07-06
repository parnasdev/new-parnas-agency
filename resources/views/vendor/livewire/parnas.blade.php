<div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)

        <ul class="ul-pagination justify-content-end">
            <li class="li-pagination radius-8">
                <button type="button"
                        {{ $paginator->onFirstPage() ? 'disabled' : '' }}
                        dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                        wire:click="previousPage('{{ $paginator->getPageName() }}')" class="text-white f-10"
                        wire:loading.attr="disabled">
                    <svg width="20" height="20" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.9414 15.5726L20.6494 14.8664L21.3539 15.5726L20.6494 16.2789L19.9414 15.5726ZM13.0002 7.19807L20.6494 14.8664L19.2334 16.2789L11.5842 8.61052L13.0002 7.19807ZM20.6494 16.2789L13.0002 23.9472L11.5842 22.5347L19.2334 14.8664L20.6494 16.2789Z"
                            fill="#fff"></path>
                    </svg>
                </button>
            </li>

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="li-pagination radius-8">
                        <button type="button" disabled class="text-white">{{ $element }}</button>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)

                        <li class="li-pagination  {{ $page == $paginator->currentPage() ? 'active-pagination' : '' }} radius-8"
                            wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}">
                            <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                    {{ $page == $paginator->currentPage() ? 'disabled' : '' }}
                                    class="text-white">{{ $page }}</button>
                        </li>
                    @endforeach
                @endif
            @endforeach

            <li class="li-pagination radius-8">
                <button type="button"
                        {{ !$paginator->hasMorePages() ? 'disabled' : '' }}
                        dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                        wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                        class="text-white f-10">
                    <svg width="20" height="20" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.8359 23.2251L17.1279 22.5189L16.4235 23.2251L17.1279 23.9314L17.8359 23.2251ZM28.6018 11.0164L17.1279 22.5189L18.5439 23.9314L30.0178 12.4289L28.6018 11.0164ZM17.1279 23.9314L28.6018 35.4339L30.0178 34.0214L18.5439 22.5189L17.1279 23.9314Z"
                            fill="#fff"></path>
                    </svg>
                </button>
            </li>
        </ul>
    @endif

</div>
