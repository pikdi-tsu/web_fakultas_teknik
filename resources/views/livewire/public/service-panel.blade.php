<div>
    <div class="d-flex flex-wrap align-items-center justify-content-center mt-5">
        @foreach ($services as $service)
            <div class="card shadow m-1" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="color:#11667B">{{ $service->title }}</h5>
                    <x-layouts.line/>
                    <p class="card-text text-secondary">{{ $service->description }}</p>
                    <a href="{{ $service->link }}" class="card-link text-decoration-none fs-5 fst-italic"><i class="bi bi-link-45deg"></i> {{ $service->link }}</a>
                </div>
            </div>
        @endforeach
    </div>

    <h5 class="mt-3" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
        {{ $services->links(data: ['scrollTo' => '#table']) }}
    </h5>
</div>
