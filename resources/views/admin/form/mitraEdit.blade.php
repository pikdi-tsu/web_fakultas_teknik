@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-pencil-square" title="Mitra Fakultas" subTitle="Formulir Edit Mitra Teknik"/>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" action="/partners/{{ $partner->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                        
                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Nama Mitra <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('name') is-invalid @enderror" 
                                           name="name" 
                                           value="{{ old('name', $partner->name) }}"
                                           placeholder="Tuliskan nama instansi/perusahaan mitra..."
                                           style="border-radius: 10px;">
                                    @error('name')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 border-bottom pb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Deskripsi Singkat <span class="text-danger">*</span></label>
                                    <textarea class="form-control bg-light border border-secondary-subtle shadow-none @error('description') is-invalid @enderror" 
                                              name="description" 
                                              rows="5" 
                                              placeholder="Jelaskan secara singkat mengenai profil atau bentuk kerja sama dengan mitra..."
                                              style="border-radius: 10px;">{{ old('description', $partner->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 pt-2">
                                    <label class="form-label fw-bold" style="color: #11667B;">Logo Instansi (Maks. 16MB) <span class="text-danger">*</span></label>
                                    
                                    @if($partner->image)
                                        <div class="mb-3 p-3 bg-light border border-secondary-subtle rounded-4 d-flex align-items-center gap-3" style="max-width: 400px;">
                                            <div class="overflow-hidden rounded shadow-sm border-2 border-white bg-white d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                                <img src="{{ asset('storage/' . $partner->image) }}" class="w-100 h-100 object-fit-contain p-1" alt="Logo Saat Ini">
                                            </div>
                                            <div class="overflow-hidden">
                                                <h6 class="fw-bold text-secondary mb-1">Logo Saat Ini</h6>
                                                <p class="text-muted small mb-0 text-truncate">{{ basename($partner->image) }}</p>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-muted small mb-3"><i class="bi bi-info-circle me-1"></i> Belum ada logo yang tersimpan.</p>
                                    @endif

                                    <input type="file" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('image') is-invalid @enderror" 
                                           name="image" 
                                           accept="image/*"
                                           style="border-radius: 10px;">
                                    <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Kosongkan jika tidak ingin mengubah logo. Format disarankan: JPG atau PNG (rasio 1:1).</div>
                                    @error('image')
                                        <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
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
            
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection