<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TugasMateri;
use App\Models\User;
use App\Models\JawabanRecord;

class JawabanRecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tugas = TugasMateri::first();
        $murid = User::where('email', 'murid@example.com')->first();

        JawabanRecord::create([
            'tugas_materi_id' => $tugas->id,
            'user_id' => $murid->id,
            'answer' => 'b',
            'score' => 25
        ]);
    }
}
