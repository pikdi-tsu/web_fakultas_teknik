<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Tugas Akhir Mahasiswa
    </x-slot>
    <x-slot name="title">

        <div id="table"></div>
        <x-layouts.publicTitle sectionA="Tugas Akhir Mahasiswa " sectionB="Fakultas Teknik"/>

    </x-slot>
    <x-slot name="mainContent">

        <livewire:public.assignment-panel/>
        
    </x-slot>
</x-layouts.publicLayout>