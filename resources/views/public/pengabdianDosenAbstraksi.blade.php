<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Abstraksi
    </x-slot>
    <x-slot name="title">
        <h2 class=" fw-bold" style="color: #11667B"><span class=" text-black">Judul Pengabdian:</span> {{ $dedication->title }}</h2>
        <p class=" fw-bold" style="color: #F59F1F"><span class=" text-black">Tim Penulis:</span> {{ $dedication->team }} <br><span class=" text-black">Sumber Dana:</span> {{ $dedication->fund }} <br><span class=" text-black">Tahun:</span> {{ $dedication->year }}</p>


    </x-slot>
    <x-slot name="mainContent">
        
        <div style="text-align: justify"><span class="fw-bold">Abstraksi:</span><br>{!! $dedication->abstraction !!}</div>
        
    </x-slot>
</x-layouts.publicLayout>