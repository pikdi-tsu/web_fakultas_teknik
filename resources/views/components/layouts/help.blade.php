<style>
    .floating-container {
        position: fixed;
        bottom: 120px;
        right: 20px;
        display: flex;
        flex-direction: column-reverse;
        align-items: flex-end;
        z-index: 9999;
        gap: 12px;
        pointer-events: none;
    }

    .main-fab {
        width: 60px;
        height: 60px;
        background-color: #ffffff;
        color: #11667B;
        border: 2px solid #11667B;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0px 4px 15px rgba(17, 102, 123, 0.2);
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
        pointer-events: auto;
    }

    .main-fab:hover{
        background-color: #f0f0f0;
    }

    .floating-container.active .main-fab {
        background-color: #11667B;
        color: #ffffff;
        transform: rotate(360deg);
    }

    .online-dot {
        position: absolute;
        top: 2px;
        right: 2px;
        width: 14px;
        height: 14px;
        background-color: #25d366;
        border: 2.5px solid #ffffff;
        border-radius: 50%;
        transition: border-color 0.3s ease;
    }

    .floating-container.active .online-dot {
        border-color: #11667B;
    }

    .contact-actions {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 10px;
        
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px) scale(0.9);
        pointer-events: none;
        
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .floating-container.active .contact-actions {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
        pointer-events: auto;
    }

    .btn-cs {
        background-color: #ffffff;
        color: #11667B;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
        border: 1px solid #11667B;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .btn-cs:hover {
        background-color: #f0f0f0;
        transform: scale(1.05) translateX(-5px);
    }
</style>

<div class="floating-container" id="floatingContainer">
    
    <div class="main-fab shadow" id="mainFab">
        <i class="bi bi-whatsapp" style="font-size: 32px;" id="fabIcon"></i>
        <span class="online-dot"></span>
    </div>
    
    <div class="contact-actions">
        <span class="badge fw-bold fs-6 mb-1 align-self-end px-3 py-2 rounded-pill shadow" style="background-color: #11667B">Pusat Bantuan:</span>
        
        @foreach ($helps as $help)
            <a href="https://wa.me/62{{ $help->number }}?text=Halo%20Admin,%20saya%20ingin%20bertanya..." 
               target="_blank" 
               class="btn-cs shadow">
                <i class="bi bi-headset"></i> {{ $help->title }}
            </a>
        @endforeach
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const floatingContainer = document.getElementById('floatingContainer');
        const mainFab = document.getElementById('mainFab');
        const fabIcon = document.getElementById('fabIcon');

        mainFab.addEventListener('click', function(e) {
            floatingContainer.classList.toggle('active');
            
            if (floatingContainer.classList.contains('active')) {
                fabIcon.classList.remove('bi-whatsapp');
                fabIcon.classList.add('bi-x-lg');
            } else {
                fabIcon.classList.remove('bi-x-lg');
                fabIcon.classList.add('bi-whatsapp');
            }
            
            e.stopPropagation();
        });

        document.addEventListener('click', function(e) {
            if (!floatingContainer.contains(e.target)) {
                floatingContainer.classList.remove('active');
                fabIcon.classList.remove('bi-x-lg');
                fabIcon.classList.add('bi-whatsapp');
            }
        });
    });
</script>