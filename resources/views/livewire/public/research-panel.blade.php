<div>
    <div class="row row-cols-1 row-cols-lg-2 my-3">
        <div></div>
        <div class="d-flex flex-wrap flex-md-nowrap align-items-center gap-2">
            <div class="input-group">
                <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input wire:model.live.debounce.250ms="search" type="search" class="form-control shadow-sm bg-white" style="color:#11667B;" placeholder="Cari Judul Riset/Nama Anggota Tim..." aria-label="Search" />
            </div>

            <style>
                .select-arrow-white {
                    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
                }
            </style>
            <select wire:model.live="year" class="fw-bold form-select text-white select-arrow-white" style="max-width: 160px; background-color:#11667B; cursor: pointer;">
                <option value="">Semua Tahun</option>
                @foreach($availableYears as $y)
                    <option value="{{ $y }}">{{ $y }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class=" table-responsive shadow px-3 pt-3 rounded bg-white">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="bg-white text-center" class=" text-center" scope="col">No.</th>
                    <th class="bg-white" scope="col">Judul Riset</th>
                    <th class="bg-white" scope="col">Tim Riset</th>
                    <th class="bg-white text-center" scope="col">Tahun</th>
                    <th class="bg-white text-center" scope="col">Sumber Dana</th>
                    <th class="bg-white text-center" scope="col">Abstraksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($researchs as $research)
                    <tr>
                        <td class="bg-white text-center" class=" text-center" scope="row">{{ ($researchs->currentPage() - 1) * $researchs->perPage() + $loop->iteration }}</td>
                        <td class="bg-white" style="width: 35%">{{ $research->title  }}</td>
                        <td class="bg-white" style="width: 25%">{{ $research->team  }}</td>
                        <td class="bg-white text-center" style="width: 5%">{{ $research->year  }}</td>
                        <td class="bg-white text-center" style="width: 15%">{{ $research->fund  }}</td>
                        <td class="bg-white"><a href="/risetDosen/{{ $research->id }}" type="button" class="btn btn-info fw-bold text-white w-100">Lihat Abstraksi</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h5 class="mt-3" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
            {{ $researchs->links(data: ['scrollTo' => '#table']) }}
        </h5>
    </div>

</div>
