/*document.addEventListener("DOMContentLoaded", function () {
    const authPHP = document.getElementsByTagName("body");

    const authPHPath = "../../includes/auth.php";

    fetch(authPHPath)
        .then((response) => response.text())
        .then((data) => {
            authPHP.innerHTML = data;
        })
        .catch((error) => {
            console.error("Erro ao carregar o cadastro:", error);
        });
});
*/
document.addEventListener("DOMContentLoaded", function () {
    fetch("../../includes/auth.php")
        .then((response) => {
            console.log(response); // Adicione esta linha para depuração
            return response.text();
        })
        .then((data) => {
            console.log(data); // Adicione esta linha para depuração

            // Verifique o conteúdo da resposta para determinar se o usuário está autenticado
            if (data.includes("Usuário não autenticado")) {
                // Redirecione para index.html
                window.location.href = "../../temp/pages/index.html";
            } else {
                // Atualize o conteúdo da página com o conteúdo de auth.php
                document.getElementsByTagName("body")[0].innerHTML = data;
            }
        })
        .catch((error) => {
            console.error("Erro ao carregar o cadastro:", error);
        });
});
