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
}
