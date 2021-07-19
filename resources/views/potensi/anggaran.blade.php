<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Anggaran</h1>
        </div>

        <!-- Content Row -->
        <form action="{{route('potensi.anggaran.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Anggaran Pendapatan</label>
                        <input type="number" name="anggaranPendapatan" id="anggaranPendapatan" class="form-control" placeholder="Username" value="0" readonly>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-email">Realisasi Pendapatan</label>
                        <input type="number" name="realisasiPendapatan" id="realisasiPendapatan" class="form-control" value="0">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-email">Realisasi Belanja</label>
                        <input type="number" name="realisasiBelanja" id="realisasiBelanja" class="form-control" value="0">
                    </div>
                </div>
            </div>
            {{-- name="kategori[]" --}}

            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>

    </div>
        
    @endsection
</x-dashboard>