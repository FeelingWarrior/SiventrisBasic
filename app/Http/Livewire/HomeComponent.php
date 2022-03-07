<?php

namespace App\Http\Livewire;

use App\Models\LoginItem;
use App\Models\LogoutItem;
use App\Models\Type;
use App\Models\Warehouse;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $aktifitas_masuk = LoginItem::latest()->limit(5)->get();
        $aktifitas_keluar = LogoutItem::latest()->limit(5)->get();
        $gudangDashboard = Warehouse::get();
        return view('livewire.home-component',compact('gudangDashboard','aktifitas_masuk','aktifitas_keluar'))->layout('layouts.base');
    }
}
