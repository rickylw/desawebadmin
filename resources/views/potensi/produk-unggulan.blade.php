<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produk Unggulan</h1>
            <a href="{{route('potensi.produk-unggulan.tambah')}}" class="btn btn-primary">Tambah Produk</a>
        </div>

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
                            <th>No</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
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