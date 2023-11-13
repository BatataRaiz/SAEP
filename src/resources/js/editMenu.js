const toggleButton = document.getElementById('toggleMenu');

document.addEventListener('DOMContentLoaded', function () {
    const menuBar = document.getElementById('menuBar');
    const headers = document.getElementById('headerContent');
    const mainContent = document.getElementById('menu-button'); // Corrigido o ID aqui
    
    toggleButton.addEventListener('click', function () {
        menuBar.classList.toggle('open');
        mainContent.classList.toggle('expanded');
        headers.classList.toggle('expanded');
    });
});

const btnEditar = document.getElementById('btnEditar');
const menuSuspensoEditar = document.getElementById('menuSuspensoEditar');
console.log("teste");

toggleButton.addEventListener('click', function () {
    if (btnEditar.style.display === 'none' || btnEditar.style.display === '') {
        const contatoDev = document.createElement('p');
        console.log("teste");
        contatoDev.textContent = 'Contate: joaodeamo3@gmail.com';

        const br = document.createElement('br');
        contatoDev.appendChild(br);

        const linkedin = document.createElement('a');
        linkedin.href = 'https://www.linkedin.com/in/jo%C3%A3o-victor-martins-deamo-74a3861a3/';
        linkedin.target = '_blank';
        linkedin.textContent = 'LinkedIn';

        contatoDev.style.whiteSpace = 'pre-line';

        contatoDev.appendChild(linkedin);
        btnEditar.appendChild(contatoDev);
        btnEditar.style.display = 'block';
        btnEditar.style.color = '#fff';
        btnEditar.style.marginBottom = '10px';
        btnEditar.style.marginTop = '10px';
        btnEditar.style.paddingLeft = '40px';
        linkedin.style.lineHeight = '1.5';
        linkedin.style.color = '#11a1df';
        linkedin.style.cursor = 'pointer';
        console.log("teste");
    } else {
        btnEditar.style.display = 'none';
        console.log("teste");
    }
});
