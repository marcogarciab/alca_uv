<?php

namespace App\Http\Livewire;

use App\Models\SolicitudPropuesta;
use Livewire\Component;
use Livewire\WithPagination;

class SolicitudPropuestaIndex extends Component
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
        $solicitud_propuestas = SolicitudPropuesta::where('numero', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.solicitud-propuesta-index', compact('solicitud_propuestas'));
    }
}
