<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();
$response = array(); // Crie um array para a resposta

// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario'])) {
    // Se não estiver autenticado, redirecione para a página de login
    $response['mensagem'] = "Você não está logado.";
    $response['redirect'] = "../temp/pages/index.html";
    header('Location: ../temp/pages/index.html');
    exit(); // Certifique-se de sair após o redirecionamento para evitar a saída adicional
} else {
    // Se estiver autenticado, defina a mensagem de boas-vindas
    $nomeUsuario = $_SESSION['usuario']['nome'];
    $response['mensagem'] = "Bem-vindo, $nomeUsuario!";
}
var_dump($response);

// Defina o cabeçalho Content-Type para JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
