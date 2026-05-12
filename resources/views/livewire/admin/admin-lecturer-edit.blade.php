<div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card bg-white shadow rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-lg-5">
                        
                        <form id="form" onsubmit="event.preventDefault(); processSubmit();">

                            <div class="mb-4">
                                <label class="form-label fw-bold" style="color: #11667B;">Nama Lengkap & Gelar <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control bg-light border border-secondary-subtle shadow-none @error('name') is-invalid @enderror" 
                                       wire:model="name" 
                                       value="{{ old('name', $lecturer->name) }}"
                                       placeholder="Contoh: Dr. Budi Santoso, S.Kom., M.Kom."
                                       style="border-radius: 10px;">
                                @error('name')
                                    <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold" style="color: #11667B;">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control bg-light border border-secondary-subtle shadow-none @error('program') is-invalid @enderror" 
                                       wire:model="program" 
                                       value="{{ old('program', $lecturer->program) }}"
                                       placeholder="Contoh: S2 - Magister Ilmu Komputer"
                                       style="border-radius: 10px;">
                                @error('program')
                                    <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold" style="color: #11667B;">Jabatan Akademik <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('position') is-invalid @enderror" 
                                           wire:model="position" 
                                           value="{{ old('position', $lecturer->position) }}"
                                           placeholder="Contoh: Kaprodi"
                                           style="border-radius: 10px;">
                                    @error('position')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold" style="color: #11667B;">Keterangan Tambahan</label>
                                    <input type="text" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('description') is-invalid @enderror" 
                                           wire:model="description" 
                                           value="{{ old('description', $lecturer->description) }}"
                                           placeholder="Contoh: Dosen Tamu"
                                           style="border-radius: 10px;">
                                    @error('description')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-4 border-top pt-4 mt-4">
                                <label class="form-label fw-bold" style="color: #11667B;">Foto Profil Dosen <span class="text-danger">*</span></label>
                                
                                @if($existingPicture)
                                    <div id="oldPictureContainer" class="mb-3 p-3 bg-light border border-secondary-subtle rounded-4 d-flex align-items-center gap-3" style="max-width: 400px;">
                                        <img src="{{ asset('storage/' . $lecturer->picture) }}" width="70" class="border-2 border-white rounded shadow-sm" alt="Foto Lama">
                                        <div>
                                            <h6 class="fw-bold text-secondary mb-1">Foto Saat Ini</h6>
                                            <p class="text-muted small mb-0 text-truncate" style="max-width: 200px;">{{ basename($lecturer->picture) }}</p>
                                        </div>
                                    </div>
                                @else
                                    <p id="noPictureText" class="text-muted small mb-3"><i class="bi bi-info-circle me-1"></i> Belum ada foto profil tersimpan.</p>
                                @endif

                                <input type="file" 
                                       id="pictureInput" 
                                       class="form-control bg-light border border-secondary-subtle shadow-none @error('picture') is-invalid @enderror" 
                                       accept="image/png, image/jpeg, image/jpg"
                                       style="border-radius: 10px;">
                                <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Kosongkan jika tidak ingin mengubah foto. Format: JPG/PNG. Maksimal: 16MB.</div>
                                @error('picture')
                                    <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="cropperContainer" class="mb-4 p-3 bg-light border border-secondary-subtle rounded-4" style="display: none;">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-crop fs-5 text-success"></i>
                                    <h6 class="text-success fw-bold mb-0">Sesuaikan Area Foto Baru (Rasio 4:5)</h6>
                                </div>
                                <div class="overflow-hidden rounded-3 shadow-sm bg-white" style="max-width: 400px; margin: 0 auto;">
                                    <img id="picturePreview" style="display: block; max-width: 100%;">
                                </div>
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
    </div>

    <script src="{{ asset('js/spinner.js') }}"></script>
    <script>
        let cropper;
        const pictureInput = document.getElementById('pictureInput');
        const picturePreview = document.getElementById('picturePreview');
        const cropperContainer = document.getElementById('cropperContainer');
        const oldPictureContainer = document.getElementById('oldPictureContainer');
        const noPictureText = document.getElementById('noPictureText');

        pictureInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                // Sembunyikan foto lama saat file baru dipilih
                if (oldPictureContainer) oldPictureContainer.style.display = 'none';
                if (noPictureText) noPictureText.style.display = 'none';
                
                const reader = new FileReader();
                reader.onload = function (event) {
                    picturePreview.src = event.target.result;
                    cropperContainer.style.display = 'block';

                    if (cropper) { cropper.destroy(); }
                    
                    cropper = new Cropper(picturePreview, {
                        aspectRatio: 4 / 5,
                        viewMode: 1,
                    });
                };
                reader.readAsDataURL(file);
            } else {
                // Tampilkan kembali foto lama jika input file dikosongkan/batal
                if (oldPictureContainer) oldPictureContainer.style.display = 'flex';
                if (noPictureText) noPictureText.style.display = 'block';
                cropperContainer.style.display = 'none';
                
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }
            }
        });

        function processSubmit() {
            if (cropper) {
                cropper.getCroppedCanvas().toBlob((blob) => {
                    let file = new File([blob], "cropped_picture.jpg", { type: "image/jpeg" });
                    
                    @this.upload('picture', file, (uploadedFilename) => {
                        @this.save();
                    });
                }, 'image/jpeg');
            } else {
                @this.save();
            }
        }
    </script>
</div>