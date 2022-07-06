<div>
    @if ($paginator->hasPages())
        <div class="pagination">
            @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)
            @if($paginator->onFirstPage())
                <span type="button" class="btn-prev-page" ><i class="icon-right-open"></i></span>
            @else
                <button type="button" class="btn-prev-page" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="prev"><i class="icon-right-open"></i></button>
            @endif

            <div class="number-page">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <a>{{ $element }}</a>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                                <a class="{{ $page == $paginator->currentPage() ? 'active-page' : '' }}" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}"
                                   wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</a>
                        @endforeach
                    @endif
                @endforeach
            </div>

            @if ($paginator->hasMorePages())
                <button class="btn-next-page" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                        wire:loading.attr="disabled"><i class="icon-left-open"></i></button>
            @else
                <span class="btn-next-page"
                        wire:loading.attr="disabled"><i class="icon-left-open"></i></span>
            @endif


        </div>
    @endif
</div>
