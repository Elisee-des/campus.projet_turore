@extends('layouts.app')

@section('titre', 'Detection de maladie')

@section('content')
<div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div
              class="page-title-box d-sm-flex align-items-center justify-content-between"
            >
              <h4 class="mb-sm-0">Detection de maladie</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item">
                    <a href="javascript: void(0);">Accueil</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row mb- justify-content-center">

              <div class="col-lg-5 sticky-side-div">
                  <div class="card">
                      <div class="card-header border-bottom-dashed">
                          <h5 class="card-title mb-0">Image : 100234674.jpg</h5>
                      </div>
                      <div class="card-header bg-soft-light border-bottom-dashed">
                        <div>
                          <img src="{{asset('assets/images/small/img-2.jpg')}}" class="img-fluid" alt="Responsive image">
                        </div>
                      </div>
                      <div class="card-body  pt-2">
                        <div class="d-flex justify-content-center">
                          <button type="button" class="btn btn-success w-100"><a href="{{ route('detection.index2') }}">Detecter la maladie</a></button>
                        </div>
                      </div>
                  </div>

              </div>
              <!-- end stickey -->

          </div>
      </div>
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