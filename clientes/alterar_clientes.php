<?php
    require_once("../cabecalho.html");
    if (isset($_GET['id'])) {
        $id = $_GET['id']; // irá apresentar os dados do banco em tela
        session_start();
        $_SESSION['id'] = $id;
    }

    if ($_POST) {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        if ($nome != "" && $telefone != "" && $email != ""){
            session_start();
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

    <h3>Alterar Clientes</h3>
    <form>
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome do cliente</label>
                <input type="text" class="form-control"     name="nome">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="telefone" class="form-label">Informe a telefone</label>
                <input type="text" class="form-control"     name="telefone">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="email" class="form-label">Informe o e-mail</label>
                <input type="text" class="form-control"     name="email">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");