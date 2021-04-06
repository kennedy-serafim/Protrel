<?php

namespace App\Http\Livewire\Administrators;

use App\Service\AdministratorService;
use App\Service\UserService;
use Livewire\Component;

class Create extends Component
{
    public $firstname, $lastname, $email, $phone, $username, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.administrators.create');
    }

    public function store()
    {
        $this->validate();
        $this->username = $this->email;
        $userService           = new UserService();
        $administratorService  = new AdministratorService();

        try {
            $user = $userService->store([
                'username'          => $this->username,
                'email'             => $this->email,
                'password'          => $this->password,
                'role'              => 'Administrators',
            ]);

            if ($user['success']) {
                $administrator = $administratorService->store([
                    'firstname'         => $this->firstname,
                    'lastname'          => $this->lastname,
                    'email'             => $this->email,
                    'phone'             => $this->phone,
                    'user_id'           => $user['details']->id,
                    'status'            => 'Activo',
                ]);

                if ($administrator['success']) {
                    $this->dispatchBrowserEvent('swal', [
                        'title'             => $administrator['message'],
                        'timer'             => 3000,
                        'icon'              => 'success',
                        'toast'             => true,
                        'position'          => 'top-end',
                        'timerProgressBar'  => true,
                    ]);

                    $this->reset();
                    $this->resetErrorBag();
                    $this->resetValidation();
                    $this->emit('refresher');
                } else {
                    $user['details']->delete(); //Rollback

                    $this->dispatchBrowserEvent('swal', [
                        'title'             => $administrator['message'],
                        'timer'             => 3000,
                        'icon'              => 'error',
                        'toast'             => false,
                        'position'          => 'center',
                        'timerProgressBar'  => true,
                    ]);
                }
            } else {
                $this->dispatchBrowserEvent('swal', [
                    'title'             => $user['message'],
                    'timer'             => 3000,
                    'icon'              => 'error',
                    'toast'             => false,
                    'position'          => 'center',
                    'timerProgressBar'  => true,
                ]);
            }
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('swal', [
                'title'             => 'Ocorreu um erro ao Tentar salvar o Administrador.',
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
        $this->dispatchBrowserEvent('administratorCreateCollapseHide');
    }

    protected $rules = [
        'firstname'                  => 'required|string|min:3|max:20',
        'lastname'                   => 'required|string|min:3|max:20',
        'email'                      => 'required|email|unique:users',
        'phone'                      => 'required|unique:administrators',
        'password'                   => 'required|min:8',
        'password_confirmation'      => 'required|min:8|required_with:password|same:password',
    ];

    protected $messages = [
        'firstname.required'         => 'O campo nome é obrigatório',
        'firstname.min'              => 'O nome deve conter pelo menos :min carácteres',
        'firstname.max'              => 'O nome deve conter no máximo :max carácteres',

        'lastname.required'          => 'O campo apelido é obrigatório',
        'lastname.min'               => 'O apelido deve conter pelo menos :min carácteres',
        'lastname.max'               => 'O apelido deve conter no máximo :max carácteres',

        'email.required'             => 'O campo e-mail é obrigatório',
        'email.email'                => 'O campo email deve ser um endereço de e-mail válido.',
        'email.unique'               => 'O E-mail já está sendo utilizado.',

        'phone.required'             => 'O campo telefone é obrigatório.',
        'phone.unique'               => 'O número de telefone já está sendo utilizado.',
    ];
}
