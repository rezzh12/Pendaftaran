<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar_id','id')
                        ->withDefault(['pendaftar_id' => 'Tahun Akademik Belum Dipilih']);
    }
}
