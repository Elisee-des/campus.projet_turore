<!-- resources/views/livewire/create-class-livewire.blade.php -->

<div>
    <button class="btn btn-success w-sm" data-bs-toggle="modal" data-bs-target="#createClassModal">
        <i class="ri-add-line align-bottom me-1"></i> Nouvelle Classe
    </button>

    <div wire:ignore.self class="modal fade zoomIn" id="createClassModal" tabindex="-1" aria-labelledby="createClassModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-success">
                    <h5 class="modal-title" id="createClassModalLabel">Nouvelle Classe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submit" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label for="label" class="form-label">Label</label>
                            <input type="text" wire:model="label" class="form-control" id="label" disabled required>
                            <div class="invalid-feedback">Veuillez définir le label.</div>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea wire:model="description" class="form-control" id="description" rows="3" disabled></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="has_name" class="form-label">Nom</label>
                            <input type="text" wire:model="has_name" class="form-control" id="has_name">
                        </div>
                        <div class="mb-4">
                            <label for="dataset_id" class="form-label">Dataset</label>
                            <select wire:model="dataset_id" class="form-control" id="dataset_id" disabled required>
                                <option value="">Sélectionner un dataset</option>
                                @foreach($datasets as $dataset)
                                    <option value="{{ $dataset->id }}">{{ $dataset->nom }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Veuillez sélectionner un dataset.</div>
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal">
                                <i class="ri-close-line align-bottom"></i> Fermer
                            </button>
                            <button type="submit" class="btn btn-primary">Ajouter la Classe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('close-modal', () => {
            var myModalEl = document.getElementById('createClassModal');
            var modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide();
        });
    });
</script>
