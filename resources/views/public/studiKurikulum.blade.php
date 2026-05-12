<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Kurikulum {{ $curriculum->study->name }}
    </x-slot>
    <x-slot name="title">

        <x-layouts.publicTitle sectionA="Kurikulum - " sectionB="{{ $curriculum->study->name }}"/>

    </x-slot>
    <x-slot name="mainContent">

        <livewire:public.curriculum-panel :study="$study"/>
        
    </x-slot>
</x-layouts.publicLayout>