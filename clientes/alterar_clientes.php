<?php
    require_once("../cabecalho.php");
    session_start();

    if (isset($_GET['id'])) {
        $id = $_GET['id']; // irá apresentar os dados do banco em tela
        $_SESSION['id'] = $id;
    }

    if ($_POST) {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        if ($nome != "" && $telefone != "" && $email != ""){
            if (alterarClientes($nome, $telefone, $email, $_SESSION['id']))
                echo "Cliente alterado com sucesso !!";
            else
                echo "ERRO ao alterar Cliente!";
        } else {
            echo "Preencha todos os campos !!";
        }

    }
    $dados = consultarClientesId($id); // irá receber todos os dados do id que está no banco

?>

    <h3>Alterar o Cliente selecionado</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o novo nome do cliente</label>
                <input type="text" class="form-control"     name="nome" value="<?= ($dados['nome']) ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="telefone" class="form-label">Informe o novo telefone</label>
                <input type="text" class="form-control"     name="telefone" value="<?= ($dados['telefone']) ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="email" class="form-label">Informe o novo e-mail</label>
                <input type="text" class="form-control"     name="email" value="<?= ($dados['email']) ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success mt-3">
                    Salvar
                </button>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");