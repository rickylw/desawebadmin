<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Anggaran Tahun {{$detailAnggaran[0]->tahun_anggaran}}</h1>
        </div>

        <!-- Content Row -->
        <form action="{{route('potensi.anggaran.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <input type="hidden" name="tahunAnggaranLama" id="tahunAnggaranLama" value="{{$detailAnggaran[0]->tahun_anggaran}}">

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Anggaran Pendapatan</label>
                        <input type="number" name="anggaranPendapatan" id="anggaranPendapatan" class="form-control" value="{{$anggaran[0]->anggaran_pendapatan}}" readonly>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label" for="input-email">Realisasi Pendapatan</label>
                        <input type="number" name="realisasiPendapatan" id="realisasiPendapatan" class="form-control" value="{{$anggaran[0]->realisasi_pendapatan}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label" for="input-email">Realisasi Belanja</label>
                        <input type="number" name="realisasiBelanja" id="realisasiBelanja" class="form-control" value="{{$anggaran[0]->realisasi_belanja}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label" for="input-email">Tahun Anggaran</label>
                        <input type="number" name="tahunAnggaran" id="tahunAnggaran" class="form-control" value="{{$anggaran[0]->tahun_anggaran}}">
                    </div>
                </div>
            </div>

            <label class="form-control-label" for="input-username">Anggaran Perbulan</label>
            
            @for($i = 0; $i < count($bulan); $i++)
                <div>
                    <p>{{$bulan[$i]}}</p>

                    <div class="{{$bulan[$i]}}" id="{{$bulan[$i]}}"></div>
                                     
                    <?php $k = 0 ?>

                    @foreach ($detailAnggaran as $v)
                        @if ($v->bulan == $i+1)
                            <?php $k++?>
                            <div class="row remove{{$v->id}}">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="number" name="anggaranPendapatan{{$bulan[$i]}}[]" id="anggaranPendapatan{{$bulan[$i]}}[]" class="form-control anggaran" value="{{$v->jumlah}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control" id="kategori{{$bulan[$i]}}[]" name="kategori{{$bulan[$i]}}[]">        
                                                @foreach($kategoriAnggaran as $kategori)       
                                                    <option value="{{$kategori->id}}"
                                                        @if ($v->id_kategori_anggaran == $kategori->id)
                                                            selected
                                                        @endif
                                                        >{{$kategori->nama}}</option>
                                                @endforeach
                                            </select>
                                            @if ($k == 1)
                                                <div class="input-group-append">
                                                    <button class="btn btn-success" type="button"  onclick="education_fields('{{$bulan[$i]}}',{{$kategoriAnggaran}});"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                                </div>
                                            @else
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger" type="button"  onclick="remove_field('{{$v->id}}');"> <span class="fa fa-minus" aria-hidden="true"></span> </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        @endif
                    @endforeach                    
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