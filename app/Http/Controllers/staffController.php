<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class staffController extends Controller
{

    public function staff_list()
    {
        $staff = User::all();
        return view('staff', ['staff' => $staff]);
    }

    public function staff_new()
    {
        return view('staff_new');
    }

    public function staff_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jabatan' => 'required',
            'telp_staff' => 'required',
            'email' => 'required',
            'status_staff' => 'required',
            'password' => 'required',
        ]);

        $data = $request->only([
            'name',
            'jabatan',
            'telp_staff',
            'email',
            'status_staff',
            'password'
        ]);

        User::create($data);

        return redirect('/staff')->with('success', 'Staff berhasil ditambahkan.');
    }

    public function staff_show($id)
    {
        $staff = User::findOrFail($id);
        return view('staff_view', compact('staff'));
    }

    public function staff_edit($id)
    {
        $staff = User::findOrFail($id);
        return view('staff_edit', compact('staff'));
    }

    public function staff_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'jabatan' => 'required',
            'telp_staff' => 'required',
            'email' => 'required',
            'status_staff' => 'required',
            'password' => 'required',
        ]);

        $data = $request->only([
            'name',
            'jabatan',
            'telp_staff',
            'email',
            'status_staff',
            'password'
        ]);

        $staff = User::findOrFail($id);
        $staff->update($data);

        return redirect('/staff')->with('success', 'Staff berhasil diperbarui.');
    }

    public function staff_destroy($id)
    {
        $staff = User::findOrFail($id);
        $staff->delete();

        return redirect('/staff')->with('success', 'Staff berhasil dihapus.');
    }
}
