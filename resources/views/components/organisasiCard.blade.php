<div class="px-0 mx-3 mt-2" style="width: 18rem">
    <div class=" rounded-5 text-center mb-5 shadow-lg w-100" style="border: 5px solid #F59F1F; min-height:360px; background-color: #11667B;">
        <img src="{{ $image }}" class=" rounded-circle bg-white" style="border: 5px solid #F59F1F; transform: translateY(-45px); object-fit: cover; object-position: center;" alt="Logo" width="130" height="130">
        <div class="card-body text-center">
            <p class="card-text px-2 fw-bold fs-5 text-white" style="margin-top: -25px">
                {{ $title }}<br>
                <a href="{{ $link }}" target="_blank" class=" fw-bold fs-6" style="color: #F59F1F"><i class="bi bi-instagram"></i> {{ $name }}</a>
            </p>
            <div class="w-100 mb-2" style="background-color: #F59F1F; height: 5px"></div>
            <div class="d-flex justify-content-center align-items-center" style="min-height: 150px">
                <p class="card-text text-start mx-3 pb-3 text-white opacity-75">{{ Str::substr($description, 0, 200) }}<span class=" fst-italic opacity-50"></span></p>
            </div>
        </div>
    </div>
</div>