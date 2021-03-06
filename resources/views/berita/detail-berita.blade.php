<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Berita</h1>
        </div>

        <!-- Content Row -->
        <form action="{{route('berita.update', $berita->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="file">Judul</label>
                    <input type="text" name="judul" class="form-control" id="judul" value="{{$berita->judul}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="file">Kategori Berita</label>
                    <div class="dropdown">
                        <input type="hidden" name="namaKategori" id="namaKategori" value="{{$berita->nama_kategori}}">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="btnKategori" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$berita->nama_kategori}}
                        </button>
                        <div class="dropdown-menu" id="dropdown-kategori-berita" aria-labelledby="btnKategori">
                            @foreach ($kategoriBerita as $v)
                                <li><a class="dropdown-item" href="#">{{$v->nama}}</a></li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="file">Foto Berita</label>
                
                <div class="mb-4">
                    <img height="300px" src="{{asset($berita->foto)}}" alt="">
                </div>

                <input type="file" name="fotoBerita" class="form-control-file" id="fotoBerita">
            </div>
            
            <div class="form-group">
                <label for="file">Deskripsi Berita</label>
                <textarea class="editor form-control" name="editor" id="editor">
                    <?php echo $berita->isi ?>
                </textarea>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>

    </div>
        
    @endsection

    @section('contentjs')
    <script src="{{asset('js/berita.js')}}"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('ckeditor/adapters/jquery.js')}}"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'editor' );
    </script>
        
    @endsection
</x-dashboard>