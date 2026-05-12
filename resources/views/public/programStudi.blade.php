<x-layouts.publicLayout>
    <x-slot name="titleHead">
        Program Studi
    </x-slot>
    <x-slot name="title">
        
        <h3 class=" fw-bold">Program Studi <span style="color: #F59F1F">Fakultas Teknik</span></h3>
        <x-layouts.fullLine/>

    </x-slot>
    <x-slot name="mainContent">
        
        <div class="accordion" id="accordionExample">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-4 align-items-center justify-content-center mt-3">
        
                <h3 class=" fw-bold pe-0" style="color: #11667B">Pilih Jurusan:</h3>
        
                <div class="accordion-item border-0">
                    <h5 class="accordion-header">
                        <button id="studiButton" class="text-center rounded-4 w-100 shadow align-items-center justify-content-center px-0 my-3 pt-2" style="border: 5px solid #F59F1F" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div>
                                <p class="fw-bold text-white mt-2">S1 Informatika</p>
                            </div>
                        </button>
                    </h5>
                </div>
        
                <div class=" accordion-item border-0">
                    <h5 class="accordion-header">
                        <button id="studiButton" class="text-center rounded-4 w-100 shadow align-items-center justify-content-center px-0 my-3 pt-2" style="border: 5px solid #F59F1F" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div>
                                <p class="fw-bold text-white mt-2">S1 Sistem Informasi</p>
                            </div>
                        </button>
                    </h5>
                </div>
        
                <div class=" accordion-item border-0">
                    <h5 class="accordion-header">
                        <button id="studiButton" class="text-center rounded-4 w-100 shadow align-items-center justify-content-center px-0 my-3 pt-2" style="border: 5px solid #F59F1F" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <div>
                                <p class="fw-bold text-white mt-2">S1 Rekayasa Komputer</p>
                            </div>
                        </button>
                    </h5>
                </div>
        
            </div>
        
            <div id="mainStudi">
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <x-studi.studiInformatika/>
                    </div>                              
                </div>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <x-studi.studiSistemInformasi/>
                    </div>
                </div>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <x-studi.studiRekayasaKomputer/>
                    </div>
                </div>
            </div>
            
        </div>
    </x-slot>
</x-layouts.publicLayout>