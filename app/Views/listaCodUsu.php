<form method="POST">
    <div>
        <label for="codusu" class="form-label">Digite o Código do Usário</label>
        <input type="number" name="codUsu" id="codusu" class="form-control" placeholder="Digite aqui o código">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>

<table class="table">
    <thead>
        <th>Código</th>
        <th>Email</th>
        <th>Alterar</th>
        <th>Excluir</th>
    </thead>
    <tbody>
        <?php
        //Verificar se existe 
        $codusu = isset($usuario->codusu) ? $usuario->codusu : "";
        $emailUsu = isset($usuario->emailUsu) ? $usuario->emailUsu : "";
        ?>
        <tr>
            <td><?php echo ($codusu) ?> </td>
            <td><?php echo ($emailUsu) ?> </td>
            <td>
            <form method="POST">
                    <input type="hidden" name="codUsuAlterar" value="<?php echo($codusu)?>">
                    <button type="submit" class="btn btn-danger">Alterar</button>
                </form>
            </td>
            <td>
                <form method="POST">
                    <input type="hidden" name="codUsuDel" value="<?php echo($codusu)?>">
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>