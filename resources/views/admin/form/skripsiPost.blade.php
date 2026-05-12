@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-plus-square" title="Kemahasiswaan" subTitle="Formulir Tambah Sidang Skripsi"/>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" method="POST" action="/theses">
                                @csrf
                        
                                <div class="row">
                                    <div class="col-md-7 mb-4">
                                        <label class="form-label fw-bold" style="color: #11667B;">Nama Mahasiswa <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               class="form-control bg-light border border-secondary-subtle shadow-none @error('name') is-invalid @enderror" 
                                               name="name" 
                                               value=""
                                               placeholder="Tuliskan nama lengkap mahasiswa..."
                                               style="border-radius: 10px;">
                                        @error('name')
                                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5 mb-4">
                                        <label class="form-label fw-bold" style="color: #11667B;">NIM <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               class="form-control bg-light border border-secondary-subtle shadow-none @error('nim') is-invalid @enderror" 
                                               name="nim" 
                                               value=""
                                               placeholder="Contoh: 12.3.45678"
                                               style="border-radius: 10px;">
                                        @error('nim')
                                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Judul Skripsi <span class="text-danger">*</span></label>
                                    <textarea class="form-control bg-light border border-secondary-subtle shadow-none @error('title') is-invalid @enderror" 
                                              name="title" 
                                              rows="4" 
                                              placeholder="Tuliskan judul skripsi secara lengkap..."
                                              style="border-radius: 10px;"></textarea>
                                    @error('title')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 border-bottom pb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Dosen Pembimbing <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('supervisor') is-invalid @enderror" 
                                           name="supervisor" 
                                           value=""
                                           placeholder="Tuliskan nama beserta gelar dosen pembimbing..."
                                           style="border-radius: 10px;">
                                    @error('supervisor')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row pt-2">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold" style="color: #11667B;">Tanggal & Jam Pelaksanaan <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-secondary-subtle text-muted" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                                                <i class="bi bi-calendar-event"></i>
                                            </span>
                                            <input type="text" 
                                                   id="tanggal_pelaksanaan" 
                                                   class="form-control bg-light border border-secondary-subtle shadow-none @error('date') is-invalid @enderror" 
                                                   name="date" 
                                                   value=""
                                                   placeholder="Pilih Tanggal & Jam"
                                                   style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; cursor: pointer;">
                                            @error('date')
                                                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold" style="color: #11667B;">Ruangan <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-secondary-subtle text-muted" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                                                <i class="bi bi-geo-alt"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control bg-light border border-secondary-subtle shadow-none @error('room') is-invalid @enderror" 
                                                   name="room" 
                                                   value=""
                                                   placeholder="Contoh: C22"
                                                   style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                                            @error('room')
                                                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#tanggal_pelaksanaan", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true, 
            locale: "id"
        });
    });
</script>

@endsection