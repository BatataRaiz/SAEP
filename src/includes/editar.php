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

// Verifica se os dados do formulário foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $idAtividade = $_POST['id'];

        try {
            // Utilize $idAtividade conforme necessário no seu código, por exemplo:
            $stmt = $pdo->prepare("SELECT * FROM atividades WHERE id = :id");
            $stmt->bindParam(':id', $idAtividade);
            $stmt->execute();

            $atividade = $stmt->fetch(PDO::FETCH_ASSOC);

            // Faça algo com os dados da atividade, se necessário
            echo "Dados da atividade com ID $idAtividade: " . json_encode($atividade);

            // Verifica se outros campos do formulário estão definidos antes de acessá-los
            if (isset($_POST['nomeAtividade'], $_POST['nomeFuncionario'], $_POST['detalhes'])) {
                // Variáveis para os outros campos do formulário
                $atividade_nome = $_POST['nomeAtividade'];
                $atividade_funcionario = $_POST['nomeFuncionario'];
                $atividade_detalhes = $_POST['detalhes'];

                // Atualiza os dados da atividade no banco de dados
                $stmt = $pdo->prepare("UPDATE atividades SET nome = :nome, funcionario = :funcionario, detalhes = :detalhes WHERE id = :id");
                $stmt->bindParam(':nome', $atividade_nome);
                $stmt->bindParam(':funcionario', $atividade_funcionario);
                $stmt->bindParam(':detalhes', $atividade_detalhes);
                $stmt->bindParam(':id', $idAtividade);

                $stmt->execute();
                /*
                var_dump($stmt->rowCount());
                var_dump($stmt->errorInfo());
                var_dump($stmt->errorCode());
                var_dump($atividade_nome);
                var_dump($atividade_funcionario);
                var_dump($atividade_detalhes);
                */
                echo "<script> window.location.href = '../temp/pages/menu.html'; </script>";
                exit();
            } else {
                echo "Campos do formulário não estão definidos.";
            }
        } catch (PDOException $e) {
            echo "Erro ao buscar atividade: " . $e->getMessage();

        }
    } else {
        echo "ID da atividade não informado.";
        exit;
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
                <div class="idAtividadeclass">
                    <label for="idAtividade">ID da Atividade:</label>
                    <input title="ID da atividade" type="text" name="idAtividade" readonly value="<?php echo isset($atividade['id']) ? $atividade['id'] : ''; ?>">
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