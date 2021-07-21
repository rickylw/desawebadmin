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
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Anggaran Pendapatan</label>
                        <input type="number" name="anggaranPendapatan" id="anggaranPendapatan" class="form-control" placeholder="Username" value="0" readonly>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label" for="input-email">Realisasi Pendapatan</label>
                        <input type="number" name="realisasiPendapatan" id="realisasiPendapatan" class="form-control" value="0">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label" for="input-email">Realisasi Belanja</label>
                        <input type="number" name="realisasiBelanja" id="realisasiBelanja" class="form-control" value="0">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label" for="input-email">Tahun Anggaran</label>
                        <input type="number" name="tahunAnggaran" id="tahunAnggaran" class="form-control" value="0">
                    </div>
                </div>
            </div>

            <label class="form-control-label" for="input-username">Anggaran Perbulan</label>
            
            @for($i = 0; $i < count($bulan); $i++)
                <div>
                    <p>{{$bulan[$i]}}</p>

                    <div class="{{$bulan[$i]}}" id="{{$bulan[$i]}}"></div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="number" name="anggaranPendapatan{{$bulan[$i]}}[]" id="anggaranPendapatan{{$bulan[$i]}}[]" class="form-control anggaran" value="0">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" id="kategori{{$bulan[$i]}}[]" name="kategori{{$bulan[$i]}}[]">        
                                        @foreach($kategoriAnggaran as $kategori)       
                                            <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button"  onclick="education_fields('{{$bulan[$i]}}',{{$kategoriAnggaran}});"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
            {{-- name="kategori[]" --}}

            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>

    </div>
        
    @endsection

    @section('contentjs')
        <script type="text/javascript" src="{{asset('js/anggaran.js')}}"></script>
    @endsection
</x-dashboard>