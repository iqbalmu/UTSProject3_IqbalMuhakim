@extends('layouts.main')

@section('title', 'Data Pasien')

@section('header', 'Detail Data Pasien')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Account</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input class="form-control" value="{{ $pasien->nama }}" type="text" id="nama"
                                name="nama" placeholder="John" disabled />
                        </div>
                        {{-- <div class="mb-3 col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" type="text" id="username" name="username" placeholder="JohnD"
                                value="{{ $pasien->username }}" disabled />
                        </div> --}}
                        {{-- <div class="form-password-toggle mb-3 col-md-6">
                            <label class="form-label" for="basic-default-password32">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" id="basic-default-password32" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="basic-default-password" disabled />
                                <span class="input-group-text cursor-pointer" id="basic-default-password"><i
                                        class="bx bx-hide"></i></span>
                            </div>
                        </div> --}}
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" name="email"
                                placeholder="john.doe@example.com" value="{{ $pasien->email }}" disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="nomor_hp">Nomor HP</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">ID (+62)</span>
                                <input type="text" id="nomor_hp" name="nomor_hp"
                                    class="form-control
                                    placeholder="0821 9650 6900"
                                    disabled value="{{ $pasien->nomor_hp }}" />
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="card-header">Profile</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="nik" class="form-label">NIK</label>
                            <input class="form-control" type="text" id="nik" name="nik"
                                placeholder="11232321321241231" value="{{ $pasien->pasien->nik }}" disabled />
                        </div>
                        {{-- <div class="mb-3 col-md-6">
                            <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                            <input class="form-control" type="number" name="tinggi_badan" id="tinggi_badan"
                                placeholder="175" value="{{ $pasien->pasien->tinggi_badan }}" disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="berat_badan" class="form-label">Berat Badan</label>
                            <input class="form-control" type="number" name="berat_badan" id="berat_badan" placeholder="65"
                                value="{{ $pasien->pasien->berat_badan }}" disabled />
                        </div> --}}
                        <div class="mb-3 col-md-6">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select id="jenis_kelamin" class="select2 form-select" name="jenis_kelamin" disabled>
                                <option value="" selected>
                                    {{ $pasien->pasien->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }} </option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="profesi" class="form-label">Profesi</label>
                            <input class="form-control" type="text" id="profesi" name="profesi"
                                placeholder="Mahasiswa" value="{{ $pasien->pasien->profesi }}" disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Jl. jalan" value="{{ $pasien->pasien->alamat }}" disabled />
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('pasien.edit', $pasien->id_user) }}" class="btn btn-primary me-2">Edit</a>
                        <a href="{{ route('pasien.index') }}" class="btn btn-outline-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
