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
                                <label class="form-label fw-bold" style="color: #11667B;">Nama Lulusan <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control bg-light border border-secondary-subtle shadow-none @error('name') is-invalid @enderror" 
                                       wire:model="name" 
                                       value="{{ old('name', $testimony->name) }}"
                                       placeholder="Tuliskan nama lulusan..."
                                       style="border-radius: 10px;">
                                @error('name')
                                    <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold" style="color: #11667B;">Deskripsi / Pesan <span class="text-danger">*</span></label>
                                <textarea class="form-control bg-light border border-secondary-subtle shadow-none @error('description') is-invalid @enderror" 
                                          wire:model="description" 
                                          rows="4" 
                                          placeholder="Tuliskan pesan atau testimoni..."
                                          style="border-radius: 10px;">{{ old('description', $testimony->description) }}</textarea>
                                <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Maksimal 230 karakter.</div>
                                @error('description')
                                    <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4 border-top pt-4 mt-4">
                                <label class="form-label fw-bold" style="color: #11667B;">Foto Profil (Maks. 16MB) <span class="text-danger">*</span></label>

                                @if($existingImage)
                                    <div id="oldImageContainer" class="mb-3 p-3 bg-light border border-secondary-subtle rounded-4 d-flex align-items-center gap-3" style="max-width: 400px;">
                                        <img src="{{ asset('storage/' . $testimony->image) }}" width="70" class="border-2 border-white rounded shadow-sm" alt="Foto Lama">
                                        <div>
                                            <h6 class="fw-bold text-secondary mb-1">Foto Saat Ini</h6>
                                            <p class="text-muted small mb-0 text-truncate" style="max-width: 200px;">{{ basename($testimony->image) }}</p>
                                        </div>
                                    </div>
                                @else
                                    <p id="noImageText" class="text-muted small mb-3"><i class="bi bi-info-circle me-1"></i> Belum ada foto profil tersimpan.</p>
                                @endif

                                <input type="file" 
                                       id="imageInput" 
                                       class="form-control bg-light border border-secondary-subtle shadow-none @error('image') is-invalid @enderror" 
                                       accept="image/png, image/jpeg, image/jpg"
                                       style="border-radius: 10px;">
                                <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Kosongkan jika tidak ingin mengubah foto. Format: JPG/PNG.</div>
                                @error('image')
                                    <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="cropperContainer" class="mb-4 p-3 bg-light border border-secondary-subtle rounded-4" style="display: none;">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-crop fs-5 text-success"></i>
                                    <h6 class="text-success fw-bold mb-0">Sesuaikan Area Foto Baru (Rasio 1:1)</h6>
                                </div>
                                <div class="overflow-hidden rounded-3 shadow-sm bg-white" style="max-width: 400px; margin: 0 auto;">
                                    <img id="imagePreview" style="display: block; max-width: 100%;">
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
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const cropperContainer = document.getElementById('cropperContainer');
        const oldImageContainer = document.getElementById('oldImageContainer');
        const noImageText = document.getElementById('noImageText');

        imageInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                if (oldImageContainer) oldImageContainer.style.display = 'none';
                if (noImageText) noImageText.style.display = 'none';
                
                const reader = new FileReader();
                reader.onload = function (event) {
                    imagePreview.src = event.target.result;
                    cropperContainer.style.display = 'block';

                    if (cropper) { cropper.destroy(); }
                    cropper = new Cropper(imagePreview, {
                        aspectRatio: 1, 
                        viewMode: 1,
                    });
                };
                reader.readAsDataURL(file);
            } else {
                // Tampilkan kembali foto lama jika input file dikosongkan/batal
                // Menggunakan 'flex' karena panel gambar lama di-desain menggunakan d-flex
                if (oldImageContainer) oldImageContainer.style.display = 'flex';
                if (noImageText) noImageText.style.display = 'block';
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
                    let file = new File([blob], "cropped_image.jpg", { type: "image/jpeg" });
                    
                    @this.upload('image', file, (uploadedFilename) => {
                        @this.save();
                    });
                }, 'image/jpeg');
            } else {
                @this.save();
            }
        }
    </script>
</div>