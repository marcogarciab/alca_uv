<?php


namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Empresa;
use App\Models\Cliente;

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
        
     
    $empresas = Empresa::where('razon_social', 'like', '%'.$this->search.'%')->with(
        ['clientes' => function ($query) {$query->where('numero', '==', $this->search);}]
    )->paginate(10);
    return view('livewire.empresa-index',compact('empresas'));
    
    }
}
