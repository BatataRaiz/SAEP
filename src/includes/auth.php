<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario'])) {
    // Se não estiver autenticado, redirecione para a página de login
    header('Location: ../temp/pages/index.html');
    exit(); // Certifique-se de sair após o redirecionamento para evitar a saída adicional
}

// Se o usuário estiver autenticado, você pode continuar com qualquer processamento necessário
// ...

// Por exemplo, você pode gerar uma resposta JSON de sucesso
header('Content-Type: application/json');
echo json_encode(array('mensagem' => 'Você está autenticado.'));
?>
