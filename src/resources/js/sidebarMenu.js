document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const headers = document.getElementById('headerContent');
    //const mainContent = document.getElementById('mainContent');
    const mainContent = document.getElementById('sidebar-button');
    toggleButton.addEventListener('click', function () {
        sidebar.classList.toggle('open'); // Adiciona ou remove a classe 'open' da Sidebar
        mainContent.classList.toggle('expanded');
        headers.classList.toggle('expanded');
    });
});
const btnContato = document.getElementById('btnContato');
const menuSuspensoContato = document.getElementById('menuSuspensoContato');
let contatoCriado = false;

btnContato.addEventListener('click', function () {
    if (!contatoCriado) {
        const contatoDev = document.createElement('p');
        contatoDev.textContent = 'Contate: joaodeamo3@gmail.com';

        const br = document.createElement('br');
        contatoDev.appendChild(br);

        const linkedin = document.createElement('a');
        linkedin.href = 'https://www.linkedin.com/in/jo%C3%A3o-victor-martins-deamo-74a3861a3/';
        linkedin.target = '_blank';
        linkedin.textContent = 'LinkedIn';
        contatoDev.style.whiteSpace = 'pre-line';

        contatoDev.appendChild(linkedin);
        menuSuspensoContato.appendChild(contatoDev);
        menuSuspensoContato.style.display = 'block';
        menuSuspensoContato.style.color = '#fff';
        menuSuspensoContato.style.marginBottom = '10px';
        menuSuspensoContato.style.marginTop = '10px';
        menuSuspensoContato.style.paddingLeft = '40px';
        linkedin.style.lineHeight = '1.5';
        linkedin.style.color = '#11a1df';
        linkedin.style.cursor = 'pointer';

        // Adiciona o hover
        linkedin.addEventListener('mouseover', function () {
            linkedin.style.color = '#007bff';
        });
        linkedin.addEventListener('mouseout', function () {
            linkedin.style.color = '#11a1df';
        });
        contatoCriado = true; // Atualiza o status do contato para criado
    }
    // Alterna a visibilidade do menu suspenso ao clicar no botão
    if (menuSuspensoContato.style.display === 'none' || menuSuspensoContato.style.display === '') {
        menuSuspensoContato.style.display = 'block';
        menuSuspensoContato.style.color = '#fff';
        menuSuspensoContato.style.marginBottom = '10px';
        menuSuspensoContato.style.marginTop = '10px';
        menuSuspensoContato.style.paddingLeft = '40px';
    } else {
        menuSuspensoContato.style.display = 'none';
    }
}
);

const btnAjuda = document.getElementById('btnAjuda');
const menuSuspensoAjuda = document.getElementById('menuSuspensoAjuda');
let ajudaCriado = false;

btnAjuda.addEventListener('click', function () {
    if (!ajudaCriado) {
        const ajudaDev = document.createElement('p');
        const link = document.createElement('a');
        link.href = 'https://www.planalto.gov.br/ccivil_03/_ato2015-2018/2018/lei/l13709.htm';
        link.target = '_blank';
        link.textContent = 'LGPD';
        link.style.cursor = 'pointer';

        ajudaDev.appendChild(link);
        menuSuspensoAjuda.appendChild(ajudaDev);
        menuSuspensoAjuda.style.display = 'block';
        menuSuspensoAjuda.style.color = '#fff';
        menuSuspensoAjuda.style.marginBottom = '10px';
        menuSuspensoAjuda.style.marginTop = '10px';
        menuSuspensoAjuda.style.paddingLeft = '40px';
        link.style.color = '#fff';
        // Adiciona o hover
        link.addEventListener('mouseover', function () {
            link.style.color = '#007bff';
        });
        link.addEventListener('mouseout', function () {
            link.style.color = 'white';
        });

        ajudaCriado = true;
        ajudaCriado = true;
    } else {
        menuSuspensoAjuda.style.display = 'none';
    }
});


