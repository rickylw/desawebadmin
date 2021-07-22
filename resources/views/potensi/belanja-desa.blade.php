<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Belanja Desa</h1>
            <div>
                <a href="{{route('potensi.belanja-desa.daftar-belanja-desa')}}" class="btn btn-primary">Daftar Belanja</a>
            </div>
        </div>

        <!-- Content Row -->
        <form action="{{route('potensi.belanja-desa.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label" for="input-email">Tahun Anggaran</label>
                        <input type="number" name="tahunAnggaran" id="tahunAnggaran" class="form-control" value="0">
                    </div>
                </div>
            </div>

            <label class="form-control-label" for="input-username">Daftar Belanja Perbulan</label>
            
            @for($i = 0; $i < count($bulan); $i++)
                <div>
                    <p>{{$bulan[$i]}}</p>

                    <div class="{{$bulan[$i]}}" id="{{$bulan[$i]}}"></div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="number" name="belanjaDesa{{$bulan[$i]}}[]" id="belanjaDesa{{$bulan[$i]}}[]" class="form-control anggaran" value="0">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" id="kategori{{$bulan[$i]}}[]" name="kategori{{$bulan[$i]}}[]">        
                                        @foreach($kategoriBelanjaDesa as $kategori)       
                                            <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button"  onclick="education_fields('{{$bulan[$i]}}',{{$kategoriBelanjaDesa}});"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
            {{-- name="kategori[]" --}}

            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>

    </div>
        
    @endsection

    @section('contentjs')
        <script type="text/javascript" src="{{asset('js/belanjadesa.js')}}"></script>
    @endsection
</x-dashboard>