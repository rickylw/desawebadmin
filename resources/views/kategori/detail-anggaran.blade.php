<x-dashboard>
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Edit Kategori {{$kategoriAnggaran->nama}}</h3>
        
                    <form action="{{route('kategori.anggaran.ubah', $kategoriAnggaran->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input type="text" name="name" id="name" value="{{$kategoriAnggaran->nama}}" class="form-control">
                        </div>
        
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</x-dashboard>