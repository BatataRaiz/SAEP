document.addEventListener("DOMContentLoaded", function () {
    // Elemento com a classe .atividade onde você deseja inserir o conteúdo do atividade.php
    const atividadeContainer = document.querySelector(".atividade");

    const atividadePHPPath = "../../includes/editar.php";

    // Obtém o ID da atividade a partir da URL
    const urlParams = new URLSearchParams(window.location.search);
    const atividadeId = urlParams.get('id');

    // Fetch para buscar o conteúdo do atividade.php
    fetch(atividadePHPPath, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${atividadeId}`,
    })
        .then((response) => response.text())
        .then((data) => {
            // Inserir o conteúdo do atividade.php na div .atividade
            atividadeContainer.innerHTML = data;
            //console.log("Conteúdo carregado com sucesso:", data);
        })
        .catch((error) => {
            console.error("Erro ao carregar os detalhes da atividade:", error);
        });
});
