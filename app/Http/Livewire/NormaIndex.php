<?php

namespace App\Http\Livewire;

use App\Models\Norma;
use Livewire\Component;
use Livewire\WithPagination;

class NormaIndex extends Component
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
        $normas = Norma::where('nombre', 'like', '%'.$this->search.'%')->orwhere('descripcion', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.norma-index', compact('normas'));
    }

    

}
