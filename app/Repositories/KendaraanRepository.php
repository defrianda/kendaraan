<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Models\Motor;
use App\Models\Mobil;

class KendaraanRepository
{
    public function getAll()
    {
        return Kendaraan::all();
    }

    public function getById($id)
    {
        return Kendaraan::findOrFail($id);
    }

    public function getStok()
    {
        return Kendaraan::all();
    }

    public function getMotorStok()
    {
        return Motor::all();
    }

    public function getMobilStok()
    {
        return Mobil::all();
    }

    public function create($data)
    {
        return Kendaraan::create($data);
    }

    public function update($id, $data)
    {
        $kendaraan = $this->getById($id);
        $kendaraan->update($data);
        return $kendaraan;
    }

    public function delete($id)
    {
        $kendaraan = $this->getById($id);
        $kendaraan->delete();
    }

    public function penjualan($id)
    {
        $kendaraan = $this->getById($id);

        if (!$kendaraan) {
            throw new \Exception('Kendaraan not found', 404);
        }

        if ($kendaraan->status === 'sold') {
            throw new \Exception('Kendaraan already sold', 400);
        }

        $kendaraan->update(['status' => 'sold']);

        return $kendaraan;
    }

    public function laporanPenjualan()
    {
        return Kendaraan::where('status', 'sold')->get();
    }

    public function laporanPenjualanMobil()
    {
        return Mobil::where('status', 'sold')->get();
    }

    public function laporanPenjualanMotor()
    {
        return Motor::where('status', 'sold')->get();
    }
}
