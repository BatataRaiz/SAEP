<?php
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
// Verifica se o parâmetro 'id' está presente na solicitação
if (isset($_POST['id'])) {
    // Puxa o valor do parâmetro 'id' da solicitação
    $atividadeId = $_POST['id'];

    // Realiza uma busca no banco de dados para obter os dados da atividade
    $stmt = $pdo->prepare("SELECT * FROM atividades WHERE id = :atividadeId");
    $stmt->bindParam(':atividadeId', $atividadeId);
    $stmt->execute();
    $atividade = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se a atividade foi encontrada
    if ($atividade) {
        // Exibe os detalhes da atividade
        // ... (seu código para exibir os detalhes da atividade)
    } else {
        echo "Atividade não encontrada.";
    }
} else {
    echo "Número da atividade não informado.";
    exit;
}

?>

<div class="content">
    <h2>Detalhes da Atividade</h2>

    <?php if ($atividade) : ?> <!-- Verifica se a atividade foi encontrada. -->
        <p><strong>Número da Atividade:</strong>
            <?php echo $atividade['id']; ?>
        </p> <!-- Exibe o número da atividade. -->
        <p><strong>Nome da Atividade:</strong>
            <?php echo $atividade['nome']; ?>
        </p> <!-- Exibe o nome da atividade. -->
        <p><strong>Funcionário:</strong>
            <?php echo $atividade['funcionario']; ?>
        </p> <!-- Exibe o nome do funcionário. -->
        <p><strong>Detalhes:</strong>
            <?php echo $atividade['detalhes']; ?>
        </p> <!-- Exibe os detalhes da atividade. -->
    <?php else : ?>
        <p>Atividade não encontrada.</p> <!-- Exibe uma mensagem se a atividade não for encontrada. -->
    <?php endif; ?>