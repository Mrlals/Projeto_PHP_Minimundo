<?php
    require_once("../cabecalho.php");
    session_start();
    //confirma se o anuncio foi passado via GET
    if (isset($_GET['id'])){
        $id = $_GET['id']; //criando a sessão que irá mostrar os dados do banco em tela
        $_SESSION ['id'] = $id;
    }
    if ($_POST) {
        $id = $_SESSION['id']; //recebe o id da sessão
        if (excluirAnuncios($_SESSION['id'])) 
            header('location: index.php');
        else
            echo "Erro ao Excluir o Anuncio!!";
    }
    $dados = consultarAnunciosId($id); //receberá todos os dados do id referido
    
?>

    <h3>Excluir o Anuncio Selecionado</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Nome do anúncio</label>
                <input type="text" class="form-control"     name="nome" value="<?= ($dados['nome']) ?>" readonly>
            </div>                                                      <!-- Adicionado value recebendo os dados do banco relacionados ao nome, somente leitura -->
        </div>
        <div class="row">
            <div class="col">
                <label for="tipo" class="form-label">Tipo do anúncio</label>
                <input type="text" class="form-control"     name="tipo" value="<?= ($dados['tipo']) ?>" readonly>
            </div>
        </div>
        <!-- deve-se retornar a listagem de FK relacionada aos anuncios -->
        <div class="row">
            <div class="col">
                <label for="campanha" class="form-label">Campanha do anúncio</label>
                <select class="form-select" name="campanha"  readonly>
                    <?php
                       $campanhas = retornarCampanhas(); // busca pelas campanhas disponiveis
                       while($campanha = $campanhas->fetch(PDO::FETCH_ASSOC)){
                            $selected = $cammpanha['id'] == $dados['campanha_id'] ? "selected" : ""; // verifica se a campanha é do anuncio selecionado
                            echo "<option value='{$campanha['id']}'$selcted>{$campanha['nome']}</option>";
                       } 
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-danger mt-3" value="Excluir" name="btnExcluir"> 
                <label for ="text"> Deseja realmente excluir esse anuncio?</label>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");