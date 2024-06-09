<?php
    require_once("../cabecalho.php");
    session_start();

    if (isset($_GET['id'])) {
        $id = $_GET['id']; // irá apresentar os dados do banco em tela
        $_SESSION['id'] = $id;
    }

    if ($_POST) {
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        if ($nome != "" && $tipo != ""){
            if (alterarRelatorios($nome, $tipo, $_SESSION['id']))
                echo "Relatório alterado com sucesso !!";
            else
                echo "ERRO ao alterar Relatório!";
        } else {
            echo "Preencha todos os campos !!";
        }

    }
    $dados = consultarRelatoriosId($id); // irá receber todos os dados do id que está no banco
?>

    <h3>Alterar Relatórios</h3>
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
                <button type="submit" class="btn btn-success mt-3">
                    Salvar
                </button>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");