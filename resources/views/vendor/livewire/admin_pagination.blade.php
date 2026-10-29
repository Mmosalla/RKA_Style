@php
    if (! isset($scrollTo)) {
        $scrollTo = 'body';
    }

    $scrollIntoViewJsSnippet = ($scrollTo !== false)
        ? <<<JS
           (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
        JS
        : '';
@endphp






<div>
    @if ($paginator->hasPages())
        <nav class="pagination" aria-label="صفحه‌بندی دسته‌بندی‌ها">

            <div class="pagination__info">
                نمایش
                <strong>{{ $paginator->firstItem() }}</strong>
                تا
                <strong>{{ $paginator->lastItem() }}</strong>
                از
                <strong>{{ $paginator->total() }}</strong>
                دسته‌بندی
            </div>

            <div class="pagination__controls">

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <button
                        type="button"
                        class="page-btn"
                        disabled
                        aria-label="صفحه قبل"
                    >
                        <svg>
                            <use href="#i-arrow-right"/>
                        </svg>
                        <span>قبلی</span>
                    </button>
                @else
                    <button
                        type="button"
                        dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                        class="page-btn"
                        wire:click="previousPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{ $scrollIntoViewJsSnippet }}"
                        wire:loading.attr="disabled"
                        aria-label="صفحه قبل"
                    >
                        <svg>
                            <use href="#i-arrow-right"/>
                        </svg>
                        <span>قبلی</span>
                    </button>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)

                    {{-- Three Dots Separator --}}
                    @if (is_string($element))
                        <button
                            type="button"
                            class="page-btn page-btn--dots"
                            disabled
                            aria-hidden="true"
                        >
                            …
                        </button>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)

                            @if ($page == $paginator->currentPage())
                                <button
                                    type="button"
                                    class="page-btn is-active"
                                    wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}"
                                    aria-label="صفحه {{ $page }}"
                                    aria-current="page"
                                    disabled
                                >
                                    {{ $page }}
                                </button>
                            @else
                                <button
                                    type="button"
                                    class="page-btn"
                                    wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}"
                                    wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                    x-on:click="{{ $scrollIntoViewJsSnippet }}"
                                    aria-label="صفحه {{ $page }}"
                                >
                                    {{ $page }}
                                </button>
                            @endif

                        @endforeach
                    @endif

                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button
                        type="button"
                        dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                        class="page-btn"
                        wire:click="nextPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{ $scrollIntoViewJsSnippet }}"
                        wire:loading.attr="disabled"
                        aria-label="صفحه بعد"
                    >
                        <span>بعدی</span>

                        <svg>
                            <use href="#i-arrow-left"/>
                        </svg>
                    </button>
                @else
                    <button
                        type="button"
                        class="page-btn"
                        disabled
                        aria-label="صفحه بعد"
                    >
                        <span>بعدی</span>

                        <svg>
                            <use href="#i-arrow-left"/>
                        </svg>
                    </button>
                @endif

            </div>

        </nav>
    @endif
</div>
