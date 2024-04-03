<div>
    <!-- Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload de la photo de profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadForm">
                        <div class="mb-3">
                            <label for="profilePhoto" class="form-label">Sélectionnez une photo</label>
                            <input class="form-control" type="file" id="profilePhoto">
                        </div>
                        <div class="mx-auto align-content-center align-items-center">                         
                            <div class="avatar avatar-xl position-relative mt-6 top-100 start-50 translate-middle" style="margin-left: auto; margin-right: auto ">
                                <a href="javascript:;" wire:click='showProfilePicUpload' data-bs-toggle="modal"
                                    data-bs-target="#uploadModal">
                                    @if ($profilePhoto)
                                    <img src="{{ $profilePhoto->temporaryUrl() }}" alt="profile_image"
                                        class="w-100 border-radius-lg shadow-sm d-block mx-auto">
                                    @else
                                    <img src="{{ asset('utilisateur.png') }}" alt="profile_image"
                                        class="w-100 border-radius-lg shadow-sm d-block mx-auto">
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="progress mb-3" style="display: none;">
                            <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    <button id="uploadButton" type="button" class="btn btn-dark">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Scripts Blade -->
@push('scripts')
<script>
    Livewire.on('showProfilePicUploadModal', () => {
        $('#uploadModal').modal('show');
    });

    Livewire.on('hideProfilePicUploadModal', () => {
        $('#uploadModal').modal('hide');
    });

    Livewire.on('profilePicUploadMounted', () => {
        $('#uploadModal').on('hidden.bs.modal', function () {
            Livewire.emit('hideProfilePicUploadModal');
        });

        // Réinitialise la prévisualisation de l'image lorsque la modal est affichée
        $('#uploadModal').on('show.bs.modal', function () {
            $('#preview').attr('src', '#');
        });

        // Affiche l'image téléchargée une fois qu'elle est chargée
        $('#profilePhoto').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result).addClass('d-block mx-auto');
            };
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endpush