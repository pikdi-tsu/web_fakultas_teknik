document.addEventListener('livewire:init', () => {
    setInterval(() => {
        fetch('/refresh-token')
            .then(res => res.json())
            .then(data => {
                document.querySelector('meta[name="csrf-token"]').content = data.token;
            })
            .catch(err => console.error('Heartbeat failed'));
    }, 1000 * 60 * 15);

    Livewire.hook('request', ({ fail }) => {
        fail(({ status, preventDefault }) => {
            if (status === 419) {
                preventDefault();

                fetch('/refresh-token')
                    .then(res => res.json())
                    .then(data => {
                        document.querySelector('meta[name="csrf-token"]').content = data.token;
                    })
                    .catch(() => window.location.reload());
            }
        });
    });
});