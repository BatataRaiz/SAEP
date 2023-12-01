document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const headers = document.getElementById('headerContent');
    const mainContent = document.getElementById('sidebar-button');

    toggleButton.addEventListener('click', function () {
        sidebar.classList.toggle('open');
        mainContent.classList.toggle('expanded');
        headers.classList.toggle('expanded');
    });

    const btnContato = document.getElementById('btnContato');
    const menuSuspensoContato = document.getElementById('menuSuspensoContato');
    let contatoCriado = false;

    // Adiciona o evento de clique ao botão de contato
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
            menuSuspensoContato.innerHTML = ''; // Limpa o conteúdo existente
            menuSuspensoContato.appendChild(contatoDev);
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
            // Restante do código permanece o mesmo
            contatoCriado = true;
        }

        // Alterna a visibilidade do menu suspenso ao clicar no botão
        toggleMenuVisibility(menuSuspensoContato);
    });

    const btnAjuda = document.getElementById('btnAjuda');
    const menuSuspensoAjuda = document.getElementById('menuSuspensoAjuda');
    let ajudaCriado = false;

    // Adiciona o evento de clique ao botão de ajuda
    btnAjuda.addEventListener('click', function () {
        if (!ajudaCriado) {
            const ajudaDev = document.createElement('p');
            const link = document.createElement('a');
            link.href = 'https://www.planalto.gov.br/ccivil_03/_ato2015-2018/2018/lei/l13709.htm';
            link.target = '_blank';
            link.textContent = 'LGPD';
            link.style.cursor = 'pointer';

            ajudaDev.appendChild(link);
            menuSuspensoAjuda.innerHTML = ''; // Limpa o conteúdo existente
            menuSuspensoAjuda.appendChild(ajudaDev);
            link.style.lineHeight = '1.5';
            link.style.color = 'white';
            link.style.cursor = 'pointer';
            // Adiciona o hover
            link.addEventListener('mouseover', function () {
                link.style.color = '#007bff';
            });
            link.addEventListener('mouseout', function () {
                link.style.color = 'white';
            });

            // Restante do código permanece o mesmo
            ajudaCriado = true;
        }

        // Alterna a visibilidade do menu suspenso ao clicar no botão
        toggleMenuVisibility(menuSuspensoAjuda);
    });

    // Função para alternar a visibilidade do menu suspenso
    function toggleMenuVisibility(menu) {
        if (menu.style.display === 'none' || menu.style.display === '') {
            menu.style.display = 'block';
            menu.style.color = '#fff';
            menu.style.marginBottom = '10px';
            menu.style.marginTop = '10px';
            menu.style.paddingLeft = '40px';
        } else {
            menu.style.display = 'none';
        }
    }
});
