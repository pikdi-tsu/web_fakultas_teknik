<div id="table" class="container">

    <div class="card bg-white shadow rounded-4 overflow-hidden">
        
        <div class="card-header bg-white border-bottom p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div class="input-group">
                <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input wire:model.live.debounce.250ms="search" 
                       type="search" 
                       class="form-control bg-light border-secondary-subtle border-start-0 shadow-none" 
                       placeholder="Cari Kode Kontak..." 
                       aria-label="Search" />
            </div>

            <a href="/contacts/create" class="btn btn-primary fw-semibold px-4 rounded-pill shadow-sm text-nowrap" style="background-color: #11667B; border-color: #11667B;">
                <i class="bi bi-plus-lg me-1"></i> Tambah Data
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center text-muted" style="width: 5%;">No.</th>
                            <th class="text-muted" style="width: 35%;">
                                Label 
                                <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary-subtle ms-1 px-2 py-1" style="font-size: 0.70rem;">html*</span>
                            </th>
                            <th class="text-muted" style="width: 45%;">Link URL</th>
                            <th class="text-center text-muted" style="width: 15%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr>
                                <td class="text-center fw-semibold text-secondary">
                                    {{ ($contacts->currentPage() - 1) * $contacts->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    <span class="fw-bold text-dark">{!! $contact->label !!}</span>
                                </td>
                                <td>
                                    <span class="text-secondary text-break">{{ $contact->link }}</span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/contacts/{{ $contact->id }}/edit" class="btn btn-sm btn-outline-warning border-warning-subtle text-dark shadow-sm" title="Edit Data">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <x-layouts.deleteAdminBtn data="/contacts/{{ $contact->id }}"/>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-share fs-2 d-block mb-2 text-muted opacity-50"></i>
                                    Data kontak dan media sosial belum tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-top p-4" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
            {{ $contacts->links(data: ['scrollTo' => '#table']) }}
        </div>
    </div>

    <div class="card bg-white shadow rounded-4 mt-3">
        <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <h5 class="fw-bold mb-0" style="color: #11667B;">
                        <i class="bi bi-headset me-2"></i>Kontak Bantuan
                    </h5>
                    <small class="text-muted d-none d-md-block">Update nomor WhatsApp Pusat Bantuan (Floating Chat Widget)</small>
                </div>
            </div>

            @foreach ($helps as $help)
            <form id="form" action="/updateHelp/{{ $help->id }}" method="POST" class="mb-4">
                @csrf
                @method('PUT')
                
                <div class="row g-3 align-items-start">
                    <div class="col-12 col-md-8">
                        
                        <div class="d-flex flex-column flex-md-row gap-2 gap-md-3">
                            
                            <label class="fw-bold mt-md-2 text-nowrap" style="color: #11667B; min-width: 120px;">
                                {{ $help->title }}
                            </label>
                            
                            <div class="flex-grow-1 w-100">
                                <div class="input-group shadow-sm rounded-3 overflow-hidden border border-secondary-subtle focus-within-teal">
                                    <span class="input-group-text bg-light border-0 text-dark fw-bold px-3">
                                        <i class="bi bi-whatsapp text-success me-2"></i>+62
                                    </span>
                                    <input type="tel" 
                                        id="number"
                                        class="form-control border-0 shadow-none py-2" 
                                        name="number"
                                        value="{{ old('number', $help->number) }}" 
                                        placeholder="81234567890"
                                        style="letter-spacing: 0.5px; font-weight: 500;"/>
                                </div>
                                @error('number')
                                    <small class="text-danger fw-semibold mt-1 d-block">{{ $message }}</small>
                                @enderror
                                <div class="form-text mt-1 small">
                                    <i class="bi bi-info-circle me-1"></i>Tanpa angka <strong>0</strong> di depan.
                                </div>
                            </div>
                            
                        </div>

                    </div>

                    <div class="col-12 col-md-4">
                        <button id="btn" type="submit" class="btn btn-teal-academic fw-bold w-100 py-2 rounded-3 shadow-sm" style="background-color: #11667B; color: white;">
                            <span id="text"><i class="bi bi-save me-2"></i>Simpan</span>
                            <span id="spinner" class="d-none spinner-border spinner-border-sm" role="status"></span>
                        </button>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>

    <style>
        .btn-teal-academic {
            background-color: #11667B;
            color: white;
            border: none;
            transition: all 0.2s ease;
        }
        .btn-teal-academic:hover {
            background-color: #0d4d5d;
            color: white;
            transform: translateY(-1px);
        }
        .focus-within-teal:focus-within {
            border-color: #11667B !important;
            box-shadow: 0 0 0 0.2rem rgba(17, 102, 123, 0.15) !important;
        }
    </style>
    
    <script src="{{ asset('js/spinner.js') }}"></script>
    <script>
        document.addEventListener("trix-file-accept", function(event) {
            event.preventDefault(); 
        });
    </script>

</div>