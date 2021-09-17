<?php

namespace App\Http\Livewire;

use App\Models\VerificacionTipo;
use Livewire\Component;
use Livewire\WithPagination;

class VerificacionTipoIndex extends Component
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
        $verificacion_tipos = VerificacionTipo::where('nombre', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.verificacion-tipo-index', compact('verificacion_tipos'));
    }
}
