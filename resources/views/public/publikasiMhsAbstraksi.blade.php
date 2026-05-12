<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Abstraksi
    </x-slot>
    <x-slot name="title">
        <h2 class=" fw-bold" style="color: #11667B"><span class=" text-black">Judul Publikasi:</span> {{ $publication->title }} <span><a href="{{ $publication->link }}" target="_blank" class="btn btn-primary p-1 fw-bold">Lihat Jurnal</a></span></h2>
        <p class=" fw-bold" style="color: #F59F1F"><span class=" text-black">Tim Penulis:</span> {{ $publication->team }}<br><span class=" text-black">Tahun:</span> {{ $publication->year }}</p>
    </x-slot>
    <x-slot name="mainContent">
        
        <div style="text-align: justify"><span class="fw-bold">Abstraksi:</span><br>{!! $publication->abstraction !!}</div>

        
    </x-slot>
</x-layouts.publicLayout>