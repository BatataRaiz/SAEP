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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    $atividade_nome = $_POST['nomeAtividade'];
    $atividade_funcionario = $_POST['nomeFuncionario'];
    $atividade_detalhes = $_POST['detalhes'];
    $idAtividade = $_POST['id'];

    try {
        $stmt = $pdo->prepare("UPDATE atividades SET nome = :nomeAtividade, funcionario = :nomeFuncionario, detalhes = :detalhes WHERE id = :id");
        $stmt->bindParam(':nomeAtividade', $atividade_nome);
        $stmt->bindParam(':nomeFuncionario', $atividade_funcionario);
        $stmt->bindParam(':detalhes', $atividade_detalhes);
        $stmt->bindParam(':id', $idAtividade);

        $stmt->execute();
        $atividade = $stmt->fetch(PDO::FETCH_ASSOC);

        header("Location: ../temp/pages/menu.html");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao editar atividade: " . $e->getMessage();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['numero'])) {
    $idAtividade = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM atividades WHERE id = :id");
        $stmt->bindParam(':id', $idAtividade);
        $stmt->execute();

        $atividade = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro na consulta SQL: " . $e->getMessage();
    }
}

?>


<div class="content">
    <div class="form-container">
        <form action="" method="post">
            <div class="titulo">
                <h1>Editar Atividade</h1>
            </div>
            <div class="fields">

                <div class="idAtividade">
                    <label for="idAtividade">ID da Atividade:</label>
                    <input type="hidden" name="id" value="<?php echo isset($atividade['id']) ? $atividade['id'] : ''; ?>">

                </div>
                <div class="nomeAtividade">
                    <label for="nomeAtividade">Nome da Atividade:</label>
                    <input type="text" maxlength="50" id="nomeAtividade" name="nomeAtividade" placeholder="Nome da atividade" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome da atividade'" autocomplete="off" value="<?php echo isset($atividade['nome']) ? $atividade['nome'] : ''; ?>">
                </div>
                <div class="nomeFuncionario">
                    <label for="nomeFuncionario">Nome do Funcionário:</label>
                    <input type="text" maxlength="50" id="nomeFuncionario" name="nomeFuncionario" placeholder="Nome do funcionário" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome do funcionário'" autocomplete="off" value="<?php echo isset($atividade['funcionario']) ? $atividade['funcionario'] : ''; ?>">
                </div>
                <div class="detalhes">
                    <label for="detalhes">Detalhes:</label>
                    <input type="text" maxlength="50" id="detalhes" name="detalhes" placeholder="Detalhes" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Detalhes'" autocomplete="off" value="<?php echo isset($atividade['detalhes']) ? $atividade['detalhes'] : ''; ?>">
                </div>

                <div class="botaoSalvar">
                    <button type="submit" name="salvar">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

</div>