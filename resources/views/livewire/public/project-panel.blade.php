<div>
    <div class="row row-cols-1 row-cols-lg-2 my-3">
        <div></div>
        <div class="d-flex flex-wrap flex-md-nowrap align-items-center gap-2">
            <div class="input-group">
                <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input wire:model.live.debounce.250ms="search" type="search" class="form-control shadow-sm bg-white" style="color:#11667B;" placeholder="Cari Judul Project Based Learning..." aria-label="Search" />
            </div>

            <style>
                .select-arrow-white {
                    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
                }
                
                .project-card {
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }
                .project-card:hover {
                    transform: translateY(-6px);
                    box-shadow: 0 10px 20px rgba(17, 102, 123, 0.15) !important;
                }
                .project-card:hover img {
                    transform: scale(1.05);
                }
            </style>
        </div>
    </div>

    @if (sizeof($projects) > 0)
        <div class="d-flex flex-wrap align-items-center justify-content-center">
            @foreach ($projects as $project)
                <div class="card shadow-sm project-card position-relative m-2 bg-white" 
                     style="width: 21rem; overflow: hidden; border-radius: 12px;">
                    
                    <div style="aspect-ratio: 16/9; overflow: hidden; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                        <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/Banner-Progdi.svg') }}" 
                             class="img-fluid w-100 h-100" 
                             alt="thumbnail" 
                             style="object-fit: cover; object-position: center; transition: transform 0.5s ease;">
                    </div>

                    <div class="card-body p-4 d-flex flex-column">
                        <div class="card-title d-flex align-items-center justify-content-center" style="height: 50px">
                            <h5 class=" fw-bold text-center" 
                                style="color: #11667B; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; font-size: 1.15rem;">
                                {{ $project->title }}
                            </h5>
                        </div>
                        
                        <hr class="mt-0">
                        
                        <div class="d-flex align-items-center text-muted" style="font-size: 0.85rem;">
                            <i class="bi bi-calendar-event me-2" style="color: rgba(17, 102, 123, 0.6);"></i>
                            <span class="opacity-75">{{ $project->created_at->format('d M Y') }}</span>
                        </div>
                    </div>

                    <a href="/projectBasedLearning/{{ $project->id }}" class="stretched-link"></a>
                </div>
            @endforeach
        </div>
        
        <h5 class="mt-3" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
            {{ $projects->links(data: ['scrollTo' => '#table']) }}
        </h5>
    @endif

</div>