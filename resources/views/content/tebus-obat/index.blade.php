@extends('layouts.main')

@section('title', 'Tebus Obat')

@section('header', 'Tebus Obat Pasien')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <form action="" method="get">
                    <div class="card-body d-flex gap-2">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input type="text" class="form-control" placeholder="mrn pasien ..." aria-label="Search..."
                                aria-describedby="basic-addon-search31" name="mrn" autofocus>
                        </div>
                        <button type="submit" class="btn btn-icon btn-primary">
                            <span class="tf-icons bx bx-search"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @if ($resep)
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">
                    Resep Obat
                </h5>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach ($resep->details as $obat)
                            <span class="fw-semibold">
                                {{ $obat->obat->nama }}
                                {{ $obat->dosis }}</span>
                            <p class="list-group-item list-group-item-action">
                                <span>
                                    {{ $obat->metode }} {{ $obat->frekuensi }} hari, {{ $obat->syarat }} makan,
                                    {{ $obat->durasi }}
                                </span>
                            </p>
                        @endforeach

                        <span class="fw-semibold">
                            Keterangan :
                        </span>
                        <p class="list-group-item list-group-item-action">
                            <span>
                                {{$resep->keterangan}}
                            </span>
                        </p>

                        <span class="fw-semibold">
                            Status :
                        </span>
                        <p class="list-group-item list-group-item-action">
                            <span>
                                {{$resep->status}}
                            </span>
                        </p>
                    </div>
                </div>

                {{-- <h5 class="card-header">
                    Obat
                </h5>
                <div class="card-body">

                </div> --}}
            </div>
        </div>
        @endif
    </div>
@endsection
