<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Struktur Organisasi</h1>
        </div>

        <!-- Content Row -->
        <form action="{{route('organisasi.struktur-organisasi.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="file">Foto Struktur Organisasi</label>
                
                <div class="mb-4">
                    @if($organisasi->gambar_struktur != null)
                        <img height="300px" src="{{asset($organisasi->gambar_struktur)}}" alt="">
                    @endif
                </div>

                <input type="file" name="post_struktur" class="form-control-file" id="post_struktur">
            </div>
            
            <div class="form-group">
                <label for="file">Deskripsi Struktur Organisasi</label>
                <textarea class="editor form-control" name="editor" id="editor">
                    @if($organisasi->struktur != null)
                        {{$organisasi->struktur}}
                    @endif
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