@extends('layout.app')
@section('title', 'Rincian Staff')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <p class="card-title">Data Staff</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('staff_store') }}"action="{{ route('staff_update', ['id' => $staff['id']]) }}">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="id">ID Staff</label>
                <input type="text" class="form-control"
                       id="id" name="id"
                       value="{{ $staff['id'] }}" readonly>
            </div>

            <div class="form-group">
                <label for="name">Nama Staff</label>
                <input type="text" class="form-control"
                       id="name" name="name"
                       value="{{ $staff['name'] }}" readonly>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control"
                       id="jabatan" name="jabatan" readonly
                       @if ($staff['jabatan'] == 1)
                            value="Manager"
                        @elseif ($staff['jabatan'] == 2)
                            value="Administrator"
                        @elseif ($staff['jabatan'] == 3)
                            value="Supervisor"
                        @elseif ($staff['jabatan'] == 4)
                            value="Staff"
                        @endif>
            </div>

            <div class="form-group">
                <label for="telp_staff">Nomor Telepon</label>
                <input type="text" class="form-control"
                       id="telp_staff" name="telp_staff"
                       value="{{ $staff['telp_staff'] }}" readonly>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control"
                       id="email" name="email"
                       value="{{ $staff['email'] }}" readonly>
            </div>

            <div class="form-group">
                <label for="created_at">Tanggal/Waktu Terdaftar</label>
                <input type="datetime-local" class="form-control"
                       id="created_at" name="created_at" readonly
                       value="{{ $staff['created_at'] ?? '-' }}">
            </div>

            <div class="form-group">
                <label for="status_staff">Status</label>
                <input type="text" class="form-control"
                       id="status_staff" name="status_staff" readonly
                       @if ($staff['status_staff'] == 1)
                            value="Aktif"
                        @elseif ($staff['status_staff'] == 2)
                            value="Nonaktif"
                        @endif>
            </div>

            <div class="form-group">
                <label for="profile_picture">Foto Profil</label>
                @if($staff->profile_picture)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $staff->profile_picture) }}" 
                            alt="Foto {{ $staff->name }}" 
                            width="120" class="rounded shadow">
                    </div>
                @else
                    <input type="text" class="form-control"
                        value="Tidak ada Foto!" readonly>
                @endif
            </div>

            <div class="form-group">
                <a href="{{ route('staff_list') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection