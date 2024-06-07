<?php
    require_once("../cabecalho.html");
?>

    <h3>Alterar Clientes</h3>
    <form>
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome do cliente</label>
                <input type="text" class="form-control"     name="nome">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="telefone" class="form-label">Informe a telefone</label>
                <input type="text" class="form-control"     name="telefone">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="email" class="form-label">Informe o e-mail</label>
                <input type="text" class="form-control"     name="email">
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
    require_once("../rodape.html");