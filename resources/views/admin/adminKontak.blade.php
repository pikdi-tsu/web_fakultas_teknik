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

            <x-layouts.bannerAdmin icon="bi bi-telephone" title="Pengaturan Footer & Floating Chat Widget" subTitle="Kontak & Media Sosial"/>
        
            <livewire:admin.admin-contact/>
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection
