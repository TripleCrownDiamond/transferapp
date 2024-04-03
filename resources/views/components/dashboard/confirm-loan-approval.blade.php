<div class="modal fade" tabindex="-1" id="confirm-loan-approval">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('loan-messages.confirm_modal.title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <strong class="">{{ __('loan-messages.confirm_modal.message_approval') }}</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"
                    data-bs-dismiss="modal">{{ __('loan-messages.confirm_modal.action_no') }}</button>
                <button type="button" class="btn btn-dark" wire:click="accept('{{ $loanId }}')"
                    wire:loading.attr="disabled">
                    {{ __('loan-messages.confirm_modal.action_yes') }}
                </button>

            </div>
        </div>
    </div>
</div>
