<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
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
    private $companies      = [];

    public $companyId, $perPage = 5, $name, $status, $companyStatus = ['Activo', 'Inactivo'];

    /**
     * Custom pagination
     */
    public function paginationView()
    {
        return 'livewire.custom.pagination-links';
    }

    /**
     * 
     */
    public function render()
    {
        if (!$this->search) { //Choose how to show data table
            $this->companies = Company::query()->latest('created_at')->paginate($this->perPage);
        }

        return view('livewire.companies.index', [
            'companies' => $this->companies,
            'total'     => Company::all()->count()
        ]);
    }

    public function updatedName($value)
    {
        $value     = trim(strtoupper($value));

        $this->companies =  Company::where('name', 'like', "%$value%")
            ->orderBy('name', 'ASC')
            ->paginate($this->perPage);

        $this->search = true;
    }

    public function updatedStatus($value)
    {
        if ($value != "0") {
            $operator = $value == 'Activo' ? '=' : '<>';

            $this->companies =  Company::query()
                ->join('employees', 'employees.company_id', $operator, 'companies.id')
                ->latest('companies.created_at')
                ->paginate($this->perPage);

            $this->search = true;
            $this->name   = '';
        }
    }


    public function action($actionType, $companyId)
    {
        $companies           = Company::find($companyId);
        $this->name          = $companies->name;
        $this->companyId     = $companies->id;

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
                $this->dispatchBrowserEvent('openDeleteCompanyModal');
            } elseif ($actionType == 'atualizar') {
                $this->dispatchBrowserEvent('openUpdateCompanyModal');
            }
        }

        $this->companies = Company::query()->latest('created_at')->paginate($this->perPage);
    }

    public function destroy()
    {
        $this->dispatchBrowserEvent('closeDeleteCompanyModal');

        try {
            $companies = Company::find($this->companyId);

            if ($companies->id == auth()->user()->employee->company->id) {
                $this->dispatchBrowserEvent('swal', [
                    'title'             => 'Não podes excluir o registo da companhia na qual fazes parte.',
                    'timer'             => 3000,
                    'icon'              => 'warning',
                    'toast'             => false,
                    'position'          => 'center',
                    'timerProgressBar'  => true,
                ]);
            } else {
                $companies->delete();
                $this->dispatchBrowserEvent('swal', [
                    'title'             => 'Companhia Excluída com Sucesso.',
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
