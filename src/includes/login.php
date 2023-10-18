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
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE BINARY login = :login AND BINARY senha = :senha");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // O login é bem-sucedido, redirecione para a página de menu
            $_SESSION['usuario'] = $usuario;
            header('Location: ../temp/pages/menu.html');
            exit;
        } else {
            // O login falhou, redirecione para a página de login com uma mensagem de erro
            header('Location: ../temp/pages/index.html?error=1001');
            exit;
        }
    }

    if (isset($_GET['error']) && $_GET['error'] == '1001') {
        echo "<div class='failed' style='text-align: center; font-size:20px; font-weight:600;'>Usuário ou senha inválidos.</div>";
        // Você pode redirecionar para index.html aqui se necessário
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}

session_destroy();
?>
