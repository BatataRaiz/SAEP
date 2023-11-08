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

btnContato.addEventListener('click', function () {
    // Alterna a visibilidade do menu suspenso ao clicar no botão
    if (menuSuspensoContato.style.display === 'none' || menuSuspensoContato.style.display === '') {
        const contatoDev = document.createElement('p'); // Crie um novo elemento 'p'
        contatoDev.textContent = 'Contate: joaodeamo3@gmail.com';

        const br = document.createElement('br');
        contatoDev.appendChild(br);

        const linkedin = document.createElement('a');
        linkedin.href = 'https://www.linkedin.com/in/jo%C3%A3o-victor-martins-deamo-74a3861a3/';
        linkedin.target = '_blank';
        linkedin.textContent = 'LinkedIn';

        // Defina a propriedade white-space para preservar quebras de linha
        contatoDev.style.whiteSpace = 'pre-line';

        contatoDev.appendChild(linkedin);
        menuSuspensoContato.appendChild(contatoDev);
        menuSuspensoContato.style.display = 'block'; // Mostra o menu suspenso
        menuSuspensoContato.style.color = '#fff';
        menuSuspensoContato.style.marginBottom = '10px';
        menuSuspensoContato.style.marginTop = '10px';
        menuSuspensoContato.style.paddingLeft = '40px';
        linkedin.style.lineHeight = '1.5';
        linkedin.style.color = '#11a1df';
        linkedin.style.cursor = 'pointer';
    } else {
        menuSuspensoContato.style.display = 'none'; // Esconde o menu suspenso
    }
});

const btnAjuda = document.getElementById('btnAjuda');
const menuSuspensoAjuda = document.getElementById('menuSuspensoAjuda');
btnAjuda.addEventListener('click', function () {
    // Alterna a visibilidade do menu suspenso ao clicar no botão
    if (menuSuspensoAjuda.style.display === 'none' || menuSuspensoAjuda.style.display === '') {
        const ajudaDev = document.createElement('p');
        const link = document.createElement('a'); // Crie um elemento de âncora
        link.href = 'https://www.planalto.gov.br/ccivil_03/_ato2015-2018/2018/lei/l13709.htm';
        link.target = '_blank';
        link.textContent = 'LGPD'; // Defina o texto âncora como "LGPD"
        link.style.cursorpointer = 'pointer';

        ajudaDev.appendChild(link); // Adicione o âncora ao parágrafo
        menuSuspensoAjuda.appendChild(ajudaDev);
        menuSuspensoAjuda.style.display = 'block'; // Mostra o menu suspenso
        menuSuspensoAjuda.style.color = '#fff';
        menuSuspensoAjuda.style.marginBottom = '10px';
        menuSuspensoAjuda.style.marginTop = '10px';
        menuSuspensoAjuda.style.paddingLeft = '40px';
        link.style.color = '#fff';
    }

    else {
        menuSuspensoAjuda.style.display = 'none'; // Esconde o menu suspenso
    }
}
);

