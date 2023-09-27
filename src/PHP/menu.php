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
    // Função para listar atividades
    function listaatividades()
    {
        return [
            ['numero' => 1, 'nome' => 'Atividade 1'],
            ['numero' => 2, 'nome' => 'Atividade 2'],
            ['numero' => 3, 'nome' => 'Atividade 3']
        ];
    }

    // Obter a lista de atividades
    $atividades = listaatividades();
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Menu SAEP</title>
    <link rel="stylesheet" href="../styles/menu.css">
</head>

<body>
    <div class="sair">
        <a id="botaosair" onclick="redirecionarParaSair()">Sair</a>
    </div>
    <div class="header">
        <h1>Bem-vindo ao sistema SAEP, <?php if (isset($_SESSION['usuario'])) {
                                            echo $_SESSION['usuario']['senha'];
                                        } ?>!</h1>
    </div>
    <div class="menu">
        <button type="button" id="botaoCadastro" onclick="redirecionarParaCadastros()">Cadastrar Atividades</button>
    </div>
    <div class="conteudo menu">
        <a>Atividades</a>
        <div class="atividades">
            <table>
                <tr>
                    <th>Número da Atividade</th>
                    <th>Nome da Atividade</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($atividades as $atividade) : ?>
                    <tr>
                        <td><?php echo $atividade['numero']; ?></td>
                        <td><?php echo $atividade['nome']; ?></td>
                        <td><button onclick="excluirAtividade(<?php echo $atividade['numero']; ?>)">Excluir</button></td>
                        <td><button onclick="visualizarAtividade(<?php echo $atividade['numero']; ?>)">Visualizar</button></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <!--
    <h3>Imagem com Desfoque</h3>
    <img src="../Images/tartaruga.jpg" alt="Tartaruga" class="blur" name="tartaruga" id="tartaruga">
                -->
    <script src="../js/menu.js">
    </script>
    <div class="footer">
        <div class="footerInfo">
            <p>Desenvolvido por: Jvdeamo</p>
        </div>
</body>

</html>