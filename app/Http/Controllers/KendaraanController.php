<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\KendaraanRepository;

class KendaraanController extends Controller
{
    protected $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function getStok()
    {
        $stok = $this->kendaraanRepository->getStok();
        return response()->json($stok);
    }

    public function insertKendaraan(Request $request)
    {
        $data = $request->all();

        $this->kendaraanRepository->create([
            'tahun_keluaran' => $data['tahun_keluaran'],
            'warna' => $data['warna'],
            'harga' => $data['harga']
        ]);

        return response()->json(['message' => 'Kendaraan berhasil disimpan']);
    }

    public function penjualan(Request $request, $id)
    {
        try {
            $kendaraan = $this->kendaraanRepository->penjualan($id);
            return response()->json(['message' => 'Penjualan berhasil']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    public function laporanPenjualan()
    {
        $laporan = $this->kendaraanRepository->laporanPenjualan();
        return response()->json($laporan);
    }

    public function laporanPenjualanMobil()
    {
        $laporan = $this->kendaraanRepository->laporanPenjualanMobil();
        return response()->json($laporan);
    }

    public function laporanPenjualanMotor()
    {
        $laporan = $this->kendaraanRepository->laporanPenjualanMotor();
        return response()->json($laporan);
    }
}
