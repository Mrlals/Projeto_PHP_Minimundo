<?php
    require_once("../cabecalho.php");
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

    <h3>Excluir o Cliente Selecionado</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Nome do cliente</label>
                <input type="text" class="form-control"     name="nome" value="<?= ($dados['nome']) ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="telefone" class="form-label">Telefone do cliente</label>
                <input type="text" class="form-control"     name="telefone" value="<?= ($dados['telefone']) ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="email" class="form-label">E-mail do cliente</label>
                <input type="text" class="form-control"     name="email" value="<?= ($dados['email']) ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-danger mt-3" value="Excluir" name="btnExcluir"> 
                <label for ="text"> Deseja realmente excluir esse cliente?</label>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");