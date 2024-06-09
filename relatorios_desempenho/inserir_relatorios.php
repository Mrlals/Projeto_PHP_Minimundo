<?php
    require_once("../cabecalho.php");
?>

    <h3>Inserir Relatórios</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="data" class="form-label">Informe a data</label>
                <input type="text" class="form-control"     name="data">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="metrica" class="form-label">Informe a metrica</label>
                <input type="text" class="form-control"     name="metrica">
            </div>
        </div>
        <!-- deve-se retornar a listagem de FK relacionada aos anuncios -->
        <div class="row">
            <div class="col">
                <label for="campanha" class="form-label"> Selecione a campanha</label>
                <select class="form-select" name="campanha">
                    <?php
                       $linhas = retornarCampanhas();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$l['id']}'>{$l['nome']}</option>";
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
        if($nome != "" && $tipo != ""){
            if(inserirAnuncios($nome,$tipo))
                echo "Registro inserido com sucesso!";
            else
                echo "Erro ao inserir o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    require_once("../rodape.html");