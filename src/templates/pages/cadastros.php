<?php
include_once("login.php");
// Iniciar a sessão
session_start();

// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "saepDatabase";

// Conectar ao banco de dados
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar a conexão com o banco de dados
if (!$conn) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}
// Processar o envio do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados do formulário
    $atividade_nome = $_POST['nome'];
    $atividade_funcionario = $_POST['funcionario'];
    $atividade_detalhes = $_POST['detalhes'];

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO atividades (nome, funcionario, detalhes) VALUES ('$atividade_nome', '$atividade_funcionario', '$atividade_detalhes')";

    if (mysqli_query($conn, $sql)) {
        header("Location: menu.php");
    } else {
        echo "Erro ao cadastrar atividade: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Atividade - SAEP</title>
</head>

<body>
    <form action="" method="post">
        <label for="nome">Nome da Atividade:</label>
        <input type="text" id="nome" name="nome">
        <br>
        <br>
        <label for="funcionario">Funcionário:</label>
        <input type="text" id="funcionario" name="funcionario">
        <br>
        <br>
        <label for="detalhes">Detalhes:</label>
        <input type="text" id="detalhes" name="detalhes">
        <br>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>