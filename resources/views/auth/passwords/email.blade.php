@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Disamakan menjadi 80vh agar konsisten dengan halaman pembuatan sandi baru --}}
    <div class="row flex align-items-center justify-content-center" style="min-height: 80vh">
        <div class="col-md-8">
            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-white fw-bold" style="color: #11667B; border-bottom: 2px solid #f8f9fa;">
                    Lupa Kata Sandi
                </div>

                <div class="card-body p-4">
                    {{-- Alert ketika email berhasil dikirim --}}
                    @if (session('status'))
                        <div class="alert alert-success border-0 rounded-3" role="alert" style="background-color: #d1e7dd; color: #0f5132;">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Tambahan teks petunjuk UX --}}
                    <div class="mb-4 text-muted text-center" style="font-size: 0.95rem;">
                        Masukkan alamat email yang terdaftar pada sistem. Akan dikirim tautan untuk mengatur ulang kata sandi.
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Alamat Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="contoh: dosen@fakultasteknik.ac.id">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn text-white px-4 fw-bold" style="background-color: #11667B;">
                                    <i class="bi bi-envelope-paper me-1"></i> Kirim Tautan Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection