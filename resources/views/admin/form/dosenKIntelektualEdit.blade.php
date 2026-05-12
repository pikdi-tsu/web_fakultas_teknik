@extends('layouts.app')
@section('content')
<div class="container py-4">
    <x-layouts.bannerAdmin icon="bi bi-pencil-square" title="Formulir Edit Data Kekayaan Intelektual" subTitle="{{ $lintelectual->lecturer->name }}"/>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card bg-white shadow rounded-4 overflow-hidden">
                <div class="card-body p-4 p-lg-5">
                    
                    <form id="form" action="/adminDosenKIntelektual/update/{{ $lintelectual->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="lecturer_id" value="{{ old('lecturer_id', $lintelectual->lecturer_id) }}">
                        @error('lecturer_id')
                            <div class="alert alert-danger py-2 small">{{ $message }}</div>
                        @enderror

                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: #11667B;">Judul Kekayaan Intelektual <span class="text-danger">*</span></label>
                            <textarea class="form-control bg-light border border-secondary-subtle shadow-none @error('title') is-invalid @enderror" 
                                      name="title" 
                                      rows="4" 
                                      placeholder="Tuliskan judul paten, hak cipta, atau kekayaan intelektual lainnya..." 
                                      style="border-radius: 10px;">{{ old('title', $lintelectual->title) }}</textarea>
                            @error('title')
                                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4" style="max-width: 300px;">
                            <label class="form-label fw-bold" style="color: #11667B;">Tahun Diperoleh <span class="text-danger">*</span></label>
                            <input type="number" 
                                   class="form-control bg-light border border-secondary-subtle shadow-none @error('year') is-invalid @enderror" 
                                   name="year" 
                                   value="{{ old('year', $lintelectual->year) }}"
                                   placeholder="Contoh: 2024" 
                                   min="1900" 
                                   max="2099"
                                   style="border-radius: 10px;">
                            @error('year')
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
</div>
@endsection