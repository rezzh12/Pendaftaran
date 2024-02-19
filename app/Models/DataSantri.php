<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSantri extends Model
{
    use HasFactory;
    public function daftar()
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar_id','id')
                        ->withDefault(['pendaftar_id' => 'nilai_id yang anda Masukan Salah']);
    }
}
