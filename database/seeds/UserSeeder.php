<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->insert([
            'name' => "Anthony Cruz",
            'email' => 'anthonyleierlw@gmail.com',
            'password' => Hash::make('anthony123'),
            'permissao' => 1,
            'cpf' => "97159942965",
            'rg' => "112027817",
            'dataNascimento' => Carbon::create('2000', '06', '23'),
            'telefone' => '49998048595',
        ]);
    }
}
