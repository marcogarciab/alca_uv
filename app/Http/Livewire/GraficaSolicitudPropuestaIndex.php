<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use App\Models\SolicitudPropuesta;

use Livewire\Component;

class GraficaSolicitudPropuestaIndex extends Component
{

    protected $paginationTheme = "bootstrap";
    public $message = 'Hello World!';
    

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        
        $current_year = date('Y');
        $years = range($current_year - 10, SolicitudPropuesta::max('created_at'));

        $tipos=['semanas','meses'];
        $empresas = Empresa::all()->pluck('razon_social','id');;

        return view('livewire.grafica-solicitud-propuesta-index',compact('empresas', 'years', 'tipos'));
    }
}
