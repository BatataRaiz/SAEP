<?php
session_start();
session_destroy(); // Destrua a sessão

if (!isset($_SESSION['usuario'])) {
    // Se não estiver autenticado, redirecione para a página de login
    $response['mensagem'] = "Você não está logado.";
    $response['redirect'] = "../temp/pages/index.html";
    header('Location: ../temp/pages/index.html');
    exit(); // Certifique-se de sair após o redirecionamento para evitar a saída adicional
}  
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
header("Location: ../temp/pages/index.html"); // Redirecione para a página de login
session_destroy(); // Destrua a sessão
exit();
