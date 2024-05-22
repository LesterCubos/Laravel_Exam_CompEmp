<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use Livewire\WithPagination;

class CompaniesSearch extends Component
{
    public $searchCompany='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.companies-search',[
            'companies' => Company::where('name','like', "%{$this->searchCompany}%")
            ->orWhere('email','like', "%{$this->searchCompany}%")
            ->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
