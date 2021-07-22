<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Anggaran</h1>
        </div>

        <div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Anggaran</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Anggaran Pendapatan</th>
                            <th>Realisasi Pendapatan</th>
                            <th>Realisasi Belanja</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($anggaran as $anggarans)
                            <tr>
                              <td>{{$anggarans->tahun_anggaran}}</td>
                              <td>Rp {{number_format($anggarans->anggaran_pendapatan)}}</td>
                              <td>Rp {{number_format($anggarans->realisasi_pendapatan)}}</td>
                              <td>Rp {{number_format($anggarans->realisasi_belanja)}}</td>
                              <td>
                                <form action="{{route('potensi.anggaran.detail-anggaran', $anggarans->tahun_anggaran)}}" method="GET">
                                    @csrf
                                    @method("GET")
                                    <button class="btn btn-primary" type="submit">Detail</button>
                                </form>   
                              </td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                            
                    <div>
                        <a href="{{$anggaran->previousPageUrl()}}">
                            <i class="fas fa-fw fa-chevron-left"></i>
                        </a>
                        @for($i=1;$i<=$anggaran->lastPage();$i++)
                            <a href="{{$anggaran->url($i)}}">{{$i}}</a>
                        @endfor
                        <a href="{{$anggaran->nextPageUrl()}}">
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