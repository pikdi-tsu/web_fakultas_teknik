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

            <x-layouts.bannerAdmin icon="bi bi-book" title="Manajemen Kurikulum" subTitle="{{ $curriculum->study->name }}"/>

            <div class="row justify-content-center">
                <div>
                    <div class="card bg-white shadow rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            
                            <form id="form" action="/kurikulum/{{ $curriculum->id }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label class="form-label fw-bold d-flex align-items-center gap-2" style="color: #11667B;">
                                        Detail Kurikulum
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill small px-2 py-1"><i class="bi bi-file-text"></i> Rich Text</span>
                                    </label>
                                    <input id="description-trix" type="hidden" name="description" value="{{ old('description', $curriculum->description) }}">
                                    <trix-editor input="description-trix" class="bg-light border border-secondary-subtle shadow-none form-control @error('description') is-invalid @enderror"></trix-editor>
                                    @error('description')
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