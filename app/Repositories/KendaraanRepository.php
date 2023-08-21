<?php

namespace App\Repositories;

use App\Models\Kendaraan;

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
        return Kendaraan::with('motor', 'mobil')->get();
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
}
