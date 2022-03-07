<?php
    use App\Models\LoginStock;
?>
<div>
    <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $gudangDashboard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gudash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $stokGudang = LoginStock::select('kode_gudang','stock_masuk')
                ->where('kode_gudang',$gudash->id)
                ->sum('stock_masuk');
            ?>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-8">
                        <div class="numbers">
                          <p class="text-sm mb-0 text-capitalize font-weight-bold">Stok <?php echo e($gudash->nama_gudang); ?></p>
                          <h5 class="font-weight-bolder mb-0">
                            <?php echo e($stokGudang); ?>

                            
                          </h5>
                        </div>
                      </div>
                      <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <a href="#">
                                <i class="ni ni-chart-bar-32 text-lg opacity-10"></i>
                            </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr>
                  <td>
                      <i>Maaf data tidak tersedia!</i>
                  </td>
              </tr>
            <?php endif; ?>
          </div>
          <div class="row my-4" id="aktifitasBarangMasuk">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>Aktifitas Barang Masuk</h6>
                      <p class="text-sm mb-0">
                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                        <span class="font-weight-bold ms-1">5 data</span> teratas
                      </p>
                    </div>
                    <div class="d-flex justify-content-start">
                        <a  type="button" class="btn btn-sm btn-info" href="<?php echo e(route('admin.barang.masuk')); ?>">Lihat Selengkapnya</a>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                      
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive">
                    <table class="table table-responsive align-items-center mb-0">
                      <thead>
                        <tr class="text-center">
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barang</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengguna</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tersimpan</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $__empty_1 = true; $__currentLoopData = $aktifitas_masuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $akma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="text-center">
                                <td><?php echo e($akma->barang->kode_barang); ?></td>
                                <td><?php echo e($akma->barang->nama_barang); ?></td>
                                <td><?php echo e($akma->jumlah); ?></td>
                                <td><?php echo e($akma->satuan->satuan); ?></td>
                                <td><?php echo e($akma->user->name); ?></td>
                                <td><?php echo e($akma->created_at); ?></td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="#aktifitasBarangMasuk" data-toggle="modal" data-target="#exampleModalCenter<?php echo e($akma->id); ?>"><i class="text-white">Catatan</i></a>
                                </td>
                                <div class="modal fade" id="exampleModalCenter<?php echo e($akma->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          ...
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                            <td>
                                <i>Maaf data tidak tersedia!</i>
                            </td>
                        </tr>
                          <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row my-4" id="aktifitasBarangKeluar">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg -6 col-7">
                      <h6>Aktifitas Barang Keluar</h6>
                      <p class="text-sm mb-0">
                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                        <span class="font-weight-bold ms-1">5 data</span> teratas
                      </p>
                    </div>
                    <div class="d-flex justify-content-start">
                        <a  type="button" class="btn btn-sm btn-info" href="<?php echo e(route('admin.barang.keluar')); ?>">Lihat Selengkapnya</a>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                      
                    </div>
                  </div>
                </div>
                    <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengguna</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tersimpan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $aktifitas_keluar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $akel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="text-center">
                                <td><?php echo e($akel->barang->kode_barang); ?></td>
                                <td><?php echo e($akel->barang->nama_barang); ?></td>
                                <td><?php echo e($akel->jumlah); ?></td>
                                <td><?php echo e($akel->satuan->satuan); ?></td>
                                <td><?php echo e($akel->user->name); ?></td>
                                <td><?php echo e($akel->created_at); ?></td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="#aktifitasBarangKeluar" data-toggle="modal" data-target="#exampleModalCenter<?php echo e($akel->id); ?>"><i class="text-white">Catatan</i></a>
                                </td>
                                <div class="modal fade" id="exampleModalCenter<?php echo e($akel->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                            <td>
                                <i>Maaf data tidak tersedia!</i>
                            </td>
                        </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
              </div>
            </div>
        </div>
</div>
<?php /**PATH F:\MyApplications\Inventaris_Fajar\resources\views/livewire/home-component.blade.php ENDPATH**/ ?>