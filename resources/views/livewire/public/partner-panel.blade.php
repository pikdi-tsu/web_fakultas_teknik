<div>
    <div class="row row-cols-1 row-cols-lg-2 my-3">
        <div></div>
        <div class="d-flex flex-wrap flex-md-nowrap align-items-center gap-2">
            <div class="input-group">
                <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input wire:model.live.debounce.250ms="search" type="search" class="form-control shadow-sm bg-white" style="color:#11667B;" placeholder="Cari Nama Mitra..." aria-label="Search" />
            </div>
        </div>
    </div>

    <div class=" table-responsive shadow px-3 pt-3 mt-3 rounded bg-white">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="bg-white text-center" scope="col">No.</th>
                    <th class="bg-white text-center" scope="col">Logo</th>
                    <th class="bg-white" scope="col">Tentang Mitra</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partners as $partner)
                    <tr>
                        <td class="bg-white text-center" scope="row" style="width: 5%">{{ ($partners->currentPage() - 1) * $partners->perPage() + $loop->iteration }}</td>
                        <td class="bg-white text-center" style="width: 13%"><img src="{{ asset('storage/' . $partner->image) }}" class=" rounded" alt="Logo" width="100"></td>
                        <td class="bg-white"> <span class=" fw-bold">{{ $partner->name }}</span> <br> {{ $partner->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h5 class="mt-3" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
            {{ $partners->links(data: ['scrollTo' => '#table']) }}
        </h5>
    </div>
</div>
