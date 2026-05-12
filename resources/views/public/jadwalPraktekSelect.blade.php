<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Jadwal Seminar Kerja Praktek - {{ $practice->name }}
    </x-slot>

    <x-slot name="title">
    </x-slot>

    <x-slot name="mainContent">
        <div class="container">
            <div class="card shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="row g-0">
                    
                    <div class="col-lg-7 p-4 p-md-5">
                        
                        <div class="mb-4">
                            <span class="badge px-3 py-2 rounded-pill mb-3" style="background-color: rgba(17, 102, 123, 0.1); color: #11667B; font-weight: 600;">
                                <i class="bi bi-person-badge me-2"></i>Identitas Peserta Seminar
                            </span>
                            <h3 class="fw-bold mb-1" style="color: #11667B">{{ $practice->name }}</h3>
                            <p class="text-muted fs-5 mb-4">NIM: {{ $practice->nim }}</p>
                        </div>

                        <div class="mb-4 p-4 rounded-4" style="background-color: #f8f9fa; border: 2px solid #F59F1F;">
                            <label class="text-uppercase small fw-bold text-muted mb-2 d-block" style="letter-spacing: 1px;">Judul Laporan Kerja Praktek</label>
                            <h5 class="fw-bold lh-base mb-0" style="color: #333;">"{{ $practice->title }}"</h5>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background-color: rgba(17, 102, 123, 0.1);">
                                <i class="bi bi-person-workspace" style="color: #11667B;"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Dosen Pembimbing / Penguji</small>
                                <span class="fw-bold text-dark">{{ $practice->supervisor }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 text-white p-4 p-md-5 d-flex flex-column justify-content-between" style="background-color: #11667B;">
                        <div>
                            <span class="badge px-3 py-2 rounded-pill mb-4" style="background-color: rgba(255, 255, 255, 0.2); color: #fff;">
                                <i class="bi bi-calendar-check me-2"></i>Waktu Pelaksanaan
                            </span>

                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <i class="bi bi-calendar3 fs-3 text-warning"></i>
                                    <div>
                                        <small class="opacity-75 d-block">Hari & Tanggal</small>
                                        <h5 class="mb-0 fw-bold">{{ \Carbon\Carbon::parse($practice->date)->locale('id')->translatedFormat('l, d F Y') }}</h5>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <i class="bi bi-clock fs-3 text-warning"></i>
                                    <div>
                                        <small class="opacity-75 d-block">Waktu Seminar</small>
                                        <h5 class="mb-0 fw-bold">{{ \Carbon\Carbon::parse($practice->date)->locale('id')->translatedFormat('H:i') }} WIB</h5>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <i class="bi bi-geo-alt fs-3 text-warning"></i>
                                    <div>
                                        <small class="opacity-75 d-block">Ruangan / Tempat</small>
                                        <h5 class="mb-0 fw-bold">{{ $practice->room }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 pt-4 border-top border-white border-opacity-25 d-flex align-items-center justify-content-between">
                            <div class="small opacity-75 lh-sm">
                                QR Code<br>Link Jadwal Seminar.
                            </div>
                            <div class="bg-white p-2 rounded-3 shadow-sm">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ url()->current() }}" alt="QR Code Jadwal" style="width: 70px; height: 70px;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center mt-4 text-muted small">
                <i class="bi bi-info-circle me-1"></i> Harap hadir 30 menit sebelum waktu pelaksanaan dengan pakaian sesuai ketentuan fakultas.
            </div>
        </div>
    </x-slot>
</x-layouts.publicLayout>