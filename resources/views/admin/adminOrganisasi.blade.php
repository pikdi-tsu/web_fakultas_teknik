@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            @if (session('success'))
                <x-success-notification message="{{ session('success') }}"/>
            @endif

            <x-layouts.bannerAdmin icon="bi bi-people" title="Kemahasiswaan" subTitle="Organisasi Mahasiswa"/>
        
            <livewire:admin.admin-organization/>
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection
