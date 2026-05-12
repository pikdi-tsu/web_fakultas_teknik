<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Pusat Informasi
    </x-slot>
    <x-slot name="title">

        <div id="table"></div>
        <x-layouts.publicTitle sectionA="Informasi Terkini " sectionB="Fakultas Teknik"/>

    </x-slot>
    <x-slot name="mainContent">

        <livewire:public.information-panel/>
        
    </x-slot>
</x-layouts.publicLayout>