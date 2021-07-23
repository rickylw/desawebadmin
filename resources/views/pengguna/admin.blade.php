<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin</h1>
            <a class="btn btn-primary text-light" href="{{route('pengguna.admin.tambah')}}">Tambah Admin</a>
        </div>

        <div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Admin</h6>
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
                          @foreach($admin as $v)
                            <tr>
                              <td>{{($admin->currentPage()-1) * $admin->perpage() + $k++}}</td>
                              <td>{{$v->username}}</td>
                              <td>{{$v->nik}}</td>
                              <td>{{$v->nama}}</td>
                              <td>{{$v->alamat}}</td>
                              <td>{{$v->nohp}}</td>
                              <td>
                                <form action="{{route('pengguna.admin.detail', $v->id)}}" method="GET">
                                    @csrf
                                    @method("GET")
                                    <button class="btn btn-primary" type="submit">Detail</button>
                                </form>   
                                <form action="{{route('pengguna.admin.hapus', $v->id)}}" method="POST">
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
                        <a href="{{$admin->previousPageUrl()}}">
                            <i class="fas fa-fw fa-chevron-left"></i>
                        </a>
                        @for($i=1;$i<=$admin->lastPage();$i++)
                            <a href="{{$admin->url($i)}}">{{$i}}</a>
                        @endfor
                        <a href="{{$admin->nextPageUrl()}}">
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