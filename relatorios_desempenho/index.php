<?php
    require_once("../cabecalho.php");
?>

    <h3>Gerenciamento de Relatórios</h3>

    <a href="inserir_relatorios.php" class="btn btn-primary mt-3">Cadastrar Relatórios</a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Data</th>
                <th>Metricas</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $relatorios = retornarRelatorios();
                if ($relatorios) {
                    while ($l = $relatorios->fetch(PDO::FETCH_ASSOC)){
                
            ?>
            <tr>
                <td><?= $l['data'] ?></td>
                <td><?= $l['metricas'] ?></td>
                <td>
                    <a href="alterar_relatorios.php?id=<?= $l['id'] ?>" class="btn btn-warning">
                        Alterar
                    </a>
                    <a href="excluir_relatorios.php?id=<?= $l['id'] ?>" class="btn btn-danger">
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