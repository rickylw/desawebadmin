<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Visi Misi</h1>
        </div>

        @if (Session::has('organisasi-store-success'))
            <div class="alert alert-success">{{Session::get('organisasi-store-success')}}</div>
        @elseif (Session::has('organisasi-store-failed'))
            <div class="alert alert-danger">{{Session::get('organisasi-store-failed')}}</div>
        @endif

        <!-- Content Row -->
        <form action="{{route('organisasi.visi-misi.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="file">Foto Visi Misi</label>
                
                <div class="mb-4">
                    @if($organisasi->gambar_visi_misi != null)
                        <img height="300px" src="{{asset($organisasi->gambar_visi_misi)}}" alt="">
                    @endif
                </div>

                <input type="file" name="post_visi_misi" class="form-control-file" id="post_visi_misi">
            </div>
            
            <div class="form-group">
                <label for="file">Deskripsi  Visi Misi</label>
                <textarea class="editor form-control" name="editor" id="editor">
                    @if($organisasi->visi_misi != null)
                        {{$organisasi->visi_misi}}
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