<!-- resources/views/livewire/add-utilisateur.blade.php -->

<div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="store">
        <div class="mb-3">
            <label for="nom_prenom" class="form-label">Nom</label>
            <input type="text" wire:model.defer="nom_prenom" class="form-control @error('nom_prenom') is-invalid @enderror" id="nom_prenom" required>
            @error('nom_prenom') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" wire:model.defer="email" class="form-control @error('email') is-invalid @enderror" id="email" required>
            @error('prenom') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
