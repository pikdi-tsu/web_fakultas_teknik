@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            @if (session('success'))
                <x-success-notification message="{{ session('success') }}"/>
            @endif
            
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <x-layouts.bannerAdmin icon="bi bi-journal-bookmark" title="Mata Kuliah" subTitle="{{ $study->name }}"/>
        
            <livewire:admin.admin-subject :study="$study"/>
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection
