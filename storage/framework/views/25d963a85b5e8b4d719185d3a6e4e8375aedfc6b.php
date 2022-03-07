<div>
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Cari Barang</h5>
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
                                        <option value="<?php echo e($tp->nama_tipe); ?>"><?php echo e($tp->nama_tipe); ?></option>
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
                      <h6>Barang</h6>
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
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipe</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Merek</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gudang</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tersimpan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($br->kode_barang); ?></td>
                                <td><?php echo e($br->nama_barang); ?></td>
                                <td><?php echo e($br->tipe_barang); ?></td>
                                <td><?php echo e($br->merek->nama_merek); ?></td>
                                <td><?php echo e($br->gudang->nama_gudang); ?></td>
                                <td><?php echo e($br->created_at); ?></td>
                                <td>
                                    <a href="#Barang" wire:click='editBarang(<?php echo e($br->id); ?>)'><i class="text-muted">edit</i></a> |
                                    <a href="#Barang" wire:click='hapusBarang(<?php echo e($br->id); ?>)'><i class="text-muted">hapus</i></a>
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
            <?php if(!$id_barang || $transit_barang): ?>
            <div class="col-lg-4 col-md-6">
              <div class="card h-100">
                <div class="card-header pb-0">
                  <h6>Tambah Data Barang</h6>
                </div>
                <div class="card-body p-3">
                    <form wire:submit.prevent='inputBarang'>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Kode" required wire:model='kode_barang' readonly>
                          </div>
                        <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Barang" required wire:model='nama_barang' required>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" wire:model='kode_merek_barang' required>
                                <option value="">Pilih Merek:</option>
                                <?php $__currentLoopData = $merek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($mk->id); ?>"><?php echo e($mk->nama_merek); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" wire:model='kode_tipe_barang' required>
                                <option value="">Pilih Tipe:</option>
                                <?php $__currentLoopData = $tipe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tp->id); ?>"><?php echo e($tp->nama_tipe); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" wire:model='kode_gudang_barang' required>
                                <option value="">Pilih Gudang:</option>
                                <?php $__currentLoopData = $gudang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gd->id); ?>"><?php echo e($gd->nama_gudang); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
            <?php elseif($id_barang || !$transit_barang): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                  <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Edit Data Barang</h6>
                    <a wire:click='transitAwalBarang()' type="button" class="btn btn-md btn-secondary" href="#Barang"><i class="fas fa-plus"></i> New</a>
                  </div>
                  <div class="card-body p-3">
                      <form wire:submit.prevent='saveBarang'>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Kode" required wire:model='kode_barang' readonly>
                          </div>
                        <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Barang" required wire:model='nama_barang' required>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" wire:model='kode_merek_barang' required>
                                <option value="">Pilih Merek:</option>
                                <?php $__currentLoopData = $merek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($mk->id); ?>"><?php echo e($mk->nama_merek); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" wire:model='kode_tipe_barang' required>
                                <option value="">Pilih Tipe:</option>
                                <?php $__currentLoopData = $tipe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tp->id); ?>"><?php echo e($tp->nama_tipe); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" wire:model='kode_gudang_barang' required>
                                <option value="">Pilih Gudang:</option>
                                <?php $__currentLoopData = $gudang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gd->id); ?>"><?php echo e($gd->nama_gudang); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Edit</button>
                          </div>
                      </form>
                  </div>
                </div>
              </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH F:\MyApplications\Inventaris_Fajar\resources\views/livewire/admin/produk/produk-component.blade.php ENDPATH**/ ?>