@extends('layouts.app')

@section('titre', "Detail de la classe $classe->has_name")

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 ">Detail de la classes {{ $classe->has_name }}</h4>

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
                    <div class="col-lg-12">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row justify-content-beetwen g-2 ">

                    <div class="col">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-2 d-block d-lg-none">
                                <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 file-menu-btn">
                                    <i class="ri-menu-2-fill align-bottom"></i>
                                </button>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-0 mt-2 fs-18">{{ $classe->has_name }} ({{ $classe->sigle }})</h5>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-auto">
                        <div class="d-flex gap-2 align-items-start mb-3">
                                <a href="{{ route('download-ontologie') }}" class="btn btn-dark w-sm create-folder-modal">
                                    <i class="ri-download-fill align-bottom me-1"></i>
                                    Telecharger le dataset</a>
                                <a href="{{ route('annotation-index', $ontologie->id) }}"
                                    class="btn btn-danger w-sm create-folder-modal">
                                    <i class="ri-inbox-archive-fill align-bottom me-1"></i>
                                    Annoter</a>
                                
                        </div>
                    </div>
                    <!--end col-->
                </div>

                <div class="col-xxl-12">

                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#base-justified-home"
                                        role="tab" aria-selected="false">
                                        Images
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-justified-messages" role="tab"
                                        aria-selected="false">
                                        Informations
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#base-justified-settings" role="tab"
                                        aria-selected="true">
                                        Paramètre
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content  text-muted">
                                <div class="tab-pane active" id="base-justified-home" role="tabpanel">
                                    <div class="row">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">

                                                                    <div class="row gallery-wrapper">
                                                                        @foreach ($images as $image)
                                                                            <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"
                                                                                data-category="designing development">
                                                                                <div class="gallery-box card">
                                                                                    <div class="gallery-container">
                                                                                        <a class="image-popup"
                                                                                            href="#"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#exampleModalScrollable"
                                                                                            title="">
                                                                                            <img class="gallery-img img-fluid mx-auto"
                                                                                                src="{{ asset('storage/' . $image->path) }}"
                                                                                                alt="" />
                                                                                            <div class="gallery-overlay">
                                                                                                <h5 class="overlay-caption">
                                                                                                    {{ $image->classe->has_name }}
                                                                                                </h5>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>

                                                                                    <div class="box-content">
                                                                                        <div
                                                                                            class="d-flex align-items-center mt-1">
                                                                                            <div
                                                                                                class="flex-grow-1 text-muted">
                                                                                                by <a href=""
                                                                                                    class="text-body text-truncate">{{ $image->classe->dataset->ontologie->auteur_nom_prenom }}</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                    <!-- end row -->

                                                                    <div class="text-center my-2">
                                                                        <a href="javascript:void(0);"
                                                                            class="text-success"><i
                                                                                class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>
                                                                            Chargement en cours </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end row -->
                                                        </div>
                                                        <!-- ene card body -->
                                                    </div>
                                                    <!-- end card -->
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!--end card-->
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="base-justified-messages" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xxl-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Informations</h5>
                                                    <div class="vstack gap-2">
                                                        <div class="border rounded border-dashed p-2">
                                                            <div class="d-flex align-items-center">
                                                                <table class="table mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="fw-medium">Nom de la classe</td>
                                                                            <td>#{{ $classe->has_name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fw-medium">Ontologie</td>
                                                                            <td>{{ $ontologie->nom }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fw-medium">Label</td>
                                                                            <td>{{ $classe->label }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fw-medium">Sigle</td>
                                                                            <td><span
                                                                                    class="badge badge-soft-secondary">{{ $classe->sigle }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fw-medium">Total des images</td>
                                                                            <td><span
                                                                                    class="badge badge-soft-danger">{{ $classe->images_count }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fw-medium">Taille des images</td>
                                                                            <td><span
                                                                                    class="badge badge-soft-dark">{{ $classe->size_in_mo }}
                                                                                    Mo</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fw-medium">Date d'ajout</td>
                                                                            <td>{{ $classe->created_at }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--end card-->

                                            <!--end card-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Description</h5>
                                                    <div class="vstack gap-2">
                                                        <div class="border rounded border-dashed p-2">
                                                            <p class="mb-0">
                                                                {{ $classe->description }}
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Causes</h5>
                                                    <div class="vstack gap-2">
                                                        <div class="border rounded border-dashed p-2">
                                                            <p class="mb-0">
                                                                {{ $classe->cause }}
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Symtômes</h5>
                                                    <div class="vstack gap-2">
                                                        <div class="border rounded border-dashed p-2">
                                                            <p class="mb-0">
                                                                {{ $classe->symtome }}
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Traitements</h5>
                                                    <div class="vstack gap-2">
                                                        <div class="border rounded border-dashed p-2">
                                                            <p class="mb-0">
                                                                {{ $classe->traitement }}
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <!--end card-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Autres</h5>
                                                    <div class="vstack gap-2">
                                                        <div class="border rounded border-dashed p-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-sm">
                                                                        <div
                                                                            class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-folder-zip-line"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <h5 class="fs-13 mb-1"><a href="javascript:void(0);"
                                                                            class="text-body text-truncate d-block">{{ $classe->has_name }}_datasets.zip</a>
                                                                    </h5>
                                                                    <div>{{ $classe->images_count }}_MB</div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <div class="d-flex gap-1">
                                                                        <button type="button"
                                                                            class="btn btn-icon text-muted btn-sm fs-18"><i
                                                                                class="ri-download-2-line"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--end card-->
                                        </div>
                                        <!---end col-->
                                    </div>
                                </div>
                                <div class="tab-pane" id="base-justified-settings" role="tabpanel">
                                    <div class="row">

                                        <div class="d-flex justify-content-center">
                                            <div class="text-center">
                                                <img src="{{ asset('storage/' . $classe->path) }}" alt="" class="rounded-circle avatar-xl" />
                                                <p class="fs-16 mt-3">{{ $classe->has_name }}</p>
                                            </div>
                                        </div>
                                        <form action="{{ route('classes.update-classe', [$ontologie->id, $classe->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="col-xxl-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Edition des informations</h5>
                                                        <div class="vstack gap-2">
                                                            <div class="border rounded border-dashed p-2">
                                                                <div class="d-flex align-items-center">
                                                                    <table class="table mb-0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="fw-medium">Nom de la classe</td>
                                                                                <td><input type="text" name="has_name"
                                                                                        class="form-control"
                                                                                        value="{{ $classe->has_name }}" />
                                                                                </td>
                                                                                @error('has_name')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror

                                                                            </tr>
                                                                            <tr>
                                                                                <td class="fw-medium">Label</td>
                                                                                <td><input type="text" name="label"
                                                                                        class="form-control"
                                                                                        value="{{ $classe->label }}" />
                                                                                </td>
                                                                                @error('label')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="fw-medium">Sigle</td>
                                                                                <td><input type="text" name="sigle"
                                                                                        class="form-control"
                                                                                        value="{{ $classe->sigle }}" />
                                                                                    @error('sigle')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="fw-medium">Nouvelle image</td>
                                                                                <td><input type="file" name="image"
                                                                                        class="form-control" />
                                                                                    @error('image')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end card-->

                                                <!--end card-->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Description</h5>
                                                        <div class="vstack gap-2">
                                                            <div class="border rounded border-dashed p-2">
                                                                <textarea class="form-control" name="description" placeholder="Maximum 500 caractères" rows="3">{{ $classe->description }}</textarea>
                                                                @error('description')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Causes</h5>
                                                        <div class="vstack gap-2">
                                                            <div class="border rounded border-dashed p-2">
                                                                <p class="mb-0">
                                                                    <textarea class="form-control" name="cause" placeholder="Maximum 500 caractères" rows="3">{{ $classe->cause }}</textarea>
                                                                    @error('cause')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Symtômes</h5>
                                                        <div class="vstack gap-2">
                                                            <div class="border rounded border-dashed p-2">
                                                                <p class="mb-0">
                                                                    <textarea class="form-control" name="symptome" placeholder="Maximum 500 caractères" rows="3">{{ $classe->symtome }}</textarea>
                                                                    @error('symptome')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Traitements</h5>
                                                        <div class="vstack gap-2">
                                                            <div class="border rounded border-dashed p-2">
                                                                <p class="mb-0">
                                                                    <textarea class="form-control" name="traitement" placeholder="Maximum 500 caractères" rows="3">{{ $classe->traitement }}</textarea>
                                                                </p>
                                                                @error('traitement')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!---end col-->
                                            <div class="text-end mb-3">
                                                <button type="submit" class="btn btn-success w-sm">
                                                    <span>Sauvegarder l'ontologie</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>

            </div>
            <!-- container-fluid -->
        </div>

        {{-- <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Extration des caractéristiques</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <div class="live-preview">
                            <div class="d-flex ">
                                <img src="{{ asset('storage/' . $image->path) }}" class="img-fluid"
                                    alt="Responsive image">
                            </div>
                        </div>
                    </div>

                    <h6 class="fs-16 my-3">{{ $image->classe->has_name }}</h6>
                    <h6 class="fs-14 " style="text-decoration: underline">Caractéristiques couleurs</h6>
                    <div class="">
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Teinte moyenne : </p> <strong> {{ $image->couleur->has_hue_mean }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Teinte ecart type : </p> <strong> {{ $image->couleur->has_hue_std }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Saturation moyenne : </p> <strong>{{ $image->couleur->has_saturation_mean }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Saturation ecart type : </p> <strong>{{ $image->couleur->has_saturation_std }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Valeur moyenne : </p> <strong> {{ $image->couleur->has_value_mean }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Valeur ecart type : </p> <strong>{{ $image->couleur->has_value_std }}</strong>
                            </div>
                        </div>
                    </div>
                    <br>


                    <h6 class="fs-14 " style="text-decoration: underline">Caractéristiques contours</h6>
                    <div class="">
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Surface : </p> <strong> {{ $image->contour->has_area }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Perimetre : </p> <strong> {{ $image->contour->has_perimeter }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Largeur : </p> <strong> {{ $image->contour->has_width }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Hauteur : </p> <strong> {{ $image->contour->has_height }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Surface normalisee : </p> <strong>{{ $image->contour->has_normalized_area }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Perimetre normalise : </p> <strong>{{ $image->contour->has_normalized_perimeter }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Rapport aspect : </p> <strong> {{ $image->contour->has_aspect_ratio }}</strong>
                            </div>
                        </div>
                    </div>
                    <br>


                    <h6 class="fs-14 " style="text-decoration: underline">Caractéristiques de la texture</h6>
                    <div class="">
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Contraste : </p> <strong> {{ $image->texture->has_contrast }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Dissimilarité : </p> <strong> {{ $image->texture->has_dissimilarity }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Energie : </p> <strong> {{ $image->texture->has_energy }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Homogénéite : </p> <strong> {{ $image->texture->has_homogeneity }}</strong>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0">Correlation : </p> <strong> {{ $image->texture->has_correlation }}</strong>
                            </div>
                        </div>
                    </div>
                    <br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog --> --}}
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
