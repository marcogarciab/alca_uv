<?php

namespace App\Http\Livewire;

use App\Models\Acta;
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
        $actas = Acta::where('numero', 'like', '%'.$this->search.'%')->orwhere('created_at', '=', $this->search)->paginate(10);
        return view('livewire.acta-index',compact('actas'));
    }
}
