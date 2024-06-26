<?php
    require_once("../cabecalho.php");
?>

    <h3>Inserir Novo Anúncio</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o anuncio</label>
                <input type="text" class="form-control"     name="nome">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="tipo" class="form-label">Informe o tipo de anuncio</label>
                <input type="text" class="form-control"     name="tipo">
            </div>
        </div>
        <!-- deve-se retornar a listagem de FK relacionada aos anuncios -->
        <div class="row">
            <div class="col">
                <label for="campanha" class="form-label"> Selecione a campanha</label>
                <select class="form-select" name="campanha">
                    <?php
                       $campanhas = retornarCampanhas();
                       while($campanha = $campanhas->fetch(PDO::FETCH_ASSOC)){
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
    if ($_POST){
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $campanha_id = $_POST['campanha'];
        if($nome != "" && $tipo != ""){
            if(inserirAnuncios($nome, $tipo, $campanha_id))
                echo "Registro inserido com sucesso!";
            else
                echo "Erro ao inserir o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    require_once("../rodape.html");