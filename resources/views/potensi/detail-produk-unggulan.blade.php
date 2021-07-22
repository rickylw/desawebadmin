<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produk Unggulan</h1>
        </div>

        <!-- Content Row -->
        <form action="{{route('potensi.produk-unggulan.update', $produkUnggulan->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="file">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{$produkUnggulan->nama}}">
                </div>
            </div>

            <div class="form-group">
                <label for="file">Foto Produk</label>
                
                <div class="mb-4">
                    <img height="300px" src="{{asset($produkUnggulan->foto)}}" alt="">
                </div>

                <input type="file" name="fotoProduk" class="form-control-file" id="fotoProduk">
            </div>
            
            <div class="form-group">
                <label for="file">Deskripsi Produk</label>
                <textarea class="editor form-control" name="editor" id="editor">
                    <?php echo $produkUnggulan->deskripsi ?>
                </textarea>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>

    </div>
        
    @endsection

    @section('contentjs')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('ckeditor/adapters/jquery.js')}}"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'editor' );
    </script>
        
    @endsection
</x-dashboard>