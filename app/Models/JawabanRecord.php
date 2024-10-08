<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'tugas_materi_id',  // Add this line
        'user_id',
        'answer',
        'score',
    ];
}
