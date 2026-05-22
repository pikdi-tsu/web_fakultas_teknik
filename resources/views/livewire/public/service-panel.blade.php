<div>
    <style>
        .service-card {
            border: none;
            border-top: 5px solid #11667B;
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: white;
        }
        
        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(17, 102, 123, 0.15) !important;
        }
        
        .service-link {
            color: #11667B;
            transition: color 0.2s ease;
        }
        
        .service-link:hover {
            color: #F59F1F;
        }
    </style>

    <div class="d-flex flex-wrap justify-content-center gap-4 mt-5">
        @foreach ($services as $service)
            <div class="d-flex" style="width: 18rem;">
                <div class="card shadow-sm service-card w-100 d-flex flex-column">
                    <div class="card-body p-4 d-flex flex-column">
                        
                        <h5 class="card-title fw-bold mb-2" style="color:#11667B; line-height: 1.4;">
                            {{ $service->title }}
                        </h5>
                        
                        <div class="mb-3">
                            <x-layouts.line/>
                        </div>
                        
                        <p class="card-text text-secondary flex-grow-1" style="font-size: 0.95rem; line-height: 1.6;">
                            {{ $service->description }}
                        </p>
                        
                        <a href="{{ $service->link }}" target="_blank" class="service-link text-decoration-none fw-semibold d-flex align-items-center mt-3 pt-2 border-top">
                            <i class="bi bi-link-45deg fs-4 me-1"></i>
                            <span class="text-truncate">{{ $service->link }}</span>
                        </a>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h5 class="mt-4" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
        {{ $services->links(data: ['scrollTo' => '#table']) }}
    </h5>
</div>