<div class='container'>
    @if ($paginator->hasPages())
        <nav class="float-end" role="navigation" aria-label="Pagination Navigation">
            <span>
                @if ($paginator->onFirstPage())
                    <span style="text-transform: capitalize;">{{ __('paginate.previous') }}</span>
                @else
                    <button class="btn btn-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                        style="text-transform: capitalize;">{{ __('paginate.previous') }}</button>
                @endif
            </span>

            <span>
                @if ($paginator->onLastPage())
                    <span style="text-transform: capitalize;">{{ __('paginate.next') }}</span>
                @else
                    <button class="btn btn-link" wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                        style="text-transform: capitalize;">{{ __('paginate.next') }}</button>
                @endif
            </span>
        </nav>
    @endif
</div>
