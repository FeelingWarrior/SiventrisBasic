<?php

namespace App\Http\Livewire\Admin\Produk;

use App\Models\Brand;
use App\Models\LoginItem;
use App\Models\LoginStock;
use App\Models\LogoutItem;
use App\Models\LogoutStock;
use App\Models\Product;
use App\Models\Type;
use App\Models\Warehouse;
use Livewire\Component;
use Livewire\WithPagination;

class ProdukComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cari_barang;
    public $kode_barang;
    public $nama_barang;
    public $kode_gudang_barang;
    public $kode_tipe_barang;
    public $kode_merek_barang;
    public $idBarang;
    public $gudang_search;
    public $merek_search;
    public $tipe_search;
    public $tanggal_search;
    public $VtransitAwalBarang = false;

    public function mount()
    {
        $kodeOtomatis = Product::max('kode_barang');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "P-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_barang = $kodeGenerate;
    }

    public function inputBarang()
    {
        $this->validate([
            'kode_barang'=>'required|string',
            'nama_barang'=>'required|string',
            'kode_gudang_barang'=>'required|integer',
            'kode_tipe_barang'=>'required|integer',
            'kode_merek_barang'=>'required|integer',
        ]);

        $save_barang = new Product();
        $save_barang->kode_barang = $this->kode_barang;
        $save_barang->nama_barang = $this->nama_barang;
        $save_barang->kode_gudang = $this->kode_gudang_barang;
        $save_barang->kode_merek = $this->kode_merek_barang;
        if($this->kode_tipe_barang === null)
        {
            $save_barang->kode_tipe = null;
            $save_barang->tipe_barang = '-';
        }
        else
        {
            $save_barang->kode_tipe = $this->kode_tipe_barang;
            $jenis_barang = Type::where('id',$this->kode_tipe_barang)->first();
            $save_barang->tipe_barang = $jenis_barang->nama_tipe;
        }
        $save_barang->save();

        $kodeOtomatis = Product::max('kode_barang');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "P-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_barang = $kodeGenerate;

        session()->flash('message_success_barang','Data Barang berhasil disimpan!');

        $this->reset([
            'nama_barang',
            'kode_gudang_barang',
            'kode_tipe_barang',
            'kode_merek_barang',
        ]);
    }
    public function editBarang($id)
    {
        $editBarang = Product::find($id);
        $this->idBarang = $editBarang->id;
        $this->kode_barang = $editBarang->kode_barang;
        $this->nama_barang = $editBarang->nama_barang;
        $this->kode_gudang_barang = $editBarang->kode_gudang;
        $this->kode_merek_barang = $editBarang->kode_merek;
        $this->kode_tipe_barang = $editBarang->kode_tipe;
        return $this->VtransitAwalBarang = false;
    }

    public function transferGudang()
    {
        $login_item = LoginItem::where('kode_barang',$this->idBarang)->first();
        $loop_login_item = LoginItem::where('kode_barang',$this->idBarang)->get();
        foreach($loop_login_item as $lli)
        {
            if($lli->kode_gudang == $login_item->kode_gudang)
            {
                $login_item->kode_gudang = $this->kode_gudang_barang;
                $login_item->save();
            }
        }

        $logout_item = LogoutItem::where('kode_barang',$this->idBarang)->first();
        $loop_logout_item = LogoutItem::where('kode_barang',$this->idBarang)->get();
        foreach($loop_logout_item as $lli)
        {
            if($lli->kode_gudang == $logout_item->kode_gudang)
            {
                $logout_item->kode_gudang = $this->kode_gudang_barang;
                $logout_item->save();
            }
        }

        $login_Stock = LoginStock::where('kode_barang',$this->idBarang)->first();
        $loop_login_Stock = LoginStock::where('kode_barang',$this->idBarang)->get();
        foreach($loop_login_Stock as $lli)
        {
            if($lli->kode_gudang == $login_Stock->kode_gudang)
            {
                $login_Stock->kode_gudang = $this->kode_gudang_barang;
                $login_Stock->save();
            }
        }

        $logout_Stock = LogoutStock::where('kode_barang',$this->idBarang)->first();
        $loop_logout_Stock = LogoutStock::where('kode_barang',$this->idBarang)->get();
        foreach($loop_logout_Stock as $lli)
        {
            if($lli->kode_gudang == $logout_Stock->kode_gudang)
            {
                $logout_Stock->kode_gudang = $this->kode_gudang_barang;
                $logout_Stock->save();
            }
        }

    }

    public function saveBarang()
    {
        $update_barang = Product::where('id',$this->idBarang)->first();
        $update_barang->kode_barang = $this->kode_barang;
        $update_barang->nama_barang = $this->nama_barang;
        $update_barang->kode_gudang = $this->kode_gudang_barang;
        if($this->kode_tipe_barang === null)
        {
            $update_barang->kode_tipe = null;
        }
        else
        {
            $update_barang->kode_tipe = $this->kode_tipe_barang;
        }
        $update_barang->kode_merek = $this->kode_merek_barang;
        $update_barang->save();

        $this->transferGudang();

        session()->flash('message_update_barang','Data Barang berhasil diubah!');
    }

    public function hapusBarang($id)
    {
        $hapus_barang = Product::find($id);
        $hapus_barang->delete();
        session()->flash('message_failed_barang','Data Barang berhasil dihapus!');

        $kodeOtomatis = Product::max('kode_barang');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "P-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_barang = $kodeGenerate;
    }
    public function transitAwalBarang()
    {
        $this->reset([
            'nama_barang',
            'kode_gudang_barang',
            'kode_tipe_barang',
            'kode_merek_barang',
        ]);

        $kodeOtomatis = Product::max('kode_barang');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "P-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_barang = $kodeGenerate;

        return $this->VtransitAwalBarang = true;
    }
    public function render()
    {
        $gudang = Warehouse::get();
        $merek = Brand::get();
        $tipe = Type::get();
        $search_gudang = Warehouse::get();
        $search_merek = Brand::get();
        $search_tipe = Type::get();
        $barang = Product::where('nama_barang','like','%'.$this->cari_barang.'%')
        ->where('kode_gudang','like','%'.$this->gudang_search.'%')
        ->where('kode_merek','like','%'.$this->merek_search.'%')
        ->where('tipe_barang','like','%'.$this->tipe_search.'%')
        ->where('created_at','like','%'.$this->tanggal_search.'%')
        ->latest()
        ->paginate(10);
        $id_barang = $this->idBarang;
        $transit_barang = $this->VtransitAwalBarang;
        return view('livewire.admin.produk.produk-component',compact(
            'gudang','merek','tipe','barang','id_barang','transit_barang','search_gudang','search_merek','search_tipe'
        ))->layout('layouts.base');
    }
}
