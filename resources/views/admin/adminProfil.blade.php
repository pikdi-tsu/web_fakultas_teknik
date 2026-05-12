@extends('layouts.app')
@section('content')
<div class="container">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] { display: none !important; }
        trix-editor { 
            min-height: 250px;
            max-width: 100%; 
            overflow-x: hidden;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
        }
        trix-editor a, trix-editor pre {
            white-space: pre-wrap !important;
            word-break: break-all !important;
        }
        trix-editor.form-control {
            border-radius: 10px;
        }
    </style>

    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            
            @if (session('success'))
                <div class="mb-3">
                    <x-success-notification message="{{ session('success') }}"/>
                </div>
            @endif
            
            @if (session('status'))
                <div class="alert alert-success border-0 shadow-sm rounded-4 mb-3" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
                </div>
            @endif

            <x-layouts.bannerAdmin icon="bi bi-building" title="Manajemen Profil Fakultas" subTitle="Formulir Edit Tentang Kami"/>

            <div class="row justify-content-center">
                <div>
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" action="/adminProfil/{{ $profile->id }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Informasi Singkat <span class="text-danger">*</span></label>
                                    <textarea class="form-control bg-light border border-secondary-subtle shadow-none @error('shortInfo') is-invalid @enderror" 
                                              name="shortInfo" 
                                              rows="4" 
                                              placeholder="Tuliskan deskripsi singkat mengenai fakultas..."
                                              style="border-radius: 10px;">{{ old('shortInfo', $profile->shortInfo) }}</textarea>
                                    @error('shortInfo')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 border-top pt-4">
                                    <label class="form-label fw-bold d-flex align-items-center gap-2" style="color: #11667B;">
                                        Informasi Profil 
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill small px-2 py-1"><i class="bi bi-file-text"></i> Rich Text</span>
                                    </label>
                                    <input id="profileInformation-trix" type="hidden" name="profileInformation" value="{{ old('profileInformation', $profile->profileInformation) }}">
                                    <trix-editor input="profileInformation-trix" class="bg-light border border-secondary-subtle shadow-none form-control @error('profileInformation') is-invalid @enderror"></trix-editor>
                                    @error('profileInformation')
                                        <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 border-top pt-4">
                                    <label class="form-label fw-bold d-flex align-items-center gap-2" style="color: #11667B;">
                                        Visi
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill small px-2 py-1"><i class="bi bi-file-text"></i> Rich Text</span>
                                    </label>
                                    <input id="visi-trix" type="hidden" name="visi" value="{{ old('visi', $profile->visi) }}">
                                    <trix-editor input="visi-trix" class="bg-light border border-secondary-subtle shadow-none form-control @error('visi') is-invalid @enderror"></trix-editor>
                                    @error('visi')
                                        <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 border-top pt-4">
                                    <label class="form-label fw-bold d-flex align-items-center gap-2" style="color: #11667B;">
                                        Misi
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill small px-2 py-1"><i class="bi bi-file-text"></i> Rich Text</span>
                                    </label>
                                    <input id="misi-trix" type="hidden" name="misi" value="{{ old('misi', $profile->misi) }}">
                                    <trix-editor input="misi-trix" class="bg-light border border-secondary-subtle shadow-none form-control @error('misi') is-invalid @enderror"></trix-editor>
                                    @error('misi')
                                        <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 border-top pt-4">
                                    <label class="form-label fw-bold d-flex align-items-center gap-2" style="color: #11667B;">
                                        Tujuan
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill small px-2 py-1"><i class="bi bi-file-text"></i> Rich Text</span>
                                    </label>
                                    <input id="tujuan-trix" type="hidden" name="tujuan" value="{{ old('tujuan', $profile->tujuan) }}">
                                    <trix-editor input="tujuan-trix" class="bg-light border border-secondary-subtle shadow-none form-control @error('tujuan') is-invalid @enderror"></trix-editor>
                                    @error('tujuan')
                                        <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 border-top pt-4">
                                    <label class="form-label fw-bold d-flex align-items-center gap-2" style="color: #11667B;">
                                        Sasaran
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill small px-2 py-1"><i class="bi bi-file-text"></i> Rich Text</span>
                                    </label>
                                    <input id="sasaran-trix" type="hidden" name="sasaran" value="{{ old('sasaran', $profile->sasaran) }}">
                                    <trix-editor input="sasaran-trix" class="bg-light border border-secondary-subtle shadow-none form-control @error('sasaran') is-invalid @enderror"></trix-editor>
                                    @error('sasaran')
                                        <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 border-top pt-4">
                                    <label class="form-label fw-bold d-flex align-items-center gap-2" style="color: #11667B;">
                                        Strategi
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill small px-2 py-1"><i class="bi bi-file-text"></i> Rich Text</span>
                                    </label>
                                    <input id="strategi-trix" type="hidden" name="strategi" value="{{ old('strategi', $profile->strategi) }}">
                                    <trix-editor input="strategi-trix" class="bg-light border border-secondary-subtle shadow-none form-control @error('strategi') is-invalid @enderror"></trix-editor>
                                    @error('strategi')
                                        <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end align-items-center gap-3 mt-5 pt-4 border-top">
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
            <script>
                document.addEventListener("trix-file-accept", function(event) {
                    event.preventDefault(); 
                });
            </script>
            
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection