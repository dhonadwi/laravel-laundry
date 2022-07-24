<?php

namespace App\Http\Livewire;

use App\Models\Package;
use Livewire\Component;

class PaketTransaksi extends Component
{
    public $packages;
    public $updateMode = false;
    public $inputs = [];
    public $i = 0;


    public function add($i)
    {
        $i++;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->i = count($this->inputs);
    }

    public function mount()
    {
        $paket = Package::all();
        $this->packages = $paket;
    }
    public function render()
    {
        return view('livewire.paket-transaksi');
    }
}
