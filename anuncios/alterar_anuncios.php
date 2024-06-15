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
        $campanha_id = $_POST['campanha'];

        if ($nome != "" && $tipo != "" && $campanha_id != ""){
            if (alterarAnuncios($nome, $tipo, $campanha_id, $_SESSION['id']))
                echo "Anuncio alterado com sucesso !!";
            else
                echo "ERRO ao alterar Anuncio!";
        } else {
            echo "Preencha todos os campos !!";
        }

    }
    $dados = consultarAnunciosId($id); // irá receber todos os dados do id que está no banco
?>

    <h3>Alterar o Anúncio</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o novo nome</label>
                <input type="text" class="form-control"     name="nome" value="<?= ($dados['nome']) ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="tipo" class="form-label">Informe o novo tipo de anuncio</label>
                <input type="text" class="form-control"     name="tipo" value="<?= ($dados['tipo']) ?>">
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