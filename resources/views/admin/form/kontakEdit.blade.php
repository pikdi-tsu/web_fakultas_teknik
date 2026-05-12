@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-pencil-square" title="Kontak & Media Sosial" subTitle="Formulir Edit Kontak & Media Sosial"/>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" action="/contacts/{{ $contact->id }}" method="POST">
                                @csrf
                                @method('PUT')
                        
                                <div class="mb-4">
                                    <label class="form-label fw-bold d-flex align-items-center gap-2" style="color: #11667B;">
                                        Label / Ikon 
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary-subtle px-2 py-1" style="font-size: 0.75rem;">html*</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('label') is-invalid @enderror" 
                                           name="label" 
                                           value="{{ old('label', $contact->label) }}"
                                           placeholder="Contoh: <i class='bi bi-instagram'></i> Instagram"
                                           style="border-radius: 10px;">
                                    <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Tag HTML untuk <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap Icon</a>.</div>
                                    @error('label')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Tautan / Link URL <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-secondary-subtle text-muted" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                                            <i class="bi bi-link-45deg"></i>
                                        </span>
                                        <input type="url" 
                                               class="form-control bg-light border border-secondary-subtle shadow-none @error('link') is-invalid @enderror" 
                                               name="link" 
                                               value="{{ old('link', $contact->link) }}"
                                               placeholder="Contoh: https://instagram.com/kampus..."
                                               style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                                        @error('link')
                                            <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                        @enderror
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

            <script src="{{ asset('js/spinner.js') }}"></script>
            
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection