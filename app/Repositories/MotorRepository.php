<?php

namespace App\Repositories;

use App\Models\Motor;

class MotorRepository
{
    public function getAll()
    {
        return Motor::all();
    }

    public function getById($id)
    {
        return Motor::findOrFail($id);
    }

    public function create($data)
    {
        return Motor::create($data);
    }
}
