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

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Nouvelle annotation d'images </h4>
                            </div>
                            <div class="card-header">
                                <h4 class="card-title mb-0"> </h4>
                                <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                    <i class="ri-check-double-line label-icon"></i><strong>Général</strong> -
                                    (1ère etape finis)
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                                </div>
                            </div>
                            <div class="card-body form-steps">
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
                                                    value="{{ $dataset->nom }}" disabled
                                                    id="steparrow-gen-info-username-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="steparrow-gen-info-password-input">Classe selectionner</label>
                                        <select name="classe_id" class="form-control" id="classe_id" disabled required>
                                                <option value="{{ $classe->id }}">{{ $classe->has_name }}</option>
                                        </select>
                                    </div>
                                </div>

                               </form>
                                <!-- end tab content -->
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end col -->
                </div>

                @livewire('private.annotation.image-annotation', ['ontologie' => $ontologie, 'classe' => $classe])

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
