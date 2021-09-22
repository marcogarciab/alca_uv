<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Propuesta;
use App\Models\SolicitudPropuesta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $user_id = Auth::id();
        $user = new User();
        $user->id = $user_id;
       
        if ($user->hasRole('Administrador')) {
            $solicitud_propuestas = SolicitudPropuesta::where('numero', 'like', '%'.$this->search.'%')->paginate(10);
            return view('livewire.solicitud-propuesta-index', compact('solicitud_propuestas'));
        }
        else {

           $solicitud_propuestas = DB::table('solicitud_propuestas')
            ->join('empresas', 'solicitud_propuestas.empresa_id', '=', 'empresas.id')
            ->join('clientes', 'empresas.cliente_id', '=', 'clientes.id')
            ->select('solicitud_propuestas.*')->where('solicitud_propuestas.numero', 'like', '%'.$this->search.'%')->where('clientes.user_id', '=',$user->id )
            ->paginate(10);;

            //$solicitud_propuestas =Propuesta::where('id',$solicitud_propuestas);

            return view('livewire.solicitud-propuesta-index', compact('solicitud_propuestas'));
            
        }

       

       
    }
}
