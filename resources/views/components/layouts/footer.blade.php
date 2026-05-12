<div class="mt-5 pt-5 pb-1" style="background-color: #11667B">
    <div class="container text-center">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 text-white">
            <div class="col" style="text-align: justify">
                <img src="{{ asset('images/LogoTSUwhite.svg') }}" alt="Logo" width="120">
                <p>Perguruan tinggi berbasis kolaborasi industri dan Teaching Factory yang berkomitmen mencetak lulusan yang relevan dengan kebutuhan industri serta meningkatkan indeks entrepreneurship di Indonesia. </p>
            </div>
            <div class="col text-start mb-2">
                <h4 class=" opacity-75 fw-bold text-white">Kontak & Media Sosial</h4>
                <hr>
                @foreach ($contacts as $contact)
                    • <a href="{{ $contact->link }}" class="text-white">{!! $contact->label !!}</a><br>
                @endforeach
            </div>
            <div class="col">
                <h4 class=" text-start opacity-75 fw-bold">Peta Lokasi</h4>
                <hr>
                <iframe class=" mt-2 shadow rounded-5 w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d494.3840853419569!2d110.79883318260202!3d-7.567055012521217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a142c55e64769%3A0x9bb451d3422cd0c!2sTiga%20Serangkai%20University%20(TSU)!5e0!3m2!1sid!2sid!4v1765733255249!5m2!1sid!2sid" height="200" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <p class=" text-white text-center opacity-75 pt-3">© Copyright <?php date_default_timezone_set('Asia/Jakarta'); echo date("Y") ?> - <span class=" fw-bold">Fakultas Teknik</span> | Tiga Serangkai University </p>
    </div>
</div>