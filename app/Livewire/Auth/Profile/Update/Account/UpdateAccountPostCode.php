<?php

namespace App\Livewire\Auth\Profile\Update\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateAccountPostCode extends Component
{
    public $user;
    public $account;
    public $post_code;
    public $actual_post_code;
    public $profileScore;

    public function mount()
    {
        $this->user = auth()->user();
        $accounts = auth()->user()->accounts;
        $this->account = $accounts->first();
        $this->actual_post_code = $this->account->post_code;

    }

    public function updatePostCode()
    {
        $validate_post_code = $this->validate([
            'post_code' => 'required',
        ], [
            'post_code.required' => __('profile-messages.update_account.post_code.required')
        ]);

        if ($validate_post_code) {

            $authUser = Auth::user();

            $accounts = $authUser->accounts;

            if ($accounts->isNotEmpty()) {
                $account = $accounts->first();

                if ($account->post_code === null) {
                    $this->profileScore = intval($account->profile_completion_percentage) + 5;
                    $account->profile_completion_percentage = $this->profileScore;
                    $account->save();
                }
            }

            $this->account->post_code = $this->post_code;
            $account = $this->account->save();

            if ($account) {

                $this->reset([
                    'post_code',
                ]);

                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: __('login-register-messages.SwalErrorSuccess.success'),
                    text: __('profile-messages.update_account.post_code_updated'),
                    position: 'center',
                    timer: 2500
                );
            }

            // Update $actual_name
            $this->actual_post_code = $this->account->post_code;

        } else {
            $this->dispatch(
                'alert',
                type: 'error',
                title: __('login-register-messages.SwalErrorSuccess.oups'),
                text: __('login-register-messages.Register.something_went_wrong'),
                position: 'center',
                timer: 2500
            );
        }
    }

    public function render()
    {
        return view('livewire.auth.profile.update.account.update-account-post-code');
    }
}
