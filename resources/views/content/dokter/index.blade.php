@extends('layouts.main')

@section('title', 'Data Dokter')

@section('header', 'Data Dokter')

@section('vendor-styles')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.css" rel="stylesheet">
@endsection

@section('vendor-scripts')
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.js"></script>
@endsection

@section('page-scripts')
    <script src="/assets/js/data-tables.js"></script>
@endsection

@section('content')
    <div class="card p-4">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>dokter</th>
                    <th>spesialisasi</th>
                    <th>kontak</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>
                            {{ $user->dokter->id_dokter }}
                        </td>
                        <td class="d-flex align-items-center gap-3">
                            <img src="{{ '/uploads/dokter/' . $user->dokter->foto }}" alt="foto dokter" alt="user-avatar"
                                class="d-block rounded" height="70" width="70">
                            {{ $user->nama }}
                        </td>
                        <td>
                            {{ $user->dokter->spesialisasi }}
                        </td>
                        <td>{{ $user->nomor_hp }}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('dokter.show', $user->id_user) }}"><i
                                            class="bx bx-show-alt me-1"></i>Detail</a>
                                    <a class="dropdown-item" href="{{ route('dokter.edit', $user->id_user) }}"><i
                                            class="bx bx-edit-alt me-1"></i>Edit</a>
                                    {{-- <a class="dropdown-item" href="/obat/delete"><i class="bx bx-trash me-1"></i>Delete</a> --}}
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#obatModal" data-obat-id={{ $user->id_user }}
                                        data-obat-name={{ $user->nama }}>
                                        <i class="bx bx-trash me-1"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
