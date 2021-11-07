<form method="POST">
    <div>
        <h1>Busca por código o funcionário</h1>
        <label for="codfun" class="form-label">Digite o Código do funcionário</label>
        <input type="number" name="codFun" id="codfun" class="form-control" placeholder="Digite aqui o código">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>

<?php
/*Recebendo o codigo digitado*/
$request = service('request');

//Verificando se tiver o codFun
$codfun = isset($funcionario->codFun) ? $funcionario->codFun : 0;
$nomeFun = isset($funcionario->nomeFun) ? $funcionario->nomeFun : '';
$foneFun = isset($funcionario->foneFun) ? $funcionario->foneFun : '';

if ($codfun) {
?>
    
    <form method="POST">
        <div class="mb-3">
            <label for="codFun" class="form-label">Código Funcionario:</label>
            <input type="number" class="form-control" id="codFun" value="<?= $codfun ?>" readonly name="codFunAlterar" aria-describedby="codUsuHelp">
        </div>

        <div class="mb-3">
            <label for="EmailUsu" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nomeFun" value="<?= $nomeFun ?>" name="nomeFun" aria-describedby="nomeHelp">
        </div>

        <div class="mb-3">
            <label for="fone" class="form-label">Fone:</label>
            <input type="text" class="form-control" id="fone" value="<?= $foneFun ?>" name="foneFun">
            <div id="foneHelp" class="form-text">Não compartilhe essas informações</div>
        </div>


        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <form method="Post">
        <input type="hidden" name="CodFunDeletar" value="<?=$codfun?>">
        <button type="submit" class="btn btn-primary">Deletar</button>
    </form>

<?php
}
?>