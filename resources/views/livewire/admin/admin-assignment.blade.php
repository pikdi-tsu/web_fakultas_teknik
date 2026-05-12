<div id="table" class="container">

    <div class="card bg-white shadow rounded-4 overflow-hidden">
        
        <div class="card-header bg-white border-bottom p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            
            <div class="d-flex flex-column flex-md-row gap-2" style="flex-grow: 1; max-width: 600px;">
                <div class="input-group">
                    <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                        <i class="bi bi-search"></i>
                    </span>
                    <input wire:model.live.debounce.250ms="search" 
                           type="search" 
                           class="form-control bg-light border-secondary-subtle border-start-0 shadow-none" 
                           placeholder="Cari Judul Tugas Akhir / Nama Mahasiswa..." 
                           aria-label="Search" />
                </div>

                <select wire:model.live="year" class="form-select bg-light border-secondary-subtle shadow-none fw-semibold text-secondary" style="max-width: 150px; cursor: pointer;">
                    <option value="">Semua Tahun</option>
                    @foreach($availableYears as $y)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endforeach
                </select>
            </div>

            <a href="/assignments/create" class="btn btn-primary fw-semibold px-4 rounded-pill shadow-sm text-nowrap" style="background-color: #11667B; border-color: #11667B;">
                <i class="bi bi-plus-lg me-1"></i> Tambah Data
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center text-muted" style="width: 5%;">No.</th>
                            <th class="text-muted" style="width: 45%;">Judul Tugas Akhir</th>
                            <th class="text-muted" style="width: 25%;">Nama Mahasiswa</th>
                            <th class="text-center text-muted" style="width: 10%;">Tahun</th>
                            <th class="text-center text-muted" style="width: 15%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($assignments as $assignment)
                            <tr>
                                <td class="text-center fw-semibold text-secondary">
                                    {{ ($assignments->currentPage() - 1) * $assignments->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    <span class="fw-bold text-dark">{{ $assignment->title }}</span>
                                </td>
                                <td>
                                    <span class="text-secondary">{{ $assignment->name }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="fs-6 badge bg-info bg-opacity-10 text-info border border-info-subtle px-2 py-1">
                                        {{ $assignment->year }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/assignments/{{ $assignment->id }}/edit" class="btn btn-sm btn-outline-warning border-warning-subtle text-dark shadow-sm" title="Edit Data">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <x-layouts.deleteAdminBtn data="/assignments/{{ $assignment->id }}"/>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-mortarboard fs-2 d-block mb-2 text-muted opacity-50"></i>
                                    Data tugas akhir mahasiswa belum tersedia atau tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-top p-4" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage, search, year">
            {{ $assignments->links(data: ['scrollTo' => '#table']) }}
        </div>

    </div>
</div>