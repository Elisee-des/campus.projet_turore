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

          <div class="col-xl-4">
              <div class="sticky-side-div">
                  <div class="card">
                      <div class="card-header border-bottom-dashed">
                          <h5 class="card-title mb-0">Image : 100234674.jpg</h5>
                      </div>
                      <div class="card-header bg-soft-light border-bottom-dashed">
                          <div class="text-center">
                              <h6 class="mb-2">Have a <span class="fw-semibold">promo</span> code ?</h6>
                          </div>
                          <div class="hstack gap-3 px-3 mx-n3">
                              <input class="form-control me-auto" type="text" placeholder="Enter coupon code" aria-label="Add Promo Code here...">
                              <button type="button" class="btn btn-success w-xs">Apply</button>
                          </div>
                      </div>
                      <div class="card-body pt-2">
                          <div class="table-responsive">
                              <table class="table table-borderless mb-0">
                                  <tbody>
                                      <tr>
                                          <td>Sub Total :</td>
                                          <td class="text-end" id="cart-subtotal">$ 359.96</td>
                                      </tr>
                                      <tr>
                                          <td>Discount <span class="text-muted">(VELZON15)</span> : </td>
                                          <td class="text-end" id="cart-discount">- $ 53.99</td>
                                      </tr>
                                      <tr>
                                          <td>Shipping Charge :</td>
                                          <td class="text-end" id="cart-shipping">$ 65.00</td>
                                      </tr>
                                      <tr>
                                          <td>Estimated Tax (12.5%) : </td>
                                          <td class="text-end" id="cart-tax">$ 44.99</td>
                                      </tr>
                                      <tr class="table-active">
                                          <th>Total (USD) :</th>
                                          <td class="text-end">
                                              <span class="fw-semibold" id="cart-total">
                                                  $415.96
                                              </span>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                          <!-- end table-responsive -->
                      </div>
                  </div>

                  <div class="alert border-dashed alert-danger" role="alert">
                      <div class="d-flex align-items-center">
                          <div class="ms-2">
                              <button type="button" class="btn ps-0 btn-sm btn-link text-danger text-uppercase">Add Gift Wrap</button>
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