<x-layouts.publicLayout>
    <x-slot name="titleHead">
        {{ $information->title }}
    </x-slot>
    <x-slot name="title">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2">
            <div class="col d-flex align-items-center">
                <div class="w-100">
                    <h1 class=" fw-bold">
                        {{ $information->title }}
                    </h1>
                    <x-layouts.fullLine/>
                    <figcaption class=" opacity-50 fst-italic fs-6">
                        <p><i class="bi bi-calendar-event"></i> {{ $information->created_at->format('d M Y') }} <span class="px-1">&bull;</span> <i class="bi bi-tag"></i> {{ $information->category->name }} <span class="px-1">&bull;</span> <i class="bi bi-person-workspace"></i> {{ $information->author }} ({{ $information->role->name }})</p>
                    </figcaption>
                </div>
            </div>
            <div class="col">
                <img class="mx-auto d-block my-4 rounded-4 img-fluid" src="{{ $information->image ? asset('storage/' . $information->image) : asset('images/Banner-Progdi.svg') }}" alt="Image" style="max-height: 300px">
            </div>
        </div>

    </x-slot>
    <x-slot name="mainContent">

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
            {!! $information->description !!}
        </div>
        
    </x-slot>
</x-layouts.publicLayout>