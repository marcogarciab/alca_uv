<?php

namespace App\Http\Livewire;

use App\Models\Propuesta;
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
        $propuestas = Propuesta::where('numero_control', 'like', '%'.$this->search.'%')->orwhere('created_at', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.propuesta-index', compact('propuestas'));
    }
}
