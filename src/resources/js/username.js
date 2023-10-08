// menu.js

/* Espere até que o DOM esteja totalmente carregado
document.addEventListener("DOMContentLoaded", function () {


    // Chamar o arquivo PHP que verifica se o usuário está logado
    $.ajax({
        url: '../../includes/auth.php',
        type: 'POST',
        data: { /* dados a serem enviados, se necessário  },
        dataType: 'json', // Defina o tipo de dados esperado como JSON
        success: function (response) {
            // Verifique a resposta JSON
            if (response && response.mensagem) {
                // Exiba a mensagem de boas-vindas
                console.log(response.mensagem);
                // Você pode inserir a mensagem na página HTML conforme necessário
            } else {
                // Caso a resposta JSON não tenha a mensagem esperada
                console.error('Resposta JSON inválida.');
            }
        },
        error: function (xhr, status, error) {
            console.error('Erro na chamada AJAX:', status, error);
        }
    });
});
*/
document.addEventListener("load", function () {
    fetch("../../includes/menuUser.php")
        .then((response) => {
            console.log(response); // Adicione esta linha para depuração
            return response.text();
        }
        )
        .then((data) => {
            document.getElementById("username").innerHTML = data;
        }
        )
        .catch((error) => {
            console.error("Erro ao  carregar o usuário:", error);
        }
        );

});
