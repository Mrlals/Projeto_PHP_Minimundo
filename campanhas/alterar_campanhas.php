<?php
    require_once("../cabecalho.php");
    session_start();

    if (isset($_GET['id'])) {
        $id = $_GET['id']; // irá apresentar os dados do banco em tela
        $_SESSION['id'] = $id;
    }

    if ($_POST) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $data_inicio = $_POST['data_inicio'];
        if ($nome != "" && $descricao != "" && $data_inicio != ""){
            if (alterarCampanhas($nome, $descricao, $data_inicio, $_SESSION['id']))
                echo "Campanha alterada com sucesso !!";
            else
                echo "ERRO ao alterar Campanha!";
        } else {
            echo "Preencha todos os campos !!";
        }

    }
    $dados = consultarCampanhasId($id); // irá receber todos os dados do id que está no banco

?>

    <h3>Alterar a campanha selecionada</h3>
    <form>
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe a nova campanha</label>
                <input type="text" class="form-control"     name="nome" value="<?=($dados['nome']) ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="descricao" class="form-label">Informe a nova descrição</label>
                <input type="text" class="form-control"     name="descricao" value="<?=($dados['descricao']) ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="data_inicio" class="form-label">Informe a nova data de início</label>
                <input type="text" class="form-control"     name="data_inicio" value="<?=($dados['data_inicio']) ?>">
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