<?php
/*Criando model para a tabela Usuario*/
namespace App\Models;

use CodeIgniter\Model;

//Conexão com a nossa tabela
class UsuarioModel extends Model{

    //Atributos para que a classe funcione
    protected $table = 'usuario_tb';

    //protected projeto os valores do campo
    protected $primaryKey='codusu';

    //Campos em arrays
    protected $allowedFields=['emailUsu','SenhaUsu'];
    
    //retornando os valores em obejetos
    protected $returnType='object';
}
?>