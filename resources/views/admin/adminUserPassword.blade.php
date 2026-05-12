@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-shield-lock" title="Pengaturan Akun" subTitle="Ubah Password Admin"/>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" action="/adminUserPassword/{{ $user->id }}" method="POST">
                                @csrf
                                @method('PUT')
                        
                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Password Sebelumnya <span class="text-danger">*</span></label>
                                    <input type="password" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('current_password') is-invalid @enderror" 
                                           name="current_password" 
                                           placeholder="Masukkan password saat ini..."
                                           style="border-radius: 10px;">
                                    @error('current_password')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Password Baru <span class="text-danger">*</span></label>
                                    <input type="password" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('password') is-invalid @enderror" 
                                           name="password" 
                                           placeholder="Masukkan password baru..."
                                           style="border-radius: 10px;">
                                    @error('password')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="color: #11667B;">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                    <input type="password" 
                                           class="form-control bg-light border border-secondary-subtle shadow-none @error('password_confirmation') is-invalid @enderror" 
                                           name="password_confirmation" 
                                           placeholder="Ketik ulang password baru..."
                                           style="border-radius: 10px;">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end align-items-center gap-3 mt-5 pt-4 border-top">
                                    <a href="javascript:history.back()" class="btn btn-light fw-bold px-4 rounded-pill text-secondary border">
                                        Batal
                                    </a>
                                    <button id="btn" type="submit" class="btn btn-primary fw-bold px-5 rounded-pill shadow-sm" style="background-color: #11667B; border-color: #11667B;">
                                        <span id="text"><i class="bi bi-save me-2"></i> Perbarui Password</span>
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