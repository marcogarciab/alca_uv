<?php


namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Empresa;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmpresaIndex extends Component
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
            $empresas = Empresa::where('razon_social', 'like', '%'.$this->search.'%')->with(
                ['clientes' => function ($query) {$query->where('numero', '==', $this->search);}]
            )->paginate(10);
            return view('livewire.empresa-index',compact('empresas'));
        }
        else {

            $cliente = Cliente::where('user_id',$user_id)->first();

            $empresas = Empresa::where('cliente_id', $cliente->id)->where('razon_social', 'like', '%'.$this->search.'%')->paginate(10);
            return view('livewire.empresa-index',compact('empresas'));
        }
     
    
    
    }
}
