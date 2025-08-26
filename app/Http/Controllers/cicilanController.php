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
            'jumlah_cicilan' => 'required|numeric|min:1'
        ]);

        $pemasukan = pemasukanModel::with('cicilan','properti')->findOrFail($id_pemasukan);

        $totalPaid = $pemasukan->cicilan->sum('jumlah_cicilan');

        $target = $pemasukan->properti->harga_properti;

        $remaining = $target - $totalPaid;

        if ($request->jumlah_cicilan > $remaining) {
            return redirect()->back()
                ->withErrors(['jumlah_cicilan' => 'Jumlah cicilan melebihi sisa pembayaran!']);
        }

        $cicilan = new cicilanModel();
        $cicilan->id_pemasukan = $pemasukan->id_pemasukan;
        $cicilan->jumlah_cicilan = $request->jumlah_cicilan;
        $cicilan->tanggal_bayar = now();
        $cicilan->save();

        $totalPaid += $request->jumlah_cicilan;
        $pemasukan->jlh_pembayaran = $totalPaid;

        if ($totalPaid >= $target) {
            $pemasukan->status = "Bayar Lunas";
        } else {
            $pemasukan->status = "Cicilan";
        }

        $pemasukan->save();

        return redirect()->route('cicilan_show', $id_pemasukan)
                         ->with('success', 'Cicilan berhasil ditambahkan');
    }

    public function cicilan_show($id_pemasukan)
    {
        $pemasukan = pemasukanModel::with(['klien','properti','cicilan'])
            ->findOrFail($id_pemasukan);

        return view('cicilan_show', compact('pemasukan'));
    }
}
