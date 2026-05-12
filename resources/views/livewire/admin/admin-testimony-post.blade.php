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
                                          style="border-radius: 10px;"></textarea>
                                <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Maksimal 230 karakter.</div>
                                @error('description')
                                    <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold" style="color: #11667B;">Foto Profil (Maks. 16MB) <span class="text-danger">*</span></label>
                                <input type="file" 
                                       id="imageInput" 
                                       class="form-control bg-light border border-secondary-subtle shadow-none @error('image') is-invalid @enderror" 
                                       accept="image/png, image/jpeg, image/jpg"
                                       style="border-radius: 10px;">
                                <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Format: JPG/PNG.</div>
                                @error('image')
                                    <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="cropperContainer" class="mb-4 p-3 bg-light border border-secondary-subtle rounded-4" style="display: none;">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-crop fs-5 text-success"></i>
                                    <h6 class="text-success fw-bold mb-0">Sesuaikan Area Foto (Rasio 1:1)</h6>
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
                                    <span id="text"><i class="bi bi-save me-2"></i> Simpan Data</span>
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

        imageInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
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