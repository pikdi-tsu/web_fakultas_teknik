<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Dokumen
    </x-slot>
    <x-slot name="title">

        <div id="table"></div>
        <x-layouts.publicTitle sectionA="File Dokumen " sectionB="Fakultas Teknik"/>

    </x-slot>
    <x-slot name="mainContent">
        
        <livewire:public.document-panel/>
        
    </x-slot>
</x-layouts.publicLayout>