@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-pencil-square" title="Kemahasiswaan" subTitle="Formulir Edit Layanan"/>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" action="/services/{{ $service->id }}" method="POST">
                                @csrf
                                @method('PUT')
                        
                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Nama Layanan <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('title') is-invalid @enderror" 
                                           name="title" 
                                           value="{{ old('title', $service->title) }}"
                                           placeholder="Tuliskan nama layanan mahasiswa..."
                                           style="border-radius: 10px;">
                                    @error('title')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Deskripsi <span class="text-danger">*</span></label>
                                    <textarea class="form-control bg-light border border-secondary-subtle shadow-none @error('description') is-invalid @enderror" 
                                              name="description" 
                                              rows="4" 
                                              placeholder="Tuliskan deskripsi atau panduan singkat mengenai layanan ini..."
                                              style="border-radius: 10px;">{{ old('description', $service->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Link Akses <span class="text-danger">*</span></label>
                                    <input type="url" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('link') is-invalid @enderror" 
                                           name="link" 
                                           value="{{ old('link', $service->link) }}"
                                           placeholder="Contoh: https://layanan.kampus.ac.id/"
                                           style="border-radius: 10px;">
                                    @error('link')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
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