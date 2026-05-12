<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Publikasi Mahasiswa
    </x-slot>
    <x-slot name="title">

        <div id="table"></div>
        <x-layouts.publicTitle sectionA="Publikasi Mahasiswa " sectionB="Fakultas Teknik"/>

    </x-slot>
    <x-slot name="mainContent">

        <livewire:public.publication-panel/>
        
    </x-slot>
</x-layouts.publicLayout>