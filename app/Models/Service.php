<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'user_id',
        'nama_pelanggan',
        'no_hp',
        'jenis_perangkat',
        'keluhan',
        'no_resi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}