<div wire:poll.5000ms>
    <h3>{{ __('loans-messages.loan_request.request_title') }}</h3>
    <div>
    </div>
    @if ($progress < 100)
        <div>
            <h6 class="text-danger">{{ __('loans-messages.loan_request.profile_uncompleted') }}</h6>
        </div>
    @else
        <div>
            <form wire:submit.prevent="submit" wire:loading.attr="disabled">
                <div class="form-group">
                    <label for="amount">{{ __('loans-messages.loan_request.amount') . ' ' . $currency }} </label>
                    <input type="number" class="form-control" id="amount" wire:model="amount">
                    @error('amount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type">{{ __('loans-messages.loan_request.type') }}</label>
                    <select class="form-control" id="type" wire:model="type">
                        <option value=''>{{ __('loans-messages.loan_request.select') }}</option>
                        @foreach ($credit_types as $credit_type)
                            <option value="{{ $credit_type->id }}">
                                {{ __('loans-messages.loan_types.' . $credit_type->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('type')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="duration">{{ __('loans-messages.loan_request.duration') }}</label>
                    <input type="number" class="form-control" id="duration" wire:model="duration">
                    @error('duration')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="reason">{{ __('loans-messages.loan_request.reason') }}</label>
                    <textarea class="form-control" id="reason" wire:model="reason"></textarea>
                    @error('reason')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark" wire:click.prevent="submit" wire:loading.attr="disabled"
                    wire:target="submit">
                    <span wire:loading.delay wire:target="submit">
                        {{ __('loans-messages.loan_request.submitting') }}
                    </span>
                    <span wire:loading.delay.remove wire:target="submit">
                        {{ __('loans-messages.loan_request.submit') }}
                    </span>
                </button>
            </form>
        </div>
        <hr>
        <br>
        @if ($loans != null)
            <div class='col-md-12'>
                <nav>
                    <a href="javascript:;" class="btn btn-link w-100" wire:click="navigateToLoans">
                        {{ __('loans-messages.loan_request.see_loans') }}
                    </a>
                </nav>
            </div>
        @else
        @endif
    @endif
</div>
