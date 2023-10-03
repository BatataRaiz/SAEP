document.addEventListener("DOMContentLoaded", function () {
    // Elemento com a classe .atividades onde você deseja inserir o conteúdo do menu.php
    const atividadesContainer = document.querySelector(".atividades");

    const menuPhpPath = "../../includes/menu.php";

    // Fetch para buscar o conteúdo do menu.php
    fetch(menuPhpPath)
        .then((response) => response.text())
        .then((data) => {
            // Inserir o conteúdo do menu.php na div .atividades
            atividadesContainer.innerHTML = data;
        })
        .catch((error) => {
            console.error("Erro ao carregar o menu:", error);
        });
});
