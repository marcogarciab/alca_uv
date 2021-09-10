<?php

namespace App\Http\Livewire;

use Spatie\Permission\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RolIndex extends Component
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
        $roles = Role::where('name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.rol-index', compact('roles'));
    }
}
