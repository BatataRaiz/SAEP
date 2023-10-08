$.ajax({
    url: '../../includes/auth.php',
    type: 'POST',
    data: { /* dados a serem enviados, se necessário */ },
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
