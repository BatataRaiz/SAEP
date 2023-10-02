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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu SAEP</title>
    <link rel="stylesheet" href="../../resources/styles/menu.css">
    <link rel="icon" href="../../resources/images/SAEP.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Inclua o link para a biblioteca Font Awesome -->

</head>

<body>
    <header id="headerContent">
        <nav>
            <div class="navbar-container">
                <div class="logo">
                    <strong>Bem-vindo <?php if (isset($_SESSION['usuario'])) {
                                            echo $_SESSION['usuario']['senha'];
                                        } ?></strong>
                    <br>
                    <img src="../../resources/images/SAEP.png" alt="Logo SAEP" class="logo">
                </div>
                <div class="menu">
                    <div class="menuBotoes">
                        <ul>
                            <li><a href="#">
                                    <button type="button" id="botaoHome" class="botao-home">Home</button>
                                </a></li>
                            <li><a href="https://scontent.fudi1-1.fna.fbcdn.net/v/t1.18169-9/22894102_1394105660717089_5975972865923835401_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=730e14&_nc_ohc=rN4bJWZpf8MAX_ePY7f&_nc_ht=scontent.fudi1-1.fna&oh=00_AfCGnW6pFNnhuxLfZi20J80ukaA7Sw6zeMt5D6N_5lW3aw&oe=6541A932">
                                    <button type="button" id="botaoSobre" class="botao-sobre">Sobre</button>
                                </a></li>
                            <li><a href="https://res.cloudinary.com/buzzfeed-brasil/image/upload/q_auto,f_auto/image-uploads/subbuzz-images/unknown/2a288b2f34668b232687197c1d906d47.jpg">
                                    <button type="button" id="botaoLogin" class="botao-login">Login</button>
                                </a></li>
                            <li><a>
                                    <button type="button" id="botaoCadastro" class="botao-cadastro" onclick="redirecionarParaCadastros()">Cadastrar</button>
                                </a></li>
                            </a></li>
                            <li><a href="mailto:joaodeamo3@gmail.com?subject=Dúvidas - SAEP">
                                    <button type="button" id="botaoAjuda" class="botao-ajuda">Ajuda</button>
                                </a></li>
                            <li><a href="logout.php">
                                    <button type="button" id="botaoSair" class="b</ul>otao-sair">Sair</button>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </nav>
    </header>
    <main id="mainContent">
        <button type="button" title="botaoSidebar" id="toggleSidebar"><i class="fas fa-bars"></i> <!-- Use a classe de ícone do Font Awesome -->

        </button>

        <!-- Sidebar -->
        <div id="sidebar">
            <a>
                <button type="button" id="btnAjuda">Precisa de ajuda?</button>
            </a>
            <div id="menuSuspensoAjuda">
                <p></p>
            </div>

            <button type="button" id="btnContato">Contato do Desenvolvedor</button>
            <div id="menuSuspensoContato">
            </div>

            <a href="logout.php">
                <button type="button" id="btnSair">Sair</button>
            </a>
        </div>
        <!--
        <div class="saudacao">
            <div class="img-container">
                <img src="https://images.hdqwalls.com/wallpapers/bthumb/material-style-8k-rk.jpg" alt="" />
            </div>
        </div>
                                    -->
        <div class="conteudo">
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
                            <td><button type="button" onclick="excluirAtividade(<?php echo $atividade['numero']; ?>)">Excluir</button></td>
                            <td><button type="button" onclick="visualizarAtividade(<?php echo $atividade['numero']; ?>)">Visualizar</button></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </main>
    <!--
    <h3>Imagem com Desfoque</h3>
    <img src="../Images/tartaruga.jpg" alt="Tartaruga" class="blur" name="tartaruga" id="tartaruga">
                -->
    <script src="../../resources/js/menu.js"></script>
    <script src="../../resources/js/sidebarMenu.js"></script>

    <?php include('../partials/footer.html'); ?>

</body>

</html>