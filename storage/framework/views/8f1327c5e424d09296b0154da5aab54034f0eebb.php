<?php
    use App\Models\LogoutStock;
?>
<div>
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Cari Stok Barang</h5>
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
                            <div class="col-sm-4">
                                <label>Cari berdasarkan nama barang*</label>
                                <input type="text" class="form-control" placeholder="Ketikkan Nama Barang . . ." wire:model='cari_barang'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
          <div class="row my-4" id="Barang">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>Stok Barang</h6>
                      <p class="text-sm mb-0">
                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                        <span class="font-weight-bold ms-1">10 data</span> terakhir
                      </p>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                        <span><a href="#" type="button" class="btn btn-sm btn-success" wire:click='downloadLaporanExcel()'><i class="ni ni-send"></i> Laporan Excel</a></span>
                        
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
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
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Histori</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transfer</th>
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
                                <td><?php echo e($br->stock_awal); ?></td>
                                <td><?php echo e($br->stock_masuk+$br->stock_keluar); ?></td>
                                <td><?php echo e($sk->stock_keluar); ?></td>
                                <td><?php echo e($br->stock_masuk); ?></td>
                                <td><?php echo e($br->satuan->satuan); ?></td>
                                <td><?php echo e($br->gudang->nama_gudang); ?></td>
                                <td><?php echo e($br->updated_at); ?></td>
                                <td>
                                    <a href="#Barang" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo e($br->kode_barang); ?>" wire:click='catatanBarang(<?php echo e($br->kode_barang); ?>)'><i class="text-white">Histori</i></a>
                                </td>
                                <td>
                                    <a href="#Barang" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalTransfer<?php echo e($br->kode_barang); ?>" wire:click='transferBarang(<?php echo e($br->kode_barang); ?>)'><i class="text-white">Transfer</i></a>
                                </td>
                                <!-- Modal -->
                                <div wire:ignore.self class="modal fade" id="exampleModal<?php echo e($br->kode_barang); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e($br->nama_barang); ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span class="text-dark" aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <div class="mb-3">
                                                <label for="">Cari Berdasarkan Tanggal:</label>
                                                <input type="date" class="form-control" wire:model='cariBerdasarkanTanggal'>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Cari Berdasarkan Keterangan:</label>
                                                <select class="form-control" wire:model=cariKeterangan>
                                                    <option value="">Pilih Keterangan:</option>
                                                    <option value="Barang Masuk">Barang Masuk</option>
                                                    <option value="Barang Keluar">Barang Keluar</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Cari Berdasarkan Urutan:</label>
                                                <select class="form-control" wire:model=cariOrderBy>
                                                    <option value="">Pilih Urutan:</option>
                                                    <option value="ASC">Atas ke Bawah</option>
                                                    <option value="DESC">Bawah ke Atas</option>
                                                </select>
                                            </div>
                                            <hr>
                                            <?php $__empty_2 = true; $__currentLoopData = $catatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                            <div>
                                                <i><span>Stok Awal: </span><span><?php echo e($detail->stok); ?></span></i>
                                            </div>
                                            <div>
                                                <i><span>Jumlah: </span><span><?php echo e($detail->jumlah); ?></span></i>
                                            </div>
                                            <div>
                                                <i><span>Keterangan: </span><span><?php echo e($detail->catatan); ?></span></i>
                                            </div>
                                            <div>
                                                <i><span>Waktu: </span><span><?php echo e($detail->created_at); ?></span></i>
                                            </div>
                                            <hr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                            <i>Maaf data tidak tersedia!</i>
                                            <?php endif; ?>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                 <!-- Modal -->
                                 <div wire:ignore.self class="modal fade" id="exampleModalTransfer<?php echo e($br->kode_barang); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <?php if(Session::has('transfer_sukses')): ?>
                                        <h6 class="alert alert-success" role="alert"><?php echo e(Session::get('transfer_sukses')); ?></h6>
                                        <?php endif; ?>
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Transfer <?php echo e($br->nama_barang); ?> Dari Gudang <?php echo e($br->gudang->nama_gudang); ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span class="text-dark" aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <h5>Tujuan:</h5>
                                            <form wire:submit.prevent='transferItem'>
                                            <div class="mb-3">
                                                <label for="">Pilih Kode Barang</label>
                                                <select wire:change='cek_barang($event.target.value)' wire:model='kode_barang' class="form-control">
                                                    <option value="">Pilih Kode Barang:</option>
                                                    <?php $__empty_2 = true; $__currentLoopData = $produk_transfer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->kode_barang); ?> (<?php echo e($item->nama_barang); ?>) (<?php echo e($item->gudang->nama_gudang); ?>)</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                    <option value="">Maaf data produk tidak tersedia!</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Nama Barang</label>
                                                <input type="text" wire:model='nama_barang' class="form-control" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Tipe Barang</label>
                                                <input type="text" class="form-control" wire:model='tipe_barang' required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Merek Barang</label>
                                                <input type="text" class="form-control" wire:model='merek_barang' required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Gudang Barang</label>
                                                <input type="text" wire:model='gudang_barang' class="form-control" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Stok Masuk</label>
                                                <input type="text" wire:model='stock_masuk' placeholder="0" class="form-control" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Stok Keluar</label>
                                                <input type="text" wire:model='stock_keluar' placeholder="0" class="form-control" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Satuan</label>
                                                <input type="text" wire:model='satuan' class="form-control" required readonly>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-block btn-info">Transfer Sekarang!</button>
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                </div>
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
                  <?php echo e($stok->links()); ?>

                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH F:\MyApplications\Inventaris_Fajar\resources\views/livewire/admin/stok/stok-component.blade.php ENDPATH**/ ?>