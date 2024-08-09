<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MateriName;

class MateriNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru = User::where('email', 'guru@example.com')->first();

        MateriName::create([
            'user_id' => $guru->id,
            'name' => 'Materi Example'
        ]);
    }
}
