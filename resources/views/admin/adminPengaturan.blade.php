@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if (session('success'))
                <x-success-notification message="{{ session('success') }}"/>
            @endif


            <div class="mb-4 mt-3">
                <h3 class="fw-bold mb-1" style="color: #11667B;">Pengaturan Akun</h3>
                <p class="text-muted">Kelola kredensial keamanan dan akses sistem.</p>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card shadow rounded-3">
                        <div class="list-group list-group-flush rounded-3">

                            <div class="bg-white list-group-item p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="p-2 bg-light rounded text-center" style="width: 48px;">
                                        <i class="bi bi-envelope-at fs-4" style="color: #11667B;"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1" style="color: #11667B;">Alamat Surel (Email)</h6>
                                        <p class="mb-0 text-secondary small">Perbarui alamat email akun.</p>
                                    </div>
                                </div>
                                <div class="text-md-end">
                                    <a id="hover" href="/adminUserEmail" class="btn btn-outline-primary px-4 fw-semibold w-100">Ubah Email</a>
                                </div>
                            </div>

                            <div class="bg-white list-group-item p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="p-2 bg-light rounded text-center" style="width: 48px;">
                                        <i class="bi bi-shield-lock fs-4" style="color: #11667B;"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1" style="color: #11667B;">Kata Sandi (Password)</h6>
                                        <p class="mb-0 text-secondary small">Perbarui kata sandi secara berkala menggunakan kombinasi yang kuat.</p>
                                    </div>
                                </div>
                                <div class="text-md-end">
                                    <a id="hover" href="/adminUserPassword" class="btn btn-outline-primary px-4 fw-semibold w-100">Ubah Password</a>
                                </div>
                            </div>

                            <div class="bg-white list-group-item p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-light">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="p-2 bg-light rounded text-center" style="width: 48px;">
                                        <i class="bi bi-box-arrow-right fs-4 text-danger"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-danger mb-1">Keluar Sistem (Log Out)</h6>
                                        <p class="mb-0 text-secondary small">Akhiri sesi saat ini dan keluar dari portal administrasi.</p>
                                    </div>
                                </div>
                                <div class="text-md-end">
                                    <a href="{{ route('logout') }}" 
                                       class="btn btn-danger px-4 fw-semibold shadow-sm w-100" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Log Out
                                    </a>
                                </div>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection