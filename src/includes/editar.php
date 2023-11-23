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


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
        $atividade_nome = $_POST['nomeAtividade'];
        $atividade_funcionario = $_POST['nomeFuncionario'];
        $atividade_detalhes = $_POST['detalhes'];
        $idAtividade = $_POST['id'];

        // Preparar a consulta SQL
        $stmt = $pdo->prepare("UPDATE atividades SET nome = :nomeAtividade, funcionario = :nomeFuncionario, detalhes = :detalhes WHERE id = :id");
        $stmt->bindParam(':nomeAtividade', $atividade_nome);
        $stmt->bindParam(':nomeFuncionario', $atividade_funcionario);
        $stmt->bindParam(':detalhes', $atividade_detalhes);
        $stmt->bindParam(':id', $idAtividade);

        $stmt->execute();
        header("Location: ../temp/pages/menu.html");
        exit();
        // ...
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $idAtividade = $_GET['id'];

        try {
            $stmt = $pdo->prepare("SELECT * FROM atividades WHERE id = :id");
            $stmt->execute();

            $atividade = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Verifica se a atividade foi encontrada antes de redirecionar para o formulário de edição
            if ($stmt) {
                $atividade = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                if ($errorInfo && isset($errorInfo[2])) {
                    $errorMessage = $errorInfo[2];
                    die("Erro na consulta SQL: " . $errorMessage);
                }
                if ($errorInfo && isset($errorInfo[2])) {
                    die("Erro na consulta SQL: " . $errorInfo[2]);
                }
            }
        } catch (PDOException $e) {
            echo "Erro na consulta SQL: " . $e->getMessage();
        }

        header("Location: ../temp/pages/cadastro.html");
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Atividade</title>
    <link rel="stylesheet" href="../../resources/styles/menu.css">
    <link rel="stylesheet" href="../../resources/styles/editar.css">
    <link rel="stylesheet" href="../partials/footer.css">
    <link rel="icon" href="../../resources/images/saep.ico" type="image/x-icon" />
    <script src="../../resources/js/contentLoad.js"></script>
    <script src="../../resources/js/load-resources.js"></script>
    <script src="../../resources/js/extension.js"></script>
</head>

<div class="content">
    <div class="form-container">
        <form action="" method="post">
            <div class="titulo">
                <h1>Editar Atividade</h1>
            </div>
            <div class="fields">

                <div class="idAtividade">
                    <label for="idAtividade">ID da Atividade:</label>
                    <input type="hidden" name="id" value="<?php echo $atividade['id']; ?>">

                </div>
                <div class="nomeAtividade">
                    <label for="nomeAtividade">Nome da Atividade:</label>
                    <input type="text" maxlength="50" id="nomeAtividade" name="nomeAtividade" placeholder="Nome da atividade" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome da atividade'" autocomplete="off" value="<?php echo $atividade['nome']; ?>">
                </div>
                <div class="nomeFuncionario">
                    <label for="nomeFuncionario">Nome do Funcionário:</label>
                    <input type="text" maxlength="50" id="nomeFuncionario" name="nomeFuncionario" placeholder="Nome do funcionário" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome do funcionário'" autocomplete="off" value="<?php echo $atividade['nomeFuncionario']; ?>">
                </div>
                <div class="detalhes">
                    <label for="detalhes">Detalhes:</label>
                    <input type="text" maxlength="50" id="detalhes" name="detalhes" placeholder="Detalhes" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Detalhes'" autocomplete="off" value="<?php echo $atividade['detalhes']; ?>">
                </div>

                <div class="botaoSalvar">
                    <button type="submit" name="salvar">Salvar</button>
                </div>
                <?php var_dump($atividades); ?>
            </div>
        </form>
    </div>
</div>

</div>