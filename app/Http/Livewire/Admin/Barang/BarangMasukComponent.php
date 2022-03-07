<?php

namespace App\Http\Livewire\Admin\Barang;

use App\Http\Livewire\Admin\Stok\StokComponent;
use App\Models\Brand;
use App\Models\CatatanBarang;
use App\Models\LoginItem;
use App\Models\LoginStock;
use App\Models\LogoutStock;
use App\Models\Product;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Warehouse;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class BarangMasukComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $kode_barang;
    public $nama_barang;
    public $jumlah_barang;
    public $kode_satuan_barang;
    public $waktu_barang;
    // public $VtransitAwalBarang = false;
    // public $idBarang;
    public $cari_barang;
    public $gudang_search;
    public $merek_search;
    public $tipe_search;
    public $tanggal_search;
    public $data_gudang;
    public $data_tipe;
    public $data_merek;
    public $idProduk;
    public $nama_tipe;

    public function cek_barang($value){
        $cek_produk = Product::find($value);
        if($value === "")
        {
            $this->nama_barang = 'Data tidak tersedia!';
            $this->nama_tipe = 'Data tidak tersedia!';
        }
        else
        {
            $this->nama_barang = $cek_produk->nama_barang;
            $this->data_gudang = $cek_produk->kode_gudang;
            $this->data_merek = $cek_produk->kode_merek;
            $this->data_tipe = $cek_produk->kode_tipe;
            $this->nama_tipe = $cek_produk->tipe->nama_tipe;
            $this->idProduk = $cek_produk->id;
        }
    }
    // public function transitAwalBarang()
    // {
    //     $this->reset([
    //         'nama_barang',
    //         'jumlah_barang',
    //         'kode_satuan_barang',
    //     ]);
    //     return $this->VtransitAwalBarang = true;
    // }
    public function inputBarang()
    {
        $this->validate([
            'kode_barang'=>'required|string',
            'nama_barang'=>'required|string',
            'jumlah_barang'=>'required|integer',
            'kode_satuan_barang'=>'required|integer',
        ]);

        $save_barang = new LoginItem();
        $save_barang->kode_barang = $this->kode_barang;
        $save_barang->nama_barang = $this->nama_barang;
        $save_barang->kode_gudang = $this->data_gudang;
        $save_barang->kode_merek = $this->data_merek;
        $save_barang->kode_tipe = $this->data_tipe;
        $save_barang->jumlah = $this->jumlah_barang;
        $save_barang->created_at = $this->waktu_barang;
        $save_barang->kode_satuan = $this->kode_satuan_barang;
        $save_barang->kode_user = auth()->user()->id;
        $save_barang->save();

        $first_login_stock = LoginStock::where('kode_barang',$this->idProduk)->first();
        $stokComponent = new StokComponent();
        $stokAwal = $stokComponent->stokAwal();
        if($first_login_stock)
        {
            $update_stock = LoginStock::find($first_login_stock->id);
            $update_stock->stock_masuk += $this->jumlah_barang;
        if(Carbon::parse($update_stock->updated_at)->format('d') < Carbon::now()->format('d'))
            {
                foreach($stokAwal as $key=>$stok)
                {
                    if($key == $this->idProduk)
                    {
                        $update_stock->stock_awal = $stok;
                    }
                }
            }
            $update_stock->save();

            $produk = Product::where('id',$this->kode_barang)->first();
            $stokLogin = LoginStock::where('kode_barang',$this->kode_barang)->first();

            $catatan = new CatatanBarang();
            $catatan->kode_barang = $produk->kode_barang;
            $catatan->kode_user = auth()->user()->id;
            $catatan->stok = $stokLogin->stock_awal;
            $catatan->jumlah = $this->jumlah_barang;
            $catatan->catatan = 'Barang Masuk';
            $catatan->save();
        }
        if(!$first_login_stock){
            $masuk_stok = new LoginStock();
            $masuk_stok->stock_masuk = $this->jumlah_barang;
            $masuk_stok->stock_awal = $this->jumlah_barang;
            $masuk_stok->kode_gudang = $this->data_gudang;
            $masuk_stok->kode_tipe = $this->data_tipe;
            $masuk_stok->kode_merek = $this->data_merek;
            $masuk_stok->nama_barang = $this->nama_barang;
            $masuk_stok->kode_barang = $this->kode_barang;
            $masuk_stok->kode_satuan = $this->kode_satuan_barang;
            $masuk_stok->created_at = $this->waktu_barang;
            $masuk_stok->save();

            $produk = Product::where('id',$this->kode_barang)->first();

            $catatan = new CatatanBarang();
            $catatan->kode_barang = $produk->kode_barang;
            $catatan->kode_user = auth()->user()->id;
            $catatan->stok = $this->jumlah_barang;
            $catatan->jumlah = $this->jumlah_barang;
            $catatan->catatan = 'Barang Masuk';
            $catatan->save();
        }

        // Logout Stock

        $first_logout_stock = LogoutStock::where('kode_barang',$this->idProduk)->first();
        if(!$first_logout_stock){
            $keluar_stok = new LogoutStock();
            $keluar_stok->stock_keluar = 0;
            $keluar_stok->kode_gudang = $this->data_gudang;
            $keluar_stok->kode_tipe = $this->data_tipe;
            $keluar_stok->kode_merek = $this->data_merek;
            $keluar_stok->nama_barang = $this->nama_barang;
            $keluar_stok->kode_barang = $this->kode_barang;
            $keluar_stok->kode_satuan = $this->kode_satuan_barang;
            $keluar_stok->created_at = $this->waktu_barang;
            $keluar_stok->save();
        }



        session()->flash('message_success_barang','Data Barang berhasil disimpan!');

        $this->reset([
            'kode_barang',
            'nama_barang',
            'jumlah_barang',
            'waktu_barang',
            'kode_satuan_barang'
        ]);
    }
    // public function editBarang($id)
    // {
    //     $editBarang = LoginItem::find($id);
    //     $this->idBarang = $editBarang->id;
    //     $this->kode_barang = $editBarang->kode_barang;
    //     $this->nama_barang = $editBarang->barang->nama_barang;
    //     $this->jumlah_barang = $editBarang->jumlah;
    //     $this->kode_satuan_barang = $editBarang->kode_satuan;
    //     return $this->VtransitAwalBarang = false;
    // }

    // public function saveBarang()
    // {
    //     $update_barang = LoginItem::where('id',$this->idBarang)->first();
    //     $update_barang->kode_barang = $this->kode_barang;
    //     $update_barang->jumlah = $this->jumlah_barang;
    //     $update_barang->kode_satuan = $this->kode_satuan_barang;
    //     $update_barang->save();

    //     $first_login_stock = LoginStock::where('kode_barang',$update_barang->kode_barang)->first();
    //     $update_stock = LoginStock::find($first_login_stock->id);
    //     $update_stock->stock_masuk += $update_barang->jumlah;
    //     $update_stock->save();

    //     session()->flash('message_update_barang','Data Barang berhasil diubah!');
    // }
    public function hapusBarang($id)
    {
        $hapus_barang = LoginItem::find($id);
        $first_login_stock = LoginStock::where('kode_barang',$hapus_barang->kode_barang)->first();
        $produk = Product::where('id',$hapus_barang->kode_barang)->first();
        $stokLogin = LoginStock::where('kode_barang',$hapus_barang->kode_barang)->first();
        $update_stock = LoginStock::find($first_login_stock->id);
        $update_stock->stock_masuk -= $hapus_barang->jumlah;
        $update_stock->save();

        $catatan = new CatatanBarang();
        $catatan->kode_barang = $produk->kode_barang;
        $catatan->kode_user = auth()->user()->id;
        $catatan->jumlah = $hapus_barang->jumlah;
        $catatan->stok = $stokLogin->stock_awal;
        $catatan->catatan = 'Barang Masuk Terhapus';
        $catatan->save();

        $hapus_barang->delete();

        session()->flash('message_failed_barang','Pemasukkan Data Barang berhasil dibatalkan!');
    }
    public function render()
    {
        $search_gudang = Warehouse::get();
        $search_merek = Brand::get();
        $search_tipe = Type::get();
        // $id_barang = $this->idBarang;
        // $transit_barang = $this->VtransitAwalBarang;
        $satuan = Unit::get();
        $kode_produk = Product::select('id','kode_barang','nama_barang')
        ->where('kode_gudang','like','%'.$this->gudang_search.'%')
        ->where('kode_merek','like','%'.$this->merek_search.'%')
        ->where('kode_tipe','like','%'.$this->tipe_search.'%')
        ->get();
        $barang = LoginItem::where('nama_barang','like','%'.$this->cari_barang.'%')
        ->where('kode_gudang','like','%'.$this->gudang_search.'%')
        ->where('kode_merek','like','%'.$this->merek_search.'%')
        ->where('kode_tipe','like','%'.$this->tipe_search.'%')
        ->where('created_at','like','%'.$this->tanggal_search.'%')
        ->latest()
        ->paginate(10);
        return view('livewire.admin.barang.barang-masuk-component',compact(
            'barang',
            'satuan',
            // 'transit_barang',
            // 'id_barang',
            'kode_produk',
            'search_gudang',
            'search_merek',
            'search_tipe'
        ))->layout('layouts.base');
    }
}
