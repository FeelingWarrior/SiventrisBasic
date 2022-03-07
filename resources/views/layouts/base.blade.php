<!DOCTYPE html>
<html lang="en">

@include('includes.style')
@livewireStyles

<body class="g-sidenav-show  bg-gray-100">
 @include('includes.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
   @include('includes.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      {{ $slot }}
    </div>
    @include('includes.footer')
  </main>
  @include('includes.plugin')
  <!--   Core JS Files   -->
 @include('includes.script')
 @livewireScripts
</body>

</html>
