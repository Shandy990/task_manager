<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(999)->create();
        User::create([
            'name'=>'Shandy',
            'email'=>'haloponikus@mail.com',
            'password'=>Hash::make('KolKalKul90'), //KolKalKul90
            'is_admin'=>true,
        ]);

    }
}
