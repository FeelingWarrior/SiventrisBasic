<div>
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Cari Barang Masuk</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Gudang*</label>
                                <select class="form-control" wire:model="gudang_search">
                                    <option value="">Pilih Gudang:</option>
                                    <?php $__currentLoopData = $search_gudang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($gd->id); ?>"><?php echo e($gd->nama_gudang); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-sm-4 ">
                                <label>Merek*</label>
                                <select class="form-control" wire:model="merek_search">
                                    <option value="">Pilih Merek:</option>
                                    <?php $__currentLoopData = $search_merek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($mr->id); ?>"><?php echo e($mr->nama_merek); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Tipe*</label>
                                <select class="form-control" wire:model="tipe_search">
                                    <option value="">Pilih Tipe:</option>
                                    <?php $__currentLoopData = $search_tipe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tp->id); ?>"><?php echo e($tp->nama_tipe); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Tanggal*</label>
                                    <input class="form-control" type="date" wire:model="tanggal_search">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php if(Session::has('message_success_barang')): ?>
            <h6 class="alert alert-success" role="alert"><?php echo e(Session::get('message_success_barang')); ?></h6>
        <?php endif; ?>
        <?php if(Session::has('message_update_barang')): ?>
            <h6 class="alert alert-success" role="alert"><?php echo e(Session::get('message_update_barang')); ?></h6>
        <?php endif; ?>
        <?php if(Session::has('message_failed_barang')): ?>
            <h6 class="alert alert-success" role="alert"><?php echo e(Session::get('message_failed_barang')); ?></h6>
        <?php endif; ?>
          <div class="row my-4" id="Barang">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>Pemasukkan Barang</h6>
                      <p class="text-sm mb-0">
                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                        <span class="font-weight-bold ms-1">10 data</span> terakhir
                      </p>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Ketikkan Nama Barang . . ." wire:model='cari_barang'>
                    </div>
                  <div class="table-responsive">
                    <table class="table table-responsive align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barang</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Satuan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pengguna</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tersimpan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="text-center">
                                <td><?php echo e($br->barang->kode_barang); ?></td>
                                <td><?php echo e($br->barang->nama_barang); ?></td>
                                <td><?php echo e($br->jumlah); ?></td>
                                <td><?php echo e($br->satuan->satuan); ?></td>
                                <td><?php echo e($br->user->name); ?></td>
                                <td><?php echo e($br->created_at); ?></td>
                                <td>
                                    
                                    <a class="btn btn-sm btn-warning" href="#Barang" wire:click='hapusBarang(<?php echo e($br->id); ?>)'><i class="text-white">hapus</i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td><i>Maaf Data Tidak Tersedia!</i></td>
                        </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                  <?php echo e($barang->links()); ?>

                </div>
              </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
              <div class="card h-100">
                <div class="card-header pb-0">
                  <h6>Tambah Barang Masuk</h6>
                </div>
                <div class="card-body p-3">
                    <form wire:submit.prevent='inputBarang'>
                        <div class="mb-3">
                            <select class="form-control" wire:model='kode_barang' wire:change='cek_barang($event.target.value)' required>
                                <option value="">Pilih Kode Barang:</option>
                                <?php $__currentLoopData = $kode_produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($kb->id); ?>"><?php echo e($kb->kode_barang); ?> (<?php echo e($kb->nama_barang); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Barang" required wire:model='nama_barang' readonly>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Tipe" required wire:model='nama_tipe' readonly>
                          </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" placeholder="Jumlah" required wire:model='jumlah_barang'>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" wire:model='kode_satuan_barang' required>
                                <option value="">Pilih Satuan:</option>
                                <?php $__currentLoopData = $satuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($st->id); ?>"><?php echo e($st->satuan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="datetime-local" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" wire:model='waktu_barang' required>
                          </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
            
            
        </div>
    </div>
</div>
<?php /**PATH F:\MyApplications\Inventaris_Fajar\resources\views/livewire/admin/barang/barang-masuk-component.blade.php ENDPATH**/ ?>