@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-envelope-at" title="Pengaturan Akun" subTitle="Ubah Email Admin"/>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" action="/adminUserEmail/{{ $user->id }}" method="POST">
                                @csrf
                                @method('PUT')
                        
                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Email Admin <span class="text-danger">*</span></label>
                                    <input type="email" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('email') is-invalid @enderror" 
                                           name="email" 
                                           value="{{ old('email', $user->email) }}"
                                           placeholder="Tuliskan alamat email yang baru..."
                                           style="border-radius: 10px;">
                                    <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Pastikan Email Aktif (digunakan juga untuk reset kata sandi).</div>
                                    @error('email')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4 pt-2 border-top">
                                    <label class="form-label fw-bold mt-3" style="color: #11667B;">Konfirmasi Password <span class="text-danger">*</span></label>
                                    <input type="password" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('current_password') is-invalid @enderror" 
                                           name="current_password" 
                                           placeholder="Masukkan password Anda saat ini..."
                                           style="border-radius: 10px;">
                                    <div class="form-text text-muted small mt-2"><i class="bi bi-info-circle me-1"></i> Dibutuhkan untuk memverifikasi bahwa perubahan ini dilakukan oleh Anda.</div>
                                    @error('current_password')
                                        <div class="invalid-feedback fw-semibold d-block">{{ $message }}</div>
                                    @enderror
                                </div>
        
                                <div class="d-flex justify-content-end align-items-center gap-3 mt-5 pt-4 border-top">
                                    <a href="javascript:history.back()" class="btn btn-light fw-bold px-4 rounded-pill text-secondary border">
                                        Batal
                                    </a>
                                    <button id="btn" type="submit" class="btn btn-primary fw-bold px-5 rounded-pill shadow-sm" style="background-color: #11667B; border-color: #11667B;">
                                        <span id="text"><i class="bi bi-save me-2"></i> Perbarui Email</span>
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