<div>
    <br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 mt-5 align-items-center justify-content-center">
        @foreach ($organizations as $organization)
            <x-organisasiCard image="{{ asset('storage/' . $organization->image) }}" title="{{ $organization->title }}" name="{{ $organization->name }}" link="{{ $organization->link }}" description="{{ $organization->description }}"/>
        @endforeach
    </div>
</div>
