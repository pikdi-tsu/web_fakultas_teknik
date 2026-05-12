@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-plus-square" title="Manajemen Kurikulum" subTitle="Formulir Tambah Mata Kuliah"/>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" method="POST" action="/studies/{{ $study_id }}/subjects">
                                @csrf
                        
                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Nama Mata Kuliah <span class="text-danger">*</span></label>
                                    <textarea class="form-control bg-light border border-secondary-subtle shadow-none @error('name') is-invalid @enderror" 
                                              name="name" 
                                              rows="3" 
                                              placeholder="Tuliskan nama mata kuliah secara lengkap..."
                                              style="border-radius: 10px;"></textarea>
                                    @error('name')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label fw-bold" style="color: #11667B;">Semester <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               class="form-control bg-light border border-secondary-subtle shadow-none @error('semester') is-invalid @enderror" 
                                               name="semester" 
                                               value=""
                                               placeholder="Contoh: 1, 2, 3..."
                                               style="border-radius: 10px;">
                                        @error('semester')
                                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <label class="form-label fw-bold" style="color: #11667B;">Keterangan <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               class="form-control bg-light border border-secondary-subtle shadow-none @error('description') is-invalid @enderror" 
                                               name="description" 
                                               value=""
                                               placeholder="Contoh: Wajib / Pilihan"
                                               style="border-radius: 10px;">
                                        @error('description')
                                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <label class="form-label fw-bold" style="color: #11667B;">SKS <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               class="form-control bg-light border border-secondary-subtle shadow-none @error('credit') is-invalid @enderror" 
                                               name="credit" 
                                               value=""
                                               placeholder="Contoh: 2, 3, 4..."
                                               style="border-radius: 10px;">
                                        @error('credit')
                                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-none">
                                    <input type="hidden" name="study_id" value="{{ $study_id }}">
                                    @error('study_id')
                                        <div class="text-danger fw-bold small mt-1">{{ $message }}</div>
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