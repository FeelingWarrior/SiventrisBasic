<?php

namespace App\Http\Livewire\Superadmin;
use Livewire\Component;

class DataMasterComponent extends Component
{
    public function render()
    {
        return view('livewire.superadmin.data-master-component')->layout('layouts.base');
    }
}
