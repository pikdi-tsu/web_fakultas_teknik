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
                       placeholder="Cari Judul..." 
                       aria-label="Search" />
            </div>

            <a href="/projects/create" class="btn btn-primary fw-semibold px-4 rounded-pill shadow-sm text-nowrap" style="background-color: #11667B; border-color: #11667B;">
                <i class="bi bi-plus-lg me-1"></i> Tambah Data
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center text-muted" style="width: 5%;">No.</th>
                            <th class="text-muted" style="width: 45%;">Judul Proyek</th>
                            <th class="text-muted text-center" style="width: 25%;">Link</th>
                            <th class="text-center text-muted" style="width: 15%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <td class="text-center fw-semibold text-secondary">
                                    {{ ($projects->currentPage() - 1) * $projects->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    <span class="fw-bold text-dark">{{ $project->title }}</span>
                                </td>
                                <td class=" text-center">
                                    <span class="fw-bold text-dark">{{ $project->link ? '' : '-' }}</span>
                                    <a href="{{ $project->link }}" target="_blank" class="{{ $project->link ?? 'd-none' }} btn rounded-pill px-3 fw-semibold text-center shadow-sm d-inline-flex align-items-center gap-1 text-nowrap" style="background-color: rgba(17, 102, 123, 0.1); color: #11667B;">
                                        <i class="bi bi-link-45deg"></i>
                                        <span>{{ Str::substr($project->link, 0, 15) }}...</span>
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/projects/{{ $project->id }}/edit" class="btn btn-sm btn-outline-warning border-warning-subtle text-dark shadow-sm" title="Edit Data">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <x-layouts.deleteAdminBtn data="/projects/{{ $project->id }}"/>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-boxes fs-2 d-block mb-2 text-muted opacity-50"></i>
                                    Data Project Based Learning belum tersedia atau tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-top p-4" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage, search, year">
            {{ $projects->links(data: ['scrollTo' => '#table']) }}
        </div>

    </div>
</div>