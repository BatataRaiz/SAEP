document.addEventListener("DOMContentLoaded", function () {
    const cadastroForm = document.querySelector(".cadastro");

    const cadastroPhpPath = "../../includes/cadastro.php";

    fetch(cadastroPhpPath)
        .then((response) => response.text())
        .then((data) => {
            cadastroForm.innerHTML = data;
        })
        .catch((error) => {
            console.error("Erro ao carregar o cadastro:", error);
        });
});
