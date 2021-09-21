<?php

namespace App\Http\Livewire;

use App\Models\Orden;
use Livewire\Component;
use Livewire\WithPagination;

class OrdenIndex extends Component
{


    protected $paginationTheme = "bootstrap";
    public $search;

    use WithPagination;

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $ordenes = Orden::where('codigo_servicio', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.orden-index', compact('ordenes'));
       
    }
}
