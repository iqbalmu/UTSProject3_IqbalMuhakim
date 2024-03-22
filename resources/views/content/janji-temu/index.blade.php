@extends('layouts.main')

@section('title', 'Janji Temu')

@section('header', 'Antrian Janji Temu')

@section('vendor-styles')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('vendor-scripts')
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('page-scripts')
    <script src="/assets/js/data-tables.js"></script>
    <script src="/assets/js/janji-temu.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('#pasien').select2({
                dropdownParent: $('#modalTemu')
            });

            $('#dokter').select2({
                dropdownParent: $('#modalTemu')
            });
        });
    </script>
@endsection

@section('content')
    <div class="card p-4">
        <div class="mb-3 d-flex">
            <button type="button" class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTemu">
                <span class="tf-icons bx bx-pie-chart-alt me-1"></span>Janji Temu Baru
            </button>

            <!-- Modal Antrian -->
            <div class="modal fade" id="modalTemu" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('temu.store') }}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTemuTitle">Buat Janji Temu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="pasien" class="form-label">Pasien</label>
                                        <select id="pasien" class="form-control" name="pasien_id" style="width: 100%;">
                                            <option value="">nama pasien</option>
                                            @foreach ($pasiens as $pasien)
                                                <option value="{{ $pasien->pasien->id_pasien }}">
                                                    {{ $pasien->nama }} ({{ $pasien->username }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="dokter" class="form-label">Dokter</label>
                                        <select id="dokter" class="form-control" name="dokter_id" style="width: 100%;">
                                            <option value="">nama dokter</option>
                                            @foreach ($dokters as $dokter)
                                                <option value="{{ $dokter->dokter->id_dokter }}">
                                                    {{ $dokter->nama }} ({{ $dokter->username }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="waktu" class="form-label">Waktu</label>
                                        <input type="time" name="waktu" id="waktu" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Buat Antrian</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Update Status -->
            <div class="modal fade" id="modalUpdateStatusTemu" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('temu.update') }}" method="post">
                            @csrf
                            @method('put')
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalUpdateStatusTemuTitle">Antrian #<b class="nomor">-</b></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="pasien" class="form-label">Pasien</label>
                                        <input type="text" name="pasien" class="form-control" value="" id="input-pasien"
                                            disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="dokter" class="form-label">Dokter</label>
                                        <input type="text" name="dokter" class="form-control" value="" id="input-dokter"
                                            disabled>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="antrianId">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="pasien" class="form-label">Status</label>
                                        <select id="pasien" class="form-control" name="status" style="width: 100%;">
                                            <option value="menunggu">Menunggu</option>
                                            <option value="proses">Proses</option>
                                            <option value="selesei">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>Antrian</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Waktu</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $kunjungan)
                    <tr>
                        <td>{{ $kunjungan->id_kunjungan }}</td>
                        <td>{{ $kunjungan->pasien->user->nama }}</td>
                        <td>{{ $kunjungan->dokter->user->nama }}</td>
                        <td>{{ $kunjungan->tanggal }} : {{ $kunjungan->waktu }}</td>
                        <td>
                            <span
                                class="badge
                            @if ($kunjungan->status == 'menunggu') bg-secondary
                            @elseif($kunjungan->status == 'proses') bg-warning
                            @else bg-success @endif">
                                {{ $kunjungan->status }}
                            </span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateStatusTemu" data-antrian-id={{ $kunjungan->id_kunjungan }}
                                data-nama-pasien={{ $kunjungan->pasien->user->nama }}
                                data-nama-dokter={{ $kunjungan->dokter->user->nama }}
                                data-status={{ $kunjungan->status }}>
                                Update
                            </button>
                            {{-- <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateStatusTemu" data-antrian-id={{ $kunjungan->id_antrian }}
                                data-nama-pasien={{ $kunjungan->pasien->user->nama }}
                                data-status={{ $kunjungan->status }}>
                                Edit
                            </button> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
