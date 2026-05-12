@extends('layouts.app')
@section('content')
<div class="container py-4">
    <x-layouts.bannerAdmin icon="bi bi-person-vcard" title="Manajemen Portofolio Dosen" subTitle="{{ $lecturer->name }}"/>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if (session('success'))
        <x-success-notification message="{{ session('success') }}"/>
    @endif

    <div class="row row-cols-1 row-cols-lg-3 g-4 my-2">
        
        <div class="col">
            <div class="card shadow rounded-4 h-100 overflow-hidden">
                <div class="card-header bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0 d-flex align-items-center gap-2" style="color:#11667B">
                        <i class="bi bi-journal-text fs-4"></i> Publikasi
                    </h5>
                    <a href="/adminDosenPublikasi/{{ $lecturer->id }}" class="btn btn-sm btn-primary fw-semibold px-3 rounded-pill shadow-sm">
                        <i class="bi bi-plus-lg"></i> Tambah
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive overflow-y-auto" style="max-height: 550px;">
                        <table class="table table-hover align-middle mb-0">
                            <tbody>
                                @foreach ($lpublications as $lpublication)
                                    <tr>
                                        <td class="text-center fw-semibold text-secondary">{{ $loop->iteration }}</td>
                                        <td>
                                            <p class="mb-1 text-dark fw-medium" style="line-height: 1.3;">{{ $lpublication->title }}</p>
                                            <span class="badge bg-light text-secondary border"><i class="bi bi-calendar3"></i> {{ $lpublication->year }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="/adminDosenPublikasi/edit/{{ $lpublication->id }}" class="btn btn-sm btn-outline-warning border-warning-subtle text-dark shadow-sm" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <x-layouts.deleteAdminBtn data="/adminDosenPublikasi/delete/{{ $lpublication->id }}"/>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow rounded-4 h-100 overflow-hidden">
                <div class="card-header bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0 d-flex align-items-center gap-2" style="color:#11667B">
                        <i class="bi bi-journal-medical fs-4"></i> Pengabdian
                    </h5>
                    <a href="/adminDosenPengabdian/{{ $lecturer->id }}" class="btn btn-sm btn-primary fw-semibold px-3 rounded-pill shadow-sm">
                        <i class="bi bi-plus-lg"></i> Tambah
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive overflow-y-auto" style="max-height: 550px;">
                        <table class="table table-hover align-middle mb-0">
                            <tbody>
                                @foreach ($ldedications as $ldedication)
                                    <tr>
                                        <td class="text-center fw-semibold text-secondary">{{ $loop->iteration }}</td>
                                        <td>
                                            <p class="mb-1 text-dark fw-medium" style="line-height: 1.3;">{{ $ldedication->title }}</p>
                                            <span class="badge bg-light text-secondary border"><i class="bi bi-calendar3"></i> {{ $ldedication->year }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="/adminDosenPengabdian/edit/{{ $ldedication->id }}" class="btn btn-sm btn-outline-warning border-warning-subtle text-dark shadow-sm" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <x-layouts.deleteAdminBtn data="/adminDosenPengabdian/delete/{{ $ldedication->id }}"/>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow rounded-4 h-100 overflow-hidden">
                <div class="card-header bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0 d-flex align-items-center gap-2" style="color:#11667B">
                        <i class="bi bi-journal-check fs-4"></i> Kekayaan Int.
                    </h5>
                    <a href="/adminDosenKIntelektual/{{ $lecturer->id }}" class="btn btn-sm btn-primary fw-semibold px-3 rounded-pill shadow-sm">
                        <i class="bi bi-plus-lg"></i> Tambah
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive overflow-y-auto" style="max-height: 550px;">
                        <table class="table table-hover align-middle mb-0">
                            <tbody>
                                @foreach ($lintelectuals as $lintelectual)
                                    <tr>
                                        <td class="text-center fw-semibold text-secondary">{{ $loop->iteration }}</td>
                                        <td>
                                            <p class="mb-1 text-dark fw-medium" style="line-height: 1.3;">{{ $lintelectual->title }}</p>
                                            <span class="badge bg-light text-secondary border"><i class="bi bi-calendar3"></i> {{ $lintelectual->year }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="/adminDosenKIntelektual/edit/{{ $lintelectual->id }}" class="btn btn-sm btn-outline-warning border-warning-subtle text-dark shadow-sm" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <x-layouts.deleteAdminBtn data="/adminDosenKIntelektual/delete/{{ $lintelectual->id }}"/>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 pt-2 d-flex justify-content-end border-top">
        <a href="/lecturers" class="btn btn-success fw-bold px-5 py-2 shadow-sm rounded-pill">
            <i class="bi bi-check2-all me-2"></i> Selesai & Kembali
        </a>
    </div>
</div>
@endsection