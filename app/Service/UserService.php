<?php

namespace App\Service;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Throwable;

class UserService
{
    private $repository;
    private $validator;

    public function __construct()
    {
    }

    public function store($data)
    {
        try {
            // $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $user  = User::create($data);
            $roles = Role::all();

            foreach ($roles as $role) {
                if ($role->name == $data['role']) {
                    $user->assignRole($role);
                }
            }
            return [
                'success'      => true,
                'message'      => 'Usuário Cadastrado Com Sucesso',
                'details'      => $user,
            ];
        } catch (Throwable $th) {
            return [
                'success'      => false,
                'message'      => 'Erro ao salvar o usuário',
                'details'      => $th
            ];
        }
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
