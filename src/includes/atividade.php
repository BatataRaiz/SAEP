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

if (isset($_POST['numero'])) {
    $id_atividade = $_POST['numero'];
    // realizar uma busca no banco de dados para obter os dados da atividade
    // Consultar o banco de dados para verificar o login
    $stmt = $pdo->prepare("SELECT * FROM atividades WHERE id = :id_atividade");
    $stmt->bindParam(':id_atividade', $id_atividade);
    $stmt->execute();
    $atividade = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Número da atividade não informado.";
    exit;
}

?>
<div class="content">
    <h2>Detalhes da Atividade</h2>

    <?php if ($atividade) : ?> <!-- Verifica se a atividade foi encontrada. -->
        <p><strong>Número da Atividade:</strong>
            <?php echo $atividade['numero']; ?>
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