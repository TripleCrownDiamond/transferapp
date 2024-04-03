<div>
    <form class="mb-4" action="" method="post" wire:submit.prevent='updateMonthlyRevenue'>
        <h6>{{ __('profile-messages.update_user.updating_monthly_income') }}</h6>
        <div class="form-group row">
            <div class="col-12">
                <label for="monthly_revenue">{{ __('profile-messages.update_user.monthly_income_title') }}</label>
                @if ($actual_monthly_revenue === null)
                    <span><small>: {{ __('profile-messages.update_user.undefined_field') }}</small></span>
                    @if ($currency === null)
                        <small class="text-bold">{{ __('profile-messages.update_user.undefined_currency') }}</small>
                    @else
                        <small class="text-bold"> {{ $currency }} </small>
                    @endif
                @else
                    <span>
                        <small>: {{ $actual_monthly_revenue }}</small>
                        @if ($currency === null)
                            <small class="text-bold">{{ __('profile-messages.update_user.undefined_currency') }}</small>
                        @else
                            <small class="text-bold"> {{ $currency }} </small>
                        @endif
                    </span>
                @endif
                <input name="monthly_revenue" id="monthly_revenue" class="form-control" wire:model='monthly_revenue'
                    type="number" name="monthly_revenue" id="monthly_revenue"
                    placeholder="@if ($actual_monthly_revenue === null) {{ __('profile-messages.update_user.undefined_field') }}@else {{ $actual_monthly_revenue }} @endif">
                @error('monthly_revenue')
                    <small class="text-danger">{{ $message }}</small>
                    <br>
                @enderror
                <div class="col-4 mt-2">
                    <button class="btn btn-dark" type="submit" wire:click.prevent='updateMonthlyRevenue'
                        wire:loading.attr="disabled" wire:model='monthly_revenue'>
                        <span wire:loading
                            wire:model='monthly_revenue'>{{ __('profile-messages.update_form_buttons.updating') }}</span>
                        <span wire:loading.remove
                            wire:model='monthly_revenue'>{{ __('profile-messages.update_form_buttons.update') }}</span>
                    </button>
                </div>
            </div>
        </div>

        <hr>
    </form>
</div>
