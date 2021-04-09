<?php

namespace App\Http\Livewire\Companies;

use App\Models\Employee;
use Livewire\Component;

class Create extends Component
{
    public $name, $phone, $email, $manager, $address;

    public function render()
    {
        return view('livewire.companies.create', [
            'managers'  => Employee::all()
        ]);
    }

    public function submit()
    {
    }

    public function hideCollapse()
    {
        $this->dispatchBrowserEvent('companyCreateCollapseHide');
    }
}
