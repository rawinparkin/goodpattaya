<div class="site-pagination">

    @if ($paginator->hasPages())



    @if ($paginator->onFirstPage())

    <a href="#" class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">&lt;</a>

    @else

    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lt;</a>

    @endif

    @foreach ($elements as $element)

    @if (is_string($element))
    <a class="disabled" aria-disabled="true"><span>{{ $element }}</span></a>
    @endif


    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <a class="active" aria-current="page"><span>{{ $page }}</span></a>
    @else
    <a href="{{ $url }}">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())

    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&gt;</a>

    @else
    <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
        <span aria-hidden="true">&gt;</span>
    </a>
    @endif






    @endif

</div>