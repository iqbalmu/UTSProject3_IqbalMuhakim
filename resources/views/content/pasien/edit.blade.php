@extends('layouts.main')

@section('title', 'Data Pasien')

@section('header', 'Perbarui Data Pasien')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <form action="{{ route('pasien.update', $pasien->id_user) }}" method="post">
                    @csrf
                    @method('put')
                    <h5 class="card-header">Account</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $pasien->nama) }}" type="text" id="nama" name="nama"
                                    placeholder="Doe" />
                                @error('nama')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3 col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control @error('username') is-invalid @enderror" type="text"
                                    id="username" name="username" placeholder="JohnD"
                                    value="{{ old('username', $pasien->username) }}" />
                                @error('username')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="form-password-toggle mb-3 col-md-6">
                                <label class="form-label" for="basic-default-password32">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="basic-default-password32" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="basic-default-password" />
                                    <span class="input-group-text cursor-pointer" id="basic-default-password"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text"
                                    id="email" name="email" placeholder="john.doe@example.com"
                                    value="{{ old('email', $pasien->email) }}" />
                                @error('email')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="nomor_hp">Nomor HP</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">ID (+62)</span>
                                    <input type="text" id="nomor_hp" name="nomor_hp"
                                        class="form-control
                                    @error('nomor_hp') is-invalid @enderror"
                                        placeholder="0821 9650 6900" value="{{ old('nomor_hp', $pasien->nomor_hp) }}" />
                                </div>
                                @error('nomor_hp')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <h5 class="card-header">Profile</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input class="form-control @error('nik') is-invalid @enderror" type="text" id="nik"
                                    name="nik" placeholder="11232321321241231"
                                    value="{{ old('nik', $pasien->pasien->nik) }}" />
                                @error('nik')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3 col-md-6">
                                <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                                <input class="form-control @error('tinggi_badan') is-invalid @enderror" type="number"
                                    name="tinggi_badan" id="tinggi_badan" placeholder="175"
                                    value="{{ old('tinggi_badan', $pasien->pasien->tinggi_badan) }}" />
                                @error('tinggi_badan')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="berat_badan" class="form-label">Berat Badan</label>
                                <input class="form-control @error('berat_badan') is-invalid @enderror " type="number"
                                    name="berat_badan" id="berat_badan" placeholder="65"
                                    value="{{ old('berat_badan', $pasien->pasien->berat_badan) }}" />
                                @error('berat_badan')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="mb-3 col-md-6">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select id="jenis_kelamin"
                                    class="select2 form-select @error('jenis_kelamin') is-invalid @enderror"
                                    name="jenis_kelamin" autofocus>
                                    <option value="{{ $pasien->pasien->jenis_kelamin }}" selected>
                                        {{ $pasien->pasien->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                    </option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="profesi" class="form-label">Profesi</label>
                                <input class="form-control @error('profesi') is-invalid @enderror " type="text"
                                    id="profesi" name="profesi" placeholder="Mahasiswa"
                                    value="{{ old('profesi', $pasien->pasien->profesi) }}" />
                                @error('profesi')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" placeholder="Jl. jalan"
                                    value="{{ old('alamat', $pasien->pasien->alamat) }}" />
                                @error('alamat')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ route('pasien.index') }}" class="btn btn-outline-secondary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
