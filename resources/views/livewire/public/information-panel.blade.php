<div>
    <div class="row row-cols-1 row-cols-lg-2 my-3">
        <div></div>
        <div class="d-flex flex-wrap flex-md-nowrap align-items-center gap-2">
            <div class="input-group">
                <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input wire:model.live.debounce.250ms="search" type="search" class="form-control shadow-sm bg-white" style="color:#11667B;" placeholder="Cari Informasi..." aria-label="Search" />
            </div>

            <style>
                .select-arrow-white {
                    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
                }
            </style>
            <select wire:model.live="activeCategory" class="fw-bold form-select text-white select-arrow-white" style="max-width: 160px; background-color:#11667B; cursor: pointer;">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    @if (sizeof($informations) > 0)
        <div class="d-flex flex-wrap align-items-center justify-content-center">
            @foreach ($informations as $information)
                <a href="/pusat-informasi/{{ $information->id }}" class="card text-decoration-none m-2 bg-white" style="width: 21rem; height: 355px">
                    <img src="{{ $information->image ? asset('storage/' . $information->image) : asset('images/Banner-Progdi.svg') }}" class="card-img-top img-fluid" alt="thumbnail" style="max-height: 195px; object-fit: cover; object-position: center;">
                    <div class="card-body">
                        <div class="d-flex align-items-center" style="height: 85px">
                            <h5 class="card-title fw-bold" style="color: #11667B">{{ Str::substr($information->title, 0, 85) }}</h5>
                        </div>
                        <small class="opacity-75"><i class="bi bi-calendar-event"></i> {{ $information->created_at->format('d M Y') }} <span class="px-1">&bull;</span> <i class="bi bi-tag"></i> {{ $information->category->name }}</small><br>
                        <small class="opacity-75"><i class="bi bi-person-workspace"></i> <span class="fw-bold" style="color: #11667B">{{ $information->author }}</span> ({{ $information->role->name }})</small>
                    </div>
                </a>
            @endforeach
        </div>
        
        <h5 class="mt-3" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
            {{ $informations->links(data: ['scrollTo' => '#table']) }}
        </h5>
    @endif

</div>