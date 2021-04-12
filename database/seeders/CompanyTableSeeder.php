<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name'          => 'Protrel, Lda',
            'nuit'          => '000 111 000',
            'phone'         => '84 000 444 0',
            'email'         => 'protrel@gmail.com',
        ]);

        Company::create([
            'name'          => 'Zaida Construções, Lda',
            'nuit'          => '000 111 001',
            'phone'         => '84 000 444 1',
            'email'         => 'zaidaconstrucoes@gmail.com',
        ]);

        Company::create([
            'name'          => 'Furos e Obras Hidráulicas',
            'nuit'          => '000 111 002',
            'phone'         => '84 000 444 2',
            'email'         => 'furos@gmail.com',
        ]);
    }
}
