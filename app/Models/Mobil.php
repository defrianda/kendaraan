<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Kendaraan
{
    use HasFactory;

    protected $collection = 'mobil'; // Set the collection name
    protected $fillable = ['tahun_keluaran', 'warna', 'harga', 'mesin', 'kapasitas_penumpang', 'tipe'];
}
