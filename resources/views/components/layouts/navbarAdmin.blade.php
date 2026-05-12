<style>
    @media (min-width: 992px) {
        .offcanvas-lg {
            transform: none !important;
            visibility: visible !important;
            position: sticky !important;
            top: 0;
            height: 100vh;
            min-width: 20%;
            border-right: 1px solid #e9ecef;
            overflow-y: auto !important;
            scrollbar-width: thin;
            background-color: #ffffff;
        }

        .offcanvas-backdrop {
            display: none !important;
        }

        .offcanvas-lg::-webkit-scrollbar {
            width: 6px;
        }
        .offcanvas-lg::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 10px;
        }
    }

    .nav-link[aria-expanded="true"] .chevron-icon {
        transform: rotate(180deg);
        transition: transform 0.3s ease;
    }
    .nav-link[aria-expanded="false"] .chevron-icon {
        transform: rotate(0deg);
        transition: transform 0.3s ease;
    }
    
    .sidebar-link:hover:not(.bg-primary) {
        background-color: #f8f9fa;
        color: #11667B !important;
    }
</style>

<div class="d-flex">
    <div class="offcanvas-lg offcanvas-start pe-2" style="min-width: 260px" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="sidebarAdmin">
        <div class="offcanvas-header border-bottom py-3">
            <a href="{{ url('/home') }}" class="d-block w-100 text-center">
                <img src="{{ asset('images/LogoFakultas.webp') }}" alt="Logo Fakultas" width="160" class="img-fluid">
            </a>
            <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" data-bs-target="#sidebarAdmin"></button>
        </div>

        <div class="offcanvas-body py-3">
            <ul class="nav nav-pills flex-column mb-auto w-100 gap-1">
                <div class="border-bottom py-3 d-none d-lg-block">
                    <a href="{{ url('/home') }}" class="d-block w-100 text-center">
                        <img src="{{ asset('images/LogoFakultas.webp') }}" alt="Logo Fakultas" width="160" class="img-fluid">
                    </a>
                </div>
                
                <li class="nav-item">
                    <a class="nav-link fw-semibold d-flex align-items-center justify-content-between text-dark sidebar-link rounded-3" data-bs-toggle="collapse" href="#beranda" role="button" aria-expanded="{{ Route::is(['heroes.*', 'testimonies.*']) ? 'true' : 'false' }}">
                        <span><i class="bi bi-house-door me-2" style="color: #11667B;"></i> Beranda</span>
                        <i class="bi bi-chevron-down chevron-icon ms-auto" style="font-size: 0.85rem;"></i>
                    </a>
                    <div class="collapse {{ Route::is(['heroes.*', 'testimonies.*']) ? 'show' : '' }} mt-1" id="beranda">
                        <ul class="nav nav-pills flex-column ps-4 gap-1">
                            <li class="nav-item">
                                <a href="/heroes" class="nav-link rounded-3 py-2 {{ Route::is('heroes.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Hero Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="/testimonies" class="nav-link rounded-3 py-2 {{ Route::is('testimonies.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Testimoni</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold d-flex align-items-center justify-content-between text-dark sidebar-link rounded-3" data-bs-toggle="collapse" href="#profil" role="button" aria-expanded="{{ Route::is(['lecturers.*', 'profil', 'jurnalDosen']) ? 'true' : 'false' }}">
                        <span><i class="bi bi-building me-2" style="color: #11667B;"></i> Profil Fakultas</span>
                        <i class="bi bi-chevron-down chevron-icon ms-auto" style="font-size: 0.85rem;"></i>
                    </a>
                    <div class="collapse {{ Route::is(['lecturers.*', 'profil', 'jurnalDosen']) ? 'show' : '' }} mt-1" id="profil">
                        <ul class="nav nav-pills flex-column ps-4 gap-1">
                            <li class="nav-item">
                                <a href="/adminProfil" class="nav-link rounded-3 py-2 {{ Route::is('profil') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a href="/lecturers" class="nav-link rounded-3 py-2 {{ Route::is('lecturers.*', 'jurnalDosen') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Daftar Dosen</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold d-flex align-items-center justify-content-between text-dark sidebar-link rounded-3" data-bs-toggle="collapse" href="#studi" role="button" aria-expanded="false">
                        <span><i class="bi bi-book me-2" style="color: #11667B;"></i> Program Studi</span>
                        <i class="bi bi-chevron-down chevron-icon ms-auto" style="font-size: 0.85rem;"></i>
                    </a>
                    <div class="collapse {{ Route::is(['studi', 'kurikulum', 'studies.cpls*', 'studies.subjects*']) ? 'show' : '' }} mt-1" id="studi">
                        <ul class="nav nav-pills flex-column ps-3 gap-1">
                            
                            <li class="nav-item">
                                <a class="nav-link py-2 d-flex justify-content-between align-items-center {{ request()->is(['adminStudi/informatika', 'adminKurikulum/1', 'studies/1/cpls*', 'studies/1/subjects*']) ? 'fw-bold text-primary bg-light rounded-3' : 'text-secondary sidebar-link rounded-3' }}" data-bs-toggle="collapse" href="#informatika" role="button" aria-expanded="false">
                                    <span><i class="bi bi-dot"></i> Informatika</span>
                                    <i class="bi bi-chevron-down chevron-icon" style="font-size: 0.7rem;"></i>
                                </a>
                                <div class="collapse {{ request()->is(['adminStudi/informatika', 'adminKurikulum/1', 'studies/1/cpls*', 'studies/1/subjects*']) ? 'show' : '' }}" id="informatika">
                                    <ul class="nav flex-column ps-4 py-1 border-start ms-2 mb-2 gap-1">
                                        <li><a class="nav-link p-1 px-2 rounded-2 small {{ request()->is('adminStudi/informatika') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-muted sidebar-link' }}" href="/adminStudi/informatika">Profil Prodi</a></li>
                                        <li><a class="nav-link p-1 px-2 rounded-2 small {{ request()->is('adminKurikulum/1') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-muted sidebar-link' }}" href="/adminKurikulum/1">Kurikulum</a></li>
                                        <li><a class="nav-link p-1 px-2 rounded-2 small {{ request()->is('studies/1/cpls*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-muted sidebar-link' }}" href="/studies/1/cpls">Data CPL</a></li>
                                        <li><a class="nav-link p-1 px-2 rounded-2 small {{ request()->is('studies/1/subjects*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-muted sidebar-link' }}" href="/studies/1/subjects">Mata Kuliah</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link py-2 d-flex justify-content-between align-items-center {{ request()->is(['adminStudi/sistemInformasi', 'adminKurikulum/2', 'studies/2/cpls*', 'studies/2/subjects*']) ? 'fw-bold text-primary bg-light rounded-3' : 'text-secondary sidebar-link rounded-3' }}" data-bs-toggle="collapse" href="#sistemInformasi" role="button" aria-expanded="{{ request()->is(['adminStudi/sistemInformasi', 'adminKurikulum/2', 'adminCpl/show/2', 'adminMakul/show/2']) ? 'true' : 'false' }}">
                                    <span><i class="bi bi-dot"></i> Sistem Informasi</span>
                                    <i class="bi bi-chevron-down chevron-icon" style="font-size: 0.7rem;"></i>
                                </a>
                                <div class="collapse {{ request()->is(['adminStudi/sistemInformasi', 'adminKurikulum/2', 'studies/2/cpls*', 'studies/2/subjects*']) ? 'show' : '' }}" id="sistemInformasi">
                                    <ul class="nav flex-column ps-4 py-1 border-start ms-2 mb-2 gap-1">
                                        <li><a class="nav-link p-1 px-2 rounded-2 small {{ request()->is('adminStudi/sistemInformasi') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-muted sidebar-link' }}" href="/adminStudi/sistemInformasi">Profil Prodi</a></li>
                                        <li><a class="nav-link p-1 px-2 rounded-2 small {{ request()->is('adminKurikulum/2') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-muted sidebar-link' }}" href="/adminKurikulum/2">Kurikulum</a></li>
                                        <li><a class="nav-link p-1 px-2 rounded-2 small {{ request()->is('studies/2/cpls*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-muted sidebar-link' }}" href="/studies/2/cpls">Data CPL</a></li>
                                        <li><a class="nav-link p-1 px-2 rounded-2 small {{ request()->is('studies/2/subjects*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-muted sidebar-link' }}" href="/studies/2/subjects">Mata Kuliah</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link py-2 d-flex justify-content-between align-items-center {{ request()->is(['adminStudi/rekayasaKomputer', 'adminKurikulum/3', 'studies/3/cpls*', 'studies/3/subjects*']) ? 'fw-bold text-primary bg-light rounded-3' : 'text-secondary sidebar-link rounded-3' }}" data-bs-toggle="collapse" href="#rekayasaKomputer" role="button" aria-expanded="{{ request()->is(['adminStudi/rekayasaKomputer', 'adminKurikulum/3', 'adminCpl/show/3', 'adminMakul/show/3']) ? 'true' : 'false' }}">
                                    <span><i class="bi bi-dot"></i> Rekayasa Komputer</span>
                                    <i class="bi bi-chevron-down chevron-icon" style="font-size: 0.7rem;"></i>
                                </a>
                                <div class="collapse {{ request()->is(['adminStudi/rekayasaKomputer', 'adminKurikulum/3', 'studies/3/cpls*', 'studies/3/subjects*']) ? 'show' : '' }}" id="rekayasaKomputer">
                                    <ul class="nav flex-column ps-4 py-1 border-start ms-2 mb-2 gap-1">
                                        <li><a class="nav-link p-1 px-2 rounded-2 small {{ request()->is('adminStudi/rekayasaKomputer') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-muted sidebar-link' }}" href="/adminStudi/rekayasaKomputer">Profil Prodi</a></li>
                                        <li><a class="nav-link p-1 px-2 rounded-2 small {{ request()->is('adminKurikulum/3') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-muted sidebar-link' }}" href="/adminKurikulum/3">Kurikulum</a></li>
                                        <li><a class="nav-link p-1 px-2 rounded-2 small {{ request()->is('studies/3/cpls*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-muted sidebar-link' }}" href="/studies/3/cpls">Data CPL</a></li>
                                        <li><a class="nav-link p-1 px-2 rounded-2 small {{ request()->is('studies/3/subjects*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-muted sidebar-link' }}" href="/studies/3/subjects">Mata Kuliah</a></li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold d-flex align-items-center justify-content-between text-dark sidebar-link rounded-3" data-bs-toggle="collapse" href="#kemahasiswaan" role="button" aria-expanded="{{ Route::is(['organizations.*', 'services.*', 'theses.*', 'practices.*']) ? 'true' : 'false' }}">
                        <span><i class="bi bi-people me-2" style="color: #11667B;"></i> Kemahasiswaan</span>
                        <i class="bi bi-chevron-down chevron-icon ms-auto" style="font-size: 0.85rem;"></i>
                    </a>
                    <div class="collapse {{ Route::is(['organizations.*', 'services.*', 'theses.*', 'practices.*']) ? 'show' : '' }} mt-1" id="kemahasiswaan">
                        <ul class="nav nav-pills flex-column ps-4 gap-1">
                            <li class="nav-item">
                                <a href="/organizations" class="nav-link rounded-3 py-2 {{ Route::is('organizations.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Organisasi Mahasiswa</a>
                            </li>
                            <li class="nav-item">
                                <a href="/services" class="nav-link rounded-3 py-2 {{ Route::is('services.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Layanan Mahasiswa</a>
                            </li>
                            <li class="nav-item">
                                <a href="/theses" class="nav-link rounded-3 py-2 {{ Route::is('theses.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Sidang Skripsi</a>
                            </li>
                            <li class="nav-item">
                                <a href="/practices" class="nav-link rounded-3 py-2 {{ Route::is('practices.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Seminar Kerja Praktek</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold d-flex align-items-center justify-content-between text-dark sidebar-link rounded-3" data-bs-toggle="collapse" href="#informasi" role="button" aria-expanded="{{ Route::is(['informations.*', 'document.*']) ? 'true' : 'false' }}">
                        <span><i class="bi bi-megaphone me-2" style="color: #11667B;"></i> Pusat Informasi</span>
                        <i class="bi bi-chevron-down chevron-icon ms-auto" style="font-size: 0.85rem;"></i>
                    </a>
                    <div class="collapse {{ Route::is(['informations.*', 'document.*']) ? 'show' : '' }} mt-1" id="informasi">
                        <ul class="nav nav-pills flex-column ps-4 gap-1">
                            <li class="nav-item">
                                <a href="/informations" class="nav-link rounded-3 py-2 {{ Route::is('informations.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Informasi Terkini</a>
                            </li>
                            <li class="nav-item">
                                <a href="/document" class="nav-link rounded-3 py-2 {{ Route::is('document.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Dokumen</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold d-flex align-items-center justify-content-between text-dark sidebar-link rounded-3" data-bs-toggle="collapse" href="#riset-pengabdian" role="button" aria-expanded="{{ Route::is(['researchs.*', 'dedications.*', 'assignments.*', 'publications.*', 'projects.*']) ? 'true' : 'false' }}">
                        <span><i class="bi bi-journal-text me-2" style="color: #11667B;"></i> Riset & Pengabdian</span>
                        <i class="bi bi-chevron-down chevron-icon ms-auto" style="font-size: 0.85rem;"></i>
                    </a>
                    <div class="collapse {{ Route::is(['researchs.*', 'dedications.*', 'assignments.*', 'publications.*', 'projects.*']) ? 'show' : '' }} mt-1" id="riset-pengabdian">
                        <ul class="nav nav-pills flex-column ps-4 gap-1">
                            <li class="nav-item">
                                <a href="/researchs" class="nav-link rounded-3 py-2 {{ Route::is('researchs.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Riset Dosen</a>
                            </li>
                            <li class="nav-item">
                                <a href="/dedications" class="nav-link rounded-3 py-2 {{ Route::is('dedications.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Pengabdian Dosen</a>
                            </li>
                            <li class="nav-item">
                                <a href="/assignments" class="nav-link rounded-3 py-2 {{ Route::is('assignments.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Tugas Akhir Mhs</a>
                            </li>
                            <li class="nav-item">
                                <a href="/publications" class="nav-link rounded-3 py-2 {{ Route::is('publications.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Publikasi Mhs</a>
                            </li>
                            <li class="nav-item">
                                <a href="/projects" class="nav-link rounded-3 py-2 {{ Route::is('projects.*') ? 'fw-bold text-white bg-primary shadow-sm' : 'text-secondary sidebar-link' }}">Project Based Learning</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item border-top mt-2 pt-2">
                    <a class="nav-link fw-semibold d-flex align-items-center text-dark sidebar-link rounded-3 {{ Route::is('partners.*') ? 'fw-bold text-white bg-primary shadow-sm' : '' }}" href="/partners">
                        <i class="bi bi-diagram-3 {{ Route::is('partners.*') ? 'text-white' : '' }} me-2" style="color: {{ Route::is('partners.*') ? 'inherit' : '#11667B' }};"></i> Mitra Fakultas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold d-flex align-items-center text-dark sidebar-link rounded-3 {{ Route::is('contacts.*') ? 'fw-bold text-white bg-primary shadow-sm' : '' }}" href="/contacts">
                        <i class="bi bi-telephone {{ Route::is('contacts.*') ? 'text-white' : '' }} me-2" style="color: {{ Route::is('contacts.*') ? 'inherit' : '#11667B' }};"></i> Kontak & Medsos
                    </a>
                </li>

                <li class="nav-item mt-auto pt-3">
                    <a class="nav-link fw-bold d-flex align-items-center justify-content-center py-3 rounded-3 shadow-sm {{ Route::is(['adminUserEmail', 'adminUserPassword', 'adminPengaturan']) ? 'text-white bg-primary' : 'bg-light text-dark' }}" style="border: 1px solid #dee2e6;" href="/adminPengaturan" role="button">
                        <i class="bi bi-person-fill-gear fs-5 me-2" style="color: {{ Route::is(['adminUserEmail', 'adminUserPassword', 'adminPengaturan']) ? 'inherit' : '#11667B' }};"></i> Pengaturan Akun
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <main class="ps-lg-4 pe-lg-3 py-4 w-100 bg-light" style="min-height: 100vh;">
        
        <div class="d-flex align-items-center d-lg-none bg-white p-3 rounded-3 shadow-sm mb-4">
            <a href="{{ url('/home') }}" class="text-decoration-none">
                <img src="{{ asset('images/LogoFakultas.webp') }}" alt="Logo" width="140">
            </a>
            <button class="btn btn-outline-primary ms-auto fw-semibold d-flex align-items-center gap-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarAdmin">
                <i class="bi bi-list fs-5"></i> Menu
            </button>
        </div>

        <div class="content-wrapper">
            {{ $mainContent }}
        </div>

    </main>
</div>