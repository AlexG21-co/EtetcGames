<table class="table table-dark">
    <thead>
        <th>Código</th>
        <th>Fornecedor</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Alterar</th>
        <th>Deletar</th>
    </thead>

    <tbody>
        <?php foreach ($fornecedores as $fornecedo) : ?>
            <tr >
                <td><?php echo ($fornecedo->codForn) ?></td>
                <td><?php echo ($fornecedo->nomeForn) ?></td>
                <td><?php echo ($fornecedo->emailForn) ?></td>
                <td><?php echo ($fornecedo->foneForn) ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="codFornAlterar" value="<?php echo($fornecedo->codForn)?>">
                        <button type="submit" class="btn btn-outline-danger">Alterar</button>
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="codForn" value="<?php echo($fornecedo->codForn)?>">
                        <button type="submit" class="btn btn-outline-danger">Deletar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>