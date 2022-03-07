{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
<x-guest-layout>
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
            <div class="container-fluid">
              <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('login') }}">
                PT. Nama Perusahaan
              </a>
              <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </span>
              </button>
              <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto">
                  <li class="nav-item">
                      <a class="nav-link me-2" href="{{ route('password.request') }}">
                        <i class="fas fa-user opacity-6 text-dark me-1"></i>
                        Lupa Password
                      </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('register') }}">
                      <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                      Daftar Akun
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('login') }}">
                      <i class="fas fa-key opacity-6 text-dark me-1"></i>
                      Masuk
                    </a>
                  </li>
                </ul>
                <ul class="navbar-nav d-lg-block d-none">
                  <li class="nav-item">
                    <a href="#" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Sistem Informasi Inventaris</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
      </div>
    </div>
    <main class="main-content  mt-0">
      <section>
        <div class="page-header min-vh-75">
          <div class="container">
            <div class="row">
              <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                <div class="card card-plain mt-8">
                  <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-info text-gradient">Selamat Datang Kembali</h3>
                    <p class="mb-0">Masukkan email dan password kamu untuk masuk</p>
                  </div>
                  <div class="card-body">
                      <x-jet-validation-errors class="mb-4" />

                      @if (session('status'))
                          <div class="mb-4 font-medium text-sm text-green-600">
                              {{ session('status') }}
                          </div>
                      @endif
                      <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <x-jet-label for="email" value="{{ __('Email') }}"/>
                      <div class="mb-3">
                        <x-jet-input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email" :value="old('email')" required autofocus />
                      </div>
                      <x-jet-label for="password" value="{{ __('Password') }}" />
                      <div class="mb-3">
                        <x-jet-input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password" required autocomplete="current-password" />
                      </div>
                      <div class="form-check form-switch">
                        <x-jet-checkbox class="form-check-input" type="checkbox" id="remember_me" name="remember" checked="" />
                        <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                      </div>
                      <div class="text-center">
                        <x-jet-button class="btn bg-gradient-info w-100 mt-4 mb-0">Masuk</x-jet-button>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-sm mx-auto">
                      Belum Punya Akun?
                      <a href="javascript:;" class="text-info text-gradient font-weight-bold">Daftar</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                  <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="footer py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-dribbble"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-twitter"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-instagram"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-pinterest"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-github"></span>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script> Soft by PT. Nama Perusahaan.
            </p>
          </div>
        </div>
      </div>
    </footer>
  </x-guest-layout>
