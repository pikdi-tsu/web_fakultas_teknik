@extends('layouts.app')
@section('content')

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
        background-color: #f8f9fa;
        border-radius: 10px;
    }
    trix-editor a, trix-editor pre {
        white-space: pre-wrap !important;
        word-break: break-all !important;
    }
</style>

<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-plus-square" title="Riset & Pengabdian" subTitle="Formulir Tambah Pengabdian Dosen"/>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" method="POST" action="/dedications">
                                @csrf
                        
                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Judul Pengabdian <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('title') is-invalid @enderror" 
                                           name="title" 
                                           value=""
                                           placeholder="Tuliskan judul pengabdian secara lengkap..."
                                           style="border-radius: 10px;">
                                    @error('title')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 border-bottom pb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Tim Pengabdian <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('team') is-invalid @enderror" 
                                           name="team" 
                                           value=""
                                           placeholder="Contoh: Dr. Budi (Ketua), Andi, Siti..."
                                           style="border-radius: 10px;">
                                    @error('team')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row pt-2">
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label fw-bold" style="color: #11667B;">Tahun <span class="text-danger">*</span></label>
                                        <input type="number" 
                                               class="form-control bg-light border border-secondary-subtle shadow-none @error('year') is-invalid @enderror" 
                                               name="year" 
                                               value=""
                                               placeholder="Contoh: 2024"
                                               style="border-radius: 10px;">
                                        @error('year')
                                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-8 mb-4">
                                        <label class="form-label fw-bold" style="color: #11667B;">Sumber Dana <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               class="form-control bg-light border border-secondary-subtle shadow-none @error('fund') is-invalid @enderror" 
                                               name="fund" 
                                               value=""
                                               placeholder="Contoh: Mandiri / Hibah DIKTI / Dana Fakultas..."
                                               style="border-radius: 10px;">
                                        @error('fund')
                                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 border-top pt-4 mt-4" wire:ignore>
                                    <label class="form-label fw-bold d-flex align-items-center gap-2" style="color: #11667B;">
                                        Abstraksi / Deskripsi Singkat
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill px-2 py-1" style="font-size: 0.75rem;">Rich Text</span>
                                    </label>
                                    <input id="abstraction-trix" type="hidden" name="abstraction" value="">
                                    <trix-editor input="abstraction-trix" 
                                                 class="trix-content border-secondary-subtle shadow-none @error('abstraction') border-danger @enderror" 
                                                 style="padding: 15px;"></trix-editor>
                                    @error('abstraction')
                                        <div class="text-danger fw-semibold small mt-2">{{ $message }}</div>
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
            <script>
                document.addEventListener("trix-file-accept", function(event) {
                    event.preventDefault(); 
                });
            </script>
            
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection