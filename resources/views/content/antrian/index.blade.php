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
@endsection

@section('content')

    <!-- Modal Create -->
    @include('content.antrian.modal.create')

    <!-- Modal Update Status -->
    @include('content.antrian.modal.edit')

    <div class="card p-4">
        @if (auth()->user()->role_id === 2)
            <div class="mb-3 d-flex">
                <button type="button" class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAntrian">
                    <span class="tf-icons bx bx-pie-chart-alt me-1"></span>Antrian Baru
                </button>
            </div>
        @endif

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
