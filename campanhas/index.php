<?php
    require_once("../cabecalho.php");
?>

    <h3>Gerenciamento de Campanhas</h3>

    <a href="inserir_campanhas.php" class="btn btn-primary mt-3">Cadastrar Campanhas</a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data de inicio</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $campanhas = retornarCampanhas();
                if ($campanhas) {
                    while ($l = $campanhas->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?= $l['nome'] ?></td>
                <td><?= $l['descricao'] ?></td>
                <td><?= $l['data_inicio'] ?></td>
                <td>
                    <a href="alterar_campanhas.php?id=<?= $l['id'] ?>" class="btn btn-warning">
                        Alterar
                    </a>
                    <a href="excluir_campanhas.php?id=<?= $l['id'] ?>" class="btn btn-danger">
                        Excluir
                    </a>
                </td>
            </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
    

<?php
    require_once("../rodape.html");