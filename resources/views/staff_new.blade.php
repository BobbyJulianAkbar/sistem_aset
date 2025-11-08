@extends('layout.app')
@section('title', 'Tambah Staff')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <p class="card-title">Tambah Staff</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('staff_store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nama Staff</label>
                <input type="text" class="form-control {{ session('errors.name') ? 'is-invalid' : '' }}"
                       id="name" name="name" placeholder="Masukkan Nama Staff"
                       value="{{ old('name') }}" required autocomplete="name">
                @if (session('errors.name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select class="form-control {{ session('errors.jabatan') ? 'is-invalid' : '' }}"
                        id="jabatan" name="jabatan" required>
                    <option value="" disabled {{ old('jabatan') ? '' : 'selected' }}>-- Pilih Jabatan --</option>
                    <option value="1" {{ old('jabatan') == '1' ? 'selected' : '' }}>Manager</option>
                    <option value="2" {{ old('jabatan') == '2' ? 'selected' : '' }}>Administrator</option>
                    <option value="3" {{ old('jabatan') == '3' ? 'selected' : '' }}>Supervisor</option>
                    <option value="4" {{ old('jabatan') == '4' ? 'selected' : '' }}>Staff</option>
                </select>
                @if (session('errors.jabatan'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.jabatan') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="telp_staff">Nomor Telepon</label>
                <input type="text" class="form-control {{ session('errors.telp_staff') ? 'is-invalid' : '' }}"
                       id="telp_staff" name="telp_staff" placeholder="01234567890"
                       value="{{ old('telp_staff') }}" required autocomplete="telp_staff">
                @if (session('errors.telp_staff'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.telp_staff') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control {{ session('errors.email') ? 'is-invalid' : '' }}"
                       id="email" name="email" placeholder="example@example.com"
                       value="{{ old('email') }}" required autocomplete="email">
                @if (session('errors.email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="status_staff">Status</label>
                <select class="form-control {{ session('errors.status_staff') ? 'is-invalid' : '' }}"
                        id="status_staff" name="status_staff" required>
                    <option value="" disabled {{ old('status_staff') ? '' : 'selected' }}>-- Pilih Status --</option>
                    <option value="1" {{ old('status_staff') == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="2" {{ old('status_staff') == '2' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @if (session('errors.status_staff'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.status_staff') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control {{ session('errors.password') ? 'is-invalid' : '' }}"
                       id="password" name="password" placeholder="**********"
                       value="{{ old('password') }}" required autocomplete="password">
                @if (session('errors.password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="profile_picture">Foto Profil</label>
                <input type="file" class="form-control {{ session('errors.profile_picture') ? 'is-invalid' : '' }}"
                       id="profile_picture" name="profile_picture" accept="image/*"
                       value="{{ old('profile_picture') }}">
                @if (session('errors.profile_picture'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session('errors.profile_picture') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('staff_list') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection