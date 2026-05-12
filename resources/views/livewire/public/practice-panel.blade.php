<div>
    <div class="row row-cols-1 row-cols-lg-2 mt-3">
        <div></div>
        <div class="mb-3">
            <div class="input-group p-0 shadow-sm rounded">
                <div class="input-group">
                    <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                        <i class="bi bi-search"></i>
                    </span>
                    <input wire:model.live.debounce.250ms="search" type="search" class="form-control bg-white" style="color:#11667B;" placeholder="Cari Nama/NIM..." aria-label="Search" />
                </div>
            </div>
        </div>
    </div>
    
    <div class=" table-responsive shadow px-3 pt-3 rounded bg-white">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="bg-white text-center" scope="col">No.</th>
                    <th class="bg-white" scope="col">Nama</th>
                    <th class="bg-white" scope="col">NIM</th>
                    <th class="bg-white" scope="col">Judul Kerja Praktek</th>
                    <th class="bg-white text-center" scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($practices as $practice)
                    <tr>
                        <td class="bg-white text-center" scope="row">{{ ($practices->currentPage() - 1) * $practices->perPage() + $loop->iteration }}</td>
                        <td class="bg-white" style="width: 25%">{{ $practice->name  }}</td>
                        <td class="bg-white">{{ $practice->nim  }}</td>
                        <td class="bg-white" style="width: 40%">{{ $practice->title  }}</td>
                        <td class="bg-white"><a href="/jadwalSeminar/{{ $practice->id }}" type="button" class="btn btn-info fw-bold text-white w-100">Lihat Jadwal</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h5 class="mt-3" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
            {{ $practices->links(data: ['scrollTo' => '#table']) }}
        </h5>
    </div>

</div>
