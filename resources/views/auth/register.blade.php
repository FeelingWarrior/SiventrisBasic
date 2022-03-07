{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
<x-guest-layout>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg blur top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
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
              <a href="#" class="btn btn-sm  bg-gradient-primary  btn-round mb-0 me-1">Sistem Informasi Inventaris</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Selamat Datang!</h1>
              <p class="text-lead text-white">Daftarkan akun segera.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-body">
                  <x-jet-validation-errors class="mb-4" />

                  <form role="form text-left" method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="mb-3">
                    <x-jet-input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="email-addon" name="name" :value="old('name')" required autofocus autocomplete="name"/>
                  </div>
                  <div class="mb-3">
                    <x-jet-input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email" :value="old('email')" required />
                  </div>
                  <div class="mb-3">
                    <x-jet-input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password" required autocomplete="new-password" />
                  </div>
                  <div class="mb-3">
                      <x-jet-input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password_confirmation" required autocomplete="new-password" />
                  </div>
                  <div class="mb-3">
                      <select class="form-control" name="utype" required>
                          <option value="">Daftar Sebagai: </option>
                          <option value="Admin">
                              Admin
                          </option>
                          <option value="Pengguna">
                              Pengguna
                          </option>
                      </select>
                  </div>
                  <div class="text-center">
                    <x-jet-button class="btn bg-gradient-dark w-100 my-4 mb-2">Daftar Akun</x-jet-button>
                  </div>
                  <p class="text-sm mt-3 mb-0">Sudah Punya Akun? <a href="javascript:;" class="text-dark font-weight-bolder">Masuk</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
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
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </x-guest-layout>
