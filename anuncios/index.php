<?php
    require_once("../cabecalho.php");
?>

    <h3>Gerenciamento de Anuncios</h3>

    <a href="inserir_anuncios.php" class="btn btn-primary mt-3">Cadastrar Anuncios</a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Campanha</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $anuncios = retornarAnuncios();
                if ($anuncios) {
                    while ($l = $anuncios->fetch(PDO::FETCH_ASSOC)){
                
            ?>
            <tr>
                <td><?= $l['nome'] ?></td>
                <td><?= $l['tipo'] ?></td>
                <td><?= $l['campanha'] ?></td>
                <td>
                    <a href="alterar_anuncios.php?id=<?= $l['id'] ?>" class="btn btn-warning">
                        Alterar
                    </a>
                    <a href="excluir_anuncios.php?id=<?= $l['id'] ?>" class="btn btn-danger">
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