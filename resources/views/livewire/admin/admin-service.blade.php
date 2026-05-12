<div id="table" class="container">

    <div class="card bg-white shadow rounded-4 overflow-hidden">
        
        <div class="card-header bg-white border-bottom p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            
            <div class="input-group">
                <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input wire:model.live.debounce.250ms="search" 
                       type="search" 
                       class="form-control bg-light border-secondary-subtle border-start-0 shadow-none" 
                       placeholder="Cari Layanan Mahasiswa..." 
                       aria-label="Search" />
            </div>

            <a href="/services/create" class="btn btn-primary fw-semibold px-4 rounded-pill shadow-sm text-nowrap" style="background-color: #11667B; border-color: #11667B;">
                <i class="bi bi-plus-lg me-1"></i> Tambah Data
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center text-muted" style="width: 5%;">No.</th>
                            <th class="text-muted" style="width: 20%;">Nama Layanan</th>
                            <th class="text-muted" style="width: 40%;">Deskripsi</th>
                            <th class="text-muted" style="width: 10%;">Link</th>
                            <th class="text-center text-muted" style="width: 15%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                            <tr>
                                <td class="text-center fw-semibold text-secondary">
                                    {{ ($services->currentPage() - 1) * $services->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    <span class="fw-bold text-dark">{{ $service->title }}</span>
                                </td>
                                <td>
                                    <span class="text-secondary">{{ Str::substr($service->description, 0, 50) }}...</span>
                                </td>
                                <td>
                                    <a href="{{ $service->link }}" target="_blank" class="btn rounded-pill px-3 fw-semibold shadow-sm d-inline-flex align-items-center gap-1 text-nowrap" style="background-color: rgba(17, 102, 123, 0.1); color: #11667B;">
                                        <i class="bi bi-link-45deg"></i>
                                        <span>{{ Str::substr($service->link, 0, 10) }}...</span>
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/services/{{ $service->id }}/edit" class="btn btn-sm btn-outline-warning border-warning-subtle text-dark shadow-sm" title="Edit Data">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <x-layouts.deleteAdminBtn data="/services/{{ $service->id }}"/>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                    Data layanan mahasiswa belum tersedia atau tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-top p-4" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage, search">
            {{ $services->links(data: ['scrollTo' => '#table']) }}
        </div>

    </div>
</div>