<?php
/*
Página para excluir atividades conforme o usuário desejar, por meio de um botão na tabela de atividades. Se o usuário clicar no botão, a atividade será excluída do banco de dados.

*/
include('./login.php');
// Configurações do banco de dados
// Configurações do banco de dados
$host = "localhost";
$user = "root";
$password = "";
$database = "saepDatabase";
try {
    // Conectar ao banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}

// Query para excluir as atividades conforme sua id
$stmt = $pdo->prepare("DELETE FROM atividades WHERE id = :id");
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
// Redirecionar para a página de atividades
// No arquivo "excluir.php" após a exclusão bem-sucedida
echo json_encode(['message' => 'Atividade excluída com sucesso']);

?>
