<div wire:poll>
    <div class="container-fluid">
        <div class="page-header min-height-150 border-radius-xl mt-2"
            style="background-image: url('{{ asset('theme/assets/img/curved-images/curved0.jpg') }}'); background-position-y: 50%;">
            <span class="mask bg-gradient-dark opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <a href="javascript:;" wire:click='showProfilePicUpload' data-bs-toggle="modal"
                            data-bs-target="#uploadModaldisable"> <img src={{ asset('utilisateur.png') }}
                                alt="profile_image" class="w-100 border-radius-lg shadow-sm"></a>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ Auth::user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ __('profile-messages.profile_header.latest_connection') }} :
                            {{ \Carbon\Carbon::parse(Auth::user()->last_login)->locale(app()->getLocale())->diffForHumans() }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 {{ $activeTab === 'general' ? 'active bg-dark text-white' : '' }}"
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true"
                                    wire:click='resetTab'>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span class="ms-1">{{ __('profile-messages.profile_header.general_menu') }}</span>
                                </a>
                            </li>
                            @if (auth()->user()->role === 'user')
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 {{ $activeTab === 'account' ? 'active bg-dark text-white' : '' }}"
                                        data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false"
                                        wire:click='showAccountTab'>
                                        <i class="fa fa-bank"></i>
                                        <span
                                            class="ms-1">{{ __('profile-messages.profile_header.account_menu') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 {{ $activeTab === 'wish' ? 'active bg-dark text-white' : '' }}"
                                        data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false"
                                        wire:click='showDocumentTab'>
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        <span
                                            class="ms-1">{{ __('profile-messages.profile_header.documents_menu') }}</span>
                                    </a>
                                </li>
                            @else
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row mb-5">

                <livewire:auth.components.profile-completion-progress />

            </div>
            @if ($activeTab === 'general')
                <livewire:auth.profile.update.user.update-user />
            @elseif ($activeTab === 'account')
                <livewire:auth.profile.update.account.update-account />
            @elseif ($activeTab === 'wish')
                <livewire:auth.profile.upload-documents.upload-files />
            @endif
            {{-- 
            @elseif($activeTab === 'profile-pic-upload')            
           
            @endif
            @livewire('profile-pic-upload') --}}
        </div>
    </div>
</div>
