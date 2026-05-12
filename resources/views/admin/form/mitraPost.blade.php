@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-plus-square" title="Mitra Fakultas" subTitle="Formulir Tambah Mitra Teknik"/>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" method="POST" action="/partners" enctype="multipart/form-data">
                                @csrf
                        
                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Nama Mitra <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('name') is-invalid @enderror" 
                                           name="name" 
                                           value=""
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
                                              style="border-radius: 10px;"></textarea>
                                    @error('description')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 pt-2">
                                    <label class="form-label fw-bold" style="color: #11667B;">Logo Instansi (Maks. 16MB) <span class="text-danger">*</span></label>
                                    <input type="file" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('image') is-invalid @enderror" 
                                           name="image" 
                                           accept="image/*"
                                           style="border-radius: 10px;">
                                    <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Format yang disarankan: JPG, PNG. Pastikan rasio logo proporsional (rasio 1:1).</div>
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