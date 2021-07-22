<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produk Unggulan</h1>
            <a href="" class="btn btn-primary">Tambah Produk</a>
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
                        </tr>
                      </thead>
                      <tbody>
                          {{-- @foreach($detailBelanjaDesa as $v)
                            <tr>
                              <td>{{$v->tahun_anggaran}}</td>
                              <td>Rp {{number_format($v->total)}}</td>
                              <td>
                                <form action="{{route('potensi.belanja-desa.detail-belanja-desa', $v->tahun_anggaran)}}" method="POST">
                                    @csrf
                                    @method("POST")
                                    <button class="btn btn-primary" type="submit">Detail</button>
                                </form>   
                              </td>
                            </tr>
                          @endforeach --}}
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

    </div>
        
    @endsection
</x-dashboard>