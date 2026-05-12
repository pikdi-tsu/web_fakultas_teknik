<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Dosen
    </x-slot>
    <x-slot name="title">

        <div class="card border-0 shadow bg-white rounded-4 overflow-hidden my-4">
            <div class="card-body p-5 p-md-5">
                <div class="row align-items-center g-4">
                    
                    <div class="col-12 col-md-6 col-lg-4 text-center">
                        <div class="position-relative d-inline-block">
                            <img src="{{ asset('storage/' . $lecturer->picture) }}" 
                                alt="Foto {{ $lecturer->name }}" 
                                class="rounded-4 shadow-sm" 
                                style="max-width: 250px; aspect-ratio: 4/5; object-fit: cover;">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-8">
                        <h2 class="fw-bold text-center text-md-start" style="color: #11667B;">
                            {{ $lecturer->name }}
                        </h2>
                        <hr class="mt-0">

                        <div class="d-flex flex-column gap-3">
                            
                            <div class="d-flex align-items-start gap-3">
                                <div class="text-secondary mt-1">
                                    <i class="bi bi-mortarboard-fill fs-5" style="color: #F59F1F;"></i>
                                </div>
                                <div>
                                    <small class=" fs-6 text-muted d-block text-uppercase fw-bold" style="letter-spacing: 1px">
                                        Pendidikan Terakhir
                                    </small>
                                    <span class="fw-semibold fs-5" style="color: #333;">
                                        {{ $lecturer->program }}
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3">
                                <div class="text-secondary mt-1">
                                    <i class="bi bi-feather fs-5" style="color: #F59F1F;"></i>
                                </div>
                                <div>
                                    <small class=" fs-6 text-muted d-block text-uppercase fw-bold" style="letter-spacing: 1px">
                                        Jabatan Akademik
                                    </small>
                                    <span class="fw-semibold fs-5" style="color: #333;">
                                        {{ $lecturer->position }}
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3">
                                <div class="text-secondary mt-1">
                                    <i class="bi bi-info-circle-fill fs-5" style="color: #F59F1F;"></i>
                                </div>
                                <div>
                                    <small class=" fs-6 text-muted d-block text-uppercase fw-bold" style="letter-spacing: 1px">
                                        Keterangan
                                    </small>
                                    <span class="fs-5">
                                        {{ $lecturer->description ?? '-' }}
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </x-slot>
    <x-slot name="mainContent">
        <style>
            .custom-scroll::-webkit-scrollbar {
                width: 5px;
            }
            .custom-scroll::-webkit-scrollbar-track {
                background: #f1f1f1; 
                border-radius: 5px;
            }
            .custom-scroll::-webkit-scrollbar-thumb {
                background-color: rgba(17, 102, 123, 0.3);
                border-radius: 5px;
            }
            .custom-scroll::-webkit-scrollbar-thumb:hover {
                background-color: #F59F1F;
            }

            .custom-scroll {
                scrollbar-width: thin;
                scrollbar-color: rgba(17, 102, 123, 0.3) #f1f1f1;
            }
        </style>

        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 mt-lg-2 align-items-center justify-content-center">
            <div class="col my-3">
                <div class="bg-white pb-4 rounded shadow">
                    <div class="px-5 pt-3 pb-2 rounded-top" style="background-color: #11667B">
                        <h4 class="text-center rounded fw-bold bg-white p-1" style="color: #11667B">Publikasi</h4>
                    </div>

                    <div class="table-responsive border shadow-sm m-3 rounded custom-scroll" style="height: 450px; overflow-y: auto;">
                        <table class="table table-hover">
                            <tbody>
                                @foreach ($lpublications as $lpublication)
                                    <tr>
                                        <td class=" text-center" scope="row" style="width: 5%">{{ $loop->iteration }}</td>
                                        <td>
                                            <span style="color: #11667B">{{ $lpublication->title }}</span><br>
                                            <span class=" fw-bold fs-6 opacity-75">Tahun: {{ $lpublication->year }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col my-3" >
                <div class="bg-white pb-4 rounded shadow">
                    <div class="px-5 pt-3 pb-2 rounded-top" style="background-color: #11667B">
                        <h4 class="text-center rounded fw-bold bg-white p-1" style="color: #11667B">Pengabdian</h4>
                    </div>

                    <div class=" table-responsive border shadow-sm m-3 rounded custom-scroll" style="height: 450px; overflow-y: auto;">
                        <table class="table table-hover">
                            <tbody>
                                @foreach ($ldedications as $ldedication)
                                    <tr>
                                        <td class=" text-center" scope="row" style="width: 5%">{{ $loop->iteration }}</td>
                                        <td>
                                            <span style="color: #11667B">{{ $ldedication->title }}</span><br>
                                            <span class=" fw-bold fs-6 opacity-75">Tahun: {{ $ldedication->year }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col my-3" >
                <div class="bg-white pb-4 rounded shadow">
                    <div class="px-5 pt-3 pb-2 rounded-top" style="background-color: #11667B">
                        <h4 class="text-center rounded fw-bold bg-white p-1" style="color: #11667B">Kekayaan Intelektual</h4>
                    </div>

                    <div class=" table-responsive border shadow-sm m-3 rounded custom-scroll" style="height: 450px; overflow-y: auto;">
                        <table class="table table-hover">
                            <tbody>
                                @foreach ($lintelectuals as $lintelectual)
                                    <tr>
                                        <td class=" text-center" scope="row" style="width: 5%">{{ $loop->iteration }}</td>
                                        <td>
                                            <span style="color: #11667B">{{ $lintelectual->title }}</span><br>
                                            <span class=" fw-bold fs-6 opacity-75">Tahun: {{ $lintelectual->year }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.publicLayout>