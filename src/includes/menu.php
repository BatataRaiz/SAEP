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
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}
$login = $_SESSION['usuario'];
function listaratividades()
{
    global $conn, $login;

    try {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "saepDatabase";
        // Conectar ao banco de dados usando PDO
        $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Configura o PDO para lançar exceções em caso de erro.

        // Prepara a consulta SQL.
        $sql = "SELECT id, funcionario, nome as atividade FROM atividades";

        // Prepara a declaração SQL usando o PDO.
        $stmt = $pdo->prepare($sql);

        /*Substitui o parâmetro :login pelo valor da variável $login.
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        */

        // Executa a consulta preparada.
        $stmt->execute();

        // Obtém todas as linhas do resultado como um array associativo.
        $atividades = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Retorna o array de atividades.
        return $atividades;
    } catch (PDOException $e) {
        // Em caso de erro, exibe uma mensagem de erro e encerra o script.
        die("Erro na consulta SQL: " . $e->getMessage());
    }
}


$atividades = listaratividades(); // Chama a função 'listaratividades' e armazena o resultado na variável $atividades.

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
    $atividades = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <tbody>
        <?php foreach ($atividades as $atividade) : ?>
            <tr data-atividade-id="<?php echo $atividade['id']; ?>">
                <td><?php echo $atividade['id']; ?></td>
                <td><?php echo $atividade['nome']; ?></td>
                <td><button type="button" data-atividade-id="<?php echo $atividade['id']; ?>" onclick="excluirAtividade(this)"><i class="fa-solid fa-trash-can"></i></button></td>

                <td><button type="button" data-atividade-id="<?php echo $atividade['id']; ?>" onclick="visualizarAtividade(this)"> <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </td>
                <td>
                    <div class="dropdown">
                        <button type="button" title="botaoMenu" id="toggleMenu"> <i class="fa-solid fa-gear"></i></button>
                        <div class="dropdown-content" id="menuSuspenso">
                            <button type="button" class="botaoEdit" data-atividade-id="<?php echo $atividade['id']; ?>" onclick="editarAtividade(this)">Editar</button>
                        </div>
                    </div>
                </td>

            </tr>

        <?php endforeach; ?>
    </tbody>
    <script src="../resources/js/tabelasMenu.js"></script>

</table>