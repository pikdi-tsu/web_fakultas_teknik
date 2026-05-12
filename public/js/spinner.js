document.getElementById('form').addEventListener('submit', function () {
    let text = document.getElementById('text');
    let btn = document.getElementById('btn');
    let spinner = document.getElementById('spinner');

    btn.disabled = true;
    text.classList.add('d-none');
    spinner.classList.remove('d-none');
});
