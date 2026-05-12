<div id="table" class="container">

    <div class="card bg-white shadow rounded-4 overflow-hidden">
        
        <div class="card-header bg-white border-bottom p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
            
            <div class="input-group">
                <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input wire:model.live.debounce.250ms="search" 
                       type="search" 
                       class="form-control bg-light border-secondary-subtle border-start-0 shadow-none" 
                       placeholder="Cari Nama Mahasiswa atau NIM..." 
                       aria-label="Search" />
            </div>
            <button class="btn text-white rounded-pill fw-bold" style="background-color: #11667B;" wire:click="sortBy('date')">
                @if ($sortField === 'date')
                    @if ($sortDirection === 'asc')
                    <i class="bi bi-sort-down"></i>
                        
                    @else
                       <i class="bi bi-sort-down-alt"></i>
                    @endif
                @else
                    <i class="bi bi-funnel-fill"></i>
                @endif
            </button>

            <a href="/practices/create" class="btn btn-primary fw-semibold px-4 rounded-pill shadow-sm text-nowrap" style="background-color: #11667B; border-color: #11667B;">
                <i class="bi bi-plus-lg me-1"></i> Tambah Data
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center text-muted" style="width: 5%;">No.</th>
                            <th class="text-muted" style="width: 30%;">Nama Mahasiswa</th>
                            <th class="text-muted" style="width: 15%;">NIM</th>
                            <th class="text-center text-muted" style="width: 15%;">
                                Hari/Tgl
                                @if ($sortField === 'date')
                                    @if ($sortDirection === 'asc')
                                    <span class="p-1 rounded-pill bg-secondary text-white"><i class="bi bi-sort-down"></i></span>
                                    @else
                                    <span class="p-1 rounded-pill bg-secondary text-white"><i class="bi bi-sort-down-alt"></i></span>
                                    @endif
                                @else
                                    
                                @endif
                            </th>
                            <th class="text-center text-muted" style="width: 10%;">Jam</th>
                            <th class="text-center text-muted" style="width: 10%;">Ruangan</th>
                            <th class="text-center text-muted" style="width: 15%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($practices as $practice)
                            <tr>
                                <td class="text-center fw-semibold text-secondary">
                                    {{ ($practices->currentPage() - 1) * $practices->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    <span class="fw-bold text-dark">{{ $practice->name }}</span>
                                </td>
                                <td>
                                    <span class="text-secondary fw-semibold">{{ $practice->nim }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text-dark fw-medium">
                                        {{ \Carbon\Carbon::parse($practice->date)->locale('id')->translatedFormat('l, d F Y') }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="fs-6 badge bg-warning bg-opacity-10 text-dark border border-warning-subtle px-2 py-1 rounded-pill">
                                        <i class="bi bi-clock me-1 text-warning"></i> {{ \Carbon\Carbon::parse($practice->date)->locale('id')->translatedFormat('H:i') }} WIB
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="fs-6 badge bg-info bg-opacity-10 text-info border border-info-subtle px-2 py-1">
                                        {{ $practice->room }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/practices/{{ $practice->id }}/edit" class="btn btn-sm btn-outline-warning border-warning-subtle text-dark shadow-sm" title="Edit Data">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <x-layouts.deleteAdminBtn data="/practices/{{ $practice->id }}"/>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-briefcase fs-2 d-block mb-2 text-muted opacity-50"></i>
                                    Data jadwal seminar kerja praktek belum tersedia atau tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-top p-4" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage, search">
            {{ $practices->links(data: ['scrollTo' => '#table']) }}
        </div>

    </div>
</div>