<style>
    #subMenu:hover{
        background-color: #f0f0f0;
    }
</style>

<nav style="background-color: #11667B; height: 25px">
    <div class="container">
        <div class="d-flex">
            <p class=" text-white me-auto" style="font-size: 0.8rem; padding-top: 2.5px">{{ \Carbon\Carbon::now()->locale('id')->translatedFormat('D, d M Y'); }}</p>
            <a class="text-white mx-2 text-decoration-none" style="font-size: 0.8rem; padding-top: 2.5px" href="https://pmb.tsu.ac.id/" target="_blank">
                <i class="bi bi-pencil-square"></i> <span class=" d-none d-md-inline-block d-lg-inline-block">Pendaftaran Mahasiswa Baru (</span>PMB<span class=" d-none d-md-inline-block d-lg-inline-block">)</span>
            </a>
            <div id="google_translate_element" style="transform: translateY(-2px); opacity: 70%;"></div>
        </div>
    </div>
</nav>

<nav class=" container navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/LogoFakultas.webp') }}" alt="Logo" width="160">
        </a>
        <button class="navbar-toggler border" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list icon-menu fs-4"></i>
            <i class="bi bi-x-lg icon-close"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto nav-underline fw-bold">

                <li class="nav-item dropdown">
                    <a class="nav-link px-1 dropdown-toggle {{ (Route::is('profil')) ? 'active' : '' }}" data-bs-toggle="dropdown" style="color: #11667B" href="#" role="button" aria-expanded="false">Profil</a>
                    <ul class="dropdown-menu">
                        <li><a id="subMenu" class="dropdown-item" style="color: #11667B" href="/tentang-kami">Tentang Kami</a></li>
                        <li><a id="subMenu" class="dropdown-item" style="color: #11667B" href="/daftar-dosen">Daftar Dosen</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link px-1 dropdown-toggle {{ (Route::is('program-studi')) ? 'active' : '' }}" data-bs-toggle="dropdown" style="color: #11667B" href="#" role="button" aria-expanded="false">Program Studi</a>
                    <ul class="dropdown-menu">
                        <li><a id="subMenu" class="dropdown-item"  style="color: #11667B" href="/studiInformatika">Informatika</a></li>
                        <li><a id="subMenu" class="dropdown-item"  style="color: #11667B" href="/studiSistemInformasi">Sistem Informasi</a></li>
                        <li><a id="subMenu" class="dropdown-item"  style="color: #11667B" href="/studiRekayasaKomputer">Rekayasa Komputer</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link px-1 dropdown-toggle {{ (Route::is('kemahasiswaan')) ? 'active' : '' }}" data-bs-toggle="dropdown" data-bs-auto-close="outside" style="color: #11667B" href="#" role="button" aria-expanded="false">Kemahasiswaan</a>
                    <ul class="dropdown-menu">
                        <li><a id="subMenu" class="dropdown-item" style="color: #11667B" href="/kemahasiswaanO&UKM">Organisasi & UKM</a></li>
                        <li><a id="subMenu" class="dropdown-item" style="color: #11667B" href="/kemahasiswaanLM">Layanan Mahasiswa</a></li>
                        <li class=" d-none d-lg-block">
                            <div class="btn-group dropend dropdown-item">
                                <a id="subMenu" class="dropdown-toggle fw-normal text-decoration-none w-100" style="color: #11667B" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    Jadwal Sidang/Seminar
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a id="subMenu" class="dropdown-item" style="color: #11667B" href="/jadwalSidang">Sidang Skripsi</a></li>
                                    <li><a id="subMenu" class="dropdown-item" style="color: #11667B" href="/jadwalSeminar">Seminar Kerja Praktek</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class=" d-block d-lg-none">
                            <div class="dropdown">
                                <a id="subMenu" class="dropdown-toggle fw-normal text-decoration-none dropdown-item" style="color: #11667B" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    Jadwal Sidang/Seminar
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a id="subMenu" class="dropdown-item" style="color: #11667B" href="/jadwalSidang">Sidang Skripsi</a></li>
                                    <li><a id="subMenu" class="dropdown-item" style="color: #11667B" href="/jadwalSeminar">Seminar Kerja Praktek</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a id="subMenu" class="dropdown-item" style="color: #11667B" href="https://sinus.siakadcloud.com" target="_blank">Sistem Informasi Akademik</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link px-1 dropdown-toggle {{ (Route::is('pusat-informasi')) ? 'active' : '' }}" data-bs-toggle="dropdown" style="color: #11667B" href="#" role="button" aria-expanded="false">Pusat Informasi</a>
                    <ul class="dropdown-menu">
                        <li><a id="subMenu" class="dropdown-item"  style="color: #11667B" href="/pusat-informasi">Informasi Terkini</a></li>
                        <li><a id="subMenu" class="dropdown-item"  style="color: #11667B" href="/dokumen">Dokumen</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link px-1 dropdown-toggle {{ (Route::is('riset&pengabdian')) ? 'active' : '' }}" data-bs-toggle="dropdown" style="color: #11667B" href="#" role="button" aria-expanded="false">Riset & Pengabdian</a>
                    <ul class="dropdown-menu">
                        <li><a id="subMenu" class="dropdown-item"  style="color: #11667B" href="/risetDosen">Riset</a></li>
                        <li><a id="subMenu" class="dropdown-item"  style="color: #11667B" href="/pengabdianDosen">Pengabdian</a></li>
                        <li><a id="subMenu" class="dropdown-item"  style="color: #11667B" href="/tugasAkhirMhs">Tugas Akhir Mahasiswa</a></li>
                        <li><a id="subMenu" class="dropdown-item"  style="color: #11667B" href="/publikasiMhs">Publikasi Mahasiswa</a></li>
                        <li><a id="subMenu" class="dropdown-item"  style="color: #11667B" href="/projectBasedLearning">Project Based Learning</a></li>
                    </ul>
                </li>

                <a class="nav-link px-1 {{ (Route::is('mitra')) ? 'active' : '' }}" style="color: #11667B" aria-current="page" href="/mitra">Mitra</a>
            </div>
        </div>
    </div>
</nav>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'id', 
            includedLanguages: 'en,ms,ja', // Pilih bahasa yang diinginkan
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>