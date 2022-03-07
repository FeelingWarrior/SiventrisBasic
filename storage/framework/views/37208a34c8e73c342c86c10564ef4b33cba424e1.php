<?php
    use App\Models\LogoutStock;
?>
<div class="table-responsive">
    <table class="table table-responsive align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barang</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stok Awal</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stok Masuk</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stok Keluar</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sisa Stok</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Satuan</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gudang</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Terupdate</th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $stok; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $stok_keluar = LogoutStock::select('kode_barang','stock_keluar')->where('kode_barang',$br->kode_barang)->get();
            ?>
            <?php $__currentLoopData = $stok_keluar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td><?php echo e($br->barang->kode_barang); ?></td>
                <td><?php echo e($br->nama_barang); ?></td>
                <td><?php echo e($br->stock_masuk); ?></td>
                <td><?php echo e($br->stock_awal); ?></td>
                <td><?php echo e($sk->stock_keluar); ?></td>
                <td><?php echo e($br->stock_masuk); ?></td>
                <td><?php echo e($br->satuan->satuan); ?></td>
                <td><?php echo e($br->gudang->nama_gudang); ?></td>
                <td><?php echo e($br->updated_at); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td><i>Maaf Data Tidak Tersedia!</i></td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
<?php /**PATH F:\MyApplications\Inventaris_Fajar\resources\views/livewire/admin/laporan/laporan-stok-excel.blade.php ENDPATH**/ ?>