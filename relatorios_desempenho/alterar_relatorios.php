<?php
    require_once("../cabecalho.php");
    session_start();

    if (isset($_GET['id'])) {
        $id = $_GET['id']; // irá apresentar os dados do banco em tela
        $_SESSION['id'] = $id;
    }

    if ($_POST) {
        $data = $_POST['data'];
        $metricas = $_POST['metricas'];
        $campanha_id = $_POST['campanha'];

        if ($data != "" && $metricas != ""){
            if (alterarRelatorios($data, $metricas, $campanha_id, $_SESSION['id']))
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
                <input type="text" class="form-control"     name="data" value="<?=($dados['data']) ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="metricas" class="form-label">Informe a métrica</label>
                <input type="text" class="form-control"     name="metricas" value="<?=($dados['metricas']) ?>">
            </div>
        </div>
        <!-- deve-se retornar a listagem de FK relacionada aos anuncios -->
        <div class="row">
            <div class="col">
                <label for="campanha" class="form-label"> Selecione a nova campanha</label>
                <select class="form-select" name="campanha">
                    <?php
                       $campanhas = retornarCampanhas(); // busca pelas campanhas disponiveis
                       while($campanha = $campanhas->fetch(PDO::FETCH_ASSOC)){
                            $selected = $campanha['id'] == $dados['campanha_id'] ? "selected" : ""; // verifica se a campanha é do anuncio selecionado
                            echo "<option value='{$campanha['id']}'$selected>{$campanha['nome']}</option>";
                       } 
                    ?>
                </select>
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