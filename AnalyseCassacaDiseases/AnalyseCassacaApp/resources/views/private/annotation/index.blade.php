@extends('layouts.app')

@section('titre', 'Gestion des annotations')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Gestion des annotions</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript: void(0);">Accueil</a>
                                    </li>
                                    {{-- <li class="breadcrumb-item active">Starter</li> --}}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Nouvelle annotation d'images </h4>
                            </div>
                            <div class="card-header">
                                <h4 class="card-title mb-0">Général </h4>
                            </div>
                            <div class="card-body form-steps">

                               <form action="{{ route('annotation-index-action', ['idOntologie' => $ontologie->id]) }}" method="post">
                                @csrf
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="steparrow-gen-info-email-input">Ontologie</label>
                                                <input type="text" class="form-control" name="ontologie_nom"
                                                    value="{{ $ontologie->nom }}" disabled
                                                    id="steparrow-gen-info-email-input">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="steparrow-gen-info-username-input">Dataset</label>
                                                <input type="text" class="form-control" name="dataset_nom"
                                                    value="{{ $ontologie->dataset->nom }}" disabled
                                                    id="steparrow-gen-info-username-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="steparrow-gen-info-password-input">Choisir la
                                            classes</label>
                                        <select name="classe_id" class="form-control" id="classe_id" required>
                                            @foreach ($classes as $classe)
                                                <option value="{{ $classe->id }}">{{ $classe->has_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                        
                                        <div class="d-flex align-items-start justify-content-between gap-1 mt-4">
                                            <a href="{{ route('ontologies.show', $ontologie->id) }}" type="button" class="btn btn-secondary btn-label left nexttab"
                                                data-nexttab="#steparrow-description-info" wire:click="retour">
                                                <i class="ri-arrow-left-line label-icon align-middle fs-16 ms-2"></i>Retour
                                        </a>
                                                <button type="submit" class="btn btn-success btn-label right ms-auto nexttab"
                                                    data-nexttab="#steparrow-description-info"><i
                                                        class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Etape suivante</button>
                                        </div>
                               </form>
                                <!-- end tab content -->
                            </div>
                            <!-- end card body -->
                        </div>
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
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        © Velzon.
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

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Navigation to the next tab
            document.querySelectorAll('.nexttab').forEach(button => {
                button.addEventListener('click', function() {
                    var nextTab = document.querySelector(this.getAttribute('data-nexttab'));
                    var nextTabButton = document.querySelector(
                        `button[data-bs-target='${this.getAttribute('data-nexttab')}']`);
                    var currentTab = document.querySelector('.tab-pane.active.show');
                    var currentTabButton = document.querySelector(
                        `button[data-bs-target='#${currentTab.id}']`);

                    if (nextTab) {
                        currentTab.classList.remove('active', 'show');
                        nextTab.classList.add('active', 'show');

                        currentTabButton.classList.remove('active');
                        nextTabButton.classList.add('active');
                    }
                });
            });

            // Navigation to the previous tab
            document.querySelectorAll('.previestab').forEach(button => {
                button.addEventListener('click', function() {
                    var previousTab = document.querySelector(this.getAttribute('data-previous'));
                    var previousTabButton = document.querySelector(
                        `button[data-bs-target='${this.getAttribute('data-previous')}']`);
                    var currentTab = document.querySelector('.tab-pane.active.show');
                    var currentTabButton = document.querySelector(
                        `button[data-bs-target='#${currentTab.id}']`);

                    if (previousTab) {
                        currentTab.classList.remove('active', 'show');
                        previousTab.classList.add('active', 'show');

                        currentTabButton.classList.remove('active');
                        previousTabButton.classList.add('active');
                    }
                });
            });
        });
    </script>
@endsection
