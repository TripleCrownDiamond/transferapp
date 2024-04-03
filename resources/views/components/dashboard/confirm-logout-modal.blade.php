<div class="modal fade" tabindex="-1" id="confirm-logout-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('dashboard-messages.logout_modal.title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <strong class="">{{ __('dashboard-messages.logout_modal.message') }}</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"
                    data-bs-dismiss="modal">{{ __('dashboard-messages.logout_modal.action_no') }}</button>
                <a href={{ route('logout') }} type="button"
                    class="btn btn-dark">{{ __('dashboard-messages.logout_modal.action_yes') }}</a>
            </div>
        </div>
    </div>
</div>
