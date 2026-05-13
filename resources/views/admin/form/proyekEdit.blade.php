@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <x-layouts.bannerAdmin icon="bi bi-pencil-square" title="Riset & Pengabdian" subTitle="Formulir Edit Project Based Learning"/>

            <livewire:admin.admin-project-edit :project="$project"/>
        </x-slot>
    </x-layouts.navbarAdmin>

</div>
@endsection
