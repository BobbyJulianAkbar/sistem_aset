<?php

namespace App\Http\Controllers;
use App\Models\propertiModel;

use Illuminate\Http\Request;

class propertiController extends Controller
{
    public function properti_list()
    {
        $properti = propertiModel::all();
        return view('properti', ['properti' => $properti]);
    }

    public function properti_new()
    {
        return view('properti_new');
    }

    public function properti_store(Request $request)
    {
        $request->validate([
            'nama_properti' => 'required',
            'harga_properti' => 'required',
            'luas_properti' => 'required',
            'tipe_properti' => 'required',
            'status_properti' => 'required',
        ]);

        $data = $request->only([
            'nama_properti',
            'harga_properti',
            'luas_properti',
            'tipe_properti',
            'status_properti'
        ]);

        $data['harga_properti'] = str_replace(['Rp. ', '.'], '', $data['harga_properti']);

        propertiModel::create($data);

        return redirect('/properti')->with('success', 'Properti berhasil ditambahkan.');
    }

    public function properti_show($id)
    {
        $properti = propertiModel::findOrFail($id);
        return view('properti_view', compact('properti'));
    }

    public function properti_edit($id)
    {
        $properti = propertiModel::findOrFail($id);
        return view('properti_edit', compact('properti'));
    }

    public function properti_update(Request $request, $id)
    {
        $request->validate([
            'nama_properti' => 'required',
            'harga_properti' => 'required',
            'luas_properti' => 'required',
            'tipe_properti' => 'required',
            'status_properti' => 'required',
        ]);

        $data = $request->only([
            'nama_properti',
            'harga_properti',
            'luas_properti',
            'tipe_properti',
            'status_properti'
        ]);

        $data['harga_properti'] = str_replace(['Rp. ', '.'], '', $data['harga_properti']);
        $properti = propertiModel::findOrFail($id);
        $properti->update($data);

        return redirect('/properti')->with('success', 'Properti berhasil diperbarui.');
    }

    public function properti_destroy($id)
    {
        $properti = propertiModel::findOrFail($id);
        $properti->delete();

        return redirect('/properti')->with('success', 'Properti berhasil dihapus.');
    }
}