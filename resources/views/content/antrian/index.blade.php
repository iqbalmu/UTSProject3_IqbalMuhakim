@extends('layouts.main')

@section('title', 'Antrian')

@section('header', 'Antrian Pasien')

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
    <script src="/assets/js/antrian.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('#pasien').select2({
                dropdownParent: $('#modalAntrian')
            });
        });
    </script>
@endsection

@section('content')
    <div class="card p-4">
        <div class="mb-3 d-flex">
            <button type="button" class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAntrian">
                <span class="tf-icons bx bx-pie-chart-alt me-1"></span>Antrian Baru
            </button>

            <!-- Modal Antrian -->
            <div class="modal fade" id="modalAntrian" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('antrian.store') }}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAntrianTitle">Antrian Baru</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="pasien" class="form-label">Pasien</label>
                                        <select id="pasien" class="form-control" name="user_id" style="width: 100%;">
                                            <option value="">Select Pasien</option>
                                            @foreach ($pasiens as $pasien)
                                                <option value="{{ $pasien->id_user }}">
                                                    {{ $pasien->nama }} ({{ $pasien->username }})
                                                </option>
                                            @endforeach
                                        </select>
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
            <div class="modal fade" id="modalUpdateStatus" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('antrian.update') }}" method="post">
                            @csrf
                            @method('put')

                            <div class="modal-header">
                                <h5 class="modal-title" id="modalUpdateStatusTitle">Update Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="pasien" class="form-label">Antrian <span class="h5">#<b
                                                    class="nomor">-</b></span> </label>
                                        <input type="text" class="form-control" value="" id="input-pasien"
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
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($antrian) --}}
                @foreach ($antrian as $item)
                    <tr>
                        <td>
                            {{ $item->id_antrian }}
                        </td>
                        <td>
                            {{ $item->pasien->user->nama }}
                        </td>
                        <td>
                            <span
                                class="badge
                                @if ($item->status == 'menunggu') bg-secondary
                                @elseif($item->status == 'proses') bg-warning
                                @else bg-success @endif">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateStatus" data-antrian-id={{ $item->id_antrian }}
                                data-nama-pasien={{ $item->pasien->user->nama }} data-status={{ $item->status }}>
                                Update Status
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
