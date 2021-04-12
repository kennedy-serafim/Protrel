<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = User::create([
            'email'                 => 'administrador@protrel.com',
            'password'              => 'protrel',
            'email_verified_at'     => now(),
        ]);

        $roles = Role::all();

        foreach ($roles as $role) {
            if ($role->name == 'Administrador') {
                $administrator->assignRole($role);
            }
        }
    }
}
