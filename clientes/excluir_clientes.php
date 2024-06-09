<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['id'])){
        $id = $_GET['id']; //criando a sessão que irá mostrar os dados do banco em tela
        $_SESSION ['id'] = $id;
    }
    if ($_POST) {
        $id = $_SESSION['id'];
        if (excluirClientes($_SESSION['id']))
            header('location: index.php');
        else
            echo "Erro ao Excluir o cliente!!";
    }
    $dados = consultarClientesId($id); //receberá todos os dados do id referido
    
    echo "<h3>Excluir Cliente: " . $dados['nome'] . "</h3>"; // Exibe o nome do cliente a ser excluído
?>

        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-danger mt-3" value="Excluir" name="btnExcluir"> 
                <label for ="text"> Deseja realmente excluir esse cliente?</label>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");