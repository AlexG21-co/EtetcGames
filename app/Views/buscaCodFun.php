<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <form method="POST">  
      <h3>Busca por Código</h3>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      
    <div>
        <h1>Busca por código o funcionário</h1>
        <label for="codfun" class="form-label">Digite o Código do funcionário</label>
        <input type="number" name="codFun" id="codfun" class="form-control" placeholder="Digite aqui o código">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>      
</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <form method="POST" class="form">
      <h3>Busca por Nome</h3>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
    <div>
        <h1>Busca o Nome funcionário</h1>
        <label for="codfun" class="form-label">Digite o Nome do funcionário</label>
        <input type="text" name="nomeFuncionario" id="nomeFun" class="form-control" placeholder="Digite aqui o Nome">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
   </form>
      </div>
    </div>
  </div>
</div>



<?php
/*Recebendo o codigo digitado*/
$request = service('request');

//Verificando se tiver o codFun
$codfun = isset($funcionario->codFun) ? $funcionario->codFun : 0;
$nomeFun = isset($funcionario->nomeFun) ? $funcionario->nomeFun : '';
var_dump($nomeFun);
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

$nomeFuncionario = isset($nomeFuncionario)? $nomeFuncionario : '';

if ($nomeFuncionario) {
?>

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

<?php
}
?>