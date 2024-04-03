{{-- Modal Create Antrian --}}
<div class="modal fade" id="modalAntrian" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('antrian.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAntrianTitle">Antrian Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="pasien" class="form-label">Pasien</label>
                            <select id="pasien" class="form-control" name="user_id" style="width: 100%;">
                                <option value="">Select Pasien</option>
                                @foreach ($pasiens as $pasien)
                                    <option value="{{ $pasien->id_user }}">
                                        {{ $pasien->nama }} ( {{ $pasien->email }} )
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
