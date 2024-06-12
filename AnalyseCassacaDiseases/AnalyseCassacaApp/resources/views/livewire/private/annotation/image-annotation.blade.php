<div class="row mb-4">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Nouvelle annotation d'images</h4>
            </div>
            <div class="card-header">
                <h4 class="card-title mb-0"></h4>
                <div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                    <i class="ri-check-double-line label-icon"></i><strong>Images</strong> -
                    (2ème étape)
                </div>
            </div>
            <div class="card-body form-steps">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Charger les images</label>
                    <input type="file" class="form-control" id="formFile" wire:model="images" multiple>
                    @error('images.*')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="d-flex flex-column mt-4">
                        <span class="d-block">Important !!!</span>
                        <span class="d-block text-danger">* Choisissez maximum 20 images en une seule fois</span>
                        <span class="d-block text-danger">* En cas de sélection supérieure à 20, seuls les premiers à
                            être sélectionnés sont comptés</span>
                        <span class="d-block text-danger">* À chaque sélection, le compteur d'images est remis à
                            0</span>
                    </div>
                </div>

                <div>
                    <label class="form-label" for="des-info-description-input">Images sélectionnées</label>
                    <div class="mx-n3 p-4">
                        <!-- Affichage des images déjà téléchargées -->
                        <div class="d-flex flex-wrap align-items-start gap-3 mt-1" id="imagePreviewContainer">
                            @foreach ($uploadedImages as $index => $image)
                                <div class="d-flex align-items-start gap-3">
                                    <img src="{{ Storage::url($image->path) }}" alt="Image" class="img-thumbnail"
                                        style="max-width: 100px;">
                                    <button type="button" class="btn btn-danger btn-label"
                                        wire:click="removeImage({{ $index }})">
                                        <i class="ri-delete-bin-line label-icon align-middle fs-16 me-2"></i>Supprimer
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <p>Nombre d'images prêtes à être annotées : {{ count($uploadedImages) }}</p>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <div class="d-flex align-items-start justify-content-between gap-1 mt-4">
            <button type="button" class="btn btn-secondary btn-label left nexttab"
                data-nexttab="#steparrow-description-info" wire:click="retour">
                <i class="ri-arrow-left-line label-icon align-middle fs-16 ms-2"></i>Étape 1
            </button>
            <button type="button" class="btn btn-success btn-label right nexttab" data-nexttab="#steparrow-description-info" wire:click="completeAnnotation" wire:loading.attr="disabled">
                <span wire:loading.remove>Terminer l'annotation <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i></span>
                <span wire:loading><i class="fas fa-spinner fa-spin"></i> En cours...</span>
            </button>
        </div>
    </div>
    <!-- end col -->
</div>

<script>
    document.getElementById('formFile').addEventListener('change', function(event) {
        var files = event.target.files;
        var container = document.getElementById('imagePreviewContainer');
        container.innerHTML = ''; // Clear previous previews

        for (var i = 0; i < files.length && i < 20; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail');
                img.style.maxWidth = '100px';
                container.appendChild(img);
            }

            reader.readAsDataURL(file);
        }
    });
</script>
