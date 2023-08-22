<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MotorRepository;

class MotorController extends Controller
{
    protected $motorRepository;

    public function __construct(MotorRepository $motorRepository)
    {
        $this->motorRepository = $motorRepository;
    }

    public function getStok()
    {
        $stok = $this->motorRepository->getAll();
        return response()->json($stok);
    }

    public function insertMotor(Request $request)
    {
        $data = $request->all();

        $this->motorRepository->create([
            'tahun_keluaran' => $data['tahun_keluaran'],
            'warna' => $data['warna'],
            'harga' => $data['harga'],
            'mesin' => $data['mesin'],
            'tipe_suspensi' => $data['tipe_suspensi'],
            'tipe_transmisi' => $data['tipe_transmisi']
        ]);

        return response()->json(['message' => 'Motor berhasil disimpan']);
    }

    public function insertMultipleMotor(Request $request)
    {
        $data = $request->all();

        foreach ($data as $motorData) {
            $this->motorRepository->create([
                'tahun_keluaran' => $motorData['tahun_keluaran'],
                'warna' => $motorData['warna'],
                'harga' => $motorData['harga'],
                'mesin' => $motorData['mesin'],
                'tipe_suspensi' => $motorData['tipe_suspensi'],
                'tipe_transmisi' => $motorData['tipe_transmisi']
            ]);
        }

        return response()->json(['message' => 'Motor-motor berhasil disimpan']);
    }
}
