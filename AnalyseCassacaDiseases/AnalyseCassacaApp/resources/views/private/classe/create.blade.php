@extends('layouts.app')

@section('titre', 'Gestion des classes')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Nouvelle des classes</h4>

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

                <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                  @if (session('success'))
                      <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                          {{ session('success') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  @endif
                  @if (session('error'))
                      <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                          {{ session('success') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  @endif
              </div>
            </div>

                <form action="{{ route('classes-create-action', $ontologie->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row d-flex justify-content-center mb-4">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Information sur la classe (Maladie)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="has_name" class="form-label">Nom de la classe</label>
                                        <input type="text" name="has_name" class="form-control"
                                            placeholder="Exple : Cassava Bacterial Blight" id="has_name">
                                        @error('has_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="sigle" class="form-label">Sigle de la classe</label>
                                        <input type="text" name="sigle" class="form-control"
                                            placeholder="Exple : CBB" id="sigle">
                                        @error('sigle')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="has_name" class="form-label">Associer une image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Description de la classe</h5>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted mb-2">Définir une description qui caractérise cette classe de
                                        maladie</p>
                                    <textarea class="form-control" name="description" placeholder="Maximum 4000 caractères" rows="3"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Les Causes</h5>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted mb-2">Définir les causes de cette maladie</p>
                                    <textarea class="form-control" name="cause" placeholder="Maximum 4000 caractères" rows="3"></textarea>
                                    @error('cause')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Les Symtômes</h5>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted mb-2">Définir les causes de cette maladie</p>
                                    <textarea class="form-control" name="symtome" placeholder="Maximum 4000 caractères" rows="3"></textarea>
                                    @error('cause')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Les traitements</h5>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted mb-2">Définir les traitements de cette maladie</p>
                                    <textarea class="form-control" name="traitement" placeholder="Maximum 4000 caractères" rows="3"></textarea>
                                    @error('traitement')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                          
                          <div class="d-flex align-items-start justify-content-between gap-1 mt-4">
                            <a href="{{ route('ontologies.show', $ontologie->id) }}" type="button" class="btn btn-secondary btn-label left nexttab"
                                data-nexttab="#steparrow-description-info" wire:click="retour">
                                <i class="ri-arrow-left-line label-icon align-middle fs-16 ms-2"></i>Retour
                          </a>
                            <button type="submit" class="btn btn-success btn-label right nexttab" data-nexttab="#steparrow-description-info">
                                <span>Enregistrer la classe <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i></span>
                            </button>
                        </div>
                        </div>

                    </div>
                </form>
                <!-- end page title -->
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
