@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-pencil-square" title="Manajemen Profil Fakultas" subTitle="Formulir Edit Data Dosen"/>
            
            <livewire:admin.admin-lecturer-edit :lecturer="$lecturer"/>
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection