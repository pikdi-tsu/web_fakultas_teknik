<div class="col my-2">
    
    <div class="d-flex align-items-center mb-2 mt-3 gap-3">
        <div>
            <x-layouts.fullLine/>
        </div>
        <div>
            <a href="/{{ $link }}" class="text-decoration-none text-end text-dark">
                <h4 class="fw-bold mb-0" style="color: #11667B;">{{ $panel }} {!! $icon !!}</h4>
            </a>
            <x-layouts.fullLine/>
        </div>
    </div>

    <div class="list-group shadow-sm border-0 rounded-4 overflow-hidden">
        @foreach ($datas as $data)
            <a href="/pusat-informasi/{{ $data->id }}" class="list-group-item list-group-item-action bg-white border-bottom p-3" aria-current="true">
                <div class="row g-3 align-items-center">
                    
                    <div class="col-4 col-md-4 col-lg-3">
                        <img src="{{ asset('storage/' . $data->image) }}" class="img-fluid rounded-3 w-100 shadow-sm" alt="Thumbnail {{ $data->title }}" style="height: 100px; object-fit: cover; object-position: center;">
                    </div>
                    
                    <div class="col-8 col-md-8 col-lg-9">
                        <div class="d-flex flex-column justify-content-center h-100">
                            
                            <h5 class="fw-bold fs-5 mb-2" style="color: #11667B; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $data->title }}
                            </h5>
                            
                            <div class="d-flex flex-wrap gap-2 text-muted opacity-75" style="font-size: 0.8rem;">
                                <span><i class="bi bi-calendar-event"></i> {{ $data->created_at->format('d M Y') }}</span>
                                <span class="d-none d-md-inline">&bull;</span>
                                <span><i class="bi bi-tag"></i> {{ $data->category?->name ?? 'Tanpa Kategori' }}</span>
                                <span class="d-none d-md-inline">&bull;</span>
                                <span><i class="bi bi-person-workspace"></i> <span class="fw-bold" style="color: #11667B;">{{ $data->author }}</span> ({{ $data->role?->name ?? '-' }})</span>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </a>
        @endforeach
    </div>
    
</div>