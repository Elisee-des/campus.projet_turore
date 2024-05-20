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

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="project-title-input">Nom de l'ontologie</label>
                                <input type="text" class="form-control" id="project-title-input" placeholder="Veuillez definir le nom de l'ontologie">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="project-thumbnail-img">Assosier un image</label>
                                <input class="form-control" id="project-thumbnail-img" type="file" accept="image/png, image/gif, image/jpeg">
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3 mb-lg-0">
                                        <label for="choices-status-input" class="form-label">Status</label>
                                        <select class="form-select" data-choices data-choices-search-false id="choices-status-input">
                                            <option value="Inprogress" selected>En cours</option>
                                            <option value="Completed">Complet</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                    

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Description de l'ontologie</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-2">Definir une description qui caracterise l'ontologie</p>
                            <textarea class="form-control" placeholder="Maximun 100 caractèeres" rows="3"></textarea>
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
                                <select class="form-select" data-choices data-choices-search-false id="choices-categories-input">
                                    <option value="Maladies" selected>Maladies</option>
                                    <option value="Development">Development</option>
                                </select>
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
                                <input class="form-control" id="choices-text-input" data-choices data-choices-limit="Required Limit" placeholder="Entrer le nom de l'auteur" type="text" value="" />
                            </div>
                            <div class="mb-3">
                                <label for="choices-text-input" class="form-label">Email</label>
                                <input class="form-control" id="choices-text-input" data-choices data-choices-limit="Required Limit" placeholder="Entrer l'email de l'auteur" type="email" value="" />
                            </div>
                            <div class="mb-3">
                                <label for="choices-text-input" class="form-label">Telephone</label>
                                <input class="form-control" id="choices-text-input" data-choices data-choices-limit="Required Limit" placeholder="Entrer le numéro de l'auteur" type="number" value="" />
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-success w-sm">Enregistrer l'ontologie</button>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

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