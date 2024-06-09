<?php
    require_once("../cabecalho.html");
    session_start();
    if (isset($_GET['id'])){
        $id = $_GET['id']; //criando a sessão que irá mostrar os dados do banco em tela
        $_SESSION ['id'] = $id;
    }
    if ($_POST) {
        $id = $_SESSION['id'];
        if (excluirClientes($_SESSION['id']))
            header('location: index.php');
        else
            echo "Erro ao Excluir o cliente!!";
    }
    $dados = consultarClientesId($id); //receberá todos os dados do id referido

?>

    <h3>Excluir Clientes</h3>
    <form>
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome</label>
                <input type="text" class="form-control"     name="nome">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="telefone" class="form-label">Informe o telefone</label>
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
                <input type="submit" class="btn btn-danger" value="Excluir" name="btnExcluir"> 
                <label for ="text"> Deseja realmente excluir esse cliente?</label>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");