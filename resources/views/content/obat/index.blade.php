@extends('layouts.main')

@section('title', 'Obat')

@section('header', 'Data Obat')

@section('vendor-styles')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.css" rel="stylesheet">
@endsection

@section('vendor-scripts')
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.js"></script>
@endsection

@section('page-scripts')
    <script src="/assets/js/data-tables.js"></script>
    <script>
        // mengirim data ke modal
        $(document).ready(function() {
            // Ketika modal ditampilkan
            $('#obatModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Tombol yang memicu modal
                var obatId = button.data('obat-id'); // Ekstrak informasi dari data-* atribut
                var obatName = button.data('obat-name'); // Ekstrak informasi dari data-* atribut
                // Memperbarui konten modal
                var modal = $(this);
                modal.find('#obatId').val(obatId);
                modal.find('.obat-name').text(obatName);
            });
        });
    </script>
@endsection

@section('content')
    <div class="card p-4">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nama</th>
                    <th>kategori</th>
                    <th>harga</th>
                    <th>stok</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $obat)
                    <tr>
                        <td>
                            {{ $obat->id_obat }}
                        </td>
                        <td>
                            {{ $obat->nama }}
                        </td>
                        <td>
                            {{ $obat->kategori }}
                        </td>
                        <td>
                            Rp. {{ number_format($obat->harga) }}
                        </td>
                        <td>{{ number_format($obat->stok) }}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('obat.show', $obat->id_obat) }}"><i
                                            class="bx bx-show-alt me-1"></i>Detail</a>
                                    <a class="dropdown-item" href="{{ route('obat.edit', $obat->id_obat) }}"><i
                                            class="bx bx-edit-alt me-1"></i>Edit</a>
                                    {{-- <a class="dropdown-item" href="/obat/delete"><i class="bx bx-trash me-1"></i>Delete</a> --}}
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#obatModal" data-obat-id={{ $obat->id_obat }}
                                        data-obat-name={{ $obat->nama }}>
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

    <!-- Modal Delete Obat-->
    <div class="modal fade" id="obatModal" tabindex="-1" aria-labelledby="obatModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('obat.remove') }}" method="post">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-6" id="obatModalLabel">Data tidak bisa dikembalikan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>Data obat <span class="obat-name fw-bold"></span> akan dihapus!!</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="hidden" name="id" id="obatId">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
