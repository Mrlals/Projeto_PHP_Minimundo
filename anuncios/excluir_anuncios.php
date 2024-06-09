<?php
    require_once("../cabecalho.html");
    session_start();
    if (isset($_GET['id'])){
        $id = $_GET['id']; //criando a sessão que irá mostrar os dados do banco em tela
        $_SESSION ['id'] = $id;
    }
    if ($_POST) {
        $id = $_SESSION['id'];
        if (excluirAnuncio($_SESSION['id']))
            header('location: index.php');
        else
            echo "Erro ao Excluir o Anuncio!!";
    }
    $dados = consultarAnunciosId($id); //receberá todos os dados do id referido
?>

    <h3>Excluir Anuncios</h3>
    <form>
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome</label>
                <input type="text" class="form-control"     name="nome">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="tipo" class="form-label">Informe o tipo</label>
                <input type="text" class="form-control"     name="tipo">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-danger" value="Excluir" name="btnExcluir"> 
                <label for ="text"> Deseja realmente excluir?</label>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");