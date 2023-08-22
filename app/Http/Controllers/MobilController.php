<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MobilRepository;

class MobilController extends Controller
{
    protected $mobilRepository;

    public function __construct(MobilRepository $mobilRepository)
    {
        $this->mobilRepository = $mobilRepository;
    }

    public function getStok()
    {
        $stok = $this->mobilRepository->getAll();
        return response()->json($stok);
    }

    public function insertMobil(Request $request)
    {
        $data = $request->all();

        $this->mobilRepository->create([
            'tahun_keluaran' => $data['tahun_keluaran'],
            'warna' => $data['warna'],
            'harga' => $data['harga'],
            'mesin' => $data['mesin'],
            'kapasitas_penumpang' => $data['kapasitas_penumpang'],
            'tipe' => $data['tipe']
        ]);

        return response()->json(['message' => 'Mobil berhasil disimpan']);
    }

    public function insertMultipleMobil(Request $request)
    {
        $data = $request->all();

        foreach ($data as $mobilData) {
            $this->mobilRepository->create([
                'tahun_keluaran' => $mobilData['tahun_keluaran'],
                'warna' => $mobilData['warna'],
                'harga' => $mobilData['harga'],
                'mesin' => $mobilData['mesin'],
                'kapasitas_penumpang' => $mobilData['kapasitas_penumpang'],
                'tipe' => $mobilData['tipe']
            ]);
        }

        return response()->json(['message' => 'Mobil-mobil berhasil disimpan']);
    }
}
