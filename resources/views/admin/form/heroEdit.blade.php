@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-pencil-square" title="Manajemen Beranda" subTitle="Formulir Edit Hero Banner"/>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" action="/heroes/{{ $hero->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Judul Banner <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('title') is-invalid @enderror" 
                                           name="title" 
                                           value="{{ old('title', $hero->title) }}" 
                                           placeholder="Tuliskan judul untuk hero banner..."
                                           style="border-radius: 10px;">
                                    @error('title')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Deskripsi Singkat <span class="text-danger">*</span></label>
                                    <textarea class="form-control bg-light border border-secondary-subtle shadow-none @error('description') is-invalid @enderror" 
                                              name="description" 
                                              rows="4" 
                                              placeholder="Tuliskan deskripsi atau pesan singkat..." 
                                              style="border-radius: 10px;">{{ old('description', $hero->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4 border-top pt-4 mt-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Gambar Banner (Maks. 16MB) <span class="text-danger">*</span></label>
                                    
                                    @if($hero->image)
                                        <div class="mb-3 p-3 bg-light border border-secondary-subtle rounded-4 d-flex align-items-center gap-3" style="max-width: 450px;">
                                            <div class="overflow-hidden rounded shadow-sm border-2 border-white" style="width: 120px; height: 60px;">
                                                <img src="{{ asset('storage/' . $hero->image) }}" class="w-100 h-100 object-fit-cover" alt="Banner Saat Ini">
                                            </div>
                                            <div class="overflow-hidden">
                                                <h6 class="fw-bold text-secondary mb-1">Gambar Saat Ini</h6>
                                                <p class="text-muted small mb-0 text-truncate">{{ basename($hero->image) }}</p>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-muted small mb-3"><i class="bi bi-info-circle me-1"></i> Belum ada gambar tersimpan.</p>
                                    @endif
                                
                                    <input type="file" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('image') is-invalid @enderror" 
                                           name="image" 
                                           accept="image/*"
                                           style="border-radius: 10px;">
                                    <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Kosongkan jika tidak ingin mengubah gambar. Format disarankan: JPG atau PNG (landscape).</div>
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