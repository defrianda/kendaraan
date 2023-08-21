<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Kendaraan
{
    use HasFactory;

    protected $fillable = ['tahun_keluaran', 'warna', 'harga', 'mesin', 'tipe_suspensi', 'tipe_transmisi'];
}
