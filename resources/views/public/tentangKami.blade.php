<x-layouts.publicLayoutNoContainer>
    <x-slot name="titleHead">
        Tentang Kami
    </x-slot>
    <x-slot name="mainContent">
        <div class="container pt-5">
            <h2 class="fw-bold" style="color: #11667B">
                Fakultas Teknik Tiga Serangkai University<br/>
                <span style="color: #F59F1F">Kolaborasi Industri, Inovasi Tanpa Batas</span>
            </h2>
            <div>
                {!! $profile->shortInfo !!}
            </div>
        </div>

        <div class="d-flex align-items-center text-white mt-5 py-5" id="profilImage" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('images/Foto-kampus.webp') }}'); background-size: cover; background-position: center;">
            <div class="container align-middle py-4">
                <div class="row row-cols-1 row-cols-sm-2">
                    <div class="col d-flex order-2 order-sm-1 align-items-center mt-3 mt-sm-0">
                        <x-layouts.fullLine/>
                    </div>
                    <div class="col order-1 order-sm-2">
                        <h3 class="fw-bold text-center text-sm-start mb-0">
                            Profil <span style="color: #F59F1F">Fakultas Teknik</span> Universitas Tiga Serangkai
                        </h3>
                    </div>
                </div>
        
                <div class="text-center mt-5 px-2 fs-5 lh-lg">
                    {!! $profile->profileInformation !!}
                </div>
            </div>
        </div>

        <div class="container py-5 my-3">
            <div class="row gy-5">
                <div class="col-12 px-3">
                    <h3 class="fw-bold mb-1" style="color: #11667B">Visi</h3>
                    <x-layouts.line/>
                    <div class="mt-3 lh-lg" style="text-align: justify;">
                        {!! $profile->visi !!}
                    </div>
                </div>
                
                <div class="col-12 px-3">
                    <h3 class="fw-bold mb-1" style="color: #11667B">Misi</h3>
                    <x-layouts.line/>
                    <div class="mt-3 lh-lg" style="text-align: justify;">
                        {!! $profile->misi !!}
                    </div>
                </div>
                
                <div class="col-12 px-3">
                    <h3 class="fw-bold mb-1" style="color: #11667B">Tujuan</h3>
                    <x-layouts.line/>
                    <div class="mt-3 lh-lg" style="text-align: justify;">
                        {!! $profile->tujuan !!}
                    </div>
                </div>
                
                <div class="col-12 px-3">
                    <h3 class="fw-bold mb-1" style="color: #11667B">Sasaran</h3>
                    <x-layouts.line/>
                    <div class="mt-3 lh-lg" style="text-align: justify;">
                        {!! $profile->sasaran !!}
                    </div>
                </div>
                
                <div class="col-12 px-3">
                    <h3 class="fw-bold mb-1" style="color: #11667B">Strategi</h3>
                    <x-layouts.line/>
                    <div class="mt-3 lh-lg" style="text-align: justify;">
                        {!! $profile->strategi !!}
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.publicLayoutNoContainer>