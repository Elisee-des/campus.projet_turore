<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index.html" class="d-inline-block auth-logo">
                                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20">
                            </a>
                        </div>
                        <p class="mt-3 fs-15 fw-medium"></p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Bienvenue !</h5>
                                <p class="text-muted">Veuillez entrer vos coordonnées pour vous connecter</p>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="p-2 mt-4">
                                <form wire:submit.prevent="submit">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="username" placeholder="Entrer votre email" wire:model="email">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                
                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="#" class="text-muted">Mot de passe oublié?</a>
                                        </div>
                                        <label class="form-label" for="password-input">Mot de passe</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5 password-input" placeholder="Entrer votre mot de passe" id="password-input" wire:model="password">
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="auth-remember-check" wire:model="remember">
                                        <label class="form-check-label" for="auth-remember-check">Se rappeler de moi</label>
                                    </div>
                                
                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit" wire:loading.attr="disabled">
                                            <span wire:loading.remove>Connexion</span>
                                            <span wire:loading>
                                                <div class="spinner-border text-primary" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                                @if ($errors->has('login'))
                                    <div class="alert alert-danger mt-2">
                                        {{ $errors->first('login') }}
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy;
                            <script>document.write(new Date().getFullYear())</script> Tout droit reserver
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
