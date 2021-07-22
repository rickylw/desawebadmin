<x-dashboard>
    @section('content')
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-3">
                    <form action="{{route('kategori.galeri.simpan')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="title">Nama Kategori</label>
                                <input type="text" name="name" id="name" class="form-control" aria-describedby="">
                            </div>    
                        </div>    
    
                        <button class="btn btn-block btn-primary">Tambah</button>
                    </form>
                </div>
                <div class="col-sm-9">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Kategori Galeri</h6>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Ubah</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $k = 1 ?>
                                  @foreach($kategoriGaleri as $kategori)
                                    <tr>
                                        <td>{{($kategoriGaleri->currentPage()-1) * $kategoriGaleri->perpage() + $k++}}</td>
                                        <td>{{$kategori->nama}}</td>
                                        <td>
                                            <form action="{{route('kategori.galeri.detail', $kategori->id)}}" method="POST">
                                                @csrf
                                                @method("POSt")
                                                <button class="btn btn-primary" type="submit">Ubah</button>
                                            </form>    
                                        </td>
                                    </tr>
                                  @endforeach
                              </tbody>
                            </table>
                            
                            <div>
                                <a href="{{$kategoriGaleri->previousPageUrl()}}">
                                    <i class="fas fa-fw fa-chevron-left"></i>
                                </a>
                                @for($i=1;$i<=$kategoriGaleri->lastPage();$i++)
                                    <a href="{{$kategoriGaleri->url($i)}}">{{$i}}</a>
                                @endfor
                                <a href="{{$kategoriGaleri->nextPageUrl()}}">
                                    <i class="fas fa-fw fa-chevron-right"></i>
                                </a>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
</x-dashboard>