@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-pencil-square" title="Manajemen Lulusan" subTitle="Formulir Edit Data Testimoni"/>
        
            <livewire:admin.admin-testimony-edit :testimony="$testimony"/>
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection