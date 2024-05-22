<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class EmployeesSearch extends Component
{
    public $searchEmployee='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.employees-search',[
            'employees' => Employee::where('firstName','like', "%{$this->searchEmployee}%")
            ->orWhere('lastName','like', "%{$this->searchEmployee}%")
            ->orWhere('email','like', "%{$this->searchEmployee}%")
            ->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
