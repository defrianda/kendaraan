<?php

namespace App\Repositories;

use App\Models\Mobil;

class MobilRepository
{
    public function getAll()
    {
        return Mobil::all();
    }

    public function getById($id)
    {
        return Mobil::findOrFail($id);
    }

    public function create($data)
    {
        return Mobil::create($data);
    }
}
