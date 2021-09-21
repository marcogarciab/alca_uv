<?php

namespace App\Http\Livewire;

use App\Models\Evidencia;
use Livewire\Component;
use Livewire\WithPagination;

class EvidenciaIndex extends Component
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
        $evidencias = Evidencia::where('numero', 'like', '%'.$this->search.'%')->orwhere('created_at', '=', $this->search)->paginate(10);
        return view('livewire.evidencia-index',compact('evidencias'));
    }
}
