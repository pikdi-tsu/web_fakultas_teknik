<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Riset Dosen
    </x-slot>
    <x-slot name="title">

        <div id="table"></div>
        <x-layouts.publicTitle sectionA="Riset Dosen " sectionB="Fakultas Teknik"/>

    </x-slot>
    <x-slot name="mainContent">

        <livewire:public.research-panel/>
        
    </x-slot>
</x-layouts.publicLayout>