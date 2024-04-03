<?php

namespace App\Livewire\Auth\Clients;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard')]
#[Title('Clients')]
class ClientsList extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $show_details_view = false;
    public $id;
    public $datas;
    public $user;
    public function showDetails(
        $id
    ) {
        $this->show_details_view = true;
        $this->id = $id;
        $this->user = User::find($this->id);
    }
    public function delete($id)
    {
        // Trouver l'utilisateur par son ID
        $user = User::find($id);

        if ($user) {
            // Supprimer les enregistrements associés dans la table 'accounts'
            $user->accounts()->delete();

            // Supprimer l'utilisateur
            $user->delete();

            $this->dispatch(
                'alert',
                type: 'success',
                title: __('login-register-messages.SwalErrorSuccess.success'),
                text: __('clients_page_messages.client_list.user_deleted'),
                position: 'center',
                timer: 2500
            );
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

        // Recharger la liste des utilisateurs
        $this->render();
    }

    public function render(
    ) {
        $users = User::where('role', '=', 'user')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.auth.clients.clients-list', ['users' => $users]);
    }

}
