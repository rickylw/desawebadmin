<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Galeri</h1>
        </div>

        <div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Galeri</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th style="width: 10%">No</th>
                            <th style="width: 40%">Foto</th>
                            <th style="width: 30%">Deskripsi</th>
                            <th style="width: 15%">Dibuat</th>
                            <th style="width: 5%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $k = 1 ?>
                          @foreach($galeri as $v)
                            <tr>
                              <td>{{($galeri->currentPage()-1) * $galeri->perpage() + $k++}}</td>
                              <td>
                                <div class="text-center">
                                    <img height="150px" src="{{asset($v->foto)}}" alt="">
                                </div>
                              </td>
                              <td>
                                <div class="text-ellipsis-4 isi-justify">
                                    <?php echo $v->deskripsi ?>
                                </div>
                              </td>
                              <td>{{$v->dibuat}}</td>
                              <td>
                                <form action="{{route('galeri.detail-galeri', $v->id)}}" method="GET">
                                    @csrf
                                    @method("GET")
                                    <button class="btn btn-primary" type="submit">Detail</button>
                                </form>  
                                <form action="{{route('galeri.hapus', $v->id)}}" method="POST">
                                    @csrf
                                    @method("POST")
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form> 
                              </td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                            
                    <div>
                        <a href="{{$galeri->previousPageUrl()}}">
                            <i class="fas fa-fw fa-chevron-left"></i>
                        </a>
                        @for($i=1;$i<=$galeri->lastPage();$i++)
                            <a href="{{$galeri->url($i)}}">{{$i}}</a>
                        @endfor
                        <a href="{{$galeri->nextPageUrl()}}">
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