@extends('layout.app')

@section('konten')
<div class="container">
    <h2>Tambah Guru</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.guru.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="form-control">
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control">
        </div>
        <div class="mb-3">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
