<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "saep_database";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Erro de conexão:" . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="/Estilos/estilos.css"> <!-- Caminho para o arquivo CSS -->
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <form action="menu.php" method="POST">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha">
        <br>
        <br>
        <input type="submit" value="Entrar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Restante do seu código de redirecionamento
        } else {
            echo "Login ou senha incorretos!";
        }
    }
    mysqli_close($conn);
    ?>
</body>

</html>