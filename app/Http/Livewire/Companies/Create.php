<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use App\Models\Employee;
use Livewire\Component;

class Create extends Component
{
    public $name, $nuit, $phone, $email, $manager, $address;

    public function render()
    {
        return view('livewire.companies.create', [
            'managers'  => Employee::all()
        ]);
    }

    public function submit()
    {
        $this->validate();

        try {
            $company = Company::create([
                'name'         => $this->name,
                'nuit'         => $this->nuit,
                'phone'        => $this->phone,
                'email'        => $this->email,
                'manager'      => $this->manager,
                'address'      => $this->address
            ]);

            if ($company) {
                $this->dispatchBrowserEvent('swal', [
                    'title'             => 'Companhia Cadastrada com Sucesso.',
                    'timer'             => 3000,
                    'icon'              => 'success',
                    'toast'             => true,
                    'position'          => 'top-end',
                    'timerProgressBar'  => true,
                ]);
                
                $this->dispatchBrowserEvent('companyCreateCollapseHide');
                $this->reset();
                $this->resetErrorBag();
                $this->resetValidation();
                $this->emit('refresher');
            } else {
                $this->dispatchBrowserEvent('swal', [
                    'title'             => 'Erro ao salvar a Companhia.',
                    'timer'             => 3000,
                    'icon'              => 'error',
                    'toast'             => false,
                    'position'          => 'center',
                    'timerProgressBar'  => true,
                ]);
            }
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('swal', [
                'title'             => 'Ocorreu algum erro que não conseguimos Explicar.',
                'timer'             => 3000,
                'icon'              => 'error',
                'toast'             => false,
                'position'          => 'center',
                'timerProgressBar'  => true,
            ]);
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function hideCollapse()
    {
        $this->dispatchBrowserEvent('companyCreateCollapseHide');
    }

    protected $rules    = [
        'name'  => 'required|min:3|max:30|unique:companies',
        'nuit'  => 'required|min:11|unique:companies',
        'phone' => 'required|min:12|unique:companies',
        'email' => 'required|email|unique:companies',
    ];

    protected $messages = [
        'nuit.min'   => 'O NUIT deve ter pelo menos 9 caracteres',
        'phone.min'  => 'O Telefone deve ter pelo menos 9 caracteres'
    ];
}
