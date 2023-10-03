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
    <tr>
        <th>Número da Atividade</th>
        <th>Nome da Atividade</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    // Query para selecionar todos os registros da tabela 'atividades'
    $sql = "SELECT * FROM atividades";

    // Preparar e executar a consulta SQL
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Iterar pelos resultados e exibi-los na tabela
    while ($atividade = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr>
            <td><?php echo $atividade['id']; ?></td>
            <td><?php echo $atividade['nome']; ?></td>
            <td><button type="button" onclick="excluirAtividade(<?php echo $atividade['funcionario']; ?>)">Excluir</button></td>
            <td><button type="button" onclick="visualizarAtividade(<?php echo $atividade['detalhes']; ?>)">Visualizar</button></td>
        </tr>
    <?php
    }
    ?>
</table>