<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MateriName;
use App\Models\TugasMateri;

class TugasMateriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materiName = MateriName::where('name', 'Materi Example')->first();

        TugasMateri::create([
            'materi_name_id' => $materiName->id,
            'question' => 'What is 2+2?',
            'option_a' => '3',
            'option_b' => '4',
            'option_c' => '5',
            'option_d' => '6',
            'answer' => 'b'
        ]);
    }
}
