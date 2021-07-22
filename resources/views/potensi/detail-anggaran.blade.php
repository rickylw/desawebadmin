<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Anggaran Tahun {{$detailAnggaran[0]->tahun_anggaran}}</h1>
            <a href="{{route('potensi.anggaran.ubah', $detailAnggaran[0]->tahun_anggaran)}}" class="btn btn-primary">Ubah</a>
        </div>

        <div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Detail Anggaran</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Anggaran</th>
                            <th>Bulan</th>
                            <th>Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $k = 1 ?>
                          @foreach($detailAnggaran as $v)
                            <tr>
                              <td>{{($detailAnggaran->currentPage()-1) * $detailAnggaran->perpage() + $k++}}</td>
                              <td>{{$kategoriAnggaran[$v->id_kategori_anggaran-1]}}</td>
                              <td>{{$bulan[$v->bulan-1]}}</td>
                              <td>Rp {{number_format($v->jumlah)}}</td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                            
                    <div>
                        <a href="{{$detailAnggaran->previousPageUrl()}}">
                            <i class="fas fa-fw fa-chevron-left"></i>
                        </a>
                        @for($i=1;$i<=$detailAnggaran->lastPage();$i++)
                            <a href="{{$detailAnggaran->url($i)}}">{{$i}}</a>
                        @endfor
                        <a href="{{$detailAnggaran->nextPageUrl()}}">
                            <i class="fas fa-fw fa-chevron-right"></i>
                        </a>
                    </div>
                  </div>
                </div>
            </div>
        </div>

    </div>
        
    @endsection

    @section('contentjs')
        <script type="text/javascript" src="{{asset('js/anggaran.js')}}"></script>
    @endsection
</x-dashboard>