@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-plus-square" title="Kemahasiswaan" subTitle="Formulir Tambah Organisasi"/>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" method="POST" action="/organizations" enctype="multipart/form-data">
                                @csrf
                        
                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Nama Organisasi <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('title') is-invalid @enderror" 
                                           name="title" 
                                           value=""
                                           placeholder="Tuliskan nama organisasi mahasiswa..."
                                           style="border-radius: 10px;">
                                    @error('title')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold" style="color: #11667B;">Nama Instagram <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-secondary-subtle text-muted" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">@</span>
                                            <input type="text" 
                                                   class="form-control bg-light border border-secondary-subtle shadow-none @error('name') is-invalid @enderror" 
                                                   name="name" 
                                                   value=""
                                                   placeholder="Contoh: bem_fakultas"
                                                   style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                                            @error('name')
                                                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold" style="color: #11667B;">Link Instagram <span class="text-danger">*</span></label>
                                        <input type="url" 
                                               class="form-control bg-light border border-secondary-subtle shadow-none @error('link') is-invalid @enderror" 
                                               name="link" 
                                               value=""
                                               placeholder="https://instagram.com/..."
                                               style="border-radius: 10px;">
                                        @error('link')
                                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Deskripsi Singkat <span class="text-danger">*</span></label>
                                    <textarea class="form-control bg-light border border-secondary-subtle shadow-none @error('description') is-invalid @enderror" 
                                              name="description" 
                                              rows="4" 
                                              maxlength="200"
                                              placeholder="Tuliskan deskripsi singkat mengenai organisasi (Maks. 200 karakter)..."
                                              style="border-radius: 10px;"></textarea>
                                    <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Maksimal 230 karakter.</div>
                                    @error('description')
                                        <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Logo Organisasi (Maks. 16MB) <span class="text-danger">*</span></label>
                                    <input type="file" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('image') is-invalid @enderror" 
                                           name="image" 
                                           accept="image/*"
                                           style="border-radius: 10px;">
                                    <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Format disarankan: JPG atau PNG (rasio 1:1 / persegi).</div>
                                    @error('image')
                                        <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                    @enderror
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

            <script src="{{ asset('js/spinner.js') }}"></script>
            
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection