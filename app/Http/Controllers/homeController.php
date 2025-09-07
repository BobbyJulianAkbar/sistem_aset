<?php

namespace App\Http\Controllers;
use App\Models\pemasukanModel;
use App\Models\klienModel;
use App\Models\propertiModel;


use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home()
    {
        $jumlahProperti = PropertiModel::count();
        $totalKlien = KlienModel::count();
        $propertiTersedia = PropertiModel::where('status_properti', '1')->count();

        $currentYear = now()->year;

        $kumulatifTransaksi = PemasukanModel::whereYear('created_at', $currentYear)->count();
        $kumulatifPendapatan = PemasukanModel::whereYear('created_at', $currentYear)->sum('jlh_pembayaran');

        $pemasukan = PemasukanModel::with(['klien','properti'])
            ->where('tipe_pembayaran', 2)
            ->get();

        return view('home', compact(
            'jumlahProperti',
            'totalKlien',
            'propertiTersedia',
            'kumulatifTransaksi',
            'kumulatifPendapatan',
            'pemasukan'
        ));
    }
}
