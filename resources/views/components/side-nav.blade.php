<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Desa Web</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Informasi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#profil"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Profil</span>
        </a>
        <div id="profil" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('profil.sejarah')}}">Sejarah</a>
                <a class="collapse-item" href="{{route('profil.wilayah-geografis')}}">Wilayah Geografis</a>
                <a class="collapse-item" href="{{route('profil.website')}}">Website</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orgnisasi"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Organisasi</span>
        </a>
        <div id="orgnisasi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('organisasi.struktur-organisasi')}}">Struktur Organisasi</a>
                <a class="collapse-item" href="{{route('organisasi.visi-misi')}}">Visi Misi</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kategori"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kategori</span>
        </a>
        <div id="kategori" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('kategori.anggaran')}}">Anggaran Pendapatan</a>
                <a class="collapse-item" href="{{route('kategori.belanja-desa')}}">Belanja Desa</a>
                <a class="collapse-item" href="{{route('kategori.berita')}}">Berita</a>
                <a class="collapse-item" href="{{route('kategori.galeri')}}">Galeri</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#potensi"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Potensi</span>
        </a>
        <div id="potensi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('potensi.kependudukan')}}">Kependudukan</a>
                <a class="collapse-item" href="{{route('potensi.pendidikan')}}">Pendidikan</a>
                <a class="collapse-item" href="{{route('potensi.anggaran')}}">Anggaran</a>
                <a class="collapse-item" href="{{route('potensi.belanja-desa')}}">Belanja Desa</a>
                <a class="collapse-item" href="{{route('potensi.produk-unggulan')}}">Produk Unggulan</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#berita"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Berita</span>
        </a>
        <div id="berita" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('berita.index')}}">Berita</a>
                <a class="collapse-item" href="{{route('galeri.index')}}">Galeri</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengguna"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengguna</span>
        </a>
        <div id="pengguna" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('pengguna.masyarakat')}}">Masyarakat</a>
                <a class="collapse-item" href="{{route('pengguna.admin')}}">Admin</a>
            </div>
        </div>
    </li>

</ul>