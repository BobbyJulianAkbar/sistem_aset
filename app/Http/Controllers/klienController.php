<?php

namespace App\Http\Controllers;
use App\Models\klienModel;

use Illuminate\Http\Request;

class klienController extends Controller
{
    public function klien_list()
    {
        $klien = klienModel::all();
        return view('klien', ['klien' => $klien]);
    }

    public function klien_new()
    {
        return view('klien_new');
    }

    public function klien_store(Request $request)
    {
        $request->validate([
            'nama_klien' => 'required',
            'no_hp_klien' => 'required',
            'email_klien' => 'nullable',
        ]);

        $data = $request->only([
            'nama_klien',
            'no_hp_klien',
            'email_klien'
        ]);

        klienModel::create($data);

        return redirect('/klien')->with('success', 'Klien berhasil ditambahkan.');
    }

    public function klien_show($id)
    {
        $klien = klienModel::findOrFail($id);
        return view('klien_view', compact('klien'));
    }

    public function klien_edit($id)
    {
        $klien = klienModel::findOrFail($id);
        return view('klien_edit', compact('klien'));
    }

    public function klien_update(Request $request, $id)
    {
        $request->validate([
            'nama_klien' => 'required',
            'no_hp_klien' => 'required',
            'email_klien' => 'nullable',
        ]);

        $data = $request->only([
            'nama_klien',
            'no_hp_klien',
            'email_klien'
        ]);

        $klien = klienModel::findOrFail($id);
        $klien->update($data);

        return redirect('/klien')->with('success', 'Klien berhasil diperbarui.');
    }


    public function klien_destroy($id)
    {
        $klien = klienModel::findOrFail($id);
        $klien->delete();

        return redirect('/klien')->with('success', 'Klien berhasil dihapus.');
    }
}
