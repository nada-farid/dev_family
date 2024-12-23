@if ($paginator->hasPages())
    <div class="pagination-wrapper pagination-wrapper-center">
        <ul class="pg-pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true">
                    <a href="#" aria-label="@lang('pagination.previous')">
                        <i class="fi flaticon-back"></i>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')">
                        <i class="fi flaticon-back"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true">
                        <a href="#">{{ $element }}</a>
                    </li>
                @endif

                {{-- Array of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><a href="#">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">
                        <i class="fi flaticon-next"></i>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true">
                    <a href="#" aria-label="@lang('pagination.next')">
                        <i class="fi flaticon-next"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif
