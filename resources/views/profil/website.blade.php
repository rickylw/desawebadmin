<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Website</h1>
        </div>

        @if (Session::has('profil-store-success'))
            <div class="alert alert-success">{{Session::get('profil-store-success')}}</div>
        @elseif (Session::has('profil-store-failed'))
            <div class="alert alert-danger">{{Session::get('profil-store-failed')}}</div>
        @endif

        <!-- Content Row -->
        <form action="{{route('profil.website.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")

            <div class="form-group">
                <label for="name">Judul</label>
                <input type="text" name="title" id="title" value="<?php echo ($website != null) ? $website->title : '' ?>" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="file">Deskripsi</label>
                <textarea class="editor form-control" name="editor" id="editor">
                    @if($website != null)
                        {{$website->description}}
                    @endif
                </textarea>
            </div>

            <div class="form-group">
                <label for="file">Logo Desa</label>
                
                <div class="mb-4">
                    @if($website != null)
                        <img height="300px" src="{{asset($website->logo_desa)}}" alt="">
                    @endif
                </div>

                <input type="file" name="logo_desa" class="form-control-file" id="logo_desa">
            </div>

            <div class="form-group">
                <label for="file">Logo Kecil</label>
                
                <div class="mb-4">
                    @if($website != null)
                        <img height="300px" src="{{asset($website->logo_kecil)}}" alt="">
                    @endif
                </div>

                <input type="file" name="logo_kecil" class="form-control-file" id="logo_kecil">
            </div>

            <div class="form-group">
                <label for="name">Facebook</label>
                <input type="text" name="facebook" id="facebook" value="<?php echo ($website != null) ? $website->facebook : '' ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="name">Instagram</label>
                <input type="text" name="instagram" id="instagram" value="<?php echo ($website != null) ? $website->instagram : '' ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="name">Youtube</label>
                <input type="text" name="youtube" id="youtube" value="<?php echo ($website != null) ? $website->youtube : '' ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="name">Twitter</label>
                <input type="text" name="twitter" id="twitter" value="<?php echo ($website != null) ? $website->twitter : '' ?>" class="form-control">
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