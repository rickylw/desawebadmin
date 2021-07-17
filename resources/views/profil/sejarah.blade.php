<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sejarah</h1>
        </div>

        <!-- Content Row -->
        <form action="{{route('profil.sejarah.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="file">Foto Sejarah</label>
                
                <div class="mb-4">
                    @if($profil->gambar_sejarah != null)
                        <img height="300px" src="{{asset($profil->gambar_sejarah)}}" alt="">
                    @endif
                </div>

                <input type="file" name="post_sejarah" class="form-control-file" id="post_sejarah">
            </div>
            
            <div class="form-group">
                <label for="file">Deskripsi Sejarah</label>
                <textarea class="editor form-control" name="editor" id="editor">
                    @if($profil->sejarah != null)
                        {{$profil->sejarah}}
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