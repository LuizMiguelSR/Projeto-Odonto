<nav aria-label="navigation">
	@if ($paginator->hasPages())
        <ul class="pagination justify-content-end pt-4 pb-2">

            @if($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link bg-custom border-dark">Anterior</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link bg-custom border-dark link-light" href="{{ $paginator->previousPageUrl() }}">Anterior</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item bg-custom border-dark link-light disabled">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item bg-custom border-dark link-light active">
                                <a class="page-link bg-custom border-dark link-light">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link bg-custom border-dark link-light" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item bg-custom border-dark link-light">
                    <a class="page-link bg-custom border-dark link-light" href="{{ $paginator->nextPageUrl() }}">Próximo</a>
                </li>
            @else
                <li class="page-item bg-custom border-dark link-light disabled">
                    <a class="page-link bg-custom border-dark" href="{{ $paginator->nextPageUrl() }}">Próximo</a>
                </li>
            @endif
        </ul>
    @endif
</nav>
