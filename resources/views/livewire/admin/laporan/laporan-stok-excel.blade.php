@php
    use App\Models\LogoutStock;
@endphp
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
        @forelse ($stok as $br)
            @php
                $stok_keluar = LogoutStock::select('kode_barang','stock_keluar')->where('kode_barang',$br->kode_barang)->get();
            @endphp
            @foreach ($stok_keluar as $sk)
            <tr class="text-center">
                <td>{{ $br->barang->kode_barang }}</td>
                <td>{{ $br->nama_barang }}</td>
                <td>{{ $br->stock_masuk }}</td>
                <td>{{ $br->stock_awal }}</td>
                <td>{{ $sk->stock_keluar }}</td>
                <td>{{ $br->stock_masuk }}</td>
                <td>{{ $br->satuan->satuan }}</td>
                <td>{{ $br->gudang->nama_gudang }}</td>
                <td>{{ $br->updated_at }}</td>
            </tr>
            @endforeach
        @empty
        <tr>
            <td><i>Maaf Data Tidak Tersedia!</i></td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
