<?php
namespace App\Http\Livewire;


use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
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
        $users = User::where('name', 'like', '%'.$this->search.'%')->orwhere('email', 'like', '%'.$this->search.'%')->paginate(1);
        return view('livewire.user-index',compact('users'));
    }

   
}
