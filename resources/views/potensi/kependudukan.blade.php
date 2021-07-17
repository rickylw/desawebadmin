<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kependudukan</h1>
        </div>

        <!-- Content Row -->
        <form action="{{route('potensi.kependudukan.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            
            <div class="form-group">
                <label for="title">Usia Produktif</label>
                <input type="text" name="usia_produktif" id="usia_produktif" class="form-control" aria-describedby="" value="{{$kependudukan->usia_produktif}}">
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Dibawah Umur 15 Tahun</label>
                    <input type="text" name="laki_15" id="laki_15" class="form-control" aria-describedby="" value="{{$kependudukan->laki_15}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Dibawah Umur 15 Tahun</label>
                    <input type="text" name="perempuan_15" id="perempuan_15" class="form-control" aria-describedby="" value="{{$kependudukan->perempuan_15}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Diantara Umur 15 - 25 Tahun</label>
                    <input type="text" name="laki_25" id="laki_25" class="form-control" aria-describedby="" value="{{$kependudukan->laki_25}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Diantara Umur 15 - 25 Tahun</label>
                    <input type="text" name="perempuan_25" id="perempuan_25" class="form-control" aria-describedby="" value="{{$kependudukan->perempuan_25}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Diantara Umur 25 - 35 Tahun</label>
                    <input type="text" name="laki_35" id="laki_35" class="form-control" aria-describedby="" value="{{$kependudukan->laki_35}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Diantara Umur 25 - 35 Tahun</label>
                    <input type="text" name="perempuan_35" id="perempuan_35" class="form-control" aria-describedby="" value="{{$kependudukan->perempuan_35}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Diantara Umur 35 - 45 Tahun</label>
                    <input type="text" name="laki_45" id="laki_45" class="form-control" aria-describedby="" value="{{$kependudukan->laki_45}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Diantara Umur 35 - 45 Tahun</label>
                    <input type="text" name="perempuan_45" id="perempuan_45" class="form-control" aria-describedby="" value="{{$kependudukan->perempuan_45}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Diantara Umur 45 - 55 Tahun</label>
                    <input type="text" name="laki_55" id="laki_55" class="form-control" aria-describedby="" value="{{$kependudukan->laki_55}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Diantara Umur 45 - 55 Tahun</label>
                    <input type="text" name="perempuan_55" id="perempuan_55" class="form-control" aria-describedby="" value="{{$kependudukan->perempuan_55}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Diantara Umur 55 - 65 Tahun</label>
                    <input type="text" name="laki_65" id="laki_65" class="form-control" aria-describedby="" value="{{$kependudukan->laki_65}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Diantara Umur 55 - 65 Tahun</label>
                    <input type="text" name="perempuan_65" id="perempuan_65" class="form-control" aria-describedby="" value="{{$kependudukan->perempuan_65}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Diatas Umur 65 Tahun</label>
                    <input type="text" name="laki_atas" id="laki_atas" class="form-control" aria-describedby="" value="{{$kependudukan->laki_atas}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Diatas Umur 65 Tahun</label>
                    <input type="text" name="perempuan_atas" id="perempuan_atas" class="form-control" aria-describedby="" value="{{$kependudukan->perempuan_atas}}">
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>

    </div>
        
    @endsection
</x-dashboard>