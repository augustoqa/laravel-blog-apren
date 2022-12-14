@if ($paginator->hasPages())
    <nav>
        <div class="pagination">
            <ul class="list-unstyled container-flex space-center">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li aria-label="@lang('pagination.previous')">
                        <a aria-hidden="true" disabled>&lsaquo;</a>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li aria-disabled="true"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li aria-current="page"><a class="pagination-active">{{ $page }}</a></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li aria-label="@lang('pagination.next')">
                        <a disabled>&rsaquo;</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
