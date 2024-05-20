@extends('layouts.app')

@section('titre', 'Gestion des ontologies')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Liste des Ontologies</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ontologies</a></li>
                                <li class="breadcrumb-item active">Liste des ontologies</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row g-4 mb-3">
                <div class="col-sm-auto">
                    <div>
                        <a href="{{ route('ontologies.create') }}" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i> Nouvelle Ontologie</a>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end gap-2">
                        <div class="search-box ms-2">
                            <input type="text" class="form-control" placeholder="Rechercher...">
                            <i class="ri-search-line search-icon"></i>
                        </div>

                        {{-- <select class="form-control w-md" data-choices data-choices-search-false>
                            <option value="All">All</option>
                            <option value="Today">Today</option>
                            <option value="Yesterday" selected>Yesterday</option>
                            <option value="Last 7 Days">Last 7 Days</option>
                            <option value="Last 30 Days">Last 30 Days</option>
                            <option value="This Month">This Month</option>
                            <option value="Last Year">Last Year</option>
                        </select> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3 col-sm-6 project-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-3 mt-n3 mx-n3 bg-soft-danger rounded-top">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-0 fs-14"><a href="{{ route('ontologies.show', 1) }}" class="text-dark">Maladie du Manioc</a></h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex gap-1 align-items-center my-n2">
                                            <button type="button" class="btn avatar-xs p-0 favourite-btn active">
                                                <span class="avatar-title bg-transparent fs-15">
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </button>
                                            <div class="dropdown">
                                                <button class="btn btn-link text-muted p-1 mt-n1 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i data-feather="more-horizontal" class="icon-sm"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Ouvrir</a>
                                                    <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Modifier</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Supprimer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="py-3">
                                <div class="d-flex mb-2">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-soft-warning rounded p-2">
                                                <img src="assets/images/brands/slack.png" alt="" class="img-fluid p-1">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        {{-- <h5 class="mb-1 fs-15"><a href="apps-projects-overview.html" class="text-dark"></a></h5> --}}
                                        <p class="text-muted text-truncate-two-lines mb-3">Pathologie affectant le manioc, pouvant être causée par divers agents pathogènes tels que des virus, des bactéries, des champignons ou des nématodes. Les symptômes incluent des motifs de mosaïque, des taches foliaires et le flétrissement..</p>
                                    </div>
                                </div>
                                <div class="row gy-3">
                                    <div class="col-6">
                                        <div>
                                            <p class="text-muted mb-1">Status</p>
                                            <div class="badge badge-soft-warning fs-12">En cours</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <p class="text-muted mb-1">Date d'ajout</p>
                                            <h5 class="fs-14">18 Sep, 2021</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xxl-3 col-sm-6 project-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-3 mt-n3 mx-n3 bg-soft-warning rounded-top">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-0 fs-14"><a href="{{ route('ontologies.show', 1) }}" class="text-dark">Maladie du Blé</a></h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex gap-1 align-items-center my-n2">
                                            <button type="button" class="btn avatar-xs p-0 favourite-btn active">
                                                <span class="avatar-title bg-transparent fs-15">
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </button>
                                            <div class="dropdown">
                                                <button class="btn btn-link text-muted p-1 mt-n1 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i data-feather="more-horizontal" class="icon-sm"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Ouvrir</a>
                                                    <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Modifier</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Supprimer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-3">
                                <div class="d-flex mb-2">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-soft-warning rounded p-2">
                                                <img src="assets/images/brands/slack.png" alt="" class="img-fluid p-1">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        {{-- <h5 class="mb-1 fs-15"><a href="apps-projects-overview.html" class="text-dark">Maladie du Blé</a></h5> --}}
                                        <p class="text-muted text-truncate-two-lines mb-3">Infection qui touche le blé, résultant de l'action de pathogènes comme les champignons, les bactéries ou les virus. Les symptômes typiques comprennent des pustules, des taches et des décolorations sur les feuilles.</p>
                                    </div>
                                </div>
                                <div class="row gy-3">
                                    <div class="col-6">
                                        <div>
                                            <p class="text-muted mb-1">Status</p>
                                            <div class="badge badge-soft-success fs-12">Complet</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <p class="text-muted mb-1">Date d'ajout</p>
                                            <h5 class="fs-14"> 10 Jun, 2021</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xxl-3 col-sm-6 project-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-3 mt-n3 mx-n3 bg-soft-info rounded-top">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-0 fs-14"><a href="{{ route('ontologies.show', 1) }}" class="text-dark">Maladie de la Tomate</a></h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex gap-1 align-items-center my-n2">
                                            <button type="button" class="btn avatar-xs p-0 favourite-btn">
                                                <span class="avatar-title bg-transparent fs-15">
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </button>
                                            <div class="dropdown">
                                                <button class="btn btn-link text-muted p-1 mt-n1 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i data-feather="more-horizontal" class="icon-sm"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Ouvrir</a>
                                                    <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Modifier</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Supprimer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-3">
                                <div class="d-flex mb-2">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-soft-warning rounded p-2">
                                                <img src="assets/images/brands/slack.png" alt="" class="img-fluid p-1">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        {{-- <h5 class="mb-1 fs-15"><a href="apps-projects-overview.html" class="text-dark">Maladie du Blé</a></h5> --}}
                                        <p class="text-muted text-truncate-two-lines mb-3">Affection de la tomate due à divers agents pathogènes, notamment des bactéries, des champignons et des virus. Les symptômes incluent le flétrissement, la déformation des feuilles et des taches nécrotiques.</p>
                                    </div>
                                </div>
                                <div class="row gy-3">
                                    <div class="col-6">
                                        <div>
                                            <p class="text-muted mb-1">Status</p>
                                            <div class="badge badge-soft-warning fs-12">En cours</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <p class="text-muted mb-1">Date d'ajout</p>
                                            <h5 class="fs-14">08 Apr, 2021</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xxl-3 col-sm-6 project-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-3 mt-n3 mx-n3 bg-soft-success rounded-top">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-0 fs-14"><a href="{{ route('ontologies.show', 1) }}" class="text-dark">Maladie de l'Ananas</a></h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex gap-1 align-items-center my-n2">
                                            <button type="button" class="btn avatar-xs p-0 favourite-btn active">
                                                <span class="avatar-title bg-transparent fs-15">
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </button>
                                            <div class="dropdown">
                                                <button class="btn btn-link text-muted p-1 mt-n1 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i data-feather="more-horizontal" class="icon-sm"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="apps-projects-overview.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Ouvrir</a>
                                                    <a class="dropdown-item" href="apps-projects-create.html"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Modifier</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Supprimer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-3">
                                <div class="d-flex mb-2">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-soft-warning rounded p-2">
                                                <img src="assets/images/brands/slack.png" alt="" class="img-fluid p-1">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        {{-- <h5 class="mb-1 fs-15"><a href="apps-projects-overview.html" class="text-dark"></a></h5> --}}
                                        <p class="text-muted text-truncate-two-lines mb-3"> Pathologie affectant l'ananas, causée par des agents pathogènes comme les champignons et les bactéries. Les symptômes peuvent inclure la pourriture des fruits, le flétrissement des feuilles et des décolorations internes.</p>
                                    </div>
                                </div>
                                <div class="row gy-3">
                                    <div class="col-6">
                                        <div>
                                            <p class="text-muted mb-1">Status</p>
                                            <div class="badge badge-soft-warning fs-12">En cours</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <p class="text-muted mb-1">Date d'ajout</p>
                                            <h5 class="fs-14">22 Nov, 2021</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->


            <div class="row g-0 text-center text-sm-start align-items-center mb-4">
                <div class="col-sm-6">
                    <div>
                        <p class="mb-sm-0 text-muted">Showing <span class="fw-semibold">1</span> to <span class="fw-semibold">10</span> of <span class="fw-semibold text-decoration-underline">12</span> entries</p>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-sm-6">
                    <ul class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                        <li class="page-item disabled">
                            <a href="#" class="page-link">Previous</a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item ">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">4</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">5</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">Next</a>
                        </li>
                    </ul>
                </div><!-- end col -->
            </div><!-- end row -->
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
