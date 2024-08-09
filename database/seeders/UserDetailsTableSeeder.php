<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserDetail;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru = User::where('email', 'guru@example.com')->first();
        $murid = User::where('email', 'murid@example.com')->first();

        UserDetail::create([
            'user_id' => $guru->id,
            'nama' => 'Guru Example',
            'tanggal_lahir' => '1980-01-01',
            'alamat' => 'Guru Address'
        ]);

        UserDetail::create([
            'user_id' => $murid->id,
            'nama' => 'Murid Example',
            'tanggal_lahir' => '2000-01-01',
            'alamat' => 'Murid Address'
        ]);
    }
}
