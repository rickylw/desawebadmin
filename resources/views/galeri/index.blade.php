<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Galeri</h1>
            <a href="{{route('galeri.tambah')}}" class="btn btn-primary">Tambah Galeri</a>
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
                            <th>Kategori Galeri</th>
                            <th>Jumlah Galeri</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($galeri as $v)
                            <tr>
                            <td>{{$v->nama_kategori}}</td>
                            <td>{{number_format($v->jumlah)}}</td>
                            <td>
                                <form action="{{route('galeri.daftar-galeri', $v->id_kategori_galeri)}}" method="GET">
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
</x-dashboard>