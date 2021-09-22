<?php

namespace App\Http\Livewire;

use App\Models\Acta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ActaIndex extends Component
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
          
            $actas = Acta::where('numero', 'like', '%'.$this->search.'%')->orwhere('created_at', '=', $this->search)->paginate(10);
            return view('livewire.acta-index',compact('actas'));
        }
        else {

            $actas = DB::table('actas')
            ->join('ordenes', 'actas.ordene_id', '=', 'ordenes.id')
            ->join('propuestas', 'ordenes.propuesta_id', '=', 'propuestas.id')
            ->join('solicitud_propuestas', 'propuestas.solicitud_propuesta_id', '=', 'solicitud_propuestas.id')
            ->join('empresas', 'solicitud_propuestas.empresa_id', '=', 'empresas.id')
            ->join('clientes', 'empresas.cliente_id', '=', 'clientes.id')
            ->select('actas.*')->where('actas.numero', 'like', '%'.$this->search.'%')->where('clientes.user_id', '=',$user->id )
            ->paginate(10);;
            
            return view('livewire.acta-index',compact('actas'));

        }
       
    }
}
