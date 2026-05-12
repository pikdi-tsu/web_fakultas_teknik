<x-layouts.publicLayout>
    <x-slot name="titleHead">
        {{ $study->name }}
    </x-slot>
    <x-slot name="title">

        <div class="text-white d-flex justify-content-center align-items-center text-center pb-5 mb-5 mx-2" style="min-height: 350px">
            <div>
                <h1 class="my-2 fw-bold text-center" style="color: #11667B">
                    Program Studi S1 {{ $study->name }}
                </h1>
                <h5 class="my-3 fst-italic text-center text-secondary">
                    {{ $study->purpose }}
                </h5>

            </div>
        </div>

    </x-slot>
    <x-slot name="mainContent">
        <div class="mx-2">

            <div class=" mt-5 row align-items-center">
                <div class="col col-lg-auto">
                    <h3 class=" fw-bold" style="color: #11667B">Sekilas Tentang Program Studi S1 {{ $study->name }} </h3>
                    <h4 class=" fst-italic" style="color: #F59F1F">Fokus Studi: {{ $study->focus }}</h4>
                </div>
                <div class="col d-none d-lg-block">
                    <x-layouts.fullLine/>
                </div>
                <div class="d-block d-lg-none">
                    <x-layouts.fullLine/>
                </div>
            </div>
            
            <div class=" mt-3" style="text-align: justify">
                {!! $study->focusDescription !!}
            </div>
            
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2">
                <div class="col mt-5">
                    <h3 class="text-center">Visi</h3>
                    <div class="mx-auto my-3" style="width: 80%;">
                        <x-layouts.fullLine/>
                    </div>
    
                    <div style="text-align: justify">
                        {!! $study->vision !!}
                    </div>
                </div>
                <div class="col mt-5">
                    <h3 class="text-center">Misi</h3>
                    <div class="mx-auto my-3" style="width: 80%;">
                        <x-layouts.fullLine/>
                    </div>
                    
                    <div style="text-align: justify">
                        {!! $study->mission !!}
                    </div>
                </div>
            </div>
            
            <div class=" mt-5 row align-items-center">
                <div class="col col-lg-auto">
                    <h2 class=" fw-bold" style="color: #11667B">Keunggulan Prodi {{ $study->name }}</h2>
                </div>
                <div class="col d-none d-lg-block">
                    <x-layouts.fullLine/>
                </div>
                <div class="d-block d-lg-none">
                    <x-layouts.fullLine/>
                </div>
            </div>
            
            <div class=" mt-3" style="text-align: justify">
                {!! $study->excellence !!}
            </div>
            
            <div class=" mt-5 row align-items-center">
                <div class="col col-lg-auto">
                    <h2 class=" fw-bold" style="color: #11667B">Profil Lulusan {{ $study->name }}</h2>
                </div>
                <div class="col d-none d-lg-block">
                    <x-layouts.fullLine/>
                </div>
                <div class="d-block d-lg-none">
                    <x-layouts.fullLine/>
                </div>
            </div>
            
            <div class=" mt-3 mb-5" style="text-align: justify">
                {!! $study->graduate !!}
            </div>
        </div>

        <div class="sticky-bottom bg-light border-top p-3 d-flex justify-content-center" style="z-index: 1020;">
            <a href="/kurikulum/{{ $study->slug }}" class="btn btn-kurikulum-hover text-white px-5 py-2 rounded-pill shadow d-flex align-items-center justify-content-center gap-2 w-100" style="background-color: #F59F1F; max-width: 600px;">
                <span class="fw-bold fs-5">Lihat Kurikulum {{ $study->name }}</span>
                <i class="bi bi-arrow-right-circle-fill fs-3"></i>
            </a>
        </div>
    </x-slot>
    
</x-layouts.publicLayout>

