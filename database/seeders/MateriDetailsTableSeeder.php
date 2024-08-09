<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MateriName;
use App\Models\MateriDetail;

class MateriDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materiName = MateriName::where('name', 'Materi Example')->first();

        MateriDetail::create([
            'materi_name_id' => $materiName->id,
            'materi_1' => 'Materi 1 Content',
            'image_materi_1' => 'image1.png',
            'materi_2' => 'Materi 2 Content',
            'image_materi_2' => 'image2.png'
        ]);
    }
}
