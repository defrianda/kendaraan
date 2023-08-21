<?php

namespace App\Http\Controllers;

use App\Repositories\PenjualanRepository;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    protected $penjualanRepository;

    public function __construct(PenjualanRepository $penjualanRepository)
    {
        $this->penjualanRepository = $penjualanRepository;
    }

    public function createPenjualan(Request $request)
    {
        $this->validate($request, [
            //validasi
        ]);

        $this->penjualanRepository->createPenjualan($request->all());

        return response()->json(['message' => 'Penjualan berhasil']);
    }
}
