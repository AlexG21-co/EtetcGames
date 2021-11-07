<form method="POST">
    <div>
    <h1>Digite o código do usuário, para cadastrar como funcionário</h1>
        <label for="codusu" class="form-label">Digite o Código do Usário</label>
        <input type="number" name="CodUsu" id="codusu" class="form-control" placeholder="Digite aqui o código">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>

<?php
/*Recebendo o codigo digitado*/
$request=service('request');

//Verificando se tiver o CodUsu
$codusu = isset($usuario->codusu)? $usuario->codusu :0;

$email= isset($usuario->emailUsu)?$usuario->emailUsu:'';

if ($codusu) {

?>

<form method="POST">
    <div class="mb-3">
        <label for="codUsu" class="form-label">Código Usuário:</label>
        <input type="number" class="form-control" id="nome" value="<?=$codusu?>" readonly name="CodUsu" aria-describedby="codUsuHelp">
    </div>
    
    <div class="mb-3">
        <label for="EmailUsu" class="form-label">Email Usuário:</label>
        <input type="email" class="form-control" id="email" value="<?=$email?>" name="EmailUsu" aria-describedby="nomeHelp">
    </div>

    <div class="mb-3">
        <label for="fone" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nomefun" >
        <div id="foneHelp" class="form-text">Não compartilhe essas informações</div>
    </div>

    <div class="mb-3">
        <label for="fone" class="form-label">Fone:</label>
        <input type="text" class="form-control" id="fone" name="foneFun" >
        <div id="foneHelp" class="form-text">Não compartilhe essas informações</div>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
<?php
}
?>
