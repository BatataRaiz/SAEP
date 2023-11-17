<?php
include('./login.php');
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
?> <!-- Código HTML da tabela de atividades -->
<table>
    <thead>
        <tr>
            <th>Número da Atividade</th>
            <th>Nome da Atividade</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <?php
    // Iterar pelos resultados e exibi-los na tabela
    $stmt = $pdo->prepare("SELECT * FROM atividades");
    $stmt->execute();
    $atividade = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <tbody>
        <?php foreach ($atividade as $atividades) : ?>
            <tr data-atividade-id="<?php echo $atividades['id']; ?>">
                <td><?php echo $atividades['id']; ?></td>
                <td><?php echo $atividades['nome']; ?></td>
                <td><button type="button" data-atividade-id="<?php echo $atividades['id']; ?>" onclick="excluirAtividade(this)"><i class="fa-solid fa-trash-can"></i></button></td>
                <td><button type="button" data-atividade-id="<?php echo $atividades['id']; ?>" onclick="visualizarAtividade(this)"> <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </td>
                <td>
                    <div class="dropdown">
                        <button type="button" title="botaoMenu" id="toggleMenu"> <i class="fa-solid fa-gear"></i></button>
                        <div class="dropdown-content" id="menuSuspenso">
                            <button class="botaoEdit" href="#" onclick="editarAtividade(<?php echo $atividades['id']; ?>)">Editar</button>
                            <!-- Adicione mais opções de menu conforme necessário -->
                        </div>
                    </div>
                </td>

            </tr>

        <?php endforeach; ?>
    </tbody>
    <script src="../resources/js/tabelasMenu.js"></script>

</table>