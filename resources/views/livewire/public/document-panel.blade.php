<div class="pb-5">
    <style>
        .separated-list-item {
            transition: all 0.3s ease;
        }
        .separated-list-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(17, 102, 123, 0.1) !important;
            border-color: rgba(17, 102, 123, 0.3) !important;
        }
        
        .doc-list-icon {
            width: 48px;
            height: 48px;
            min-width: 48px;
            background-color: rgba(17, 102, 123, 0.08);
            color: #11667B;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-download-list {
            color: #F59F1F;
            background-color: transparent;
            font-weight: 600;
            border: 2px solid #F59F1F;
            transition: all 0.2s;
        }
        .btn-download-list:hover {
            background-color: #F59F1F;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(245, 159, 31, 0.2);
        }

        .list-number {
            font-weight: 700;
            color: rgba(17, 102, 123, 0.4);
            min-width: 30px;
            text-align: center;
        }
    </style>

    <div class="row row-cols-1 row-cols-lg-2 my-3">
        <div></div>
        <div class="d-flex flex-wrap flex-md-nowrap align-items-center gap-2">
            <div class="input-group">
                <span class="input-group-text bg-light border-secondary-subtle border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input wire:model.live.debounce.250ms="search" type="search" class="form-control shadow-sm bg-white" style="color:#11667B;" placeholder="Cari Judul Dokumen..." aria-label="Search" />
            </div>
        </div>
    </div>

    <div class="d-flex flex-column gap-3">
        @forelse ($documents as $document)
            <div class="separated-list-item bg-white border rounded-4 shadow-sm p-4 d-flex flex-column flex-md-row align-items-md-center gap-4" wire:key="doc-{{ $document->id }}">
                
                <div class="d-flex align-items-center gap-3">
                    <div class="doc-list-icon shadow-sm">
                        <i class="bi bi-file-earmark-text-fill fs-4"></i>
                    </div>
                </div>

                <div class="flex-grow-1">
                    <h5 class="fw-bold mb-1" style="color: #11667B;">
                        {{ $document->title }}
                    </h5>
                    <p class="text-secondary mb-2" style="font-size: 0.95rem; text-align: justify; line-height: 1.5;">
                        {{ $document->description }}
                    </p>
                    <div class="text-muted" style="font-size: 0.8rem;">
                        <i class="bi bi-calendar-event me-1"></i> {{ $document->created_at->format('d M Y') }}
                    </div>
                </div>

                <div class="mt-2 mt-md-0 text-md-end">
                    <a href="{{ $document->link }}" target="_blank" class="btn btn-download-list px-4 py-2 rounded-pill d-inline-flex align-items-center justify-content-center gap-2 w-100 text-nowrap">
                        <span>Unduh File</span>
                    </a>
                </div>
                
            </div>
        @empty
            <div class="text-center py-5 bg-white border rounded-4 shadow-sm">
                <i class="bi bi-folder-x" style="font-size: 4rem; color: rgba(17, 102, 123, 0.2);"></i>
                <h4 class="mt-3 fw-bold" style="color: #11667B;">Dokumen Tidak Ditemukan</h4>
                <p class="text-muted mb-0">Cobalah menggunakan kata kunci pencarian yang berbeda.</p>
            </div>
        @endforelse
    </div>

    <h5 class="mt-3" wire:loading.class="opacity-50" wire:target="gotoPage, previousPage, nextPage">
        {{ $documents->links(data: ['scrollTo' => '#table']) }}
    </h5>

</div>