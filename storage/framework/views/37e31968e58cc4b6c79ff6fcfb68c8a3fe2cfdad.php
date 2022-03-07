<div>
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Cari Barang Transfer</h5>
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
        <div class="row my-4 flex justify-content-between">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                    <h6>Transfer Barang</h6>
                    </div>
                    <div class="card-body p-3">
                        <form wire:submit.prevent='transferBarang'>
                            <div class="mb-3">
                                <select class="form-control" wire:model='kode_barang' wire:change='cek_barang($event.target.value)'>
                                    <option value="">Pilih Kode Barang:</option>
                                    <?php $__currentLoopData = $kode_produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($kb->id); ?>"><?php echo e($kb->kode_barang); ?> (<?php echo e($kb->nama_barang); ?>)</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Barang" wire:model='nama_barang' required readonly>
                            </div>
                            <div class="mb-3">
                                <input type="text" placeholder="Merek" class="form-control" wire:model='merek_barang' readonly required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Tipe" wire:model='tipe_barang' readonly required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Gudang" wire:model='gudang_barang' readonly required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Transfer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH F:\MyApplications\Inventaris_Fajar\resources\views/livewire/admin/transfer-item-component.blade.php ENDPATH**/ ?>