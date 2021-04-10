<?php

namespace App\Http\Livewire\Employees;

use App\Models\Company;
use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refresher' => '$refresh'
    ];

    private $search         = false;
    private $employees      = [];

    public $employeeId, $perPage = 5, $name, $company, $status, $companyStatus = ['Activo', 'Inactivo'];
    public $firstname, $lastname, $phone, $email, $address;

    /**
     * Custom pagination
     */
    public function paginationView()
    {
        return 'livewire.custom.pagination-links';
    }

    public function render()
    {
        if (!$this->search) { //Choose how to show data table
            $this->employees = Employee::query()->latest('created_at')->paginate($this->perPage);
        }

        return view('livewire.employees.index', [
            'employees' => $this->employees,
            'companies' => Company::query()->orderBy('name', 'ASC')->get(),
            'total'     => Employee::all()->count(),
        ]);
    }

    public function updatedName($value)
    {
        $value           = trim(strtoupper($value));

        $this->employees = Employee::query()
            ->where('firstname', 'like', '%' . $value . '%')
            ->orWhere('lastname', 'like', '%' . $value . '%')
            ->orderBy('firstname', 'ASC')
            ->paginate($this->perPage);

        $this->search    = true;
    }

    public function updatedCompany($value)
    {
        $this->employees = Employee::query()
            ->where('company_id', '=', $value)
            ->orderBy('firstname', 'ASC')
            ->paginate($this->perPage);
        $this->search    = true;
    }

    /**
     * 
     */
    public function action($actionType, $employeeId)
    {
        $employee           = Employee::find($employeeId);
        $this->name         = $employee->firstname . ' ' . $employee->lastname;
        $this->employeeId   = $employee->id;

        if (!auth()->user()->roles->where('name', '=', 'Administrador')) {
            $this->dispatchBrowserEvent('swal', [
                'title'             => "Não tens permissão Suficiente para $actionType um Registo.",
                'timer'             => 3000,
                'icon'              => 'warning',
                'toast'             => false,
                'position'          => 'center',
                'timerProgressBar'  => true,
            ]);
        } else {
            if ($actionType == 'excluir') {
                $this->dispatchBrowserEvent('openDeleteEmployeeModal');
            } elseif ($actionType == 'atualizar') {
                $this->dispatchBrowserEvent('openUpdateEmployeeModal');
            }
        }

        $this->employees = Employee::query()->latest('created_at')->paginate($this->perPage);
    }

    public function destroy()
    {
        $this->dispatchBrowserEvent('closeDeleteEmployeeModal');

        try {
            if ($this->employeeId == auth()->user()->employee->id) {
                $this->dispatchBrowserEvent('swal', [
                    'title'             => 'Não é possível apagar a sua própria conta.',
                    'timer'             => 3000,
                    'icon'              => 'warning',
                    'toast'             => false,
                    'position'          => 'center',
                    'timerProgressBar'  => true,
                ]);
            } else {
                $employee = Employee::find($this->employeeId);
                $employee->delete();
                $this->dispatchBrowserEvent('swal', [
                    'title'             => 'Funcionário Excluído com Sucesso.',
                    'timer'             => 3000,
                    'icon'              => 'success',
                    'toast'             => true,
                    'position'          => 'top-end',
                    'timerProgressBar'  => true,
                ]);
                $this->reset();
            }
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('swal', [
                'title'             => 'Ocorreu algum erro que não sabemos explicar.',
                'timer'             => 3000,
                'icon'              => 'error',
                'toast'             => false,
                'position'          => 'center',
                'timerProgressBar'  => true,
            ]);
        }
    }
}
