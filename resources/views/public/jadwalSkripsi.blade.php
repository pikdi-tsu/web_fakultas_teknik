<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Kemahasiswaan - Jadwal Sidang Skripsi
    </x-slot>
    <x-slot name="title">

        <div id="table"></div>
        <x-layouts.publicTitle sectionA="Kemahasiswaan - " sectionB="Jadwal Sidang Skripsi"/>

    </x-slot>
    <x-slot name="mainContent">

        <livewire:public.thesis-panel/>

    </x-slot>
</x-layouts.publicLayout>