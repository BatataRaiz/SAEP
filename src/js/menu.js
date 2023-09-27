// Autor: jvdeamo
function redirecionarParaCadastros() {
    window.location.href = "cadastros.php";
}
function redirecionarParaSair() {
    /* Limpar o localStorage, limpar sessão  e redirecionar para a página de login */

    localStorage.clear();
    sessionStorage.clear();
    sessionStorage.removeItem("usuario");
    sessionStorage.removeItem("senha");

    window.location.href = "index.html";
}