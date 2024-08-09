<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guruRole = Role::where('name', 'guru')->first();
        $muridRole = Role::where('name', 'murid')->first();

        $guru = User::create([
            'name' => 'Guru Example',
            'email' => 'guru@example.com',
            'password' => bcrypt('password')
        ]);
        $guru->roles()->attach($guruRole);

        $murid = User::create([
            'name' => 'Murid Example',
            'email' => 'murid@example.com',
            'password' => bcrypt('password')
        ]);
        $murid->roles()->attach($muridRole);
    }
}
