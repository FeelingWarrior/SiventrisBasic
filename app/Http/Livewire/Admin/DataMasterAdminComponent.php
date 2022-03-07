<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Warehouse;
use Livewire\Component;
use Livewire\WithPagination;

class DataMasterAdminComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $nama_gudang;
    public $kode_gudang;
    public $kode_merek;
    public $nama_merek;
    public $idGudang;
    public $idMerek;
    public $idTipe;
    public $nama_tipe;
    public $kode_tipe;
    public $kode_satuan;
    public $nama_satuan;
    public $idSatuan;

    public $VtransitAwalGudang = false;
    public $VtransitAwalMerek = false;
    public $VtransitAwalTipe = false;
    public $VtransitAwalSatuan = false;

    public $cari_gudang;
    public $cari_merek;
    public $cari_tipe;
    public $cari_satuan;


    public function mount()
    {
        $kodeOtomatis = Warehouse::max('kode_gudang');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "G-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_gudang = $kodeGenerate;

        $kodeOtomatis = Brand::max('kode_merek');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "M-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_merek = $kodeGenerate;

        $kodeOtomatis = Type::max('kode_tipe');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "T-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_tipe = $kodeGenerate;

        $kodeOtomatis = Unit::max('kode_satuan');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "U-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_satuan = $kodeGenerate;
    }

    public function editWarehouse($id)
    {
        $editWarehouse = Warehouse::find($id);
        $this->idGudang = $editWarehouse->id;
        $this->kode_gudang = $editWarehouse->kode_gudang;
        $this->nama_gudang = $editWarehouse->nama_gudang;
        $this->VtransitAwalGudang = false;
    }

    public function saveWarehouse()
    {
        $update_warehouse = Warehouse::where('id',$this->idGudang)->first();
        $update_warehouse->kode_gudang = $this->kode_gudang;
        $update_warehouse->nama_gudang = $this->nama_gudang;
        $update_warehouse->save();

        session()->flash('message_update','Data warehouse berhasil diubah!');
    }

    public function gudangInput()
    {
        $this->validate([
            'kode_gudang'=>'required|string',
            'nama_gudang'=>'required|string'
        ]);

        $save_warehouse = new Warehouse();
        $save_warehouse->kode_gudang = $this->kode_gudang;
        $save_warehouse->nama_gudang = $this->nama_gudang;
        $save_warehouse->save();

        session()->flash('message_success','Data warehouse berhasil disimpan!');

        $this->reset([
            'nama_gudang',
        ]);

        $kodeOtomatis = Warehouse::max('kode_gudang');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "G-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_gudang = $kodeGenerate;
    }

    public function transitAwalGudang()
    {
        $this->reset([
            'nama_gudang'
        ]);

        $kodeOtomatis = Warehouse::max('kode_gudang');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "G-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_gudang = $kodeGenerate;

        return $this->VtransitAwalGudang = true;
    }
    public function transitAwalMerek()
    {
        $this->reset([
            'nama_merek',
        ]);

        $kodeOtomatis = Brand::max('kode_merek');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "M-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_merek = $kodeGenerate;

        return $this->VtransitAwalMerek = true;
    }
    public function transitAwalTipe()
    {
        $this->reset([
            'nama_tipe',
        ]);

        $kodeOtomatis = Brand::max('kode_merek');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "M-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_tipe = $kodeGenerate;

        return $this->VtransitAwalTipe = true;
    }
    public function transitAwalSatuan()
    {
        $this->reset([
            'nama_satuan',
        ]);

        $kodeOtomatis = Unit::max('kode_satuan');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "U-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_satuan = $kodeGenerate;

        return $this->VtransitAwalSatuan = true;
    }

    public function hapusWarehouse($id)
    {
        $hapus_warehouse = Warehouse::find($id);
        $hapus_warehouse->delete();

        session()->flash('message_failed','Data warehouse berhasil dihapus!');

        $kodeOtomatis = Warehouse::max('kode_gudang');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "G-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_gudang = $kodeGenerate;

    }

    public function merekInput()
    {
        $this->validate([
            'kode_merek'=>'required|string',
            'nama_merek'=>'required|string',
        ]);

        $save_brand = new Brand();
        $save_brand->kode_merek = $this->kode_merek;
        $save_brand->nama_merek = $this->nama_merek;
        $save_brand->save();

        session()->flash('message_success_merek','Data Brand berhasil disimpan!');

        $this->reset([
            'nama_merek',
        ]);

        $kodeOtomatis = Brand::max('kode_merek');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "M-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_merek = $kodeGenerate;

    }
    public function editBrand($id)
    {
        $editBrand = Brand::find($id);
        $this->idMerek = $editBrand->id;
        $this->kode_merek = $editBrand->kode_merek;
        $this->nama_merek = $editBrand->nama_merek;
        return $this->VtransitAwalMerek = false;
    }

    public function saveBrand()
    {
        $update_Brand = Brand::where('id',$this->idMerek)->first();
        $update_Brand->kode_merek = $this->kode_merek;
        $update_Brand->nama_merek = $this->nama_merek;
        $update_Brand->save();

        session()->flash('message_update_merek','Data Brand berhasil diubah!');
    }

    public function hapusBrand($id)
    {
        $hapus_Brand = Brand::find($id);
        $hapus_Brand->delete();
        session()->flash('message_failed_merek','Data Brand berhasil dihapus!');

        $kodeOtomatis = Brand::max('kode_merek');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "M-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_merek = $kodeGenerate;
    }

    public function inputTipe()
    {
        $this->validate([
            'kode_tipe'=>'required|string',
            'nama_tipe'=>'required|string',
        ]);

        $saveTipe = new Type();
        $saveTipe->kode_tipe = $this->kode_tipe;
        $saveTipe->nama_tipe = $this->nama_tipe;
        $saveTipe->save();

        $kodeOtomatis = Type::max('kode_tipe');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "T-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_tipe = $kodeGenerate;

        session()->flash('message_success_tipe','Data Tipe berhasil disimpan!');

        $this->reset([
            'nama_tipe',
        ]);
    }
    public function editType($id)
    {
        $editType = Type::find($id);
        $this->idTipe = $editType->id;
        $this->kode_tipe = $editType->kode_tipe;
        $this->nama_tipe = $editType->nama_tipe;
        return $this->VtransitAwalTipe = false;
    }

    public function saveTipe()
    {
        $update_Type = Type::where('id',$this->idTipe)->first();
        $update_Type->kode_tipe = $this->kode_tipe;
        $update_Type->nama_tipe = $this->nama_tipe;
        $update_Type->save();

        session()->flash('message_update_tipe','Data Tipe berhasil diubah!');
    }

    public function hapusType($id)
    {
        $hapus_tipe = Type::find($id);
        $hapus_tipe->delete();
        session()->flash('message_failed_merek','Data Tipe berhasil dihapus!');

        $kodeOtomatis = Type::max('kode_tipe');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "T-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_tipe = $kodeGenerate;
    }

    public function inputSatuan()
    {
        $this->validate([
            'kode_satuan'=>'required|string',
            'nama_satuan'=>'required|string',
        ]);

        $save_satuan = new Unit();
        $save_satuan->kode_satuan = $this->kode_satuan;
        $save_satuan->satuan = $this->nama_satuan;
        $save_satuan->save();

        $kodeOtomatis = Unit::max('kode_satuan');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "U-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_satuan = $kodeGenerate;

        session()->flash('message_success_satuan','Data Unit berhasil disimpan!');

        $this->reset([
            'nama_satuan',
        ]);
    }
    public function editSatuan($id)
    {
        $editUnit = Unit::find($id);
        $this->idSatuan = $editUnit->id;
        $this->kode_satuan = $editUnit->kode_satuan;
        $this->nama_satuan = $editUnit->satuan;
        return $this->VtransitAwalSatuan = false;
    }

    public function saveSatuan()
    {
        $update_Unit = Unit::where('id',$this->idSatuan)->first();
        $update_Unit->kode_satuan = $this->kode_satuan;
        $update_Unit->satuan = $this->nama_satuan;
        $update_Unit->save();

        session()->flash('message_update_satuan','Data Unit berhasil diubah!');
    }

    public function hapusSatuan($id)
    {
        $hapus_satuan = Unit::find($id);
        $hapus_satuan->delete();
        session()->flash('message_failed_satuan','Data Unit berhasil dihapus!');

        $kodeOtomatis = Unit::max('kode_satuan');
        $urutan = (int) substr($kodeOtomatis, 6, 6);
        $urutan++;
        $huruf = "U-";
        $kodeGenerate = $huruf . sprintf("%06s",$urutan);

        $this->kode_satuan = $kodeGenerate;
    }
    public function render()
    {
        $transit_gudang = $this->VtransitAwalGudang;
        $transit_merek = $this->VtransitAwalMerek;
        $transit_tipe= $this->VtransitAwalTipe;
        $transit_satuan = $this->VtransitAwalSatuan;

        $gudang = Warehouse::where('nama_gudang','like','%'.$this->cari_gudang.'%')->latest()->paginate(5);
        $gudang_relasi = Warehouse::get();
        $id_gudang = $this->idGudang;

        $merek = Brand::where('nama_merek','like','%'.$this->cari_merek.'%')->latest()->paginate(5);
        $merek_relasi = Brand::get();
        $id_merek = $this->idMerek;

        $tipe = Type::where('nama_tipe','like','%'.$this->cari_tipe.'%')->latest()->paginate(5);
        $tipe_relasi = Type::get();
        $id_tipe = $this->idTipe;

        $satuan = Unit::where('satuan','like','%'.$this->cari_satuan.'%')->latest()->paginate(5);
        $id_satuan = $this->idSatuan;
        return view('livewire.admin.data-master-admin-component',compact(
            'gudang',
            'gudang_relasi',
            'id_gudang',
            'merek',
            'merek_relasi',
            'id_merek',
            'tipe',
            'tipe_relasi',
            'id_tipe',
            'satuan',
            'id_satuan',
            'transit_gudang',
            'transit_merek',
            'transit_tipe',
            'transit_satuan'
            ))->layout('layouts.base');
    }
}
