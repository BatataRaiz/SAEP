<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Importante deixarmos a codificação dos caracteres e o título no início de <head> para otimização e procura da página -->
    <meta charset="UTF-8">
    <!-- meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAEP - Carregando...</title>
    <meta name="author" content="Jvdeamo">
</head>
<?php
// Iniciar a sessão
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "saepDatabase";

$error_message = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['usuario'];
        $senha = $_POST['senha'];

        // Consultar o banco de dados para verificar o login
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login AND senha = :senha");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // O login é bem-sucedido, redirecione para a página de menu
            $_SESSION['usuario'] = $usuario;
            header('Location: menu.php');
            exit;
        }
        if ($usuario) {
            // O login é bem-sucedido, redirecione para a página de menu
            $_SESSION['usuario'] = $usuario;
            header('Location: menu.php');
            exit;
        }

        if (isset($_GET['error']) && $_GET['error'] == '1001') {
            echo "<div class='failed' style='text-align: center; font-size:20px; font-weight:600;'>Usuário ou senha inválidos.</div>";
            header("Location: index.html");
        }
    }
    if (isset($_GET['error']) && $_GET['error'] == '1001') {
        echo "<div class='failed' style='text-align: center; font-size:20px; font-weight:600;'>Usuário ou senha inválidos.</div>";
        header("Location: index.html");
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}

session_destroy();
?>