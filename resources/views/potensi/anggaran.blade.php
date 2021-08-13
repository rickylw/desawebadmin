<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Anggaran</h1>
            <div>
                <a href="{{route('potensi.anggaran.daftar-anggaran')}}" class="btn btn-primary">Daftar Anggaran</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> @endforeach
            </ul>
        </div> @endif

        @if (Session::has('potensi-store-success'))
            <div class="alert alert-success">{{Session::get('potensi-store-success')}}</div>
        @elseif (Session::has('potensi-store-failed'))
            <div class="alert alert-danger">{{Session::get('potensi-store-failed')}}</div>
        @elseif (Session::has('potensi-update-success'))
            <div class="alert alert-success">{{Session::get('potensi-update-success')}}</div>
        @elseif (Session::has('potensi-update-failed'))
            <div class="alert alert-danger">{{Session::get('potensi-update-failed')}}</div>
        @endif

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