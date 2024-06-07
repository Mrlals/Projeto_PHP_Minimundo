<?php
    require_once("../cabecalho.php");
?>

    <h3>Inserir Campanhas</h3>
    <form action="" method="POST">
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
                <label for="data_inicio" class="form-label">Informe a data de início</label>
                <input type="text" class="form-control"     name="data_inicio">
            </div>
        </div>

        <!-- deve-se retornar a listagem de id clientes vinculados a tabela de campanhas -->
        <div class="row">
            <div class="col">
                <label for="cliente" class="form-label"> Selecione o cliente</label>
                <select class="form-select" name="cliente">
                    <?php
                       $linhas = retornarClientes();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$l['id']}'>{$l['nome']}</option>";
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
        $descricao = $_POST['descricao'];
        $data_inicio = $_POST['data_inicio'];
        if($nome != "" && $descricao != "" && $data_inicio != ""){
            if(inserirCampanhas($nome,$descricao,$data_inicio))
                echo "Registro inserido com sucesso!";
            else
                echo "Erro ao inserir o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    require_once("../rodape.html");