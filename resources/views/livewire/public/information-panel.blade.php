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
                
                .info-card {
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }
                .info-card:hover {
                    transform: translateY(-6px);
                    box-shadow: 0 10px 20px rgba(17, 102, 123, 0.15) !important;
                }
                .info-card:hover img {
                    transform: scale(1.05);
                }
            </style>
            
            <select wire:model.live="activeCategory" class="fw-bold form-select text-white select-arrow-white shadow-sm" style="max-width: 160px; background-color:#11667B; cursor: pointer;">
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
                <div class="card shadow-sm info-card position-relative m-2 bg-white" 
                     style="width: 21rem; overflow: hidden; border-radius: 12px;">
                    
                    <div style="aspect-ratio: 16/9; overflow: hidden; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                        <img src="{{ $information->image ? asset('storage/' . $information->image) : asset('images/Banner-Progdi.svg') }}" 
                             class="img-fluid w-100 h-100" 
                             alt="thumbnail" 
                             style="object-fit: cover; object-position: center; transition: transform 0.5s ease;">
                    </div>

                    <div class="card-body p-4 d-flex flex-column" style="min-height: 210px;">
                        
                        <h5 class="card-title fw-bold text-start mb-2" 
                            style="color: #11667B; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.4; font-size: 1.15rem;">
                            {{ $information->title }}
                        </h5>
                        
                        <div style="height: 1px; background-color: rgba(17, 102, 123, 0.1); width: 60px; margin: 0.5rem 0 1rem 0;"></div>
                        
                        <div class="mt-auto d-flex flex-column gap-2 text-muted" style="font-size: 0.85rem;">
                            
                            <div class="d-flex align-items-center opacity-75">
                                <i class="bi bi-calendar-event me-2" style="color: rgba(17, 102, 123, 0.6);"></i>
                                <span>{{ $information->created_at->format('d M Y') }}</span>
                                <span class="mx-2">&bull;</span>
                                <i class="bi bi-tag me-1" style="color: rgba(17, 102, 123, 0.6);"></i>
                                <span class="text-truncate">{{ $information->category->name }}</span>
                            </div>
                            
                            <div class="d-flex align-items-center opacity-75">
                                <i class="bi bi-person-workspace me-2" style="color: rgba(17, 102, 123, 0.6);"></i>
                                <span class="text-truncate">
                                    <span class="fw-bold" style="color: #11667B">{{ $information->author }}</span> 
                                    <span>({{ $information->role->name }})</span>
                                </span>
                            </div>
                            
                        </div>
                    </div>

                    <a href="/pusat-informasi/{{ $information->id }}" class="stretched-link"></a>
                </div>
            @endforeach
        </div>
        
        <h5 class="mt-3" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
            {{ $informations->links(data: ['scrollTo' => '#table']) }}
        </h5>
    @endif

</div>