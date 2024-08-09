<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',
        'nama',
        'tanggal_lahir',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
