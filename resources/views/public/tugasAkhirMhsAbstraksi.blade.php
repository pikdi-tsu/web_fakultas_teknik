<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Abstraksi
    </x-slot>
    <x-slot name="title">
        <h2 class=" fw-bold" style="color: #11667B"><span class=" text-black">Judul Tugas Akhir:</span> {{ $assignment->title }}</h2>
        <p class=" fw-bold" style="color: #F59F1F"><span class=" text-black">Penulis:</span> {{ $assignment->name }} ({{ $assignment->program }})<br><span class=" text-black">Tahun:</span> {{ $assignment->year }}</p>

    </x-slot>
    <x-slot name="mainContent">
        
        <div style="text-align: justify"><span class="fw-bold">Abstraksi:</span><br>{!! $assignment->abstraction !!}</div>
        
    </x-slot>
</x-layouts.publicLayout>