<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produk Unggulan</h1>
            <a href="{{route('potensi.produk-unggulan.tambah')}}" class="btn btn-primary">Tambah Produk</a>
        </div>

        @if (Session::has('potensi-store-success'))
            <div class="alert alert-success">{{Session::get('potensi-store-success')}}</div>
        @elseif (Session::has('potensi-store-failed'))
            <div class="alert alert-danger">{{Session::get('potensi-store-failed')}}</div>
        @elseif (Session::has('potensi-update-success'))
            <div class="alert alert-success">{{Session::get('potensi-update-success')}}</div>
        @elseif (Session::has('potensi-update-failed'))
            <div class="alert alert-danger">{{Session::get('potensi-update-failed')}}</div>
        @elseif (Session::has('potensi-delete-success'))
            <div class="alert alert-success">{{Session::get('potensi-delete-success')}}</div>
        @elseif (Session::has('potensi-delete-failed'))
            <div class="alert alert-danger">{{Session::get('potensi-delete-failed')}}</div>
        @endif

        <div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Produk Unggulan</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th style="width:5%">No</th>
                            <th style="width:15%">Nama</th>
                            <th style="width:30%">Foto</th>
                            <th style="width:40%">Deskripsi</th>
                            <th style="width:10%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $k = 1 ?>
                          @foreach($produkUnggulan as $v)
                            <tr>
                              <td>{{($produkUnggulan->currentPage()-1) * $produkUnggulan->perpage() + $k++}}</td>
                              <td>{{$v->nama}}</td>
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
                              <td>
                                <div class="row">
                                  <form class="col" action="{{route('potensi.produk-unggulan.detail', $v->id)}}" method="POST">
                                      @csrf
                                      @method("POST")
                                      <button class="btn btn-primary" type="submit">Detail</button>
                                  </form>
                                  <form class="col" action="{{route('potensi.produk-unggulan.hapus', $v->id)}}" method="POST">
                                      @csrf
                                      @method("POST")
                                      <button class="btn btn-danger" type="submit">Hapus</button>
                                  </form>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                    <div>
                        <a href="{{$produkUnggulan->previousPageUrl()}}">
                            <i class="fas fa-fw fa-chevron-left"></i>
                        </a>
                        @for($i=1;$i<=$produkUnggulan->lastPage();$i++)
                            <a href="{{$produkUnggulan->url($i)}}">{{$i}}</a>
                        @endfor
                        <a href="{{$produkUnggulan->nextPageUrl()}}">
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