<?php

namespace App\Http\Livewire\Administrators;

use App\Models\Administrator;
use Livewire\Component;
use Livewire\WithPagination;

class TableSearch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refresher' => '$refresh'
    ];

    private $search         = false;
    private $administrators = [];

    public $adminId, $perPage = 5, $name, $status, $userStatus = ['Activo', 'Bloqueado', 'Inactivo'];

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
            $this->administrators = Administrator::query()->latest('created_at')->paginate($this->perPage);
        }
        return view('livewire.administrators.table-search', [
            'administrators' =>  $this->administrators,
            'total'          => Administrator::all()->count()
        ]);
    }

    public function updatedName($value)
    {
        $value     = trim(strtoupper($value));

        $this->administrators =  Administrator::where('firstname', 'like', "%$value%")
            ->orWhere('lastname', 'like', "$value%")
            ->orderBy('firstname', 'ASC')
            ->paginate($this->perPage);

        $this->search = true;
    }

    public function updatedStatus($value)
    {
        if ($value != "0") {
            $this->administrators =  Administrator::query()
                ->where('status', $value)
                ->latest('created_at')
                ->paginate($this->perPage);

            $this->search = true;
        }
    }

    public function action($actionType, $counterId)
    {
        $administrator       = Administrator::find($counterId);
        $this->name          = $administrator->firstname . ' ' . $administrator->lastname;
        $this->adminId       = $administrator->id;

        if ($actionType == 'delete') {
            $this->dispatchBrowserEvent('openDeleteAdministratorModal');
        } elseif ($actionType == 'update') {
            $this->dispatchBrowserEvent('openUpdateAdministratorModal');
        }

        $this->administrators = Administrator::query()->latest('created_at')->paginate($this->perPage);
    }

    public function destroy()
    {
        $this->dispatchBrowserEvent('closeDeleteAdministratorModal');

        try {
            $administrators = Administrator::all()->count();

            if ($administrators == 1) {
                $this->dispatchBrowserEvent('swal', [
                    'title'             => 'Só existe um Administrador no Sistema e não pode ser Excluído.',
                    'timer'             => 3000,
                    'icon'              => 'error',
                    'toast'             => false,
                    'position'          => 'center',
                    'timerProgressBar'  => true,
                ]);
            } else {
                $administrator = Administrator::find($this->adminId);

                if ($administrator->user_id == auth()->user()->id) {
                    $this->dispatchBrowserEvent('swal', [
                        'title'             => 'Não pode se auto excluir do sistema.',
                        'timer'             => 3000,
                        'icon'              => 'error',
                        'toast'             => false,
                        'position'          => 'center',
                        'timerProgressBar'  => true,
                    ]);
                } else { //Destroy
                    $administrator->delete();
                    $this->dispatchBrowserEvent('swal', [
                        'title'             => 'Administrador Excluído com Sucesso',
                        'timer'             => 3000,
                        'icon'              => 'success',
                        'toast'             => true,
                        'position'          => 'top-end',
                        'timerProgressBar'  => true,
                    ]);
                    $this->reset();
                }
            }
        } catch (\Throwable $th) {
        }
    }
}
