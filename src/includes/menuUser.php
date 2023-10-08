<?php
$response = array(); // Crie um array para a resposta

if (isset($_SESSION['usuario'])) {
    $nomeUsuario = $_SESSION['usuario']['nome'];
    $response['mensagem'] = "Bem-vindo, $nomeUsuario!";
} else {
    $response['mensagem'] = "Você não está logado.";
}

// Defina o cabeçalho Content-Type para JSON
header('Content-Type: application/json');

// Envie a resposta como JSON
echo json_encode($response);
?>
