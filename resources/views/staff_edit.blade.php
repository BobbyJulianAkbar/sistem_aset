@extends('layout.app')
@section('title', 'Staff')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <p class="card-title">Edit Staff</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('staff_store') }}"action="{{ route('staff_update', ['id' => $staff['id']]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Staff</label>
                <input type="text" class="form-control {{ session('errors.name') ? 'is-invalid' : '' }}"
                       id="name" name="name"
                       value="{{ old('name', $staff['name']) }}" required>
                @if (session('errors.name'))
                    <span class="invalid-feedback">{{ session('errors.name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select class="form-control {{ session('errors.jabatan') ? 'is-invalid' : '' }}"
                        id="jabatan" name="jabatan" required>
                    <option disabled selected>-- Pilih Jabatan --</option>
                    <option value="1" {{ (old('jabatan', $staff['jabatan']) == 1) ? 'selected' : '' }}>Manager</option>
                    <option value="2" {{ (old('jabatan', $staff['jabatan']) == 2) ? 'selected' : '' }}>Administrator</option>
                    <option value="3" {{ (old('jabatan', $staff['jabatan']) == 3) ? 'selected' : '' }}>Supervisor</option>
                    <option value="4" {{ (old('jabatan', $staff['jabatan']) == 4) ? 'selected' : '' }}>Staff</option>
                </select>
                @if (session('errors.jabatan'))
                    <span class="invalid-feedback">{{ session('errors.jabatan') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="telp_staff">Nomor Telepon</label>
                <input type="text" class="form-control {{ session('errors.telp_staff') ? 'is-invalid' : '' }}"
                       id="telp_staff" name="telp_staff"
                       value="{{ old('telp_staff', $staff['telp_staff']) }}" required>
                @if (session('errors.telp_staff'))
                    <span class="invalid-feedback">{{ session('errors.telp_staff') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control {{ session('errors.email') ? 'is-invalid' : '' }}"
                       id="email" name="email"
                       value="{{ old('email', $staff['email']) }}" required>
                @if (session('errors.email'))
                    <span class="invalid-feedback">{{ session('errors.email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="status_staff">Status</label>
                <select class="form-control {{ session('errors.status_staff') ? 'is-invalid' : '' }}"
                        id="status_staff" name="status_staff" required>
                    <option disabled selected>-- Pilih Status --</option>
                    <option value="1" {{ (old('status_staff', $staff['status_staff']) == 1) ? 'selected' : '' }}>Aktif</option>
                    <option value="2" {{ (old('status_staff', $staff['status_staff']) == 2) ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @if (session('errors.status_staff'))
                    <span class="invalid-feedback">{{ session('errors.status_staff') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('staff_list') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection