<?php

namespace App\Http\Controllers;
use App\Models\pemasukanModel;
use App\Models\klienModel;
use App\Models\propertiModel;
use App\Models\cicilanModel;

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
            'jlh_pembayaran' => 'required',
        ]);

        $jlhPembayaran = preg_replace('/\D/', '', $request->jlh_pembayaran);
        $jlhPembayaran = (int) $jlhPembayaran;

        $properti = propertiModel::findOrFail($request->id_properti);
        $hargaProperti = (int) $properti->harga_properti;

        if ($jlhPembayaran == $hargaProperti) {
            $tipePembayaran = 1;
        } elseif ($jlhPembayaran < $hargaProperti) {
            $tipePembayaran = 2;
        } else {
            return back()->withErrors(['jlh_pembayaran' => 'Jumlah pembayaran tidak boleh lebih dari harga properti.'])->withInput();
        }

        pemasukanModel::create([
            'id_klien'        => $request->id_klien,
            'id_properti'     => $request->id_properti,
            'tipe_pembayaran' => $tipePembayaran,
            'jlh_pembayaran'  => $jlhPembayaran,
        ]);

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
