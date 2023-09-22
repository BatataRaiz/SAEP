<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "saep_database";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
}
$login = $_POST['login'];
$_SESSION['login'] = $login;
function listaatividades()
{
    return [
        ['numero' => 1, 'nome' => 'Atividade 1'],
        ['numero' => 2, 'nome' => 'Atividade 2'],
        ['numero' => 3, 'nome' => 'Atividade 3']
    ];
}

$atividades = listaatividades()

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <h1>Bem-vindo, <?php if (isset($login)) {
                        echo "$login.";
                    } else {
                        echo "convidado.";
                    }
                    ?></h1>

    <a href="cadAtividade.php" id="cadastroatv"> Cadastrar Atividades</a>
    <h2>Atividades</h2>

    <div class="atividades">
    <table>
        <tr>
            <th>Número da atividade</th>
            <th>Nome da atividade</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($atividades as $atividade) : ?>
            <tr>
                <td><?php echo $atividade['numero']; ?></td>
                <td><?php echo $atividade['nome']; ?></td>

                <td><button onclick="excluirAtividade (<?php
                                                        echo $atividade['numero']; ?>)">Excluir</button></td>

                <td><button onclick="visualizarAtividade
(<?php echo $atividade['numero'];
    ?>)">Visualizar</button></td>

            </tr>
        <?php endforeach; ?>
    </table>
    </div>
    </tr>
    <table class="atividade1">
    <?php foreach ($atividades as $atividade) : ?>
        <tr>
            <td><?php echo htmlspecialchars($atividade['numero']); ?></td>
            <td><?php echo htmlspecialchars($atividade['nome']); ?></td>
            <td><button onclick="excluirAtividade(<?php echo $atividade['numero']; ?>)">Excluir</button></td>
            <td><button onclick="visualizarAtividade(<?php echo $atividade['numero']; ?>)">Visualizar</button></td>
        </tr>
    <?php endforeach; ?>
    </table>
    <br>
    <a href="cadAtividade.php" id="cadastro"> Cadastrar Atividades</a>

    <br>
    <a href="logout.php"> Sair</a>
    <br>
    <h3>Imagem com Desfoque</h3>
    <img src="../img/tartaruga.jpg" alt="Tartaruga" class="blur" name="tartaruga" id="tartaruga">
    <br>
</body>

</html>