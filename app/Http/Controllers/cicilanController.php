<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cicilanModel;
use App\Models\pemasukanModel;

class cicilanController extends Controller
{
    public function cicilan()
    {
        $pemasukan = pemasukanModel::with(['klien','properti','cicilan'])
            ->where('tipe_pembayaran', 2)
            ->get();

        return view('cicilan', compact('pemasukan'));
    }

    public function cicilan_store(Request $request, $id_pemasukan)
    {
        $request->validate([
        'jumlah_cicilan' => 'required'
    ]);

    $pemasukan = pemasukanModel::with('cicilan','properti')->findOrFail($id_pemasukan);

    $totalPaid = $pemasukan->jlh_pembayaran;
    $target = $pemasukan->properti->harga_properti;
    $remaining = max(0, $target - $totalPaid);

    $jumlah_cicilan = (int) preg_replace('/\D/', '', $request->jumlah_cicilan);

    if ($jumlah_cicilan > $remaining) {
        return redirect()->back()
            ->withErrors(['jumlah_cicilan' => 'Jumlah cicilan melebihi sisa pembayaran!']);
    }

    $cicilan = new cicilanModel();
    $cicilan->id_pemasukan = $pemasukan->id_pemasukan;
    $cicilan->jumlah_cicilan = $jumlah_cicilan;
    $cicilan->save();

    $totalPaid += $jumlah_cicilan;
    $pemasukan->jlh_pembayaran = $totalPaid;

    if ($totalPaid >= $target) {
        $pemasukan->tipe_pembayaran = 1;
    } else {
        $pemasukan->tipe_pembayaran = 2;
    }

        $pemasukan->save();

        return redirect()->route('pemasukan_list', $id_pemasukan)
                         ->with('success', 'Cicilan berhasil ditambahkan');
    }
}
