<div wire:poll>
    <h3>{{ __('dashboard-messages.content.hello') }}<span>{{ Auth::user()->name }}</span><span>👋</span></h3>

    <div class="row">
        <livewire:auth.components.status />
    </div>
    <div class="row">
        <livewire:auth.components.stats />
    </div>
    <br>
    <div class="row mb-5">

        <livewire:auth.components.profile-completion-progress />
        <livewire:auth.components.rib />

    </div>
</div>
