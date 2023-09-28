const nomeInput = document.getElementById('nome');
const senhaContainer = document.getElementById('senha-container');

nomeInput.addEventListener('input', function () {
    if (nomeInput.value.trim() !== '') {
        senhaContainer.style.display = 'block';
    } else {
        senhaContainer.style.display = 'none';
    }
});