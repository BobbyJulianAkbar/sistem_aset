<?php

namespace App\Http\Controllers;
use App\Models\pemasukanModel;
use App\Models\klienModel;
use App\Models\propertiModel;

use Illuminate\Http\Request;

class pemasukanController extends Controller
{
    public function pemasukan_list()
    {
        $pemasukan = pemasukanModel::with(['klien', 'properti'])->get();
        return view('pemasukan', compact('pemasukan'));
    }

    public function transaksi()
    {
        $klien = klienModel::all();
        $properti = propertiModel::all();

        return view('transaksi', compact('klien', 'properti'));
    }

    public function transaksi_store(Request $request)
    {
        $request->validate([
            'id_klien' => 'required|exists:klien,id_klien',
            'id_properti' => 'required|exists:properti,id_properti',
            'tipe_pembayaran' => 'required',
            'jlh_pembayaran' => 'required',
        ]);

        $data = $request->only([
            'id_klien',
            'id_properti',
            'tipe_pembayaran',
            'jlh_pembayaran'
        ]);

        $data['jlh_pembayaran'] = str_replace(['Rp. ', '.'], '', $request->jlh_pembayaran);

        pemasukanModel::create($data);

        return redirect('/pemasukan')->with('success', 'Transaksi berhasil.');
    }

    public function pemasukan_show($id)
    {
        $pemasukan = pemasukanModel::with(['klien', 'properti'])->findOrFail($id);
        return view('pemasukan_view', compact('pemasukan'));
    }

    public function pemasukan_destroy($id)
    {
        $pemasukan = pemasukanModel::findOrFail($id);
        $pemasukan->delete();

        return redirect('/pemasukan')->with('success', 'Transaksi dihapus.');
    }
}
