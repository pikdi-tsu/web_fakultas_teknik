@extends('layouts.app')
@section('content')
<div class="container">
    <x-layouts.navbarAdmin>
        <x-slot name="mainContent">
            <div class="d-flex align-items-center text-center justify-content-center" style="min-height: 500px">
                <h3 class=" fw-bold">Selamat Datang!</h3>
            </div>
        </x-slot>
    </x-layouts.navbarAdmin>
</div>
@endsection
