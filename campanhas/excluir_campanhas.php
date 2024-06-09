<?php
    require_once("../cabecalho.html");
    session_start();
    if (isset($_GET['id'])){
        $id = $_GET['id']; //criando a sessão que irá mostrar os dados do banco em tela
        $_SESSION ['id'] = $id;
    }
    if ($_POST) {
        $id = $_SESSION['id'];
        if (excluirCampanhas($_SESSION['id']))
            header('location: index.php');
        else
            echo "Erro ao Excluir o Anuncio!!";
    }
    $dados = consultarCampanhasId($id); //receberá todos os dados do id referido

?>

    <h3>Excluir Campanhas</h3>
    <form>
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome</label>
                <input type="text" class="form-control"     name="nome">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="descricao" class="form-label">Informe a descrição</label>
                <input type="text" class="form-control"     name="descricao">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="data_inicio" class="form-label">Informe a data início</label>
                <input type="text" class="form-control"     name="data_inicio">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-danger" value="Excluir" name="btnExcluir"> 
                <label for ="text"> Deseja realmente excluir essa campanha?</label>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");