@props(['message'])

<style>
  @keyframes slideInRight {
    0% { transform: translateX(120%); opacity: 0; }
    100% { transform: translateX(0); opacity: 1; }
  }
  
  @keyframes slideOutRight {
    0% { transform: translateX(0); opacity: 1; }
    100% { transform: translateX(120%); opacity: 0; }
  }

  .toast-slide-in {
    animation: slideInRight 0.5s cubic-bezier(0.25, 1.2, 0.25, 1) forwards; 
  }

  .toast-slide-out {
    animation: slideOutRight 0.4s ease-in forwards;
  }
</style>

<div id="custom-success-alert" class="alert alert-success alert-dismissible shadow-lg border-0 position-fixed bottom-0 end-0 m-4 p-0 overflow-hidden toast-slide-in" style="z-index: 1055; min-width: 320px; border-radius: 12px;" role="alert">
    
  <div class="p-4 pe-5 d-flex align-items-center bg-white">
    <i class="bi bi-check-circle-fill fs-3 me-3 text-success"></i>
    <div>
      <h5 class="alert-heading mb-1 fs-6 fw-bold text-success">Berhasil!</h5>
      <p class="mb-0 text-dark small" style="opacity: 0.9;">{{ $message }}</p>
    </div>
    <button type="button" id="btn-close-toast" class="btn-close m-3" aria-label="Tutup"></button>
  </div>

  <div class="position-absolute bottom-0 start-0 w-100" style="height: 3px; background-color: rgba(25, 135, 84, 0.2);">
    <div id="alert-progress" class="h-100 bg-success" style="width: 100%; transition: width 4s linear; border-radius: 2px;"></div>
  </div>
</div>

<script>
(function() {
  const alertNode = document.getElementById('custom-success-alert');
  const progressBar = document.getElementById('alert-progress');
  const closeBtn = document.getElementById('btn-close-toast');
  
  if (alertNode) {
    setTimeout(() => {
      if(progressBar) progressBar.style.width = '0%';
    }, 50);

    const closeAlert = () => {
      alertNode.classList.remove('toast-slide-in');
      alertNode.classList.add('toast-slide-out');
      
      setTimeout(() => {
        alertNode.remove();
      }, 400);
    };

    if(closeBtn) {
      closeBtn.addEventListener('click', closeAlert);
    }

    setTimeout(closeAlert, 4000); 
  }
})();
</script>