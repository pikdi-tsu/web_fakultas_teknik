<div>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] { display: flex !important; }
        trix-editor { 
            min-height: 300px;
            max-width: 100%; 
            overflow-x: hidden;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
        }
        trix-editor a, trix-editor pre {
            white-space: pre-wrap !important;
            word-break: break-all !important;
        }

        trix-editor img {
            max-width: 50% !important;
            max-height: 300px !important;
            width: auto !important;
            height: auto !important;
            margin: 10px auto !important;
            display: block !important;
            border-radius: 8px;
        }
        
        trix-editor figcaption,
        trix-editor .attachment__caption {
            text-align: center !important;
            margin: 5px auto 15px auto !important;
            font-size: 0.9em !important; 
            color: #6c757d !important;
            display: block !important;
        }
        
        trix-editor .attachment__caption-editor {
            text-align: center !important;
            width: 100% !important;
        }

        .input-group input.form-control[readonly] {
            cursor: pointer !important;
            background-color: #f8f9fa !important;
        }
    </style>
    
    <div class="row justify-content-center">
        <div>
            <div class="card bg-white shadow rounded-4 overflow-hidden">
                <div class="card-body p-4 p-lg-5">
                    
                    <form id="form" action="/projects/{{ $project->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                
                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: #11667B;">Judul Proyek <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control bg-light border border-secondary-subtle shadow-none @error('title') is-invalid @enderror" 
                                   name="title" 
                                   value="{{ old('title', $project->title) }}"
                                   placeholder="Tuliskan judul Project Based Learning..."
                                   style="border-radius: 10px;">
                            @error('title')
                                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: #11667B;">Gambar Cover / Thumbnail (Maks. 16MB) <span class="text-danger">*</span></label>
                            
                            @if($project->image)
                                <div class="mb-3 p-3 bg-light border border-secondary-subtle rounded-4 d-flex align-items-center gap-3" style="max-width: 400px;">
                                    <div class="overflow-hidden rounded shadow-sm border-2 border-white" style="width: 80px; height: 80px;">
                                        <img src="{{ asset('storage/' . $project->image) }}" class="w-100 h-100 object-fit-cover" alt="Cover Saat Ini">
                                    </div>
                                    <div class="overflow-hidden">
                                        <h6 class="fw-bold text-secondary mb-1">Cover Saat Ini</h6>
                                        <p class="text-muted small mb-0 text-truncate">{{ basename($project->image) }}</p>
                                    </div>
                                </div>
                            @else
                                <p class="text-muted small mb-3"><i class="bi bi-info-circle me-1"></i> Belum ada gambar cover tersimpan.</p>
                            @endif

                            <input type="file" 
                                   class="form-control bg-light border border-secondary-subtle shadow-none @error('image') is-invalid @enderror" 
                                   name="image" 
                                   accept="image/*"
                                   style="border-radius: 10px;">
                            <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Kosongkan jika tidak ingin mengubah cover. Disarankan menggunakan gambar dengan resolusi baik.</div>
                            @error('image')
                                <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: #11667B;">Kustomisasi Tanggal Di-posting</label>
                            
                            <div class="input-group has-validation" wire:ignore>
                                <span class="input-group-text bg-light border-secondary-subtle text-muted" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                                    <i class="bi bi-calendar-event"></i>
                                </span>
                                <input type="text" 
                                    id="tanggal" 
                                    class="form-control bg-light border border-secondary-subtle shadow-none" 
                                    name="created_at" 
                                    value="{{ old('created_at', $project->created_at) }}"
                                    placeholder="Pilih Tanggal & Jam"
                                    style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; cursor: pointer; background-color: #f8f9fa !important;">
                            </div>

                            @error('created_at')
                                <div class="text-danger fw-semibold small mt-2">{{ $message }}</div>
                            @enderror

                            <div class="form-text text-muted small mt-2">
                                <i class="bi bi-info-circle me-1"></i> Biarkan jika tidak ingin mengubah tanggal posting informasi ini.
                            </div>
                        </div>

                        <div class="mb-4 border-top pt-4 mt-4" wire:ignore>
                            <label class="form-label fw-bold d-flex align-items-center gap-2" style="color: #11667B;">
                                Isi / Deskripsi Informasi
                                <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill px-2 py-1" style="font-size: 0.75rem;">Rich Text</span>
                            </label>
                            <input id="description-trix" type="hidden" name="description" value="{{ old('description', $project->description) }}">
                            <trix-editor input="description-trix" 
                                         class="trix-content bg-light border-secondary-subtle shadow-none @error('description') border-danger @enderror" 
                                         style="border-radius: 10px; min-height: 300px; padding: 15px;"></trix-editor>
                            @error('description')
                                <div class="text-danger fw-semibold small mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end align-items-center gap-3 mt-5 pt-4 border-top">
                            <a href="javascript:history.back()" class="btn btn-light fw-bold px-4 rounded-pill text-secondary border">
                                Batal
                            </a>
                            <button id="btn" type="submit" class="btn btn-primary fw-bold px-5 rounded-pill shadow-sm" style="background-color: #11667B; border-color: #11667B;">
                                <span id="text"><i class="bi bi-save me-2"></i> Simpan Perubahan</span>
                                <span id="spinner" class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/spinner.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#tanggal", {
                enableTime: true,
                dateFormat: "Y-m-d H:i:S",
                altInput: true,
                altFormat: "d F Y, H:i",
                time_24hr: true, 
                locale: "id"
            });
        });
    </script>

    <script>
        document.addEventListener("trix-attachment-add", function(event) {
            if (event.attachment.file) {
                let file = event.attachment.file;
                let attachment = event.attachment; 
                @this.upload('trixTempImage', file, async (uploadedFilename) => {
                    try {
                        let url = await @this.uploadTrixImage();
                        
                        if (url) {
                            attachment.setAttributes({
                                url: url,
                                href: url
                            });
                        }
                        
                        attachment.setUploadProgress(100);

                    } catch (error) {
                        console.error("Error dari server:", error);
                        alert('Terjadi kesalahan saat memproses gambar di server.');
                    }
                    
                }, () => {
                    alert('Gagal mengunggah gambar sisipan.');
                }, (livewireEvent) => {
                    let networkProgress = livewireEvent.detail.progress;
                    let displayProgress = Math.floor(networkProgress * 0.95);
                    
                    attachment.setUploadProgress(displayProgress);
                });
            }
        });
    </script>
</div>