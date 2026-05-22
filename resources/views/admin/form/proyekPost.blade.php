@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-plus-square" title="Riset & Pengabdian" subTitle="Formulir Tambah Project Based Learning"/>

            <livewire:admin.admin-project-post/>
        </x-slot>
    </x-layouts.navbarAdmin>
</div>

@endsection
