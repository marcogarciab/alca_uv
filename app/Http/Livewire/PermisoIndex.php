<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;


class PermisoIndex extends Component
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
        $permisos = Permission::where('name', 'like', '%'.$this->search.'%')->orwhere('description', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.permiso-index',compact('permisos'));
    }
}
