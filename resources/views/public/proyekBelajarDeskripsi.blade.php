<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Deskripsi
    </x-slot>
    <x-slot name="title">
        <h2 class=" fw-bold" style="color: #11667B"><span class=" text-black">Judul Project Based Learning:</span><br>{{ $project->title }}</h2>
        <div class="{{ $project->link ?? 'd-none' }}"><a href="{{ $project->link }}" target="_blank" class="btn btn-primary p-1 fw-bold">Link Tempat Pembelajaran</a></div>
    </x-slot>
    <x-slot name="mainContent">
        
        <br>
        <div style="text-align: justify"><span class="fw-bold">Deskripsi:</span><br>{!! $project->description !!}</div>
        
    </x-slot>
</x-layouts.publicLayout>