@extends('layouts.main')

@section('title', 'Dokter')

@section('header', 'Update Data Dokter')

@section('page-scripts')
    <script type="text/javascript">
        $(document).ready(function(e) {
            let imagePreview = $('#uploadedAvatar');
            let imageInput = $('#upload');
            let imageReset = $('#imageReset');

            // preview image
            imageInput.change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0])
            })

            // reset image
            imageReset.click(function() {
                imagePreview.attr('src', '/assets/img/avatars/1.png');
                imageInput.val('');
            })
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <form action="{{ route('dokter.update', $dokter->id_user) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ '/uploads/dokter/' . $dokter->dokter->foto }}" alt="user-avatar"
                                class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            {{-- <img src="/assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100"
                                width="100" id="uploadedAvatar" /> --}}
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" name="foto" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4"
                                    id="imageReset">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                @error('foto')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <h5 class="card-header">Account</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $dokter->nama) }}" type="text" id="nama" name="nama"
                                    placeholder="Doe" />
                                @error('nama')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control @error('username') is-invalid @enderror" type="text"
                                    id="username" name="username" placeholder="JohnD"
                                    value="{{ old('username', $dokter->username) }}" />
                                @error('username')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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
                                    value="{{ old('email', $dokter->email) }}" />
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
                                        placeholder="0821 9650 6900" value="{{ old('nomor_hp', $dokter->nomor_hp) }}" />
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
                                <label for="nomor_str" class="form-label">Nomor STR</label>
                                <input class="form-control @error('nomor_str') is-invalid @enderror" type="text"
                                    id="nomor_str" name="nomor_str" placeholder="11232321321241231"
                                    value="{{ old('nomor_str', $dokter->dokter->nomor_str) }}" />
                                @error('nomor_str')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nomor_sip" class="form-label">Nomor SIP</label>
                                <input class="form-control @error('nomor_sip') is-invalid @enderror" type="text"
                                    id="nomor_sip" name="nomor_sip" placeholder="11232321321241231"
                                    value="{{ old('nomor_sip', $dokter->dokter->nomor_sip) }}" />
                                @error('nomor_sip')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="spesialisasi" class="form-label">Spesialisasi</label>
                                <input class="form-control @error('spesialisasi') is-invalid @enderror" type="text"
                                    name="spesialisasi" id="spesialisasi" placeholder="Bedah Otak"
                                    value="{{ old('spesialisasi', $dokter->dokter->spesialisasi) }}" />
                                @error('spesialisasi')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ route('dokter.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
