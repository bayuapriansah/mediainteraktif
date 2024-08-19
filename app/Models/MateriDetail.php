<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'materi_name_id', // Add this line
        'materi_1',
        'image_materi_1',
        'materi_2',
        'image_materi_2',
        // other fields...
    ];
}
