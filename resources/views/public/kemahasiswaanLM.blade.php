<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Kemahasiswaan - Layanan Mahasiswa
    </x-slot>
    <x-slot name="title">
        
        <div id="table"></div>
        <x-layouts.publicTitle sectionA="Kemahasiswaan - " sectionB="Layanan Mahasiswa"/>

    </x-slot>
    <x-slot name="mainContent">

        <livewire:public.service-panel/>

    </x-slot>
</x-layouts.publicLayout>