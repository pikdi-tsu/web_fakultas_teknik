<x-layouts.publicLayoutNoContainer>
    <x-slot name="titleHead">
        Beranda
    </x-slot>
    <x-slot name="mainContent">

        <div style="min-height: 100vh" id="MainContent">
            
            <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                <div>
                    <div class="carousel-indicators">
                        @foreach ($heroes as $hero)
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $loop->iteration }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($heroes as $hero)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $hero->image) }}" class="d-block w-100" style="height: 400px; object-fit: cover; object-position: center;" alt="{{ $hero->title }}">
                                
                                <div class="carousel-caption pt-5 px-0 pb-0 w-100" style="bottom: 0; left: 0; right: 0; background-image: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.7));">
                                    <h5 class="mb-5 mb-md-0 mb-lg-0 fw-bold">{{ $hero->title }}</h5>
                                    <p class="mb-5 px-5 d-none d-md-block">{{ $hero->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            
            <div class="container mt-4">
                
                <div class="alert alert-primary fw-bold text-primary d-flex flex-column flex-md-row align-items-md-center justify-content-between border gap-3" role="alert">
                    <div>
                        <i class="bi bi-pencil-square fs-4 me-2"></i> Pendaftaran Mahasiswa Baru Tiga Serangkai University (PMB)
                    </div>
                    <a href="https://pmb.tsu.ac.id/" target="_blank" class="btn btn-primary fw-bold text-nowrap shadow-sm">
                        Lihat Informasi
                    </a>
                </div>
                
                <div class="row row-cols-1 row-cols-lg-2 mt-4">
                    <x-micro-panel :datas="$terkinis" panel='Terkini Fakultas' link='pusat-informasi'>
                        <x-slot name='icon'>
                            <i class="bi bi-newspaper"></i><i class="bi bi-arrow-right-short"></i>
                        </x-slot>
                    </x-micro-panel>
                    <x-micro-panel :datas="$artikels" panel='Artikel Fakultas' link='pusat-informasi?kategori=5'>
                        <x-slot name='icon'>
                            <i class="bi bi-file-post"></i><i class="bi bi-arrow-right-short"></i>
                        </x-slot>
                    </x-micro-panel>
                </div>
            </div>

            <div class="shadow bg-white mt-5 py-4">
                <div class="container">
                    <h3 class="fw-bold text-center mb-4" style="color: #11667B">Mitra Fakultas Teknik <span style="color: #F59F1F">Tiga Serangkai University</span></h3>

                    <div class="marquee-wrapper" style="position: relative; overflow: hidden;">
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 10; pointer-events: none; background-image: linear-gradient(to right, white 0%, rgba(255, 255, 255, 0) 15%, rgba(255, 255, 255, 0) 85%, white 100%);"></div>

                        <div class="marquee-content" style="animation-duration: {{ count($partners) * 3 }}s;">
                            @foreach ($partners as $partner)
                                <div class="marquee-item">
                                    <img src="{{ asset('storage/' . $partner->image) }}" class=" rounded" alt="Logo Mitra">
                                </div>
                            @endforeach
                            
                            @foreach ($partners as $partner)
                                <div class="marquee-item">
                                    <img src="{{ asset('storage/' . $partner->image) }}" alt="Logo Mitra">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="container my-5 pb-5">
                <div class="row mb-5">
                    <div class="col-md-4 col-lg-4 d-flex justify-content-center align-items-center">
                        <h3 class="fw-bold text-center rounded-pill text-white px-5 py-2 mb-0 shadow-sm" style="background-color: #11667B">Apa Kata Mereka?</h3>
                    </div>
                    <div class="col-md-8 col-lg-8 d-none d-md-flex align-items-center">
                        <x-layouts.fullLine/>
                    </div>
                </div>

                <div class="d-flex flex-wrap align-items-center justify-content-center">
                    @foreach ($testimonies as $testimony)
                        <div class="px-0 mx-3 mt-5" style="width: 18rem">
                            <div class="rounded-4 text-center bg-white shadow-sm border mb-5 w-100" style="min-height:300px">
                                <img src="{{ asset('storage/' . $testimony->image) }}" class="rounded-circle" style="transform: translateY(-60px); background-color: #F59F1F" alt="Logo" width="160">
                                <div class="card-body text-center text-white px-3 mb-3">
                                    <p class="card-text px-2 fw-bold fs-5" style="margin-top: -35px; color: #11667B">{{ $testimony->name }}</p>
                                    <p class="card-text text-muted mb-0 fst-italic" style="font-size: 0.9rem;">"{{ $testimony->description }}"</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.publicLayoutNoContainer>