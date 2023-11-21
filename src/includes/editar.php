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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar_atividade'])) {
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
    <div class="form-container">
        <form action="" method="post">
            <div class="titulo">
                <h1>Editar Atividade</h1>
            </div>
            <div class="fields">
                <div class="nomeAtividade">
                    <label for="nomeAtividade">Nome da Atividade:</label>
                    <input type="text" maxlength="50" id="nomeAtividade" name="nomeAtividade" placeholder="Nome da atividade" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome da atividade'" autocomplete="off" value="<?php echo $atividade['nome']; ?>">
                </div>
                <div class="nomeFuncionario">
                    <label for="nomeFuncionario">Nome do Funcionário:</label>
                    <input type="text" maxlength="50" id="nomeFuncionario" name="nomeFuncionario" placeholder="Nome do funcionário" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome do funcionário'" autocomplete="off" value="<?php echo $atividade['funcionario']; ?>">
                </div>
                <div class="detalhes">
                    <label for="detalhes">Detalhes:</label>
                    <input type="text" maxlength="50" id="detalhes" name="detalhes" placeholder="Detalhes" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Detalhes'" autocomplete="off" value="<?php echo $atividade['detalhes']; ?>">
                </div>
                <div class="botaoSalvar">
                    <button type="submit" name="salvar">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>