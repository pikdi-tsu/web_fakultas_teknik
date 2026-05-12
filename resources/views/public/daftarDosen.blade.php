<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Daftar Dosen
    </x-slot>
    <x-slot name="title">
        
        <div id="table"></div>
        <x-layouts.publicTitle sectionA="Daftar Dosen " sectionB="Fakutas Teknik"/>

    </x-slot>
    <x-slot name="mainContent">
        
        <livewire:public.lecturer-panel/>
        
    </x-slot>
</x-layouts.publicLayout>