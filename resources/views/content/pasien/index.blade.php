@extends('layouts.main')

@section('title', 'Data Pasien')

@section('header', 'Data Pasien')

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
    <table class="table table-striped" id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>nama</th>
                <th>profesi</th>
                <th>umur</th>
                <th>kontak</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection
