<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteIndex extends Component
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

        $clientes = Cliente::where('nombre', 'like', '%'.$this->search.'%')->orwhere('numero', '=', $this->search)->paginate(10);
        return view('livewire.cliente-index',compact('clientes'));
    }
}
