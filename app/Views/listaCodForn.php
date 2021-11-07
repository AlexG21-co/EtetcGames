<form method="POST">
    <div>
        <label for="codforn" class="form-label">Digite o Código do fornecedor</label>
        <input type="number" name="codForn" id="codforn" class="form-control" placeholder="Digite o código do fornecedor aqui:">
    </div>
    <div class="col-12 pt-3">
        <button type="submit" class="btn btn-outline-dark">Buscar</button>
    </div>
</form>

<table class="table table-dark">
    <thead>
        <th>Código</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Alterar</th>
        <th>Deletar</th>
    </thead>
    <tbody>
        <?php
        $codforn = isset($fornecedor->codForn) ? $fornecedor->codForn : "";
        $nomeForn = isset($fornecedor->nomeForn) ? $fornecedor->nomeForn : "";
        $emailForn = isset($fornecedor->emailForn) ? $fornecedor->emailForn : "";
        $foneForn = isset($fornecedor->foneForn) ? $fornecedor->foneForn : "";
        ?>
        <tr>
            <td><?php echo ($codforn)?></td>
            <td><?php echo ($nomeForn)?></td>
            <td><?php echo ($emailForn)?></td>
            <td><?php echo ($foneForn)?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="codFornAlterar" value="<?php echo($codforn)?>">
                    <button type="submit" class="btn btn-outline-danger">Alterar</button>
                </form>
            </td>
            <td>
                <form method="POST">
                    <input type="hidden" name="codFornDel" value="<?php echo($codforn)?>">
                    <button type="submit" class="btn btn-outline-danger">Deletar</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>