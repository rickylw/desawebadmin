<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Masyarakat</h1>
        </div>

        <!-- Content Row -->
        <form action="{{route('pengguna.masyarakat.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="file">Username</label>
                    <input type="text" name="username" class="form-control" id="username">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="file">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="file">Password Confirmation</label>
                    <input type="password" name="passwordConfirmation" class="form-control" id="passwordConfirmation">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="file">NIK</label>
                    <input type="text" name="nik" class="form-control" id="nik">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="file">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="file">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="file">No HP</label>
                    <input type="text" name="nohp" class="form-control" id="nohp">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="file">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>

    </div>
        
    @endsection
</x-dashboard>