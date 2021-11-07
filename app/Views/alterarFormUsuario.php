<form method="POST">
     <div class="mb-3 col-2">
         <label class="form-label" for="CodigoUuarioInput">Código: </label>
         <input class="form-control text-center" readonly type="text" name="codUsuAlterar" id="CodigoUuarioInput" value="<?php echo($usuario->codusu) ?>">
     </div>
     <div class="mb-3 col-8">
         <label  for="EmailUuarioInput">Email: </label>
         <input type="text" name="emailUsu" id="EmailUuarioInput" value="<?php echo($usuario->emailUsu) ?>">
     </div>
     <div>
         <button type="submit" class="btn btn-primary"> Alterar </button>
     </div>
</form>