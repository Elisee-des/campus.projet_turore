@extends('layouts.app')

@section('titre', "Detail de l'ontologie $ontologie->nom")

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-n4 mx-n4">
                            <div class="bg-soft-warning">
                                <div class="card-body pb-0 px-4">
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <div class="row align-items-center g-3">
                                                <div class="col-md-auto">
                                                    <div class="avatar-md">
                                                        <div class="avatar-title bg-white rounded-circle">
                                                            @if ($ontologie->photo)
                                                                <img src="{{ asset('storage/' . $ontologie->photo) }}"
                                                                    alt="Votre image" class="avatar-xs">
                                                            @else
                                                                <img src="assets/images/brands/slack.png" alt=""
                                                                    class="avatar-xs">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div>
                                                        <h4 class="fw-bold">Gestion de l'ontologie :
                                                            <strong>{{ $ontologie->nom }}</strong>
                                                        </h4>
                                                        <div class="hstack gap-3 flex-wrap">
                                                            <div><i class="ri-building-line align-bottom me-1"></i>
                                                                Themesbrand</div>
                                                            <div class="vr"></div>
                                                            <div>Date d'ajout : <span
                                                                    class="fw-medium">{{ $ontologie->created_at }}</span>
                                                            </div>
                                                            <div class="vr"></div>
                                                            <div>Date de creation : <span class="fw-medium">29 Dec,
                                                                    2021</span></div>
                                                            <div class="vr"></div>
                                                            <div class="badge rounded-pill bg-info fs-12">Nouveau</div>
                                                            <div class="badge rounded-pill bg-danger fs-12">Top</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="hstack gap-1 flex-wrap">
                                                <button type="button" class="btn py-0 fs-16 favourite-btn active">
                                                    <i class="ri-star-fill"></i>
                                                </button>
                                                <button type="button" class="btn py-0 fs-16 text-body">
                                                    <i class="ri-share-line"></i>
                                                </button>
                                                <button type="button" class="btn py-0 fs-16 text-body">
                                                    <i class="ri-flag-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">

                                        <li class="nav-item">
                                            <a class="nav-link active fw-semibold" data-bs-toggle="tab"
                                                href="#ontology-annotation" role="tab">
                                                Annotations
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#ontology-analyse"
                                                role="tab">
                                                Analyses
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#ontology-images"
                                                role="tab">
                                                Images Annotés
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#ontology-detail"
                                                role="tab">
                                                Détails
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end card body -->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>

                <div class="row p-4">
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
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-content text-muted">

                            <div class="tab-pane fade show active p-4" id="ontology-annotation" role="tabpanel">
                                <div class="row">
                                    <div class="card p-2">
                                        <div class="file-manager-content w-100 p-3 py-0">
                                            <div class="mx-n3 pt-4 px-4 file-manager-content-scroll" data-simplebar>
                                                <div id="folder-list" class="mb-2">
                                                    <div class="row justify-content-beetwen g-2 ">

                                                        <div class="col">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2 d-block d-lg-none">
                                                                    <button type="button"
                                                                        class="btn btn-soft-success btn-icon btn-sm fs-16 file-menu-btn">
                                                                        <i class="ri-menu-2-fill align-bottom"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-16 mb-0">Gestion des classes</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-auto">
                                                            <div class="d-flex gap-2 align-items-start mb-3">
                                                                {{-- <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="file-type">
                                                                    <option value="All" selected>Tous</option>
                                                                </select> --}}

                                                                {{-- @if ($ontologie->dataset->classes)
                                                                <a href="{{ route('annotation-index', $ontologie->id) }}"
                                                                    class="btn btn-danger w-sm create-folder-modal">
                                                                    <i class="ri-add-line align-bottom me-1"></i>
                                                                    Annoter</a>
                                                                @endif --}}
                                                                @if ($dataset->classes()->exists())
                                                                <a href="{{ route('download-ontologie') }}"
                                                                    class="btn btn-dark w-sm create-folder-modal">
                                                                    <i class="ri-download-fill align-bottom me-1"></i>
                                                                    Telecharger le dataset</a>
                                                                <a href="{{ route('annotation-index', $ontologie->id) }}"
                                                                    class="btn btn-danger w-sm create-folder-modal">
                                                                    <i class="ri-inbox-archive-fill align-bottom me-1"></i>
                                                                    Annoter</a>
                                                                    <a href="{{ route('classes-create', $ontologie->id) }}"
                                                                        class="btn btn-success w-sm create-folder-modal"><i
                                                                            class="ri-add-line align-bottom me-1"></i> Nouvelle Classe
                                                                    </a>
                                                                @else
                                                                <a href="{{ route('classes-create', $ontologie->id) }}"
                                                                    class="btn btn-success w-sm create-folder-modal"><i
                                                                        class="ri-add-line align-bottom me-1"></i> Nouvelle
                                                                    Classe</a>
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                    <div class="row" id="folderlist-data">
                                                        @if ($dataset->classes()->exists())
                                                        @foreach ($classes as $classe)
                                                            <div class="col-xxl-3 col-6 folder-card">
                                                                <div class="card bg-light shadow-none" id="folder-{{ $loop->index + 1 }}">
                                                                    <div class="card-body">
                                                                        <div class="d-flex mb-1">
                                                                            <div class="form-check form-check-danger mb-3 fs-15 flex-grow-1">
                                                                                <input class="form-check-input" type="checkbox" value="" id="folderlistCheckbox_{{ $loop->index + 1 }}" checked>
                                                                                <label class="form-check-label" for="folderlistCheckbox_{{ $loop->index + 1 }}"></label>
                                                                            </div>
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-ghost-primary btn-icon btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="ri-more-2-fill fs-16 align-bottom"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                                    <li><a class="dropdown-item view-item-btn" href="{{ route('classes.show-index', [$ontologie->id, $classe->id]) }}">Ouvrir</a></li>
                                                                                    <li><a class="dropdown-item edit-folder-list" href="javascript:void(0);" data-bs-toggle="modal" 
                                                                                        data-bs-target="#createFolderModal" 
                                                                                        data-classe-id="{{ $classe->id }}" 
                                                                                        data-classe-name="{{ $classe->has_name }}" 
                                                                                        onclick="openEditModal(this)">Renommer</a></li>
                                                                                    <li>
                                                                                    <li>
                                                                                        <a class="dropdown-item" href="javascript:void(0);" 
                                                                                        data-bs-toggle="modal" 
                                                                                        data-bs-target="#globalRemoveFolderModal"
                                                                                        data-class-name="{{ $classe->has_name }}"
                                                                                        data-delete-url="{{ route('classes.destroy', $classe->id) }}"
                                                                                        onclick="openDeleteModal(this)">
                                                                                        Supprimer
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                    
                                                                        <div class="text-center">
                                                                            <div class="mb-2">
                                                                                <i class="ri-folder-2-fill align-bottom text-warning display-5"></i>
                                                                            </div>
                                                                            <h6 class="fs-15 folder-nam text-truncate-two-line">{{ $classe->has_name }}</h6>
                                                                        </div>
                                                                        <div class="hstack mt-4 text-muted">
                                                                            <span class="me-auto"><b>{{ $classe->images_count }}</b> Images</span>
                                                                            <span><b>{{ $classe->size_in_mo }}</b>Mo</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        @else
                                                        <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
                                                            <p class="fs-16">Aucune classe</p>
                                                            <a href="{{ route('classes-create', $ontologie->id) }}" class="btn btn-success mt-2">
                                                                <i class="ri-add-line align-bottom me-1"></i> Créer une Classe
                                                            </a>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    
                                                    <!--end row-->
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane fade" id="ontology-analyse" role="tabpanel">
                                <div class="container-fluid">



                                </div>
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane fade" id="ontology-images" role="tabpanel">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="text-center">
                                                                <ul class="list-inline categories-filter animation-nav"
                                                                    id="filter">
                                                                    <li class="list-inline-item"><a
                                                                            class="categories active"
                                                                            data-filter="*">Tous</a></li>
                                                                    <li class="list-inline-item"><a class="categories"
                                                                            data-filter=".project">CBB</a></li>
                                                                    <li class="list-inline-item"><a class="categories"
                                                                            data-filter=".designing">CBSD</a></li>
                                                                    <li class="list-inline-item"><a class="categories"
                                                                            data-filter=".photography">CGM</a></li>
                                                                    <li class="list-inline-item"><a class="categories"
                                                                            data-filter=".development">CMD</a></li>
                                                                </ul>
                                                            </div>

                                                            <div class="row gallery-wrapper">
                                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"
                                                                    data-category="designing development">
                                                                    <div class="gallery-box card">
                                                                        <div class="gallery-container">
                                                                            <a class="image-popup" href="#"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModalScrollable"
                                                                                title="">
                                                                                <img class="gallery-img img-fluid mx-auto"
                                                                                    src="{{ asset('assets/images/small/1.jpg') }}"
                                                                                    alt="" />
                                                                                <div class="gallery-overlay">
                                                                                    <h5 class="overlay-caption">Bacterial
                                                                                        Blight</h5>
                                                                                </div>
                                                                            </a>
                                                                        </div>

                                                                        <div class="box-content">
                                                                            <div class="d-flex align-items-center mt-1">
                                                                                <div class="flex-grow-1 text-muted">by <a
                                                                                        href=""
                                                                                        class="text-body text-truncate">Elisee
                                                                                        SABIDANI</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end col -->
                                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography"
                                                                    data-category="photography">
                                                                    <div class="gallery-box card">
                                                                        <div class="gallery-container">
                                                                            <a class="image-popup" href="#"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModalScrollable"
                                                                                title="">
                                                                                <img class="gallery-img img-fluid mx-auto"
                                                                                    src="{{ asset('assets/images/small/2.jpg') }}"
                                                                                    alt="" />
                                                                                <div class="gallery-overlay">
                                                                                    <h5 class="overlay-caption">Bacterial
                                                                                        Blight</h5>
                                                                                </div>
                                                                            </a>

                                                                        </div>

                                                                        <div class="box-content">
                                                                            <div class="d-flex align-items-center mt-1">
                                                                                <div class="flex-grow-1 text-muted">by <a
                                                                                        href=""
                                                                                        class="text-body text-truncate">Elisee
                                                                                        SABIDANI</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end col -->
                                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project development"
                                                                    data-category="development">
                                                                    <div class="gallery-box card">
                                                                        <div class="gallery-container">
                                                                            <a class="image-popup" href="#"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModalScrollable"
                                                                                title="">
                                                                                <img class="gallery-img img-fluid mx-auto"
                                                                                    src="{{ asset('assets/images/small/3.jpg') }}"
                                                                                    alt="" />
                                                                                <div class="gallery-overlay">
                                                                                    <h5 class="overlay-caption">Bacterial
                                                                                        Blight</h5>
                                                                                </div>
                                                                            </a>
                                                                        </div>

                                                                        <div class="box-content">
                                                                            <div class="d-flex align-items-center mt-1">
                                                                                <div class="flex-grow-1 text-muted">by <a
                                                                                        href=""
                                                                                        class="text-body text-truncate">Elisee
                                                                                        SABIDANI</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end col -->
                                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing"
                                                                    data-category="project designing">
                                                                    <div class="gallery-box card">
                                                                        <div class="gallery-container">
                                                                            <a class="image-popup" href="#"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModalScrollable"
                                                                                title="">
                                                                                <img class="gallery-img img-fluid mx-auto"
                                                                                    src="{{ asset('assets/images/small/4.jpg') }}"
                                                                                    alt="" />
                                                                                <div class="gallery-overlay">
                                                                                    <h5 class="overlay-caption">Bacterial
                                                                                        Blight</h5>
                                                                                </div>
                                                                            </a>

                                                                        </div>

                                                                        <div class="box-content">
                                                                            <div class="d-flex align-items-center mt-1">
                                                                                <div class="flex-grow-1 text-muted">by <a
                                                                                        href=""
                                                                                        class="text-body text-truncate">Elisee
                                                                                        SABIDANI</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end col -->
                                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing"
                                                                    data-category="project designing">
                                                                    <div class="gallery-box card">
                                                                        <div class="gallery-container">
                                                                            <a class="image-popup"
                                                                                href="{{ asset('assets/images/small/5.jpg') }}"
                                                                                title="">
                                                                                <img class="gallery-img img-fluid mx-auto"
                                                                                    src="{{ asset('assets/images/small/5.jpg') }}"
                                                                                    alt="" />
                                                                                <div class="gallery-overlay">
                                                                                    <h5 class="overlay-caption">Brown
                                                                                        Streak Disease </h5>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <div class="box-content">
                                                                            <div class="d-flex align-items-center mt-1">
                                                                                <div class="flex-grow-1 text-muted">by <a
                                                                                        href=""
                                                                                        class="text-body text-truncate">Elisee
                                                                                        SABIDANI</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end col -->
                                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography"
                                                                    data-category="photography">
                                                                    <div class="gallery-box card">
                                                                        <div class="gallery-container">
                                                                            <a class="image-popup"
                                                                                href="{{ asset('assets/images/small/6.jpg') }}"
                                                                                title="">
                                                                                <img class="gallery-img img-fluid mx-auto"
                                                                                    src="{{ asset('assets/images/small/11.jpg') }}"
                                                                                    alt="" />
                                                                                <div class="gallery-overlay">
                                                                                    <h5 class="overlay-caption">Brown
                                                                                        Streak Disease </h5>
                                                                                </div>
                                                                            </a>
                                                                        </div>

                                                                        <div class="box-content">
                                                                            <div class="d-flex align-items-center mt-1">
                                                                                <div class="flex-grow-1 text-muted">by <a
                                                                                        href=""
                                                                                        class="text-body text-truncate">Elisee
                                                                                        SABIDANI</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end col -->
                                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"
                                                                    data-category="designing development">
                                                                    <div class="gallery-box card">
                                                                        <div class="gallery-container">
                                                                            <a class="image-popup"
                                                                                href="{{ asset('assets/images/small/7.jpg') }}"
                                                                                title="">
                                                                                <img class="gallery-img img-fluid mx-auto"
                                                                                    src="{{ asset('assets/images/small/7.jpg') }}"
                                                                                    alt="" />
                                                                                <div class="gallery-overlay">
                                                                                    <h5 class="overlay-caption">Brown
                                                                                        Streak Disease </h5>
                                                                                </div>
                                                                            </a>
                                                                        </div>

                                                                        <div class="box-content">
                                                                            <div class="d-flex align-items-center mt-1">
                                                                                <div class="flex-grow-1 text-muted">by <a
                                                                                        href=""
                                                                                        class="text-body text-truncate">Elisee
                                                                                        SABIDANI</a></div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end col -->
                                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography"
                                                                    data-category="photography">
                                                                    <div class="gallery-box card">
                                                                        <div class="gallery-container">
                                                                            <a class="image-popup"
                                                                                href="{{ asset('assets/images/small/8.jpg') }}"
                                                                                title="">
                                                                                <img class="gallery-img img-fluid mx-auto"
                                                                                    src="{{ asset('assets/images/small/8.jpg') }}"
                                                                                    alt="" />
                                                                                <div class="gallery-overlay">
                                                                                    <h5 class="overlay-caption">Brown
                                                                                        Streak Disease </h5>
                                                                                </div>
                                                                            </a>
                                                                        </div>

                                                                        <div class="box-content">
                                                                            <div class="d-flex align-items-center mt-1">
                                                                                <div class="flex-grow-1 text-muted">by <a
                                                                                        href=""
                                                                                        class="text-body text-truncate">Elisee
                                                                                        SABIDANI</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end col -->

                                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"
                                                                    data-category="designing development">
                                                                    <div class="gallery-box card">
                                                                        <div class="gallery-container">
                                                                            <a class="image-popup"
                                                                                href="{{ asset('assets/images/small/9.jpg') }}"
                                                                                title="">
                                                                                <img class="gallery-img img-fluid mx-auto"
                                                                                    src="{{ asset('assets/images/small/9.jpg') }}"
                                                                                    alt="" />
                                                                                <div class="gallery-overlay">
                                                                                    <h5 class="overlay-caption">Green
                                                                                        Mottle</h5>
                                                                                </div>
                                                                            </a>
                                                                        </div>

                                                                        <div class="box-content">
                                                                            <div class="d-flex align-items-center mt-1">
                                                                                <div class="flex-grow-1 text-muted">by <a
                                                                                        href=""
                                                                                        class="text-body text-truncate">Elisee
                                                                                        SABIDANI</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end col -->

                                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing"
                                                                    data-category="project designing">
                                                                    <div class="gallery-box card">
                                                                        <div class="gallery-container">
                                                                            <a class="image-popup"
                                                                                href="{{ asset('assets/images/small/10.jpg') }}"
                                                                                title="">
                                                                                <img class="gallery-img img-fluid mx-auto"
                                                                                    src="{{ asset('assets/images/small/10.jpg') }}"
                                                                                    alt="" />
                                                                                <div class="gallery-overlay">
                                                                                    <h5 class="overlay-caption">Green
                                                                                        Mottle</h5>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <div class="box-content">
                                                                            <div class="d-flex align-items-center mt-1">
                                                                                <div class="flex-grow-1 text-muted">by <a
                                                                                        href=""
                                                                                        class="text-body text-truncate">Elisee
                                                                                        SABIDANI</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end col -->

                                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography"
                                                                    data-category="photography">
                                                                    <div class="gallery-box card">
                                                                        <div class="gallery-container">
                                                                            <a class="image-popup"
                                                                                href="{{ asset('assets/images/small/11.jpg') }}"
                                                                                title="">
                                                                                <img class="gallery-img img-fluid mx-auto"
                                                                                    src="{{ asset('assets/images/small/11.jpg') }}"
                                                                                    alt="" />
                                                                                <div class="gallery-overlay">
                                                                                    <h5 class="overlay-caption">Green
                                                                                        Mottle</h5>
                                                                                </div>
                                                                            </a>

                                                                        </div>

                                                                        <div class="box-content">
                                                                            <div class="d-flex align-items-center mt-1">
                                                                                <div class="flex-grow-1 text-muted">by <a
                                                                                        href=""
                                                                                        class="text-body text-truncate">Elisee
                                                                                        SABIDANI</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end col -->

                                                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography"
                                                                    data-category="photography">
                                                                    <div class="gallery-box card">
                                                                        <div class="gallery-container">
                                                                            <a class="image-popup"
                                                                                href="{{ asset('assets/images/small/12.jpg') }}"
                                                                                title="">
                                                                                <img class="gallery-img img-fluid mx-auto"
                                                                                    src="{{ asset('assets/images/small/12.jpg') }}"
                                                                                    alt="" />
                                                                                <div class="gallery-overlay">
                                                                                    <h5 class="overlay-caption">Green
                                                                                        Mottle.</h5>
                                                                                </div>
                                                                            </a>
                                                                        </div>

                                                                        <div class="box-content">
                                                                            <div class="d-flex align-items-center mt-1">
                                                                                <div class="flex-grow-1 text-muted">by <a
                                                                                        href=""
                                                                                        class="text-body text-truncate">Elisee
                                                                                        SABIDANI</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end col -->
                                                            </div>
                                                            <!-- end row -->

                                                            <div class="text-center my-2">
                                                                <a href="javascript:void(0);" class="text-success"><i
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
                                </div>
                                <!--end card-->
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane fade" id="ontology-detail" role="tabpanel">

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
                                                                        <td class="fw-medium">Nom du projet</td>
                                                                        <td>#{{ $ontologie->nom }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fw-medium">Categories</td>
                                                                        <td>{{ $ontologie->categorie }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fw-medium">Status</td>
                                                                        <td><span
                                                                                class="badge badge-soft-secondary">{{ $ontologie->status }}</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fw-medium">Date de création</td>
                                                                        <td>05 Jan, 2022</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fw-medium">Date d'ajout</td>
                                                                        <td>{{ $ontologie->created_at }}</td>
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
                                                <h5 class="card-title mb-3">Autheur</h5>
                                                <div class="vstack gap-2">
                                                    <div class="border rounded border-dashed p-2">
                                                        <div class="d-flex align-items-center">
                                                            <table class="table mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="fw-medium">Nom Prénom</td>
                                                                        <td>#{{ $ontologie->auteur_nom_prenom }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fw-medium">Email</td>
                                                                        <td>{{ $ontologie->auteur_email }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fw-medium">Numéro</td>
                                                                        <td>{{ $ontologie->auteur_telephone }}</td>
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
                                                <h5 class="card-title mb-3">Fichiers</h5>
                                                <div class="vstack gap-2">
                                                    <div class="border rounded border-dashed p-2">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm">
                                                                    <div
                                                                        class="avatar-title bg-light text-secondary rounded fs-24">
                                                                        <i class="ri-git-merge-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <h5 class="fs-13 mb-1"><a href="javascript:void(0);"
                                                                        class="text-body text-truncate d-block">
                                                                        {{ $ontologie->nom }}.owl</a>
                                                                </h5>
                                                                <div>1.2MB</div>
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
                                                                        class="text-body text-truncate d-block">{{ $ontologie->nom }}_datasets.zip</a>
                                                                </h5>
                                                                <div>150.4MB</div>
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
                                    <div class="col-xxl-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-muted">
                                                    <h6 class="mb-3 fw-semibold text-uppercase">Description</h6>
                                                    <p>{{ $ontologie->description }} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end card-->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                                <div class="modal fade" id="inviteMembersModal" tabindex="-1"
                                    aria-labelledby="inviteMembersModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0">
                                            <div class="modal-header p-3 ps-4 bg-soft-success">
                                                <h5 class="modal-title" id="inviteMembersModalLabel">Team Members</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-4">
                                                <div class="search-box mb-3">
                                                    <input type="text" class="form-control bg-light border-light"
                                                        placeholder="Search here...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>

                                                <div class="mb-4 d-flex align-items-center">
                                                    <div class="me-2">
                                                        <h5 class="mb-0 fs-13">Members :</h5>
                                                    </div>
                                                    <div class="avatar-group justify-content-center">
                                                        <a href="javascript: void(0);" class="avatar-group-item"
                                                            data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                            data-bs-placement="top" title="Tonya Noble">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-10.jpg"
                                                                    alt="" class="rounded-circle img-fluid">
                                                            </div>
                                                        </a>
                                                        <a href="javascript: void(0);" class="avatar-group-item"
                                                            data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                            data-bs-placement="top" title="Thomas Taylor">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-8.jpg" alt=""
                                                                    class="rounded-circle img-fluid">
                                                            </div>
                                                        </a>
                                                        <a href="javascript: void(0);" class="avatar-group-item"
                                                            data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                            data-bs-placement="top" title="Nancy Martino">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-2.jpg" alt=""
                                                                    class="rounded-circle img-fluid">
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="mx-n4 px-4" data-simplebar style="max-height: 225px;">
                                                    <div class="vstack gap-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                                <img src="assets/images/users/avatar-2.jpg" alt=""
                                                                    class="img-fluid rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);"
                                                                        class="text-body d-block">Nancy Martino</a></h5>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <button type="button"
                                                                    class="btn btn-light btn-sm">Add</button>
                                                            </div>
                                                        </div>
                                                        <!-- end member item -->
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                                <div
                                                                    class="avatar-title bg-soft-danger text-danger rounded-circle">
                                                                    HB
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);"
                                                                        class="text-body d-block">Henry Baird</a></h5>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <button type="button"
                                                                    class="btn btn-light btn-sm">Add</button>
                                                            </div>
                                                        </div>
                                                        <!-- end member item -->
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                                <img src="assets/images/users/avatar-3.jpg" alt=""
                                                                    class="img-fluid rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);"
                                                                        class="text-body d-block">Frank Hook</a></h5>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <button type="button"
                                                                    class="btn btn-light btn-sm">Add</button>
                                                            </div>
                                                        </div>
                                                        <!-- end member item -->
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                                <img src="assets/images/users/avatar-4.jpg" alt=""
                                                                    class="img-fluid rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);"
                                                                        class="text-body d-block">Jennifer Carter</a></h5>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <button type="button"
                                                                    class="btn btn-light btn-sm">Add</button>
                                                            </div>
                                                        </div>
                                                        <!-- end member item -->
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                                <div
                                                                    class="avatar-title bg-soft-success text-success rounded-circle">
                                                                    AC
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);"
                                                                        class="text-body d-block">Alexis Clarke</a></h5>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <button type="button"
                                                                    class="btn btn-light btn-sm">Add</button>
                                                            </div>
                                                        </div>
                                                        <!-- end member item -->
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                                <img src="assets/images/users/avatar-7.jpg" alt=""
                                                                    class="img-fluid rounded-circle">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);"
                                                                        class="text-body d-block">Joseph Parker</a></h5>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <button type="button"
                                                                    class="btn btn-light btn-sm">Add</button>
                                                            </div>
                                                        </div>
                                                        <!-- end member item -->
                                                    </div>
                                                    <!-- end list -->
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light w-xs"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-success w-xs">Assigned</button>
                                            </div>
                                        </div>
                                        <!-- end modal-content -->
                                    </div>
                                    <!-- modal-dialog -->
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- START CREATE FOLDER MODAL -->
        <div class="modal fade zoomIn" id="" tabindex="-1" aria-labelledby="createFolderModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-header p-3 bg-soft-success">
                        <h5 class="modal-title" id="createFolderModalLabel">Nouvelle classe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="addFolderBtn-close"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('classes.store', $ontologie->id) }}" method="POST" autocomplete="off"
                            class="needs-validation createfolder-form" id="createfolder-form" novalidate
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="has_name" class="form-label">Nom de la classe</label>
                                <input type="text" name="has_name" class="form-control" id="has_name">
                                @error('has_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="has_name" class="form-label">Associer une image</label>
                                <input type="file" name="image" class="form-control" id="image">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="label" class="form-label">Label</label>
                                <input type="text" name="label" class="form-control" id="label"
                                    value="{{ $ontologieData['http://www.example.org/cassacadiseases.owl#Classe']['label'] }}"
                                    disabled>
                                @error('label')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="3" disabled>{{ $ontologieData['http://www.example.org/cassacadiseases.owl#Classe']['comment'] }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="dataset_id" class="form-label">Dataset</label>
                                <select name="dataset_id" class="form-control" id="dataset_id" disabled required>
                                    <option value="{{ $dataset->id }}">{{ $dataset->nom }}</option>
                                </select>
                                @error('dataset_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i
                                        class="ri-close-line align-bottom"></i> Fermer</button>
                                <button type="submit" class="btn btn-primary" id="addNewFolder">Ajouter le
                                    dossier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Extration des caractéristiques</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- <h6 class="fs-15">Give your text a good structure</h6> --}}
                        <div class="d-flex justify-content-center">
                            <div class="live-preview">
                                <div class="d-flex ">
                                    <img src="{{ asset('assets/images/small/1.jpg') }}" class="img-fluid"
                                        alt="Responsive image">
                                </div>
                            </div>
                        </div>

                        <h6 class="fs-16 my-3">Bacterial Blight</h6>
                        <h6 class="fs-14 " style="text-decoration: underline">Caractéristiques couleurs</h6>
                        <div class="">
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Teinte moyenne : </p> <strong> 49.005584716796875</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Teinte ecart type : </p> <strong> 32.12871508206654</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Saturation moyenne : </p> <strong>
                                        68.36625858305607</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Saturation ecart type : </p> <strong>
                                        146.55633544921875</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Valeur moyenne : </p> <strong> 139.08096313476562</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Valeur ecart type : </p> <strong>
                                        61.042766201790954</strong>
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
                                    <p class="text-muted mb-0">Surface : </p> <strong> 20295.5</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Perimetre : </p> <strong> 1650.9717726707458</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Largeur : </p> <strong> 177</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Hauteur : </p> <strong> 212</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Surface normalisee : </p> <strong>
                                        0.3096847534179687</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Perimetre normalise : </p> <strong>
                                        1.6122771217487752</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Rapport aspect : </p> <strong> 0.8349056603773585</strong>
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
                                    <p class="text-muted mb-0">Contraste : </p> <strong> 607.0579197304468</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Dissimilarité : </p> <strong> 14.911473651958886</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Energie : </p> <strong> 0.010779307898478538</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Homogénéite : </p> <strong> 0.11088725504503322</strong>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Correlation : </p> <strong> 0.9042696831435298</strong>
                                </div>
                            </div>
                        </div>
                        <br>


                        <h6 class="fs-14 " style="text-decoration: underline">Caractéristiques des symptômes des tiges
                        </h6>
                        <div class="">
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Présence lesions : </p> <strong> True</strong>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Longueur lesions : </p> <strong> 256</strong>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Largeur lesions : </p> <strong> 256</strong>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Couleur lesions </p>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">- Moyenne de la teinte : <strong> 35.54498291015625</strong>
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">- Moyenne de la saturation : <strong>
                                            82.72439575195312</strong></p>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">- Moyenne de la valeur : <strong> 61.60111999511719</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <br>



                        <h6 class="fs-14 " style="text-decoration: underline">Caractéristiques des symptômes des racines
                        </h6>
                        <div class="">
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">- Deformation racines : <strong>
                                            0.29203033447265625</strong></p>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">Texture racines </p>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">- Contraste : <strong> 607.0579197304468</strong></p>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">-Dissimilarite : <strong> 14.911473651958886</strong></p>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">- Energie : <strong> 0.010779307898478538</strong></p>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">- Homogeneite : <strong> 0.11088725504503322</strong></p>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0">- Correlation : <strong> 0.9042696831435298</strong> </p>
                                </div>
                            </div>
                        </div>
                        <br>



                        <h6 class="fs-14 " style="text-decoration: underline">Caractéristiques des symptômes des feuilles
                        </h6>
                        <div class="">
                            <div class="d-flex mt-2">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                    <p class="text-muted mb-0"> : </p> <strong> </strong>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2 d-flex justify-content-betwenn">
                                <p class="text-muted mb-0"> : </p> <strong></strong>
                            </div>
                        </div> --}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- END CREATE FOLDER MODAL -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Velzon.
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

    <div class="modal fade zoomIn" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-success">
                    <h5 class="modal-title" id="createFolderModalLabel">Renommer le nom</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="addFolderBtn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
    
                    <form autocomplete="off" class="needs-validation createfolder-form" id="createfolder-form" novalidate method="POST" action="{{ route('classes.updateName') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="classe_id" id="edit-classe-id">
                        <div class="mb-4">
                            <label for="foldername-input" class="form-label">Entrer le nom</label>
                            <input type="text" class="form-control" id="edit-foldername-input" name="has_name" required>
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i> Fermer</button>
                            <button type="submit" class="btn btn-primary" id="addNewFolder">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    

    <div class="modal fade" id="globalRemoveFolderModal" tabindex="-1" role="dialog" aria-labelledby="globalRemoveFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <lord-icon src="https://cdn.lordicon.com/hrqwmuhr.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px"></lord-icon>
                    <div class="mt-4">
                        <h4 class="mb-3" id="modalClassTitle">Suppression de la classe !!!</h4>
                        <p class="text-muted mb-4">Cette action est irréversible. Vous perdrez tous vos images, vos caractéristiques liées à cette classe. Êtes-vous toujours sûr ?</p>
                        <div class="hstack gap-2 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                            <form id="deleteClassForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Oui! Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
<script>
    function openDeleteModal(element) {
        var className = element.getAttribute('data-class-name');
        var deleteUrl = element.getAttribute('data-delete-url');
        
        document.getElementById('modalClassTitle').textContent = 'Suppression de la classe ' + className + ' !!!';
        document.getElementById('deleteClassForm').setAttribute('action', deleteUrl);
    }
</script>

<script>
    function openEditModal(button) {
        var classeId = button.getAttribute('data-classe-id');
        var classeName = button.getAttribute('data-classe-name');

        var modal = document.querySelector('#createFolderModal');
        modal.querySelector('#edit-classe-id').value = classeId;
        modal.querySelector('#edit-foldername-input').value = classeName;
    }
</script>
@endsection