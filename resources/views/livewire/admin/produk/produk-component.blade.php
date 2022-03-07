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
                                    @foreach ($search_gudang as $gd)
                                        <option value="{{ $gd->id }}">{{ $gd->nama_gudang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 ">
                                <label>Merek*</label>
                                <select class="form-control" wire:model="merek_search">
                                    <option value="">Pilih Merek:</option>
                                    @foreach ($search_merek as $mr)
                                        <option value="{{ $mr->id }}">{{ $mr->nama_merek }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Tipe*</label>
                                <select class="form-control" wire:model="tipe_search">
                                    <option value="">Pilih Tipe:</option>
                                    @foreach ($search_tipe as $tp)
                                        <option value="{{ $tp->nama_tipe }}">{{ $tp->nama_tipe }}</option>
                                    @endforeach
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
        {{-- Barang --}}

        @if(Session::has('message_success_barang'))
            <h6 class="alert alert-success" role="alert">{{ Session::get('message_success_barang') }}</h6>
        @endif
        @if(Session::has('message_update_barang'))
            <h6 class="alert alert-success" role="alert">{{ Session::get('message_update_barang') }}</h6>
        @endif
        @if(Session::has('message_failed_barang'))
            <h6 class="alert alert-success" role="alert">{{ Session::get('message_failed_barang') }}</h6>
        @endif
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
                        @forelse ($barang as $br)
                            <tr>
                                <td>{{ $br->kode_barang }}</td>
                                <td>{{ $br->nama_barang }}</td>
                                <td>{{ $br->tipe_barang }}</td>
                                <td>{{ $br->merek->nama_merek }}</td>
                                <td>{{ $br->gudang->nama_gudang }}</td>
                                <td>{{ $br->created_at }}</td>
                                <td>
                                    <a href="#Barang" wire:click='editBarang({{ $br->id }})'><i class="text-muted">edit</i></a> |
                                    <a href="#Barang" wire:click='hapusBarang({{ $br->id }})'><i class="text-muted">hapus</i></a>
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
                  {{ $barang->links() }}
                </div>
              </div>
            </div>
            @if (!$id_barang || $transit_barang)
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
                                @foreach ($merek as $mk)
                                    <option value="{{ $mk->id }}">{{ $mk->nama_merek }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" wire:model='kode_tipe_barang' required>
                                <option value="">Pilih Tipe:</option>
                                @foreach ($tipe as $tp)
                                    <option value="{{ $tp->id }}">{{ $tp->nama_tipe }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" wire:model='kode_gudang_barang' required>
                                <option value="">Pilih Gudang:</option>
                                @foreach ($gudang as $gd)
                                    <option value="{{ $gd->id }}">{{ $gd->nama_gudang }}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
            @elseif ($id_barang || !$transit_barang)
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
                                @foreach ($merek as $mk)
                                    <option value="{{ $mk->id }}">{{ $mk->nama_merek }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" wire:model='kode_tipe_barang' required>
                                <option value="">Pilih Tipe:</option>
                                @foreach ($tipe as $tp)
                                    <option value="{{ $tp->id }}">{{ $tp->nama_tipe }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" wire:model='kode_gudang_barang' required>
                                <option value="">Pilih Gudang:</option>
                                @foreach ($gudang as $gd)
                                    <option value="{{ $gd->id }}">{{ $gd->nama_gudang }}</option>
                                @endforeach
                            </select>
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
