<div>
    {{-- Be like water. --}}

    <div class="d-flex justify-content-center">
        @if($paginator->hasPages())
        <nav class="mt-2">
            <ul class="pagination" role='navigation'>
                {{-- Verify if its first page --}}
                @if(!$paginator->onFirstPage())
                <li class="d-none d-md-block page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </li>
                @endif

                @if($paginator->currentPage() > 2)
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
                </li>
                @endif

                @if($paginator->currentPage() > 3)
                <li class="page-item"><span class="page-link">...</span></li>
                @endif

                @foreach(range(1, $paginator->lastPage()) as $i)
                @if($i >= $paginator->currentPage() - 1 && $i <= $paginator->currentPage() + 1)
                    @if($i == $paginator->currentPage())
                    <li class="page-item active">
                        <span class="page-link">{{$i}}</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                    @endif
                    @endif
                    @endforeach

                    @if($paginator->currentPage() < $paginator->lastPage() - 2)
                        <li class="page-item"><span class="page-link">...</span></li>
                        @endif

                        @if($paginator->currentPage() < $paginator->lastPage() - 1)
                            <li class="page-item">
                                <a class="page-link" href="{{$paginator->url($paginator->lastPage())}}">{{$paginator->lastPage()}}</a>
                            </li>
                            @endif

                            @if($paginator->hasMorePages())
                            <li class="page-item d-none d-md-block">
                                {{-- {{ $paginator->nextPageUrl() }} --}}
                                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" >
                                    <i class="fa fa-angle-right"></i>
                                    <span class="sr-only">{{__('pagination.next')}}</span>
                                </a>
                            </li>
                            @endif
            </ul>
        </nav>
        @endif
    </div>
</div>
