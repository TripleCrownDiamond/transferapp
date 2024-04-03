<?php

namespace App\Livewire\Auth\Profile\Update\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateUser extends Component
{
    public function render()
    {
        return view('livewire.auth.profile.update.user.update-user');
    }
}
