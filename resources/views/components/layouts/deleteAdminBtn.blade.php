<form action="{{ $data }}" method="POST" class="form-delete">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-outline-danger border-danger-subtle shadow-sm btn-delete" title="Hapus Data">
        <i class="bi bi-trash"></i>
    </button>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                
                const form = this.closest('form');

                Swal.fire({
                    title: 'Hapus Data?',
                    text: "Data ini akan dihapus permanen dan tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d', 
                    confirmButtonText: '<i class="bi bi-trash me-1"></i> Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    customClass: {
                        confirmButton: 'shadow-sm rounded-pill px-4',
                        cancelButton: 'shadow-sm rounded-pill px-4'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); 
                    }
                });
            });
        });
    });
</script>