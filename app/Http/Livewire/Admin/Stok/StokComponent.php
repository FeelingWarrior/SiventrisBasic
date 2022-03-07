<?php

namespace App\Http\Livewire\Admin\Stok;

use App\Exports\ExportStockItemComponent;
use App\Models\Brand;
use App\Models\CatatanBarang;
use App\Models\LoginStock;
use App\Models\LogoutStock;
use App\Models\Product;
use App\Models\Type;
use App\Models\Warehouse;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Excel;

class StokComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $gudang_search;
    public $tanggal_search;
    public $cari_barang;
    public $merek_search;
    public $tipe_search;
    public $stock = [];
    public $idStok;
    public $cariBerdasarkanTanggal;
    public $cariKeterangan;
    public $cariOrderBy = 'ASC';

    public $kode_barang;
    public $nama_barang;
    public $tipe_barang;
    public $merek_barang;
    public $gudang_barang;
    public $stock_masuk;
    public $stock_keluar;
    public $satuan;
    public $id_barang;

    public $idTransferBarang;
    public $namaTransferBarang;
    public $tipeTransferBarang;
    public $merekTransferBarang;
    public $gudangTransferBarang;

    public $masukStok;
    public $keluarStok;

    public function catatanBarang($id)
    {
        $produk = Product::where('id',$id)->first();
        $this->idStok = $produk->kode_barang;
    }

    public function transferBarang($id)
    {
        $produkTransfer = Product::where('id',$id)->first();
        $masuk_stok = LoginStock::where('kode_barang',$id)->first();
        $this->masukStok = $masuk_stok->stock_masuk;
        $keluar_stok = LogoutStock::where('kode_barang',$id)->first();
        $this->keluarStok = $keluar_stok->stock_keluar;
        if($produkTransfer)
        {
            $this->idTransferBarang = $produkTransfer->id;
            $this->namaTransferBarang = $produkTransfer->nama_barang;
            $this->tipeTransferBarang = $produkTransfer->kode_tipe;
            $this->merekTransferBarang = $produkTransfer->kode_merek;
            $this->gudangTransferBarang = $produkTransfer->kode_gudang;

            $this->reset([
                'kode_barang',
                'nama_barang',
                'tipe_barang',
                'merek_barang',
                'gudang_barang',
                'stock_masuk',
                'stock_keluar',
                'satuan'
            ]);
        }
    }

    public function cek_barang($value)
    {
        $cek_barang = Product::find($value);
        $cek_stock_masuk = LoginStock::where('kode_barang',$value)->first();
        $cek_stock_keluar = LoginStock::where('kode_barang',$value)->first();
        if($value === '')
        {
            $this->kode_barang = 'Maaf kode tidak tersedia!';
            $this->nama_barang = 'Maaf barang tidak tersedia!';
            $this->tipe_barang = 'Maaf tipe tidak tersedia!';
            $this->merek_barang = 'Maaf merek tidak tersedia!';
            $this->gudang_barang = 'Maaf gudang tidak tersedia!';
            $this->stock_masuk = 'Maaf stok tidak tersedia';
            $this->stock_keluar = 'Maaf stok tidak tersedia';
            $this->satuan = 'Maaf satuan tidak tersedia';
        }
        else
        {
            $this->kode_barang = $cek_barang->kode_barang;
            $this->nama_barang = $cek_barang->nama_barang;
            $this->tipe_barang = $cek_barang->tipe->nama_tipe;
            $this->merek_barang = $cek_barang->merek->nama_merek;
            $this->gudang_barang = $cek_barang->gudang->nama_gudang;
            $this->stock_masuk = $cek_stock_masuk->stock_masuk;
            $this->stock_keluar = $cek_stock_keluar->stock_keluar;
            $this->satuan = $cek_stock_masuk->satuan->satuan;
            $this->id_barang = $cek_barang->id;

        }
    }

    public function transferItem()
    {
        // transfer stock_masuk tujuan
        $stok_masuk = LoginStock::where('kode_barang',$this->id_barang)->first();
        $stok_masuk->stock_masuk += $this->masukStok;
        $stok_masuk->save();

        // transfer stock_keluar tujuan
        $stok_keluar = LogoutStock::where('kode_barang',$this->id_barang)->first();
        $stok_keluar->stock_keluar += $this->keluarStok;
        $stok_keluar->save();

        // transfer stock_masuk asal
        $stok_masuk = LoginStock::where('kode_barang',$this->idTransferBarang)->first();
        $stok_masuk->stock_masuk -= $this->masukStok;
        $stok_masuk->save();

        // transfer stock_keluar asal
        $stok_keluar = LogoutStock::where('kode_barang',$this->idTransferBarang)->first();
        $stok_keluar->stock_keluar -= $this->keluarStok;
        $stok_keluar->save();

        session()->flash('transfer_sukses','Anda berhasil melakukan transfer data!');
    }

    public function stokAwal()
    {
        $loginStock = LoginStock::get();

        foreach ($loginStock as $ls)
        {
            if(Carbon::parse($ls->updated_at)->format('d') < Carbon::now()->format('d'))
            {
                $this->stock[$ls->id] = $ls->stock_awal = $ls->stock_masuk;
            }
            else {
                $this->stock[$ls->id] = $ls->stock_awal;
            }
        }
        return $this->stock;
    }

    public function downloadLaporanExcel()
    {
        $cari_gudang = $this->gudang_search;
        $cari_merek = $this->merek_search;
        $cari_tipe = $this->tipe_search;
        $cari_tanggal = $this->tanggal_search;
        $cari_produk = $this->cari_barang;

        return Excel::download(new ExportStockItemComponent($cari_gudang,$cari_tipe,$cari_merek,$cari_tanggal,$cari_produk),'DataLaporanStok' .$cari_tanggal.'.xlsx');
    }

    // public function downloadLaporanPDF()
    // {
    //     //
    // }

    public function render()
    {
        $search_merek = Brand::get();
        $search_tipe = Type::get();
        $search_gudang = Warehouse::get();
        $catatan = CatatanBarang::where('kode_barang',$this->idStok)
        ->orderBy('created_at',''.$this->cariOrderBy.'')
        ->where('created_at','like','%'.$this->cariBerdasarkanTanggal.'%')
        ->where('catatan','like','%'.$this->cariKeterangan.'%')
        ->get();
        $stok = LoginStock::where('nama_barang','like','%'.$this->cari_barang.'%')
        ->where('kode_gudang','like','%'.$this->gudang_search.'%')
        ->where('created_at','like','%'.$this->tanggal_search.'%')
        ->where('kode_merek','like','%'.$this->merek_search.'%')
        ->where('kode_tipe','like','%'.$this->tipe_search.'%')
        ->orderBy('updated_at','DESC')
        ->latest()
        ->paginate(10);
        $produk_transfer = Product::where('nama_barang',$this->namaTransferBarang)
        ->where('kode_merek',$this->merekTransferBarang)
        ->where('kode_tipe',$this->tipeTransferBarang)
        ->where('kode_gudang','!=',$this->gudangTransferBarang)
        ->get();
        return view('livewire.admin.stok.stok-component',compact(
            'search_gudang','stok','search_merek','search_tipe','catatan','produk_transfer'
        ))->layout('layouts.base');
    }
}
