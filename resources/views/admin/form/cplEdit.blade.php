@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-pencil-square" title="Manajemen Kurikulum" subTitle="Formulir Edit CPL"/>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" action="/studies/{{ $study_id }}/cpls/{{ $cpl->id }}" method="POST">
                                @csrf
                                @method('PUT')
                        
                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Kode CPL <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('code') is-invalid @enderror" 
                                           name="code" 
                                           value="{{ old('code', $cpl->code) }}"
                                           placeholder="Contoh: CPL01"
                                           style="border-radius: 10px;">
                                    @error('code')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Deskripsi <span class="text-danger">*</span></label>
                                    <textarea class="form-control bg-light border border-secondary-subtle shadow-none @error('description') is-invalid @enderror" 
                                              name="description" 
                                              rows="5" 
                                              placeholder="Tuliskan deskripsi Capaian Pembelajaran Lulusan..."
                                              style="border-radius: 10px;">{{ old('description', $cpl->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-none">
                                    <input type="hidden" name="study_id" value="{{ old('study_id', $cpl->study_id) }}">
                                    @error('study_id')
                                        <div class="text-danger fw-bold small mt-1">{{ $message }}</div>
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