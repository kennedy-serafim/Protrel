<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\JobRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user        = User::all()->first();
        $company     = Company::all()->first();
        $job_role    = JobRole::all()->first();

        Employee::create([
            'user_id'           => $user->id,
            'company_id'        => $company->id,
            'job_role_id'       => $job_role->id,
            'firstname'         => 'Administrador',
            'lastname'          => 'Protrel',
            'phone'             => '84 000 444 0',
            'email'             => 'protrel@gmail.com',
            'address'           => 'Rua Samora Machel,Bairro Magoanine C, R/C. N:8',
        ]); 
    }
}
