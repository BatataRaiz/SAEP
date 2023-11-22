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
function excluirAtividade(botao) {
    const atividadeId = botao.getAttribute("data-atividade-id");

    // Certifique-se de que o ID da atividade foi recuperado corretamente
    console.log("ID da atividade a ser excluída: " + atividadeId);

    const menuPhpPath = "../../includes/excluir.php?id=" + atividadeId;

    fetch(menuPhpPath)
        .then((response) => response.json())
        .then((data) => {
            if (data.message === 'Atividade excluída com sucesso') {
                alert("Atividade excluída com sucesso!");
                atualizarTabela(); // Chame a função para atualizar a tabela
            }
        })
        .catch((error) => {
            console.error("Erro ao excluir atividade:", error);
        });
}

function visualizarAtividade(botao) {
    alert("Atividade visualizada com sucesso!");
    const atividadeId = botao.getAttribute("data-atividade-id");
    window.location.href = "../../temp/pages/atividade.html?id=" + atividadeId;
}
function atualizarTabela() {
    const menuPhpPath = "../../includes/menu.php";

    fetch(menuPhpPath)
        .then((response) => response.text())
        .then((data) => {
            // Substitua o conteúdo da tabela com os dados mais recentes
            const atividadesContainer = document.querySelector(".atividades");
            atividadesContainer.innerHTML = data;
        })
        .catch((error) => {
            console.error("Erro ao atualizar a tabela:", error);
        });
}

// Criar uma função para adicionar um ícone de configurar para cada atividade
// Esta função será chamada no final do arquivo menu.php

function editarAtividade(botao) {
    const atividadeId = botao.getAttribute("data-atividade-id");
    console.log(atividadeId);
    window.location.href = "../../temp/pages/editar.html?id=" + atividadeId;
}
