<?php
    require_once("../cabecalho.html");
?>

    <h3>Excluir Anuncios</h3>
    <form>
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome</label>
                <input type="text" class="form-control"     name="nome">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="tipo" class="form-label">Informe o tipo</label>
                <input type="text" class="form-control"     name="tipo">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-danger">
                    Excluir
                </button>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");