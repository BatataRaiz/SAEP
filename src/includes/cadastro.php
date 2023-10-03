<?php
// Iniciar a sessão
session_start();

// Configurações do banco de dados
$host = "localhost";
$user = "root";
$password = "";
$database = "saepDatabase";

try {
    // Conectar ao banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Processar o envio do formulário
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obter os dados do formulário
        $atividade_nome = $_POST['nome'];
        $atividade_funcionario = $_POST['funcionario'];
        $atividade_detalhes = $_POST['detalhes'];

        // Preparar a consulta SQL
        $stmt = $pdo->prepare("INSERT INTO atividades (nome, funcionario, detalhes) VALUES (:nome, :funcionario, :detalhes)");
        $stmt->bindParam(':nome', $atividade_nome);
        $stmt->bindParam(':funcionario', $atividade_funcionario);
        $stmt->bindParam(':detalhes', $atividade_detalhes);

        // Executar a consulta
        if ($stmt->execute()) {
            header("Location: ../temp/pages/menu.html");
        } else {
            echo "Erro ao cadastrar atividade: " . $stmt->errorInfo()[2];
        }
    }
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
