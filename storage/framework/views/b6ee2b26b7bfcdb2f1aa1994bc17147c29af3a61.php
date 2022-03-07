<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('includes.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo \Livewire\Livewire::styles(); ?>


<body class="g-sidenav-show  bg-gray-100">
 <?php echo $__env->make('includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
   <?php echo $__env->make('includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <?php echo e($slot); ?>

    </div>
    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </main>
  <?php echo $__env->make('includes.plugin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!--   Core JS Files   -->
 <?php echo $__env->make('includes.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo \Livewire\Livewire::scripts(); ?>

</body>

</html>
<?php /**PATH F:\MyApplications\Inventaris_Fajar\resources\views/layouts/base.blade.php ENDPATH**/ ?>