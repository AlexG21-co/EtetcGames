<form method="POST">
    <div class="mb-3 col-1">
        <label class="form-label" for="CodigoFornInput">Código:</label>
        <input class="form-control text-center" readonly type="text" name="codFornAlterar" id="CodigoFornInput" value="<?php echo ($fornecedores->codForn) ?>">
        <div class="mb-3 col-4">
            <label for="EmailFornInput">Email </label>
            <input type="text" name="emailForn" id="EmailFornInput" value="<?php echo ($fornecedores->emailForn) ?>">
        </div>
        <div class="mb-3 col-4">
            <label class="form-label" for="nomeFornecedorInput">Nome:</label>
            <input type="text" name="nomeForn" id="nomeFornecedorInput" value="<?php echo ($fornecedores->nomeForn) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="foneFornecedorInput">Fone: </label>
            <input class="form-control" type="text" name="foneForn" id="foneFornecedorInput" value="<?php echo ($fornecedores->foneForn) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Alterar</button>
    </div>
</form>