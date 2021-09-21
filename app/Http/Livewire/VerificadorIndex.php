<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Verificador;

class VerificadorIndex extends Component
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
        $verificadores = Verificador::where('nombre', 'like', '%'.$this->search.'%')->orwhere('apellido_paterno', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.verificador-index', compact('verificadores'));
    }
}
