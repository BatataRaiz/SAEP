// Autor: jvdeamo
/* Importar Bootstrap */
import 'bootstrap';

const botaoSair = document.getElementById('botaosair');
function redirecionarParaCadastros() {
    window.location.href = "cadastro.html";
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
    originalHeader.parentNode.replaceChild(newHeader, originalHeader);
}
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