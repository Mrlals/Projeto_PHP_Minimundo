<?php
    require_once("../cabecalho.php");
    session_start();

    if (isset($_GET['id'])){
        $id = $_GET['id']; //criando a sessão que irá mostrar os dados do banco em tela
        $_SESSION ['id'] = $id;
    }
    if ($_POST) {
        $id = $_SESSION['id'];
        if (excluirRelatorios($_SESSION['id']))
            header('location: index.php');
        else
            echo "Erro ao Excluir o Anuncio!!";
    }
    $dados = consultarRelatoriosId($id); //receberá todos os dados do id referido
?>

    <h3>Excluir Anuncios</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="data" class="form-label">Informe a data</label>
                <input type="text" class="form-control"     name="data">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="metrica" class="form-label">Informe a métrica</label>
                <input type="text" class="form-control"     name="metrica">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-danger mt-3" value="Excluir" name="btnExcluir"> 
                <label for ="text"> Deseja realmente excluir esse Relatório?</label>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");