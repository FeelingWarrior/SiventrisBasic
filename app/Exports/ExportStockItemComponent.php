<?php

namespace App\Exports;

use App\Models\LoginStock;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportStockItemComponent implements FromView,ShouldAutoSize,WithStyles
{
    use Exportable;
    public function __construct($cari_gudang,$cari_tipe,$cari_merek,$cari_tanggal,$cari_produk)
    {
        $this->cari_gudang = $cari_gudang;
        $this->cari_tipe = $cari_tipe;
        $this->cari_merek = $cari_merek;
        $this->cari_tanggal = $cari_tanggal;
        $this->cari_produk = $cari_produk;
    }

    public function view(): View
    {
        $stok = LoginStock::where('nama_barang','like','%'.$this->cari_produk.'%')
        ->where('kode_gudang','like','%'.$this->cari_gudang.'%')
        ->where('created_at','like','%'.$this->cari_tanggal.'%')
        ->where('kode_merek','like','%'.$this->cari_merek.'%')
        ->where('kode_tipe','like','%'.$this->cari_tipe.'%')
        ->orderBy('updated_at','DESC')
        ->latest()
        ->get();
        return view('livewire.admin.laporan.laporan-stok-excel',compact(
            'stok'
        ));
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true,'size' => 14]],
        ];
    }
}
