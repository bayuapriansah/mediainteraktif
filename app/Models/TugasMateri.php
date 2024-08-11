<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasMateri extends Model
{
    protected $table = 'tugas_materis'; // Explicitly define the table name
    use HasFactory;
}
