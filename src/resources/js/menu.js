// Autor: jvdeamo

// Aguarde o carregamento do documento
document.addEventListener("DOMContentLoaded", function () {
    // Encontre o botão pelo ID
    var botaoHome = document.getElementById("botaoHome");
    var botaoSobre = document.getElementById("botaoSobre");
    var botaoCadastro = document.getElementById("botaoCadastro");
    var botaoAjuda = document.getElementById("botaoAjuda");
    var botaoSair = document.getElementById("botaoSair");

    // Adicione um ouvinte para o evento "click" no botão
    botaoHome.addEventListener("click", redirectHome);
    botaoSobre.addEventListener("click", redirectSobre);
    botaoCadastro.addEventListener("click", redirectCadastro);
    botaoAjuda.addEventListener("click", redirectAjuda);
    botaoSair.addEventListener("click", redirectSair);
});

function redirectHome() {
    window.location.href = "menu.html";
}

function redirectSobre() {
    window.location.href = "https://scontent.fudi1-1.fna.fbcdn.net/v/t1.18169-9/22894102_1394105660717089_5975972865923835401_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=730e14&_nc_ohc=rN4bJWZpf8MAX_ePY7f&_nc_ht=scontent.fudi1-1.fna&oh=00_AfCGnW6pFNnhuxLfZi20J80ukaA7Sw6zeMt5D6N_5lW3aw&oe=6541A932";

}

function redirectCadastro() {
    window.location.href = "cadastro.html";
}
function redirectAjuda() {
    window.location.href = "mailto:joaodeamo3@gmail.com?subject=Dúvidas - SAEP";
}

function redirectSair() {
    const paginaSair = "../../includes/logout.php";
    window.location.href = paginaSair;
}

document.getElementById('botaoSair').addEventListener('click', function () {    /* Limpar o localStorage, limpar sessão  e redirecionar para a página de login */
    localStorage.clear();
    sessionStorage.clear();
    sessionStorage.removeItem("usuario");
    sessionStorage.removeItem("senha");

    window.location.href = 'index.html';
});
/* Função para verificar se o usuário está logado */
function verificarLogin() {
    if (sessionStorage.getItem("usuario") == null) {
        window.location.href = 'index.html';
    }
}

/* Função que substitui o menu (header) por um botão que abre um menu suspenso */
function newMenu() {
    // Crie um novo elemento <header>
    var newHeader = document.createElement("header");

    // Crie o elemento <a> com o ID "menu-icon" e seu conteúdo
    var linkElement = document.createElement("a");
    linkElement.href = "#"; // Define o valor do atributo href
    linkElement.id = "menu-icon"; // Define o valor do atributo id

    // Crie o elemento <i> com as classes especificadas
    var iconElement = document.createElement("i");
    iconElement.className = "fas fa-bars fa-2x"; // Define a classe do elemento <i>

    // Anexe o elemento <i> ao elemento <a>
    linkElement.appendChild(iconElement);

    // Anexe o elemento <a> ao novo header
    newHeader.appendChild(linkElement);

    // Substitua o header original pelo novo header
    var originalHeader = document.getElementById("headerContent");
    originalHeader.parentElement.replaceChild(newHeader, originalHeader);
    // Verifique o tamanho da tela usando window.matchMedia()
    var mediaQuery = window.matchMedia("(max-width: 768px)");

    // Defina uma função para lidar com a mudança na consulta de mídia
    function menu2(event) {
        if (event.matches) {
            // Chame a função para criar o novo header
            newMenu();
        }
    }

    // Adicione um ouvinte para o evento "change" da consulta de mídia
    mediaQuery.addEventListener("change", menu2);
}
