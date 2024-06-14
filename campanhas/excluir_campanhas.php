<?php
    require_once("../cabecalho.php");
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

    <h3>Excluir a Campanha selecionada</h3>
    <form>
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Nome da campanha</label>
                <input type="text" class="form-control"     name="nome" value="<?= ($dados['nome']) ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="descricao" class="form-label">Descrição da campanha</label>
                <input type="text" class="form-control"     name="descricao" value="<?= ($dados['descricao']) ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="data_inicio" class="form-label">Data de início da campanha</label>
                <input type="text" class="form-control"     name="data_inicio" value="<?= ($dados['data_inicio']) ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-danger mt-3" value="Excluir" name="btnExcluir"> 
                <label for ="text"> Deseja realmente excluir essa campanha?</label>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");