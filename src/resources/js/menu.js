// Autor: jvdeamo
const botaoSair = document.getElementById('botaosair');
function redirecionarParaCadastros() {
    window.location.href = "cadastros.php";
}
document.getElementById('botaoSair').addEventListener('click', function () {    /* Limpar o localStorage, limpar sessão  e redirecionar para a página de login */
    localStorage.clear();
    sessionStorage.clear();
    sessionStorage.removeItem("usuario");
    sessionStorage.removeItem("senha");

    window.location.href = 'index.html';
});