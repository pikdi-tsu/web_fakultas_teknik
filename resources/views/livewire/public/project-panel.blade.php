<div>
    <div class="row row-cols-1 row-cols-lg-2 my-3">
        <div></div>
        <div class="d-flex flex-wrap flex-md-nowrap align-items-center gap-2">
            <div class="input-group">
                <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input wire:model.live.debounce.250ms="search" type="search" class="form-control shadow-sm bg-white" style="color:#11667B;" placeholder="Cari Judul Project Based Learning..." aria-label="Search" />
            </div>

            <style>
                .select-arrow-white {
                    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
                }
            </style>
        </div>
    </div>

    <div class=" table-responsive shadow px-3 pt-3 rounded bg-white">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="bg-white text-center" class=" text-center" scope="col">No.</th>
                    <th class="bg-white" scope="col">Judul Proyek</th>
                    <th class="bg-white text-center" scope="col">Link Tempat Pembelajaran</th>
                    <th class="bg-white text-center" scope="col">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="bg-white text-center" class=" text-center" scope="row">{{ ($projects->currentPage() - 1) * $projects->perPage() + $loop->iteration }}</td>
                        <td class="bg-white">{{ $project->title  }}</td>
                        <td class="bg-white text-center">
                            <span class="fw-bold text-dark">{{ $project->link ? '' : '-' }}</span>
                            <a href="{{ $project->link }}" target="_blank" class="{{ $project->link ?? 'd-none' }}">
                                <span>{{ Str::substr($project->link, 0, 30) }}...</span>
                            </a>
                        </td>
                        <td class="bg-white" style="width: 20%"><a href="/projectBasedLearning/{{ $project->id }}" type="button" class="btn btn-info fw-bold text-white w-100">Lihat Deskripsi</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h5 class="mt-3" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
            {{ $projects->links(data: ['scrollTo' => '#table']) }}
        </h5>
    </div>

</div>
