<div id="table" class="container">

    <div class="card bg-white shadow rounded-4 overflow-hidden">
        
        <div class="card-header bg-white border-bottom p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            
            <div class="d-flex flex-column flex-md-row gap-2" style="flex-grow: 1; max-width: 650px;">
                <div class="input-group">
                    <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                        <i class="bi bi-search"></i>
                    </span>
                    <input wire:model.live.debounce.250ms="search" 
                           type="search" 
                           class="form-control bg-light border-secondary-subtle border-start-0 shadow-none" 
                           placeholder="Cari Nama Dosen..." 
                           aria-label="Search" />
                </div>
                
                <select wire:model.live="program" class="form-select bg-light border-secondary-subtle shadow-none fw-semibold text-secondary" style="max-width: 190px; cursor: pointer;">
                    <option value="">Pendidikan Terakhir</option>
                    @foreach($availablePrograms as $p)
                        <option value="{{ $p }}">{{ $p }}</option>
                    @endforeach
                </select>

            </div>

            <a href="/lecturers/create" class="btn btn-primary fw-semibold px-4 rounded-pill shadow-sm text-nowrap" style="background-color: #11667B; border-color: #11667B;">
                <i class="bi bi-plus-lg me-1"></i> Tambah Data
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center text-muted" style="width: 5%;">No.</th>
                            <th class="text-muted" style="width: 30%;">Nama Lengkap</th>
                            <th class="text-center text-muted" style="width: 20%;">Pendidikan Terakhir</th>
                            <th class="text-center text-muted" style="width: 15%;">Jabatan</th>
                            <th class="text-center text-muted" style="width: 15%;">Keterangan</th>
                            <th class="text-center text-muted" style="width: 15%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lecturers as $lecturer)
                            <tr>
                                <td class="text-center fw-semibold text-secondary">{{ ($lecturers->currentPage() - 1) * $lecturers->perPage() + $loop->iteration }}</td>
                                <td>
                                    <span class="fw-bold text-dark">{{ $lecturer->name }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-light text-secondary border">{{ $lecturer->program }}</span>
                                </td>
                                <td class="text-center fw-medium text-secondary">{{ $lecturer->position }}</td>
                                <td class="text-center text-secondary small">{{ $lecturer->description ?? '-' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/adminJurnalDosen/{{ $lecturer->id }}" class="btn btn-sm btn-outline-info border-info-subtle text-info shadow-sm" title="Kelola Jurnal & Portofolio">
                                            <i class="bi bi-journal-bookmark-fill"></i>
                                        </a>
                                        <a href="/lecturers/{{ $lecturer->id }}/edit" class="btn btn-sm btn-outline-warning border-warning-subtle text-dark shadow-sm" title="Edit Data">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <x-layouts.deleteAdminBtn data="/lecturers/{{ $lecturer->id }}"/>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                    Data dosen belum tersedia atau tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-top p-4" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
            {{ $lecturers->links(data: ['scrollTo' => '#table']) }}
        </div>

    </div>
</div>