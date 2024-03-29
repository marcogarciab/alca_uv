<?php

namespace App\Http\Livewire;

use App\Models\Propuesta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;


class PropuestaIndex extends Component
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
            $propuestas = Propuesta::where('numero_control', 'like', '%'.$this->search.'%')->orwhere('created_at', 'like', '%'.$this->search.'%')->paginate(10);
            return view('livewire.propuesta-index', compact('propuestas'));
        }
        else {

            $propuestas = DB::table('propuestas')
            ->join('solicitud_propuestas', 'propuestas.solicitud_propuesta_id', '=', 'solicitud_propuestas.id')
            ->join('empresas', 'solicitud_propuestas.empresa_id', '=', 'empresas.id')
            ->join('clientes', 'empresas.cliente_id', '=', 'clientes.id')
            ->select('propuestas.*')->where('propuestas.numero_control', 'like', '%'.$this->search.'%')->where('clientes.user_id', '=',$user->id )
            ->paginate(10);;

            return view('livewire.propuesta-index', compact('propuestas'));

        }
        
    }
}
