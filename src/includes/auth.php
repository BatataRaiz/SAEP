
<?php
/*
Iniciar a sessão (se ainda não estiver iniciada)
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
*/
// Inicie a sessão
session_start();

// Verifique se há uma sessão de usuário ou superusuário
if (isset($_SESSION['usuario']) || isset($_SESSION['superusuario'])) {
    $response = array('autenticado' => true);
    header('Location: ../temp/pages/index.html');
} else {
    $response = array('autenticado' => false);
    header('Location: ../temp/pages/index.html');
}

// Retorna a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
