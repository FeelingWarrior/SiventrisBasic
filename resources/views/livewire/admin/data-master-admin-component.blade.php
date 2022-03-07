<div>
    <div class="container-fluid py-4">

      {{-- Gudang --}}

        @if(Session::has('message_success'))
            <h6 class="alert alert-success" role="alert">{{ Session::get('message_success') }}</h6>
        @endif
        @if(Session::has('message_update'))
            <h6 class="alert alert-success" role="alert">{{ Session::get('message_update') }}</h6>
        @endif
        @if(Session::has('message_failed'))
            <h6 class="alert alert-success" role="alert">{{ Session::get('message_failed') }}</h6>
        @endif
        <div class="row my-4">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>Gudang</h6>
                      <p class="text-sm mb-0">
                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                        <span class="font-weight-bold ms-1">5 data</span> terakhir
                      </p>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive">
                    <table class="table table-responsive align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gudang</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tersimpan</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($gudang as $gd)
                            <tr>
                                <td>{{ $gd->kode_gudang }}</td>
                                <td>{{ $gd->nama_gudang }}</td>
                                <td>{{ $gd->created_at }}</td>
                                <td>
                                    <a href="#" wire:click='editWarehouse({{ $gd->id }})'><i class="text-muted">edit</i></a> |
                                    <a href="#" wire:click='hapusWarehouse({{ $gd->id }})'><i class="text-muted">hapus</i></a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td><i>Maaf Data Tidak Tersedia!</i></td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                  {{ $gudang->links() }}
                </div>
              </div>
            </div>
            @if (!$id_gudang || $transit_gudang)
            <div class="col-lg-4 col-md-6">
              <div class="card h-100">
                <div class="card-header pb-0">
                  <h6>Tambah Data Gudang</h6>
                </div>
                <div class="card-body p-3">
                    <form wire:submit.prevent='gudangInput'>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Kode" required wire:model='kode_gudang' readonly>
                          </div>
                        <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Gudang" required wire:model='nama_gudang' required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
            @elseif ($id_gudang || !$transit_gudang)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                  <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Edit Data Gudang</h6>
                    <a wire:click='transitAwalGudang()' type="button" class="btn btn-md btn-secondary" href="#"><i class="fas fa-plus"></i> New</a>
                  </div>
                  <div class="card-body p-3">
                      <form wire:submit.prevent='saveWarehouse'>
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="Kode" required wire:model='kode_gudang' readonly>
                            </div>
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Gudang" required wire:model='nama_gudang' required>
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Edit</button>
                          </div>
                      </form>
                  </div>
                </div>
              </div>
            @endif
          </div>

        {{-- Merek --}}

        @if(Session::has('message_success_merek'))
        <h6 class="alert alert-success" role="alert">{{ Session::get('message_success_merek') }}</h6>
        @endif
        @if(Session::has('message_update_merek'))
            <h6 class="alert alert-success" role="alert">{{ Session::get('message_update_merek') }}</h6>
        @endif
        @if(Session::has('message_failed_merek'))
            <h6 class="alert alert-success" role="alert">{{ Session::get('message_failed_merek') }}</h6>
        @endif
          <div class="row my-4" id="Brands">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>Merek</h6>
                      <p class="text-sm mb-0">
                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                        <span class="font-weight-bold ms-1">5 data</span> terakhir
                      </p>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive">
                    <table class="table table-responsive align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Merek</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tersimpan</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($merek as $mr)
                            <tr>
                                <td>{{ $mr->kode_merek }}</td>
                                <td>{{ $mr->nama_merek }}</td>
                                <td>{{ $mr->created_at }}</td>
                                <td>
                                    <a href="#Brands" wire:click='editBrand({{ $mr->id }})'><i class="text-muted">edit</i></a> |
                                    <a href="#Brands" wire:click='hapusBrand({{ $mr->id }})'><i class="text-muted">hapus</i></a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td><i>Maaf Data Tidak Tersedia!</i></td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                  {{ $merek->links() }}
                </div>
              </div>
            </div>
            @if (!$id_merek || $transit_merek)
            <div class="col-lg-4 col-md-6">
              <div class="card h-100">
                <div class="card-header pb-0">
                  <h6>Tambah Data Merek</h6>
                </div>
                <div class="card-body p-3">
                    <form wire:submit.prevent='merekInput'>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Kode" required wire:model='kode_merek' readonly>
                          </div>
                        <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Merek" required wire:model='nama_merek' required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
            @elseif ($id_merek || !$transit_merek)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                  <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Edit Data Merek</h6>
                    <a wire:click='transitAwalMerek()' type="button" class="btn btn-md btn-secondary" href="#Brands"><i class="fas fa-plus"></i> New</a>
                  </div>
                  <div class="card-body p-3">
                      <form wire:submit.prevent='saveBrand'>
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="Kode" required wire:model='kode_merek' readonly>
                            </div>
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Merek" required wire:model='nama_merek'>
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Edit</button>
                          </div>
                      </form>
                  </div>
                </div>
              </div>
            @endif
          </div>

        {{-- Tipe --}}

        @if(Session::has('message_success_tipe'))
            <h6 class="alert alert-success" role="alert">{{ Session::get('message_success_tipe') }}</h6>
        @endif
        @if(Session::has('message_update_tipe'))
            <h6 class="alert alert-success" role="alert">{{ Session::get('message_update_tipe') }}</h6>
        @endif
        @if(Session::has('message_failed_tipe'))
            <h6 class="alert alert-success" role="alert">{{ Session::get('message_failed_tipe') }}</h6>
        @endif
          <div class="row my-4" id="Tipe">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>Tipe</h6>
                      <p class="text-sm mb-0">
                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                        <span class="font-weight-bold ms-1">5 data</span> terakhir
                      </p>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive">
                    <table class="table table-responsive align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipe</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tersimpan</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($tipe as $tp)
                            <tr>
                                <td>{{ $tp->kode_tipe }}</td>
                                <td>{{ $tp->nama_tipe }}</td>
                                <td>{{ $tp->created_at }}</td>
                                <td>
                                    <a href="#Tipe" wire:click='editType({{ $tp->id }})'><i class="text-muted">edit</i></a> |
                                    <a href="#Tipe" wire:click='hapusType({{ $tp->id }})'><i class="text-muted">hapus</i></a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td><i>Maaf Data Tidak Tersedia!</i></td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                  {{ $tipe->links() }}
                </div>
              </div>
            </div>
            @if (!$id_tipe || $transit_tipe)
            <div class="col-lg-4 col-md-6">
              <div class="card h-100">
                <div class="card-header pb-0">
                  <h6>Tambah Data Tipe</h6>
                </div>
                <div class="card-body p-3">
                    <form wire:submit.prevent='inputTipe'>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Kode" required wire:model='kode_tipe' readonly>
                          </div>
                        <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Tipe" required wire:model='nama_tipe' required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
            @elseif ($id_tipe || !$transit_tipe)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                  <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Edit Data Tipe</h6>
                    <a wire:click='transitAwalTipe()' type="button" class="btn btn-md btn-secondary" href="#Tipe"><i class="fas fa-plus"></i> New</a>
                  </div>
                  <div class="card-body p-3">
                      <form wire:submit.prevent='saveTipe'>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Kode" required wire:model='kode_tipe' readonly>
                          </div>
                        <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Tipe" required wire:model='nama_tipe' required>
                        </div>
                          <div class="text-center">
                              <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Edit</button>
                          </div>
                      </form>
                  </div>
                </div>
              </div>
            @endif
          </div>

      {{-- Satuan --}}

      @if(Session::has('message_success_satuan'))
          <h6 class="alert alert-success" role="alert">{{ Session::get('message_success_satuan') }}</h6>
      @endif
      @if(Session::has('message_update_satuan'))
          <h6 class="alert alert-success" role="alert">{{ Session::get('message_update_satuan') }}</h6>
      @endif
      @if(Session::has('message_failed_satuan'))
          <h6 class="alert alert-success" role="alert">{{ Session::get('message_failed_satuan') }}</h6>
      @endif
        <div class="row my-4" id="Satuan">
          <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
              <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6>Satuan</h6>
                    <p class="text-sm mb-0">
                      <i class="fa fa-check text-info" aria-hidden="true"></i>
                      <span class="font-weight-bold ms-1">5 data</span> terakhir
                    </p>
                  </div>
                  <div class="col-lg-6 col-5 my-auto text-end">
                  </div>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                  <table class="table table-responsive align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Satuan</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tersimpan</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($satuan as $st)
                          <tr>
                              <td>{{ $st->kode_satuan }}</td>
                              <td>{{ $st->satuan }}</td>
                              <td>{{ $st->created_at }}</td>
                              <td>
                                  <a href="#Satuan" wire:click='editSatuan({{ $st->id }})'><i class="text-muted">edit</i></a> |
                                  <a href="#Satuan" wire:click='hapusSatuan({{ $st->id }})'><i class="text-muted">hapus</i></a>
                              </td>
                          </tr>
                      @empty
                      <tr>
                          <td><i>Maaf Data Tidak Tersedia!</i></td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
                {{ $satuan->links() }}
              </div>
            </div>
          </div>
          @if (!$id_satuan || $transit_satuan)
          <div class="col-lg-4 col-md-6">
            <div class="card h-100">
              <div class="card-header pb-0">
                <h6>Tambah Data Satuan</h6>
              </div>
              <div class="card-body p-3">
                  <form wire:submit.prevent='inputSatuan'>
                      <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Kode" required wire:model='kode_satuan' readonly>
                        </div>
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Satuan" required wire:model='nama_satuan' required>
                      </div>
                      <div class="text-center">
                          <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                      </div>
                  </form>
              </div>
            </div>
          </div>
          @elseif ($id_satuan || !$transit_satuan)
          <div class="col-lg-4 col-md-6">
              <div class="card h-100">
                <div class="card-header pb-0 d-flex justify-content-between">
                  <h6>Edit Data Satuan</h6>
                  <a wire:click='transitAwalSatuan()' type="button" class="btn btn-md btn-secondary" href="#Satuan"><i class="fas fa-plus"></i> New</a>
                </div>
                <div class="card-body p-3">
                    <form wire:submit.prevent='saveSatuan'>
                      <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Kode" required wire:model='kode_satuan' readonly>
                        </div>
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Satuan" required wire:model='nama_satuan' required>
                      </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Edit</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          @endif
        </div>
    </div>
</div>
