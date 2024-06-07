<?php
    require_once("../cabecalho.php");
?>

    <h3>Inserir Anuncios</h3>
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
                <label for="cliente" class="form-label"> Selecione o cliente</label>
                <select class="form-select" name="cliente">
                    <?php
                       $linhas = retornarClientes();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$l['id']}'>{$l['descricao']}</option>";
                       } 
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">
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