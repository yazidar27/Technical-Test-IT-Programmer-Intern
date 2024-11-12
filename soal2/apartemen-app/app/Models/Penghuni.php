<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    protected $fillable = [
        'apart_id', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'umur', 'status'
    ];

    public function apartemen()
    {
        return $this->belongsTo(Apartemen::class, 'apart_id');
    }
}
