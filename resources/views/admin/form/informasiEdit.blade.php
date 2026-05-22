@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-pencil-square" title="Informasi Terkini" subTitle="Formulir Edit Informasi Fakultas"/>

            <livewire:admin.admin-information-edit :information="$information"/>
        </x-slot>
    </x-layouts.navbarAdmin>
    
</div>
@endsection
