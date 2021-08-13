<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Masyarakat</h1>
            <a class="btn btn-primary text-light" href="{{route('pengguna.masyarakat.tambah')}}">Tambah Masyarakat</a>
        </div>

        @if (Session::has('pengguna-store-success'))
            <div class="alert alert-success">{{Session::get('pengguna-store-success')}}</div>
        @elseif (Session::has('pengguna-store-failed'))
            <div class="alert alert-danger">{{Session::get('pengguna-store-failed')}}</div>
        @elseif (Session::has('pengguna-delete-success'))
            <div class="alert alert-success">{{Session::get('pengguna-delete-success')}}</div>
        @elseif (Session::has('pengguna-delete-failed'))
            <div class="alert alert-danger">{{Session::get('pengguna-delete-failed')}}</div>
        @elseif (Session::has('pengguna-update-success'))
            <div class="alert alert-success">{{Session::get('pengguna-update-success')}}</div>
        @elseif (Session::has('pengguna-update-failed'))
            <div class="alert alert-danger">{{Session::get('pengguna-update-failed')}}</div>
        @endif

        <div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Masyarakat</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: 15%">Username</th>
                            <th style="width: 20%">NIK</th>
                            <th style="width: 25%">Nama</th>
                            <th style="width: 15%">Alamat</th>
                            <th style="width: 20%">No Hp</th>
                            <th style="width: 10%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $k = 1 ?>
                          @foreach($masyarakat as $v)
                            <tr>
                              <td>{{($masyarakat->currentPage()-1) * $masyarakat->perpage() + $k++}}</td>
                              <td>{{$v->username}}</td>
                              <td>{{$v->nik}}</td>
                              <td>{{$v->nama}}</td>
                              <td>{{$v->alamat}}</td>
                              <td>{{$v->nohp}}</td>
                              <td>
                                <form action="{{route('pengguna.masyarakat.detail', $v->id)}}" method="GET">
                                    @csrf
                                    @method("GET")
                                    <button class="btn btn-primary" type="submit">Detail</button>
                                </form>   
                                <form action="{{route('pengguna.masyarakat.hapus', $v->id)}}" method="POST">
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
                        <a href="{{$masyarakat->previousPageUrl()}}">
                            <i class="fas fa-fw fa-chevron-left"></i>
                        </a>
                        @for($i=1;$i<=$masyarakat->lastPage();$i++)
                            <a href="{{$masyarakat->url($i)}}">{{$i}}</a>
                        @endfor
                        <a href="{{$masyarakat->nextPageUrl()}}">
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