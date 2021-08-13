<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Wilayah Geografis</h1>
        </div>

        @if (Session::has('profil-store-success'))
            <div class="alert alert-success">{{Session::get('profil-store-success')}}</div>
        @elseif (Session::has('profil-store-failed'))
            <div class="alert alert-danger">{{Session::get('profil-store-failed')}}</div>
        @endif

        <!-- Content Row -->
        <form action="{{route('profil.wilayah-geografis.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="file">Foto Wilayah Geografis</label>
                
                <div class="mb-4">
                    @if($profil->gambar_geografis != null)
                        <img height="300px" src="{{asset($profil->gambar_geografis)}}" alt="">
                    @endif
                </div>

                <input type="file" name="post_geografis" class="form-control-file" id="post_geografis">
            </div>
            
            <div class="form-group">
                <label for="file">Deskripsi Geografis</label>
                <textarea class="editor form-control" name="editor" id="editor">
                    @if($profil->geografis != null)
                        {{$profil->geografis}}
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