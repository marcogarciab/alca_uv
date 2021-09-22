<?php

namespace App\Http\Livewire;

use App\Models\Orden;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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




        $user_id = Auth::id();
        $user = new User();
        $user->id = $user_id;

        if ($user->hasRole('Administrador')) {
            $ordenes = Orden::where('codigo_servicio', 'like', '%'.$this->search.'%')->paginate(10);
            return view('livewire.orden-index', compact('ordenes'));
        }
        else {

            $ordenes = DB::table('ordenes')
            ->join('propuestas', 'ordenes.propuesta_id', '=', 'propuestas.id')
            ->join('solicitud_propuestas', 'propuestas.solicitud_propuesta_id', '=', 'solicitud_propuestas.id')
            ->join('empresas', 'solicitud_propuestas.empresa_id', '=', 'empresas.id')
            ->join('clientes', 'empresas.cliente_id', '=', 'clientes.id')
            ->select('ordenes.*')->where('ordenes.codigo_servicio', 'like', '%'.$this->search.'%')->where('clientes.user_id', '=',$user->id )
            ->paginate(10);;
            
            return view('livewire.orden-index', compact('ordenes'));

        }
    }
}
