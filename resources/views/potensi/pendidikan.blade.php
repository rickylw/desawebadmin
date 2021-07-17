<x-dashboard>
    @section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kependudukan</h1>
        </div>

        <!-- Content Row -->
        <form action="{{route('potensi.pendidikan.simpan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Belum Sekolah</label>
                    <input type="text" name="laki_belum_sekolah" id="laki_belum_sekolah" class="form-control" aria-describedby="" value="{{$pendidikan->laki_belum_sekolah}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Belum Sekolah</label>
                    <input type="text" name="perempuan_belum_sekolah" id="perempuan_belum_sekolah" class="form-control" aria-describedby="" value="{{$pendidikan->perempuan_belum_sekolah}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Tamat SD</label>
                    <input type="text" name="laki_tamat_sd" id="laki_tamat_sd" class="form-control" aria-describedby="" value="{{$pendidikan->laki_tamat_sd}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Tamat SD</label>
                    <input type="text" name="perempuan_tamat_sd" id="perempuan_tamat_sd" class="form-control" aria-describedby="" value="{{$pendidikan->perempuan_tamat_sd}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Tamat SMP</label>
                    <input type="text" name="laki_tamat_smp" id="laki_tamat_smp" class="form-control" aria-describedby="" value="{{$pendidikan->laki_tamat_smp}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Tamat SD</label>
                    <input type="text" name="perempuan_tamat_smp" id="perempuan_tamat_smp" class="form-control" aria-describedby="" value="{{$pendidikan->perempuan_tamat_smp}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Tamat SMA</label>
                    <input type="text" name="laki_tamat_sma" id="laki_tamat_sma" class="form-control" aria-describedby="" value="{{$pendidikan->laki_tamat_sma}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Tamat SD</label>
                    <input type="text" name="perempuan_tamat_sma" id="perempuan_tamat_sma" class="form-control" aria-describedby="" value="{{$pendidikan->perempuan_tamat_sma}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Tamat PT</label>
                    <input type="text" name="laki_tamat_pt" id="laki_tamat_pt" class="form-control" aria-describedby="" value="{{$pendidikan->laki_tamat_pt}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Tamat SD</label>
                    <input type="text" name="perempuan_tamat_pt" id="perempuan_tamat_pt" class="form-control" aria-describedby="" value="{{$pendidikan->perempuan_tamat_pt}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">Laki-Laki Tidak Diketahui</label>
                    <input type="text" name="laki_tidak_diketahui" id="laki_tidak_diketahui" class="form-control" aria-describedby="" value="{{$pendidikan->laki_tidak_diketahui}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Perempuan Tidak Diketahui</label>
                    <input type="text" name="perempuan_tidak_diketahui" id="perempuan_tidak_diketahui" class="form-control" aria-describedby="" value="{{$pendidikan->perempuan_tidak_diketahui}}">
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>

    </div>
        
    @endsection
</x-dashboard>