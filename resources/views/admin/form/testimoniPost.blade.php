@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-plus-square" title="Manajemen Lulusan" subTitle="Formulir Tambah Data Testimoni"/>

            <livewire:admin.admin-testimony-post/>
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection