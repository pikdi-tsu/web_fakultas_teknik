<div>
    <div class=" mb-4" style="text-align: justify">{!! $curriculum->description !!}</div>

    <div id="table"></div>
    <x-layouts.publicTitle sectionA="Capaian Pembelajaran Lulusan - " sectionB="{{ $curriculum->study->name }}"/>
    
    <div class=" table-responsive shadow px-3 pt-3 mt-3 mb-5 rounded bg-white">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="bg-white text-center" scope="col">No.</th>
                    <th class="bg-white" scope="col">Kode</th>
                    <th class="bg-white" scope="col">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cpls as $cpl)
                    <tr>
                        <td class="bg-white text-center" scope="row" style="width: 5%">{{ ($cpls->currentPage() - 1) * $cpls->perPage() + $loop->iteration }}</td>
                        <td class="bg-white fw-bold" style="width: 10%">{{ $cpl->code  }}</td>
                        <td class="bg-white">{{ $cpl->description  }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h5 class="mt-3" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
            {{ $cpls->links(data: ['scrollTo' => '#table']) }}
        </h5>
    </div>

    <x-layouts.publicTitle sectionA="Mata Kuliah - " sectionB="{{ $curriculum->study->name }}"/>
        
    <div>
        <div class="mb-2 row row-cols-1 row-cols-lg-2 justify-content-end">
            <div class="col col-md-8 col-lg-9"></div>
            <div class="col col-md-4 col-lg-3">
                <style>
                    .select-arrow-white {
                        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
                    }
                </style>
                <select wire:model.live="activeSemester" class="fw-bold form-select text-white select-arrow-white" style="background-color:#11667B; cursor: pointer;">
                    <option value="">Semua Semester</option>
                    @foreach ($availableSemesters as $semester)
                        <option value="{{ $semester }}">Semester {{ $semester }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="table-responsive shadow p-3 rounded bg-white">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="bg-white text-center" style="width: 5%" scope="col">No.</th>
                        <th class="bg-white" style="width: 45%" scope="col">Nama Mata Kuliah</th>
                        <th class="bg-white text-center" style="width: 15%" scope="col">SKS</th>
                        <th class="bg-white text-center" style="width: 10%" scope="col">Semester</th>
                        <th class="bg-white text-center" style="width: 15%" scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subjects as $subject)
                        <tr>
                            <td class="bg-white text-center" scope="row">{{ $loop->iteration }}</td>
                            <td class="bg-white">{{ $subject->name }}</td>
                            <td class="bg-white text-center">{{ $subject->credit }}</td>
                            <td class="bg-white text-center">{{ $subject->semester }}</td>
                            <td class="bg-white text-center">{{ $subject->description }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3 bg-white">Tidak ada data mata kuliah untuk semester ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
