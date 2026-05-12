@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-plus-square" title="Manajemen Profil Fakultas" subTitle="Formulir Data Dosen"/>
        
            <livewire:admin.admin-lecturer-post/>
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection