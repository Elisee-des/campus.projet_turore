@extends('layouts.app')

@section('titre', "Nouvelle ontologie")

@section('content')
<div class="main-content">

    <div class="page-content">

        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Nouvelle Ontologie</h4>
        
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('ontologies.index')}}">Ontologies</a></li>
                                <li class="breadcrumb-item active">Nouvelle ontologie</li>
                            </ol>
                        </div>
        
                    </div>
                </div>
            </div>
            <!-- end page title -->
        
            <form action="{{ route('ontologies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="project-title-input">Nom de l'ontologie</label>
                                    <input type="text" name="nom" class="form-control" id="project-title-input" placeholder="Veuillez definir le nom de l'ontologie">
                                    @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
        
                                </div>
        
                                <div class="mb-3">
                                    <label class="form-label" for="project-thumbnail-img">Assosier un image</label>
                                    <input class="form-control" name="image" id="project-thumbnail-img" type="file" accept="image/png, image/gif, image/jpeg, image/jpg">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
        
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-lg-0">
                                            <label for="choices-status-input" class="form-label">Status</label>
                                            <select class="form-select" name="status" data-choices data-choices-search-false id="choices-status-input">
                                                <option value="Inprogress" selected>En cours</option>
                                                <option value="Completed">Complet</option>
                                            </select>
                                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
        
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Fichier de l'ontologie</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="project-thumbnail-img">Charger le fichier <span class="text-primary">.OWL</span></label>
                                    <input class="form-control" name="fichier_owl" id="project-thumbnail-img" type="file" accept=".owl">
                                    @error('fichier_owl') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            
                        </div>
                        
        
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Description de l'ontologie</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-2">Definir une description qui caracterise l'ontologie</p>
                                <textarea class="form-control" name="description" placeholder="Maximun 200 caractèeres" rows="3"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
        
                    <!-- end col -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Tags</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-categories-input" class="form-label">Catégories</label>
                                    <select class="form-select" name="categorie" data-choices data-choices-search-false id="choices-categories-input">
                                        <option value="Maladies" selected>Maladies</option>
                                        <option value="Development">Development</option>
                                    </select>
                                    @error('categorie') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
        
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
        
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Autheur de l'ontologie</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-text-input" class="form-label">Nom prénom</label>
                                    <input class="form-control" name="auteur_nom_prenom" id="choices-text-input" data-choices data-choices-limit="Required Limit" placeholder="Entrer le nom de l'auteur" type="text" value="" />
                                    @error('auteur_nom_prenom') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="choices-text-input" class="form-label">Email</label>
                                    <input class="form-control" name="auteur_email" id="choices-text-input" data-choices data-choices-limit="Required Limit" placeholder="Entrer l'email de l'auteur" type="email" value="" />
                                    @error('auteur_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="choices-text-input" class="form-label">Telephone</label>
                                    <input class="form-control" name="auteur_telephone" id="choices-text-input" data-choices data-choices-limit="Required Limit" placeholder="Entrer le numéro de l'auteur" type="number" value="" />
                                    @error('auteur_telephone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="choices-text-inputf" class="form-label">Photo</label>
                                    <input class="form-control" name="auteur_photo" id="choices-text-inputf"  type="file" />
                                    @error('auteur_photo') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="text-end mb-3">
                        <button class="btn btn-success w-sm">
                            <span>Enregistrer l'ontologie</span>
                        </button>
                    </div>
                    <!-- end col -->
                </div>
            </form>
        </div>
        
    </div>


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Velzon.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection