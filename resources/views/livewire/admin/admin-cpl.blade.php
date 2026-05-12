<div id="table">
    
    <div class="card bg-white shadow rounded-4 overflow-hidden mt-2">

        <div class="card-header bg-white border-bottom p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div class="input-group">
                <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input wire:model.live.debounce.250ms="search" 
                       type="search" 
                       class="form-control bg-light border-secondary-subtle border-start-0 shadow-none" 
                       placeholder="Cari Kode CPL..." 
                       aria-label="Search" />
            </div>

            <a href="/studies/{{ $study->id }}/cpls/create" class="btn btn-primary fw-semibold px-4 rounded-pill shadow-sm text-nowrap" style="background-color: #11667B; border-color: #11667B;">
                <i class="bi bi-plus-lg me-1"></i> Tambah Data
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center text-muted" style="width: 5%;">No.</th>
                            <th class="text-muted" style="width: 15%;">Kode</th>
                            <th class="text-muted" style="width: 65%;">Deskripsi</th>
                            <th class="text-center text-muted" style="width: 15%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cpls as $cpl)
                            <tr>
                                <td class="text-center fw-semibold text-secondary">
                                    {{ ($cpls->currentPage() - 1) * $cpls->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    <span class="badge bg-white text-dark border border-secondary-subtle px-3 py-2 fs-6">{{ $cpl->code }}</span>
                                </td>
                                <td>
                                    <p class="mb-0 text-secondary" style="max-width: 600px;">
                                        {{ $cpl->description }}
                                    </p>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/studies/{{ $study->id }}/cpls/{{ $cpl->id }}/edit" class="btn btn-sm btn-outline-warning border-warning-subtle text-dark shadow-sm" title="Edit Data">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <x-layouts.deleteAdminBtn data="/studies/{{ $study->id }}/cpls/{{ $cpl->id }}"/>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                    Data Capaian Pembelajaran Lulusan (CPL) belum tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-top p-4" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
            {{ $cpls->links(data: ['scrollTo' => '#table']) }}
        </div>

    </div>
</div>