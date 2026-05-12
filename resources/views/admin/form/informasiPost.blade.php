@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-plus-square" title="Informasi Terkini" subTitle="Formulir Tambah Informasi Fakultas"/>

            <livewire:admin.admin-information-post/>
        </x-slot>
    </x-layouts.navbarAdmin>
</div>

@endsection
