<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Deskripsi
    </x-slot>
    <x-slot name="title">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2">
            <div class=" d-flex align-items-center">
                <div>
                    <h1 class=" fw-bold" style="color: #11667B"><span class=" text-black fs-5">Judul Project Based Learning:</span><br>{{ $project->title }}</h1>
                    <hr class="mt-0 mb-1">
                    <figcaption class=" opacity-50 fst-italic fs-6">
                        <p><i class="bi bi-calendar-event"></i> {{ $project->created_at->format('d M Y') }}</p>
                    </figcaption>
                </div>
            </div>
            <div class="col">
                <img class="mx-auto d-block my-4 rounded-4 img-fluid" src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/Banner-Progdi.svg') }}" alt="Image" style="max-height: 250px">
            </div>
        </div>
    </x-slot>
    <x-slot name="mainContent">
        
        <br>
        <style>
            .article-content figure {
                margin: 2rem auto;
                text-align: center; 
                max-width: 600px;
            }

            .article-content img {
                max-width: 100%;
                height: auto;
                border-radius: 8px;
                display: inline-block;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            }

            .article-content figcaption {
                display: none !important;
            }
        </style>
        
        <div class="article-content fs-5 mb-5" style="text-align: justify">
            <span class="fw-bold">Deskripsi:</span><br>{!! $project->description !!}
        </div>
                
    </x-slot>
</x-layouts.publicLayout>